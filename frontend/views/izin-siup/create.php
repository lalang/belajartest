<?php

use yii\helpers\Html;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */

$this->title = Yii::t('app', 'Buat Permohonan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Siup'), 'url' => ['index']];
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
            'ticks' => [1,2,3,4,5,6,7],
            'ticks_labels' => ['Cari Izin','Input Formulir','Unggah Berkas','Preview SK','Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
            'ticks_snap_bounds' => 50,
            'tooltip' => 'always',
            'formatter'=>new yii\web\JsExpression("function(val) {
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
                
        <?=
        $this->render('_form', [
            'model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,
        ])
        ?>
