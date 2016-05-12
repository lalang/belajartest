<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPenelitianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-penelitian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'perizinan_id') ?>

    <?= $form->field($model, 'izin_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'lokasi_id') ?>

    <?php // echo $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'alamat_pemohon') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'kelurahan_pemohon') ?>

    <?php // echo $form->field($model, 'kecamatan_pemohon') ?>

    <?php // echo $form->field($model, 'kabupaten_pemohon') ?>

    <?php // echo $form->field($model, 'provinsi_pemohon') ?>

    <?php // echo $form->field($model, 'telepon_pemohon') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'pekerjaan_pemohon') ?>

    <?php // echo $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'nama_instansi') ?>

    <?php // echo $form->field($model, 'fakultas') ?>

    <?php // echo $form->field($model, 'alamat_instansi') ?>

    <?php // echo $form->field($model, 'kelurahan_instansi') ?>

    <?php // echo $form->field($model, 'kecamatan_instansi') ?>

    <?php // echo $form->field($model, 'kabupaten_instansi') ?>

    <?php // echo $form->field($model, 'provinsi_instansi') ?>

    <?php // echo $form->field($model, 'email_instansi') ?>

    <?php // echo $form->field($model, 'kodepos_instansi') ?>

    <?php // echo $form->field($model, 'telepon_instansi') ?>

    <?php // echo $form->field($model, 'fax_instansi') ?>

    <?php // echo $form->field($model, 'tema') ?>

    <?php // echo $form->field($model, 'kab_penelitian') ?>

    <?php // echo $form->field($model, 'kec_penelitian') ?>

    <?php // echo $form->field($model, 'kel_penelitian') ?>

    <?php // echo $form->field($model, 'instansi_penelitian') ?>

    <?php // echo $form->field($model, 'alamat_penelitian') ?>

    <?php // echo $form->field($model, 'bidang_penelitian') ?>

    <?php // echo $form->field($model, 'tgl_mulai_penelitian') ?>

    <?php // echo $form->field($model, 'tgl_akhir_penelitian') ?>

    <?php // echo $form->field($model, 'anggota') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
