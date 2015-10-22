<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPimpinanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdp-pimpinan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'izin_tdp_id') ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_kedudukan') ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_nama') ?>

    <?= $form->field($model, 'izin_tdp_pimpinan') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_tmpt_lahir') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_tgl_lahir') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_alamat') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_kodepos') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_tlpn') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_kewarganegara') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_tgl_mulai') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_jum_saham') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_jum_modal') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_kedudukan_lain') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_nama_perusahaan') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_alamat_perusahaan') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_kodepos_perusahaan') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_tlpn_perusahaan') ?>

    <?php // echo $form->field($model, 'izin_tdp_pimpinan_tgl_mulai_perusahaan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
