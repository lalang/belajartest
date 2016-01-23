<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKantorcabangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdp-kantorcabang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'izin_tdp_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'no_tdp') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'propinsi_id') ?>

    <?php // echo $form->field($model, 'kabupaten_id') ?>

    <?php // echo $form->field($model, 'kodepos') ?>

    <?php // echo $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'status_prsh') ?>

    <?php // echo $form->field($model, 'kbli_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
