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
            'ticks' => explode(',', $model->steps),
            'ticks_labels' => explode(',', $model->processes),
            'ticks_snap_bounds' => 50,
            'tooltip' => 'always',
        ],
        'options' => ['disabled' => true, 'style' => 'width: 80%']
    ]);
    ?>
</div>