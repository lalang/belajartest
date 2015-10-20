<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VisiMisiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visi-misi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'icon') ?>

    <?= $form->field($model, 'info') ?>

    <?= $form->field($model, 'info_en') ?>

    <?= $form->field($model, 'urutan') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
