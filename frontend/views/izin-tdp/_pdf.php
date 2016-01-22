<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Izin Tdp').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
        'i_1_pemilik_nama',
        'i_2_pemilik_tpt_lahir',
        'i_2_pemilik_tgl_lahir',
        'i_3_pemilik_alamat',
        'i_3_pemilik_propinsi',
        'i_3_pemilik_kabupaten',
        'i_3_pemilik_kecamatan',
        'i_3_pemilik_kelurahan',
        'i_4_pemilik_telepon',
        'i_5_pemilik_no_ktp',
        'i_6_pemilik_kewarganegaraan',
        'ii_1_perusahaan_nama',
        'ii_2_perusahaan_alamat',
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
        'iii_2_induk_alamat',
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
        'iv_a1_notaris_alamat',
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
        'viii_jenis_perusahaan',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpKantorcabang = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        'nama',
        'no_tdp',
        'alamat',
        'propinsi_id',
        'kabupaten_id',
        'kodepos',
        'no_telp',
        'status_prsh',
        'kbli_id',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpKantorcabang,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Kantorcabang').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpKantorcabang
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpKegiatan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        [
            'attribute' => 'kbli.id',
            'label' => Yii::t('app', 'Kbli'),
        ],
        'produk',
        'flag_utama',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpKegiatan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Kegiatan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpKegiatan
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpLegal = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        [
            'attribute' => 'jenis0.id',
            'label' => Yii::t('app', 'Jenis Izin'),
        ],
        'nomor',
        'dikeluarkan_oleh',
        'tanggal_dikeluarkan',
        'masa_laku',
        'masa_laku_satuan',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpLegal,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Legal').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpLegal
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpPimpinan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        [
            'attribute' => 'jabatan.id',
            'label' => Yii::t('app', 'Jabatan'),
        ],
        [
            'attribute' => 'kewarganegaraan.id',
            'label' => Yii::t('app', 'Negara'),
        ],
        [
            'attribute' => 'jabatanLain.id',
            'label' => Yii::t('app', 'Jabatan'),
        ],
        'nama_lengkap',
        'tmplahir',
        'tgllahir',
        'alamat_lengkap',
        'kodepos',
        'telepon',
        'mulai_jabat',
        'jml_lbr_saham',
        'jml_rp_modal',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpPimpinan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Pimpinan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpPimpinan
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpSaham = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        'nama_lengkap',
        'alamat',
        'kodepos',
        'no_telp',
        [
            'attribute' => 'kewarganegaraan0.id',
            'label' => Yii::t('app', 'Negara'),
        ],
        'npwp',
        'jumlah_saham',
        'jumlah_modal',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpSaham,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Saham').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpSaham
    ]);
?>
    </div>
</div>