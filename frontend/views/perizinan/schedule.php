<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \backend\models\Kuota;
use \backend\models\Lokasi;
use yii\helpers\ArrayHelper;
use kartik\slider\Slider;
use yii\widgets\Pjax;

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
        <?php
        echo Slider::widget([
            'name' => 'current_no',
            'value' => 4,
            'sliderColor' => Slider::TYPE_INFO,
            'handleColor' => Slider::TYPE_DANGER,
            'pluginOptions' => [
                'min' => 0,
                'max' => 6,
                'ticks' => [1, 2, 3, 4, 5, 6],
                'ticks_labels' => ['Cari Izin', 'Input Formulir', 'Unggah Berkas', 'Atur Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
                'ticks_snap_bounds' => 50,
                'tooltip' => 'always',
                'formatter' => new yii\web\JsExpression("function(val) { 
                                return 'Anda Disini';
                        }")
            ],
            'options' => ['disabled' => true, 'style' => 'width: 100%']
        ]);
        ?>
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

                <?php //$form->field($model, 'lokasi_izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                <?php //$form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['value' => $model->izin->wewenang_id, 'style' => 'display:none']); ?>

                <?php
//                echo $model->tanggal_mohon . '<br>';
//                echo $model->izin->durasi . '<br>';
//                echo date('H:i:s', strtotime($model->tanggal_mohon)).'<br>';
//                echo $hari_izin = date('w', strtotime($model->tanggal_mohon)).'<br>';
//                $start_date = new DateTime($model->tanggal_mohon);
//                if ($model->izin->durasi_satuan == 'Hari') {
//                    if (strtotime(date('H:i:s', strtotime($model->tanggal_mohon))) > strtotime('12:00:00') && ($hari_izin > 0 && $hari_izin <6)) {
//                        date_add($start_date, date_interval_create_from_date_string(($model->izin->durasi + 2). " days"));
//                    } else {
//                        date_add($start_date, date_interval_create_from_date_string(($model->izin->durasi + 1). " days"));
//                    }
//                    echo date_format($start_date, "d-m-Y").'<br>';
//                    echo $hari_pengambilan = date_format($start_date, "w");
//                    if (($hari_pengambilan < $hari_izin) || ($hari_pengambilan == 6) || ($hari_pengambilan == 0)) {
//                        date_add($start_date, date_interval_create_from_date_string("2 days"));
//                    }
//                    
//                }
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
                        <?= Html::submitButton('Daftar', [ 'id'=>'submit-btn', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','disabled'=>true]) ?>
                    </div>
                    <?= $form->field($model, 'lokasi_pengambilan_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?= $form->field($model, 'pengambilan_sesi', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?php ActiveForm::end(); ?>

                </div>

            </div>


        </div>
    </div>

</div>

