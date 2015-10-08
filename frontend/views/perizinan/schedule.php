<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \backend\models\Kuota;
use \backend\models\Lokasi;
use yii\helpers\ArrayHelper;
use kartik\slider\Slider;
use yii\widgets\Pjax;
use backend\models\HariLibur;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Set Schedule')];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?= $this->render('_step', ['value' => 5]) ?>
    </div>
    <div class="col-sm-1"></div>
</div>
<br><br><br><br><br>
<div class="row">

    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Jadwal dan Lokasi Pengambilan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Mohon diperhatikan!</h4>
                    <p>Permohonan perizinan yang dilakukan di atas jam 12:00 siang akan dilayani di hari kerja berikutnya.</p>
                    <p>Silahkan pilih tanggal pengambilan, kemudian pilih lokasi dan sesi pengambilan yang diinginkan lalu klik tombol Daftar.</p>
                </div>

                <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                <?= Html::hiddenInput('lokasi_izin_id', $model->lokasi_izin_id, ['id' => 'lokasi_izin_id']); ?>

                <?= Html::hiddenInput('wewenang', $model->izin->wewenang_id, ['id' => 'wewenang']); ?>

              <?php
// $jumlah_libur = HariLibur::find()->where("tanggal between '2015-12-27' and '2015-12-28'")->count();
// echo $jumlah_libur;
                $offdays = ArrayHelper::getColumn(HariLibur::find('tanggal >= now()')->select(['DATE_FORMAT(tanggal,"%d-%m-%Y") as tanggal'])->asArray()->all(), 'tanggal');
                $eta = backend\models\Perizinan::getETA($model->tanggal_mohon, $model->izin->durasi);
                echo $form->field($model, 'pengambilan_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
//                        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pertemuan')],
//                        'id'=>'tanggal-id',
                    'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'startDate' => date_format($eta, "d-m-Y"),
                        'daysOfWeekDisabled' => [0, 6],
                        'datesDisabled' => $offdays,
                    ],
                    'pluginEvents' => [
                        "changeDate" => "function(e) {
                            $.ajax({
                                    url: '" . Url::to(['kuota']) . "',
                                    type: 'GET',

                                    data:{
                                    tanggal: $('#perizinan-pengambilan_tanggal').val(), 
                                    lokasi: $('#lokasi_izin_id').val(), 
                                    wewenang: $('#wewenang').val(), 
                                    
                                    },
                                    dataType: 'html',
                                    async: false,
                                    success: function(data, textStatus, jqXHR)
                                    {
                                       $('#kuota').html(data)
                                    }
                                    
                                });

                         }",
                    ],
                ])->hint('format : dd-mm-yyyy (cth. 27-04-2015)');
                ?>

                <div id="kuota">
                     
                </div>

                <div class="box-body no-padding">
                    <div class="form-group text-center">
                        <?= Html::submitButton('Daftar', [ 'id' => 'submit-btn', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'disabled' => true]) ?>
                    </div>
                    <?= $form->field($model, 'lokasi_pengambilan_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?= $form->field($model, 'pengambilan_sesi', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?php ActiveForm::end(); ?>

                </div>

            </div>


        </div>
    </div>

</div>

