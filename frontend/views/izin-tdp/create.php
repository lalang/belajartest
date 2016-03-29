<?php

use yii\helpers\Html;
use kartik\slider\Slider;
use backend\models\IzinTdpLegal;
use yii\web\Session;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */

$this->title = Yii::t('app', 'IZIN TDP');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br>
        <div style="text-align: center">
            <?=
            Slider::widget([
                'name' => 'current_no',
                'value' => 2,
                'sliderColor' => Slider::TYPE_GREY,
                'handleColor' => Slider::TYPE_DANGER,
                'pluginOptions' => [
                    //            'min' => 1,
                    //            'max' => $model->jumlah_tahap,
                    'ticks' => [1, 2, 3, 4, 5, 6],
                    'ticks_labels' => ['Cari Izin', 'Input Formulir', 'Preview SK', 'Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
                    'ticks_snap_bounds' => 50,
                    'tooltip' => 'always',
                    'formatter' => new yii\web\JsExpression("function(val) {
                       return 'Anda Disini';
                    }")
                ],
                'options' => ['disabled' => true, 'style' => 'width: 80%']
            ]);
            ?>
        </div>
        <br>
    </div>
    <div class="col-sm-1"></div>
</div>
<?php
$namaIzin = \backend\models\Izin::findOne($model->izin_id)->nama;

$session = Yii::$app->session;
if (strpos(strtoupper($namaIzin), strtoupper('PT'))) {
    //Render Form PT
    $session->set('pt', 1);
    $model->bentuk_perusahaan = 1;
//            echo $this->render('_formPercepatan', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,]);
    echo $this->render('_formTdp_PT', ['model' => $model, 'data_bp' => $data_bp, 'data_sp' => $data_sp,]);
} elseif (strpos(strtoupper($namaIzin),strtoupper('Koperasi'))) {
    //Render Form Koperasi
    $session->set('pt', '');
    $model->bentuk_perusahaan = 4;
    echo $this->render('_formTDP_KOP', ['model' => $model, 'data_bp' => $data_bp, 'data_sp' => $data_sp,]);
} elseif (strpos(strtoupper($namaIzin),strtoupper('bul'))) {
    //Render Form Bull
    $session->set('pt', 1);
    $model->bentuk_perusahaan = 3;
    echo $this->render('_formTDP_Bull', ['model' => $model, 'data_bp' => $data_bp, 'data_sp' => $data_sp,]);
} elseif (strpos(strtoupper($namaIzin),strtoupper('cv'))) {
    //Render Form CV
    $session->set('pt', '');
    $model->bentuk_perusahaan = 2;
    echo $this->render('_formTdp_CV', ['model' => $model, 'data_bp' => $data_bp, 'data_sp' => $data_sp]);
} elseif (strpos(strtoupper($namaIzin),strtoupper('fa'))) {
    //Render Form Fa
    $session->set('pt', '');
    $model->bentuk_perusahaan = 5;
    echo $this->render('_formTdp_Fa', ['model' => $model, 'data_bp' => $data_bp, 'data_sp' => $data_sp]);
} elseif (strpos(strtoupper($namaIzin),strtoupper('po'))) {
    //Render Form PO
    $session->set('pt', '');
    $model->bentuk_perusahaan = 6;
    echo $this->render('_formTdp_PO', ['model' => $model, 'data_bp' => $data_bp, 'data_sp' => $data_sp,]);
}
?>
<!--wizard untuk izin kalian-->
<!--<script src="/js/wizard_pm1.js"></script>-->

