<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKantorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdp-kantor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'izin_tdp_id') ?>

    <?= $form->field($model, 'izin_tdp_kantor_nama') ?>

    <?= $form->field($model, 'izin_tdp_kantor_notdp') ?>

    <?= $form->field($model, 'izin_tdp_kantor_alamat') ?>

    <?php // echo $form->field($model, 'izin_tdp_kantor_kota') ?>

    <?php // echo $form->field($model, 'izin_tdp_kantor_propinsi') ?>

    <?php // echo $form->field($model, 'izin_tdp_kantor_kodepos') ?>

    <?php // echo $form->field($model, 'izin_tdp_kantor_tlpn') ?>

    <?php // echo $form->field($model, 'izin_tdp_kantor_status') ?>

    <?php // echo $form->field($model, 'izin_tdp_kantor_kegiatan_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
