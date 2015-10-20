<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'type' => ActiveForm::TYPE_INLINE,
                'fieldConfig' => ['autoPlaceholder' => false]
    ]);
    ?>
    <?= $form->field($model, 'cari')->textInput(['style'=>'width: 300px;', 'placeholder' => 'Kode registrasi, nama pemohon']) ?>
    <?= Html::submitButton(Yii::t('app', 'Cari <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>

    <?php ActiveForm::end(); ?>

</div>
