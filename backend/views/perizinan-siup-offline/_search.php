<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSiupOfflineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-siup-offline-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_izin') ?>

    <?= $form->field($model, 'pemilik_nama') ?>

    <?= $form->field($model, 'pemilik_tempat_lahir') ?>

    <?= $form->field($model, 'pemilik_tanggal_lahir') ?>

    <?php // echo $form->field($model, 'pemilik_alamat_rumah') ?>

    <?php // echo $form->field($model, 'pemilik_propinsi') ?>

    <?php // echo $form->field($model, 'pemilik_kabupaten') ?>

    <?php // echo $form->field($model, 'pemilik_kecamatan') ?>

    <?php // echo $form->field($model, 'pemilik_kelurahan') ?>

    <?php // echo $form->field($model, 'pemilik_no_telpon') ?>

    <?php // echo $form->field($model, 'pemilik_no_ktp') ?>

    <?php // echo $form->field($model, 'pemilik_kewarganegaraan') ?>

    <?php // echo $form->field($model, 'perusahaan_nama') ?>

    <?php // echo $form->field($model, 'perusahaan_alamat') ?>

    <?php // echo $form->field($model, 'perusahaan_propinsi') ?>

    <?php // echo $form->field($model, 'perusahaan_kabupaten') ?>

    <?php // echo $form->field($model, 'perusahaan_kecamatan') ?>

    <?php // echo $form->field($model, 'perusahaan_kelurahan') ?>

    <?php // echo $form->field($model, 'perusahaan_kodepos') ?>

    <?php // echo $form->field($model, 'perusahaan_no_telpon') ?>

    <?php // echo $form->field($model, 'perusahaan_no_fax') ?>

    <?php // echo $form->field($model, 'perusahaan_email') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
