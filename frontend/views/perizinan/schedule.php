<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \backend\models\Kuota;
use \backend\models\Lokasi;
use yii\helpers\ArrayHelper;
use kartik\slider\Slider;

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

    <div class="col-sm-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Kuota Layanan</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Lokasi</th>
                            <th class="text-center">Sesi 1<br>08:00 - 12:00</th>
                            <th class="text-center">Sesi 2<br>13:00 - 16:00</th>
                        </tr>
                        <?php
                        $i = 1;
                        $kuotas = Kuota::getKuotaList($model->lokasi_izin_id, $model->izin->wewenang_id, '2015-10-14');
                        foreach ($kuotas as $kuota) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?>.</td>
                                <td><?= $kuota['nama']; ?></td>
                                <td class="text-center"><?= $kuota['sesi_1_kuota'] - $kuota['sesi_1_terpakai']; ?></td>
                                <td class="text-center"><?= $kuota['sesi_2_kuota'] - $kuota['sesi_2_terpakai']; ?></td>
                            </tr>

                        <?php } ?>


                    </tbody></table>
            </div><!-- /.box-body -->
        </div>
    </div>

    <div class="col-sm-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Jadwal dan Lokasi Pengambilan</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                <?php
                $start_date = new DateTime($model->tanggal_mohon);
                if ($model->izin->durasi_satuan == 'Hari') {
                    date_add($start_date, date_interval_create_from_date_string($model->izin->durasi . " days"));
                }
                echo $form->field($model, 'pengambilan_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
//                        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pertemuan')],
//                        'id'=>'tanggal-id',
                    'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'startDate' => date_format($start_date, "d-m-Y"),
                        'daysOfWeekDisabled' => [0, 6],
                    ],
                    'pluginEvents' => [
                        "changeDate" => "function(e) { alert(e); }",
                    ],
                ])->hint('format : dd-mm-yyyy (cth. 27-04-2015)');
                ?>

                <?= $form->field($model, 'lokasi_pengambilan_id')->dropDownList(ArrayHelper::map(Kuota::getKuotaList($model->lokasi_izin_id, $model->izin->wewenang_id, '2015-10-14'), 'lokasi_id', 'nama')); ?>


<?= $form->field($model, 'pengambilan_sesi')->radioList(['Sesi I' => 'Sesi I', 'Sesi II' => 'Sesi II']); ?>


                <div class="form-group text-center">
<?= Html::submitButton('Daftar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>



<?php ActiveForm::end(); ?>


        </div>
    </div>

</div>
