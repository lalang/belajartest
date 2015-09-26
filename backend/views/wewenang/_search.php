<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WewenangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wewenang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'aktif') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'kode') ?>

    <div class="box-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'Search <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
