<?php

use kartik\slider\Slider;

?>
<div style="text-align: center">
    <?php
        if(($model->current_no <> $model->jumlah_tahap)){
            $value = '6';
        }else{
            $value = '7';
        }
    ?>
    <?=
    Slider::widget([
        'name' => 'current_no',
        'value' => $value,
        'sliderColor' => Slider::TYPE_GREY,
        'handleColor' => Slider::TYPE_DANGER,
        'pluginOptions' => [
//            'min' => 1,
//            'max' => $model->jumlah_tahap,
            'ticks' => [1,2,3,4,5,6,7],
            'ticks_labels' => ['Cari Izin','Input Formulir','Unggah Berkas','Preview SK', 'Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
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