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
        <?php
                echo Slider::widget([
                    'name' => 'current_no',
                    'value' => 2,
                    'sliderColor' => Slider::TYPE_INFO,
                    'handleColor' => Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'min' => 0,
                        'max' => 6,
                        'ticks' => [1,2,3,4,5,6],
                        'ticks_labels' => ['1. Cari Izin','2. Input Formulir','3. Unggah Berkas','4. Atur Jadwal Pengambilan', '5. Pemrosesan Izin', '6. Pengambilan Izin'],
                        'ticks_snap_bounds' => 50,
                        'tooltip' => 'always',
                        'formatter'=>new yii\web\JsExpression("function(val) { 
                                return 'Anda Disini';
                        }")
                    ],
                    'options' => ['disabled'=>true,'style' => 'width: 100%']
                ]);
            ?>
    </div>
    <div class="col-sm-1"></div>
</div>
                
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
