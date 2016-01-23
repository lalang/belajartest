<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpLegalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdp-legal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'izin_tdp_id') ?>

    <?= $form->field($model, 'jenis') ?>

    <?= $form->field($model, 'nomor') ?>

    <?= $form->field($model, 'dikeluarkan_oleh') ?>

    <?php // echo $form->field($model, 'tanggal_dikeluarkan') ?>

    <?php // echo $form->field($model, 'masa_laku') ?>

    <?php // echo $form->field($model, 'masa_laku_satuan') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
