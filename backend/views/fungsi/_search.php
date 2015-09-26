<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FungsiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fungsi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_urut') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nama_en') ?>

    <div class="box-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'Search <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
