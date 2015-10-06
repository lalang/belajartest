<?php

use kartik\slider\Slider;

?>
<div style="text-align: center">
    <?=
    Slider::widget([
        'name' => 'current_no',
        'value' => $model->current_no,
        'sliderColor' => Slider::TYPE_GREY,
        'handleColor' => Slider::TYPE_DANGER,
        'pluginOptions' => [
//            'min' => 1,
//            'max' => $model->jumlah_tahap,
            'ticks' => explode(',', $model->steps),
            'ticks_labels' => explode(',', $model->processes),
            'ticks_snap_bounds' => 50,
            'tooltip' => 'always',
            'formatter'=>new yii\web\JsExpression("function(val) {
               return 'Posisi Dokumen';
            }")
        ],
        'options' => ['disabled' => true, 'style' => 'width: 80%']
    ]);
    ?>
</div>