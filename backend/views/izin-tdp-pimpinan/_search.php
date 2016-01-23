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

    <?= $form->field($model, 'jabatan_id') ?>

    <?= $form->field($model, 'kewarganegaraan_id') ?>

    <?= $form->field($model, 'jabatan_lain_id') ?>

    <?php // echo $form->field($model, 'nama_lengkap') ?>

    <?php // echo $form->field($model, 'tmplahir') ?>

    <?php // echo $form->field($model, 'tgllahir') ?>

    <?php // echo $form->field($model, 'alamat_lengkap') ?>

    <?php // echo $form->field($model, 'kodepos') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'mulai_jabat') ?>

    <?php // echo $form->field($model, 'jml_lbr_saham') ?>

    <?php // echo $form->field($model, 'jml_rp_modal') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
