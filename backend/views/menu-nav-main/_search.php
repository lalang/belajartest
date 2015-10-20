<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuNavMainSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-nav-main-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nama_en') ?>

    <?= $form->field($model, 'link') ?>

    <?= $form->field($model, 'link_en') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'urutan') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>