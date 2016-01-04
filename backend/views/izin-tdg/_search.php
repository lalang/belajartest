<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'perizinan_id') ?>

    <?= $form->field($model, 'izin_id') ?>

    <?= $form->field($model, 'status_id') ?>

    <?= $form->field($model, 'tipe') ?>

    <?php // echo $form->field($model, 'pemilik_nik') ?>

    <?php // echo $form->field($model, 'pemilik_pengenal') ?>

    <?php // echo $form->field($model, 'pemilik_nama') ?>

    <?php // echo $form->field($model, 'pemilik_alamat') ?>

    <?php // echo $form->field($model, 'pemilik_rt') ?>

    <?php // echo $form->field($model, 'pemilik_rw') ?>

    <?php // echo $form->field($model, 'pemilik_propinsi') ?>

    <?php // echo $form->field($model, 'pemilik_kabupaten') ?>

    <?php // echo $form->field($model, 'pemilik_kecamatan') ?>

    <?php // echo $form->field($model, 'pemilik_kelurahan') ?>

    <?php // echo $form->field($model, 'pemilik_kodepos') ?>

    <?php // echo $form->field($model, 'pemilik_telepon') ?>

    <?php // echo $form->field($model, 'pemilik_fax') ?>

    <?php // echo $form->field($model, 'pemilik_email') ?>

    <?php // echo $form->field($model, 'perusahaan_npwp') ?>

    <?php // echo $form->field($model, 'perusahaan_nama') ?>

    <?php // echo $form->field($model, 'perusahaan_namagedung') ?>

    <?php // echo $form->field($model, 'perusahaan_blok_lantai') ?>

    <?php // echo $form->field($model, 'perusahaan_namajalan') ?>

    <?php // echo $form->field($model, 'perusahaan_propinsi') ?>

    <?php // echo $form->field($model, 'perusahaan_kabupaten') ?>

    <?php // echo $form->field($model, 'perusahaan_kecamatan') ?>

    <?php // echo $form->field($model, 'perusahaan_kelurahan') ?>

    <?php // echo $form->field($model, 'perusahaan_kodepos') ?>

    <?php // echo $form->field($model, 'perusahaan_fax') ?>

    <?php // echo $form->field($model, 'perusahaan_email') ?>

    <?php // echo $form->field($model, 'gudang_koordinat_1') ?>

    <?php // echo $form->field($model, 'gudang_koordinat_2') ?>

    <?php // echo $form->field($model, 'gudang_blok_lantai') ?>

    <?php // echo $form->field($model, 'gudang_namajalan') ?>

    <?php // echo $form->field($model, 'gudang_propinsi') ?>

    <?php // echo $form->field($model, 'gudang_kabupaten') ?>

    <?php // echo $form->field($model, 'gudang_kecamatan') ?>

    <?php // echo $form->field($model, 'gudang_kelurahan') ?>

    <?php // echo $form->field($model, 'gudang_kodepos') ?>

    <?php // echo $form->field($model, 'gudang_telepon') ?>

    <?php // echo $form->field($model, 'gudang_fax') ?>

    <?php // echo $form->field($model, 'gudang_email') ?>

    <?php // echo $form->field($model, 'gudang_luas') ?>

    <?php // echo $form->field($model, 'gudang_kapasitas') ?>

    <?php // echo $form->field($model, 'gudang_kapasitas_satuan') ?>

    <?php // echo $form->field($model, 'gudang_nilai') ?>

    <?php // echo $form->field($model, 'gudang_komposisi_nasional') ?>

    <?php // echo $form->field($model, 'gudang_komposisi_asing') ?>

    <?php // echo $form->field($model, 'gudang_kelengkapan') ?>

    <?php // echo $form->field($model, 'gudang_sarana_listrik') ?>

    <?php // echo $form->field($model, 'gudang_sarana_air') ?>

    <?php // echo $form->field($model, 'gudang_sarana_pendingin') ?>

    <?php // echo $form->field($model, 'gudang_sarana_forklif') ?>

    <?php // echo $form->field($model, 'gudang_sarana_komputer') ?>

    <?php // echo $form->field($model, 'gudang_kepemilikan') ?>

    <?php // echo $form->field($model, 'gudang_imb_nomor') ?>

    <?php // echo $form->field($model, 'gudang_imb_tanggal') ?>

    <?php // echo $form->field($model, 'gudang_uug_nomor') ?>

    <?php // echo $form->field($model, 'gudang_uug_tanggal') ?>

    <?php // echo $form->field($model, 'gudang_uug_berlaku') ?>

    <?php // echo $form->field($model, 'gudang_isi') ?>

    <?php // echo $form->field($model, 'hs_koordinat_1') ?>

    <?php // echo $form->field($model, 'hs_koordinat_2') ?>

    <?php // echo $form->field($model, 'hs_namagedung') ?>

    <?php // echo $form->field($model, 'hs_blok_lantai') ?>

    <?php // echo $form->field($model, 'hs_namajalan') ?>

    <?php // echo $form->field($model, 'hs_propinsi') ?>

    <?php // echo $form->field($model, 'hs_kabupaten') ?>

    <?php // echo $form->field($model, 'hs_kecamatan') ?>

    <?php // echo $form->field($model, 'hs_kelurahan') ?>

    <?php // echo $form->field($model, 'hs_kodepos') ?>

    <?php // echo $form->field($model, 'hs_telepon') ?>

    <?php // echo $form->field($model, 'hs_fax') ?>

    <?php // echo $form->field($model, 'hs_email') ?>

    <?php // echo $form->field($model, 'hs_luas') ?>

    <?php // echo $form->field($model, 'hs_kapasitas') ?>

    <?php // echo $form->field($model, 'hs_kapasitas_satuan') ?>

    <?php // echo $form->field($model, 'hs_nilai') ?>

    <?php // echo $form->field($model, 'hs_komposisi_nasional') ?>

    <?php // echo $form->field($model, 'hs_komposisi_asing') ?>

    <?php // echo $form->field($model, 'hs_kelengkapan') ?>

    <?php // echo $form->field($model, 'hs_sarana_listrik') ?>

    <?php // echo $form->field($model, 'hs_sarana_air') ?>

    <?php // echo $form->field($model, 'hs_sarana_pendingin') ?>

    <?php // echo $form->field($model, 'hs_sarana_forklif') ?>

    <?php // echo $form->field($model, 'hs_sarana_komputer') ?>

    <?php // echo $form->field($model, 'hs_kepemilikan') ?>

    <?php // echo $form->field($model, 'hs_imb_nomor') ?>

    <?php // echo $form->field($model, 'hs_imb_tanggal') ?>

    <?php // echo $form->field($model, 'hs_uug_nomor') ?>

    <?php // echo $form->field($model, 'hs_uug_tanggal') ?>

    <?php // echo $form->field($model, 'hs_isi') ?>

    <?php // echo $form->field($model, 'bapl_file') ?>

    <?php // echo $form->field($model, 'catatan_tambahan') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
