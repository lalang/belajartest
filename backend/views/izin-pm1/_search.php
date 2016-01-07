<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPm1Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-pm1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'perizinan_id') ?>

    <?= $form->field($model, 'izin_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'no_kk') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'kodepos') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'no_surat_pengantar') ?>

    <?php // echo $form->field($model, 'tanggal_surat') ?>

    <?php // echo $form->field($model, 'instansi_tujuan') ?>

    <?php // echo $form->field($model, 'tujuan') ?>

    <?php // echo $form->field($model, 'keperluan_administrasi') ?>

    <?php // echo $form->field($model, 'nik_orang_lain') ?>

    <?php // echo $form->field($model, 'no_kk_orang_lain') ?>

    <?php // echo $form->field($model, 'nama_orang_lain') ?>

    <?php // echo $form->field($model, 'tempat_lahir_orang_lain') ?>

    <?php // echo $form->field($model, 'tanggal_lahir_orang_lain') ?>

    <?php // echo $form->field($model, 'alamat_orang_lain') ?>

    <?php // echo $form->field($model, 'kodepos_orang_lain') ?>

    <?php // echo $form->field($model, 'pekerjaan_orang_lain') ?>

    <?php // echo $form->field($model, 'telepon_orang_lain') ?>

    <?php // echo $form->field($model, 'nik_saksi1') ?>

    <?php // echo $form->field($model, 'no_kk_saksi1') ?>

    <?php // echo $form->field($model, 'nama_saksi1') ?>

    <?php // echo $form->field($model, 'tempat_lahir_saksi1') ?>

    <?php // echo $form->field($model, 'tanggal_lahir_saksi1') ?>

    <?php // echo $form->field($model, 'alamat_saksi1') ?>

    <?php // echo $form->field($model, 'kodepos_saksi1') ?>

    <?php // echo $form->field($model, 'pekerjaan_saksi1') ?>

    <?php // echo $form->field($model, 'telepon_saksi1') ?>

    <?php // echo $form->field($model, 'nik_saksi2') ?>

    <?php // echo $form->field($model, 'no_kk_saksi2') ?>

    <?php // echo $form->field($model, 'nama_saksi2') ?>

    <?php // echo $form->field($model, 'tempat_lahir_saksi2') ?>

    <?php // echo $form->field($model, 'tanggal_lahir_saksi2') ?>

    <?php // echo $form->field($model, 'alamat_saksi2') ?>

    <?php // echo $form->field($model, 'kodepos_saksi2') ?>

    <?php // echo $form->field($model, 'pekerjaan_saksi2') ?>

    <?php // echo $form->field($model, 'telepon_saksi2') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
