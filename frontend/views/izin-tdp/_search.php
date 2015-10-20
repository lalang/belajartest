<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinTdpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-tdp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'siup_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'tdp_jenis_daftar') ?>

    <?= $form->field($model, 'tdp_pembaruan_ke') ?>

    <?php // echo $form->field($model, 'tdp_nama_kelompok') ?>

    <?php // echo $form->field($model, 'tdp_status_perusahaan') ?>

    <?php // echo $form->field($model, 'tdp_id_perusahaan_induk') ?>

    <?php // echo $form->field($model, 'tdr_perusahaan_induk_no_tdp') ?>

    <?php // echo $form->field($model, 'tdp_id_lokasi_produk_unit') ?>

    <?php // echo $form->field($model, 'tdp_tanggal_mulai') ?>

    <?php // echo $form->field($model, 'tdp_jangka_waktu_berdiri') ?>

    <?php // echo $form->field($model, 'tdp_bentuk_kerja_sama') ?>

    <?php // echo $form->field($model, 'tdp_merek_dagang') ?>

    <?php // echo $form->field($model, 'tdp_merek_dagang_no') ?>

    <?php // echo $form->field($model, 'tdp_hak_paten') ?>

    <?php // echo $form->field($model, 'tdp_hak_paten_no') ?>

    <?php // echo $form->field($model, 'tdp_hak_cipta') ?>

    <?php // echo $form->field($model, 'tdp_hak_cipta_no') ?>

    <?php // echo $form->field($model, 'izin_tdp_jum_dirut') ?>

    <?php // echo $form->field($model, 'izin_tdp_jum_direktur') ?>

    <?php // echo $form->field($model, 'izin_tdp_komisaris') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_pendirian_no') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_pendirian_nama_notaris') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_pendirian_alamat') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_pendirian_tlpn') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_pendirian_tgl') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_perubahan_no') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_perubahan_nama_notaris') ?>

    <?php // echo $form->field($model, 'izin_tdp_akta_perubahan_tgl') ?>

    <?php // echo $form->field($model, 'izin_tdp_pengesahan_menkuham_no') ?>

    <?php // echo $form->field($model, 'izin_tdp_pengesahan_menkuham_tgl') ?>

    <?php // echo $form->field($model, 'izin_tdp_persetujuan_menkuham_no') ?>

    <?php // echo $form->field($model, 'izin_tdp_persetujuan_menkuham_tgl') ?>

    <?php // echo $form->field($model, 'izin_tdp_perubahan_anggaran_no') ?>

    <?php // echo $form->field($model, 'izin_tdp_perubahan_anggaran_tgl') ?>

    <?php // echo $form->field($model, 'izin_tdp_perubahan_direksi_no') ?>

    <?php // echo $form->field($model, 'izin_tdp_perubahan_direksi_tgl') ?>

    <?php // echo $form->field($model, 'izin_tdp_jum_pemegang_saham') ?>

    <?php // echo $form->field($model, 'izin_tdp_komoditi_pokok') ?>

    <?php // echo $form->field($model, 'izin_tdp_komoditi_lainsatu') ?>

    <?php // echo $form->field($model, 'izin_tdp_komoditi_laindua') ?>

    <?php // echo $form->field($model, 'izin_tdp_omset_pertahun_int') ?>

    <?php // echo $form->field($model, 'izin_tdp_omset_pertahun_string') ?>

    <?php // echo $form->field($model, 'izin_tdp_jum_karyawan_wni') ?>

    <?php // echo $form->field($model, 'izin_tdp_jum_karyawan_wna') ?>

    <?php // echo $form->field($model, 'izin_tdp_bidang_usaha') ?>

    <?php // echo $form->field($model, 'izin_tdp_kapasitas_mesin_terpasang') ?>

    <?php // echo $form->field($model, 'izin_tdp_kapasitas_mesin_terpasang_satuan') ?>

    <?php // echo $form->field($model, 'izin_tdp_kapasitas_mesin_produksi') ?>

    <?php // echo $form->field($model, 'izin_tdp_kapasitas_mesin_produksi_satuan') ?>

    <?php // echo $form->field($model, 'izin_tdp_komponen_mesin_lokal') ?>

    <?php // echo $form->field($model, 'izin_tdp_komponen_mesin_impor') ?>

    <?php // echo $form->field($model, 'izin_tdp_jenis_usaha') ?>

    <?php // echo $form->field($model, 'izin_tdp_jenis_perusahaan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
