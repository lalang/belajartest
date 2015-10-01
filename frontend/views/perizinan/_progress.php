<?php

use kartik\slider\Slider;

?>
<div style="text-align: center">
    <?php
        if(($model->current_no <> $model->jumlah_tahap)){
            $value = '5';
        }else{
            $value = '6';
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
            'ticks' => [1,2,3,4,5,6],
            'ticks_labels' => ['1. Cari Izin','2. Input Formulir','3. Unggah Berkas','4. Atur Jadwal Pengambilan', '5. Pemrosesan Izin', '6. Pengambilan Izin'],
            'ticks_snap_bounds' => 50,
            'tooltip' => 'always',
        ],
        'options' => ['disabled' => true, 'style' => 'width: 80%']
    ]);
    ?>
</div>