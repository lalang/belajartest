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

    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
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
                        "changeDate" => "function(e) {
                            console.log($('#perizinan-pengambilan_tanggal').val());

                              $.get( 'schedule', { tanggal: $('#perizinan-pengambilan_tanggal').val() } );
                         }",
                    ],
                ])->hint('format : dd-mm-yyyy (cth. 27-04-2015)');
                ?>


<div class="result"></div>


                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Lokasi</th>
                            <th class="text-center">Sesi 1<br>08:00 - 12:00</th>
                            <th class="text-center">Sesi 2<br>13:00 - 16:00</th>
                        </tr>
                        <?php
                        $i = 1;
                        $getTanggal  = $_GET['tanggal'];
                        $explodeTanggal = explode("-", $getTanggal);
                        $tanggal = $explodeTanggal[2].'-'.$explodeTanggal[1].'-'.$explodeTanggal[0];
                        $kuotas = Kuota::getKuotaList($model->lokasi_izin_id, $model->izin->wewenang_id, $tanggal);
                        foreach ($kuotas as $key => $kuota) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?>.</td>
                                <td><?= $kuota['nama']; ?></td>
                                <td class="text-center"><button type="button" class="btn btn-block btn-info btn-flat" value="<?= $kuota['lokasi_id'] ?>,Sesi I"><?= $kuota['sesi_1_kuota'] - $kuota['sesi_1_terpakai']; ?></button></td>
                                <td class="text-center"><button type="button" class="btn btn-block btn-info btn-flat" value="<?= $kuota['lokasi_id'] ?>,Sesi II"><?= $kuota['sesi_2_kuota'] - $kuota['sesi_2_terpakai']; ?></button></td>
                            </tr>

                        <?php } ?>


                    </tbody></table>
            </div><!-- /.box-body -->

            <div class="box-body no-padding">
                <div class="form-group text-center">
                    <?= Html::submitButton('Daftar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?= $form->field($model, 'lokasi_pengambilan_id') ?>
                <?= $form->field($model, 'pengambilan_sesi') ?>
                <?php ActiveForm::end(); ?>

            </div>

        </div>


    </div>
</div>

</div>
<?php
$this->registerJs("
    var all_tr = $('.btn');
    $('td button[type=button]').on('click', function () {
        all_tr.removeClass('selected btn-warning');
        $(this).closest('.btn').addClass('selected btn-warning');

        console.log($(this).closest('.btn').val());
        var result = $(this).closest('.btn').val().split(',');
        //alert( result[2] );
        $('#perizinan-lokasi_pengambilan_id').val(result[0]);
        $('#perizinan-pengambilan_sesi').val(result[1]);
    });
");
?>
<script>
    //function sesi1(key, lokasi_id,sesi){
       /* $(".id_1_"+key).click(function(e) {
            if ($(this).hasClass("btn-info")) {
                $(this).removeClass("btn-info").addClass("btn-warning");
            } else {
                // if other menus are open remove open class and add closed
                $(this).siblings().removeClass("btn-info").addClass("btn-warning");
                $(this).removeClass("btn-warning").addClass("btn-info");
            }
        });*/
    //}
</script>
