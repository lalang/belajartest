<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model FaqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tanya') ?>

    <?= $form->field($model, 'jawab') ?>

    <?= $form->field($model, 'tanya_en') ?>

    <?= $form->field($model, 'jawab_en') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <div class="box-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'Search <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
