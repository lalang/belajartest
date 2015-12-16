<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bentuk_perusahaan') ?>

    <?= $form->field($model, 'perizinan_id') ?>

    <?= $form->field($model, 'izin_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'perpanjangan_ke') ?>

    <?php // echo $form->field($model, 'iii_1_nama_kelompok') ?>

    <?php // echo $form->field($model, 'iii_2_status_prsh') ?>

    <?php // echo $form->field($model, 'iii_2_induk_nama_prsh') ?>

    <?php // echo $form->field($model, 'iii_2_induk_nomor_tdp') ?>

    <?php // echo $form->field($model, 'iii_2_induk_alamat') ?>

    <?php // echo $form->field($model, 'iii_2_induk_propinsi') ?>

    <?php // echo $form->field($model, 'iii_2_induk_kabupaten') ?>

    <?php // echo $form->field($model, 'iii_2_induk_kecamatan') ?>

    <?php // echo $form->field($model, 'iii_2_induk_kelurahan') ?>

    <?php // echo $form->field($model, 'iii_3_lokasi_unit_produksi') ?>

    <?php // echo $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi') ?>

    <?php // echo $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten') ?>

    <?php // echo $form->field($model, 'iii_4_bank_utama_1') ?>

    <?php // echo $form->field($model, 'iii_4_bank_utama_2') ?>

    <?php // echo $form->field($model, 'iii_4_jumlah_bank') ?>

    <?php // echo $form->field($model, 'iii_7b_tgl_mulai_kegiatan') ?>

    <?php // echo $form->field($model, 'iii_8_bentuk_kerjasama_pihak3') ?>

    <?php // echo $form->field($model, 'iii_9a_merek_dagang_nama') ?>

    <?php // echo $form->field($model, 'iii_9a_merek_dagang_nomor') ?>

    <?php // echo $form->field($model, 'iii_9b_hak_paten_nama') ?>

    <?php // echo $form->field($model, 'iii_9b_hak_paten_nomor') ?>

    <?php // echo $form->field($model, 'iii_9c_hak_cipta_nama') ?>

    <?php // echo $form->field($model, 'iii_9c_hak_cipta_nomor') ?>

    <?php // echo $form->field($model, 'iv_a1_notaris_nama') ?>

    <?php // echo $form->field($model, 'iv_a1_notaris_alamat') ?>

    <?php // echo $form->field($model, 'iv_a1_telpon') ?>

    <?php // echo $form->field($model, 'iv_a2_notaris') ?>

    <?php // echo $form->field($model, 'iv_a4_nomor') ?>

    <?php // echo $form->field($model, 'iv_a4_tanggal') ?>

    <?php // echo $form->field($model, 'iv_a5_nomor') ?>

    <?php // echo $form->field($model, 'iv_a5_tanggal') ?>

    <?php // echo $form->field($model, 'iv_a6_nomor') ?>

    <?php // echo $form->field($model, 'iv_a6_tanggal') ?>

    <?php // echo $form->field($model, 'v_jumlah_dirut') ?>

    <?php // echo $form->field($model, 'v_jumlah_direktur') ?>

    <?php // echo $form->field($model, 'v_jumlah_komisaris') ?>

    <?php // echo $form->field($model, 'vi_jumlah_pemegang_saham') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
