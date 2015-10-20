<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPemegangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdp-pemegang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'izin_tdp_id') ?>

    <?= $form->field($model, 'izin_tdp_pemegang_nama') ?>

    <?= $form->field($model, 'izin_tdp_pemegang_alamat') ?>

    <?= $form->field($model, 'izin_tdp_pemegang_kodepos') ?>

    <?php // echo $form->field($model, 'izin_tdp_pemegang_tlpn') ?>

    <?php // echo $form->field($model, 'izin_tdp_pemegang_kewarganegaraan') ?>

    <?php // echo $form->field($model, 'izin_tdp_pemegang_npwp') ?>

    <?php // echo $form->field($model, 'izin_tdp_pemegang_jum_saham') ?>

    <?php // echo $form->field($model, 'izin_tdp_pemegang_jum_modal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
