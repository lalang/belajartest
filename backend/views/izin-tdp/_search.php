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

    <?php // echo $form->field($model, 'lokasi_id') ?>

    <?php // echo $form->field($model, 'perpanjangan_ke') ?>

    <?php // echo $form->field($model, 'i_1_pemilik_nama') ?>

    <?php // echo $form->field($model, 'i_2_pemilik_tpt_lahir') ?>

    <?php // echo $form->field($model, 'i_2_pemilik_tgl_lahir') ?>

    <?php // echo $form->field($model, 'i_3_pemilik_alamat') ?>

    <?php // echo $form->field($model, 'i_3_pemilik_propinsi') ?>

    <?php // echo $form->field($model, 'i_3_pemilik_kabupaten') ?>

    <?php // echo $form->field($model, 'i_3_pemilik_kecamatan') ?>

    <?php // echo $form->field($model, 'i_3_pemilik_kelurahan') ?>

    <?php // echo $form->field($model, 'i_4_pemilik_telepon') ?>

    <?php // echo $form->field($model, 'i_5_pemilik_no_ktp') ?>

    <?php // echo $form->field($model, 'i_6_pemilik_kewarganegaraan') ?>

    <?php // echo $form->field($model, 'ii_1_perusahaan_nama') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_alamat') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_propinsi') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_kabupaten') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_kecamatan') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_kelurahan') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_kodepos') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_no_telp') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_no_fax') ?>

    <?php // echo $form->field($model, 'ii_2_perusahaan_email') ?>

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

    <?php // echo $form->field($model, 'iii_5_npwp') ?>

    <?php // echo $form->field($model, 'iii_6_status_perusahaan_id') ?>

    <?php // echo $form->field($model, 'iii_7a_tgl_pendirian') ?>

    <?php // echo $form->field($model, 'iii_7b_tgl_mulai_kegiatan') ?>

    <?php // echo $form->field($model, 'iii_8_bentuk_kerjasama_pihak3') ?>

    <?php // echo $form->field($model, 'iii_9a_merek_dagang_nama') ?>

    <?php // echo $form->field($model, 'iii_9a_merek_dagang_nomor') ?>

    <?php // echo $form->field($model, 'iii_9b_hak_paten_nama') ?>

    <?php // echo $form->field($model, 'iii_9b_hak_paten_nomor') ?>

    <?php // echo $form->field($model, 'iii_9c_hak_cipta_nama') ?>

    <?php // echo $form->field($model, 'iii_9c_hak_cipta_nomor') ?>

    <?php // echo $form->field($model, 'iv_a1_nomor') ?>

    <?php // echo $form->field($model, 'iv_a1_tanggal') ?>

    <?php // echo $form->field($model, 'iv_a1_notaris_nama') ?>

    <?php // echo $form->field($model, 'iv_a1_notaris_alamat') ?>

    <?php // echo $form->field($model, 'iv_a1_telpon') ?>

    <?php // echo $form->field($model, 'iv_a2_nomor') ?>

    <?php // echo $form->field($model, 'iv_a2_tanggal') ?>

    <?php // echo $form->field($model, 'iv_a2_notaris') ?>

    <?php // echo $form->field($model, 'iv_a3_nomor') ?>

    <?php // echo $form->field($model, 'iv_a3_tanggal') ?>

    <?php // echo $form->field($model, 'iv_a4_nomor') ?>

    <?php // echo $form->field($model, 'iv_a4_tanggal') ?>

    <?php // echo $form->field($model, 'iv_a5_nomor') ?>

    <?php // echo $form->field($model, 'iv_a5_tanggal') ?>

    <?php // echo $form->field($model, 'iv_a6_nomor') ?>

    <?php // echo $form->field($model, 'iv_a6_tanggal') ?>

    <?php // echo $form->field($model, 'v_jumlah_dirut') ?>

    <?php // echo $form->field($model, 'v_jumlah_direktur') ?>

    <?php // echo $form->field($model, 'v_jumlah_komisaris') ?>

    <?php // echo $form->field($model, 'v_jumlah_pengurus') ?>

    <?php // echo $form->field($model, 'v_jumlah_pengawas') ?>

    <?php // echo $form->field($model, 'v_jumlah_sekutu_aktif') ?>

    <?php // echo $form->field($model, 'v_jumlah_sekutu_pasif') ?>

    <?php // echo $form->field($model, 'v_jumlah_sekutu_aktif_baru') ?>

    <?php // echo $form->field($model, 'v_jumlah_sekutu_pasif_baru') ?>

    <?php // echo $form->field($model, 'vi_jumlah_pemegang_saham') ?>

    <?php // echo $form->field($model, 'vii_b_omset') ?>

    <?php // echo $form->field($model, 'vii_b_terbilang') ?>

    <?php // echo $form->field($model, 'vii_c1_dasar') ?>

    <?php // echo $form->field($model, 'vii_c2_ditempatkan') ?>

    <?php // echo $form->field($model, 'vii_c3_disetor') ?>

    <?php // echo $form->field($model, 'vii_c4_saham') ?>

    <?php // echo $form->field($model, 'vii_c5_nominal') ?>

    <?php // echo $form->field($model, 'vii_c6_aktif') ?>

    <?php // echo $form->field($model, 'vii_c7_pasif') ?>

    <?php // echo $form->field($model, 'vii_d_totalaset') ?>

    <?php // echo $form->field($model, 'vii_e_wni') ?>

    <?php // echo $form->field($model, 'vii_e_wna') ?>

    <?php // echo $form->field($model, 'vii_f_matarantai') ?>

    <?php // echo $form->field($model, 'vii_fa_jumlah') ?>

    <?php // echo $form->field($model, 'vii_fa_satuan') ?>

    <?php // echo $form->field($model, 'vii_fb_jumlah') ?>

    <?php // echo $form->field($model, 'vii_fb_satuan') ?>

    <?php // echo $form->field($model, 'vii_fc_lokal') ?>

    <?php // echo $form->field($model, 'vii_fc_impor') ?>

    <?php // echo $form->field($model, 'vii_f_pengecer') ?>

    <?php // echo $form->field($model, 'viii_jenis_perusahaan') ?>

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
