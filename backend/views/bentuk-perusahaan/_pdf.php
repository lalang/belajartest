<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\BentukPerusahaan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bentuk Perusahaan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bentuk-perusahaan-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Bentuk Perusahaan').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        'urutan',
        'type',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdp = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'bentukPerusahaan.id',
            'label' => Yii::t('app', 'Bentuk Perusahaan'),
        ],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        [
            'attribute' => 'user.id',
            'label' => Yii::t('app', 'User'),
        ],
        [
            'attribute' => 'status.id',
            'label' => Yii::t('app', 'Status'),
        ],
        [
            'attribute' => 'lokasi.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'perpanjangan_ke',
        'no_pembukuan',
        'i_1_pemilik_nama',
        'i_2_pemilik_tpt_lahir',
        'i_2_pemilik_tgl_lahir',
        'i_3_pemilik_alamat:ntext',
        'i_3_pemilik_propinsi',
        'i_3_pemilik_kabupaten',
        'i_3_pemilik_kecamatan',
        'i_3_pemilik_kelurahan',
        'i_4_pemilik_telepon',
        'i_5_pemilik_no_ktp',
        'i_6_pemilik_kewarganegaraan',
        'ii_1_perusahaan_nama',
        'ii_2_perusahaan_alamat:ntext',
        'ii_2_perusahaan_propinsi',
        'ii_2_perusahaan_kabupaten',
        'ii_2_perusahaan_kecamatan',
        'ii_2_perusahaan_kelurahan',
        'ii_2_perusahaan_kodepos',
        'ii_2_perusahaan_no_telp',
        'ii_2_perusahaan_no_fax',
        'ii_2_perusahaan_email:email',
        'iii_1_nama_kelompok',
        'iii_2_status_prsh',
        'iii_2_induk_nama_prsh',
        'iii_2_induk_nomor_tdp',
        'iii_2_induk_alamat:ntext',
        'iii_2_induk_propinsi',
        'iii_2_induk_kabupaten',
        'iii_2_induk_kecamatan',
        'iii_2_induk_kelurahan',
        'iii_3_lokasi_unit_produksi',
        'iii_3_lokasi_unit_produksi_propinsi',
        'iii_3_lokasi_unit_produksi_kabupaten',
        'iii_4_bank_utama_1',
        'iii_4_bank_utama_2',
        'iii_4_jumlah_bank',
        'iii_5_npwp',
        'no_sk_siup',
        [
            'attribute' => 'iii6StatusPerusahaan.id',
            'label' => Yii::t('app', 'Status Perusahaan'),
        ],
        'iii_7a_tgl_pendirian',
        'iii_7b_tgl_mulai_kegiatan',
        'iii_8_bentuk_kerjasama_pihak3',
        'iii_9a_merek_dagang_nama',
        'iii_9a_merek_dagang_nomor',
        'iii_9b_hak_paten_nama',
        'iii_9b_hak_paten_nomor',
        'iii_9c_hak_cipta_nama',
        'iii_9c_hak_cipta_nomor',
        'iv_a1_nomor',
        'iv_a1_tanggal',
        'iv_a1_notaris_nama',
        'iv_a1_notaris_alamat:ntext',
        'iv_a1_telpon',
        'iv_a2_nomor',
        'iv_a2_tanggal',
        'iv_a2_notaris',
        'iv_a3_nomor',
        'iv_a3_tanggal',
        'iv_a4_nomor',
        'iv_a4_tanggal',
        'iv_a5_nomor',
        'iv_a5_tanggal',
        'iv_a6_nomor',
        'iv_a6_tanggal',
        'v_jumlah_dirut',
        'v_jumlah_direktur',
        'v_jumlah_komisaris',
        'v_jumlah_pengurus',
        'v_jumlah_pengawas',
        'v_jumlah_sekutu_aktif',
        'v_jumlah_sekutu_pasif',
        'v_jumlah_sekutu_aktif_baru',
        'v_jumlah_sekutu_pasif_baru',
        'vi_jumlah_pemegang_saham',
        [
            'attribute' => 'viAKegiatanUtama.id',
            'label' => Yii::t('app', 'Kbli'),
        ],
        'vi_a_produk_utama',
        'vi_c_modal_1a',
        'vi_c_modal_1b',
        'vi_c_modal_1c',
        'vi_c_modal_1d',
        'vi_c_modal_2a',
        'vi_c_modal_2b',
        'vi_c_modal_2c',
        'vi_c_modal_2d',
        'vii_b_omset',
        'vii_b_terbilang',
        'vii_c1_dasar',
        'vii_c2_ditempatkan',
        'vii_c3_disetor',
        'vii_c4_saham',
        'vii_c5_nominal',
        'vii_c6_aktif',
        'vii_c7_pasif',
        'vii_d_totalaset',
        'vii_e_wni',
        'vii_e_wna',
        'vii_f_matarantai',
        'vii_fa_jumlah',
        [
            'attribute' => 'viiFaSatuan.id',
            'label' => Yii::t('app', 'Satuan'),
        ],
        'vii_fb_jumlah',
        'vii_fb_satuan',
        'vii_fc_lokal',
        'vii_fc_impor',
        'vii_f_pengecer',
        'vii_1_koperasi_bentuk',
        'vii_2_koperasi_jenis',
        'vii_3_koperasi_anggota',
        'viii_jenis_perusahaan',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdp,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdp
    ]);
?>
    </div>
</div>