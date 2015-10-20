<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinTdp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Tdp'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'siup.id',
            'label' => 'Izin Siup',
        ],
        [
            'attribute' => 'user.id',
            'label' => 'User',
        ],
        'tdp_jenis_daftar',
        'tdp_pembaruan_ke',
        'tdp_nama_kelompok',
        'tdp_status_perusahaan',
        'tdp_id_perusahaan_induk',
        'tdr_perusahaan_induk_no_tdp',
        'tdp_id_lokasi_produk_unit',
        'tdp_tanggal_mulai',
        'tdp_jangka_waktu_berdiri',
        'tdp_bentuk_kerja_sama',
        'tdp_merek_dagang',
        'tdp_merek_dagang_no',
        'tdp_hak_paten',
        'tdp_hak_paten_no',
        'tdp_hak_cipta',
        'tdp_hak_cipta_no',
        'izin_tdp_jum_dirut',
        'izin_tdp_jum_direktur',
        'izin_tdp_komisaris',
        'izin_tdp_akta_pendirian_no',
        'izin_tdp_akta_pendirian_nama_notaris',
        'izin_tdp_akta_pendirian_alamat:ntext',
        'izin_tdp_akta_pendirian_tlpn',
        'izin_tdp_akta_pendirian_tgl',
        'izin_tdp_akta_perubahan_no',
        'izin_tdp_akta_perubahan_nama_notaris',
        'izin_tdp_akta_perubahan_tgl',
        'izin_tdp_pengesahan_menkuham_no',
        'izin_tdp_pengesahan_menkuham_tgl',
        'izin_tdp_persetujuan_menkuham_no',
        'izin_tdp_persetujuan_menkuham_tgl',
        'izin_tdp_perubahan_anggaran_no',
        'izin_tdp_perubahan_anggaran_tgl',
        'izin_tdp_perubahan_direksi_no',
        'izin_tdp_perubahan_direksi_tgl',
        'izin_tdp_jum_pemegang_saham',
        'izin_tdp_komoditi_pokok',
        'izin_tdp_komoditi_lainsatu',
        'izin_tdp_komoditi_laindua',
        'izin_tdp_omset_pertahun_int',
        'izin_tdp_omset_pertahun_string',
        'izin_tdp_jum_karyawan_wni',
        'izin_tdp_jum_karyawan_wna',
        'izin_tdp_bidang_usaha',
        'izin_tdp_kapasitas_mesin_terpasang',
        'izin_tdp_kapasitas_mesin_terpasang_satuan',
        'izin_tdp_kapasitas_mesin_produksi',
        'izin_tdp_kapasitas_mesin_produksi_satuan',
        'izin_tdp_komponen_mesin_lokal',
        'izin_tdp_komponen_mesin_impor',
        'izin_tdp_jenis_usaha',
        'izin_tdp_jenis_perusahaan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpKantor = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => 'Izin Tdp',
        ],
        'izin_tdp_kantor_nama',
        'izin_tdp_kantor_notdp',
        'izin_tdp_kantor_alamat:ntext',
        'izin_tdp_kantor_kota',
        'izin_tdp_kantor_propinsi',
        'izin_tdp_kantor_kodepos',
        'izin_tdp_kantor_tlpn',
        'izin_tdp_kantor_status',
        [
            'attribute' => 'izinTdpKantorKegiatan.id',
            'label' => 'Kbli',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpKantor,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Izin Tdp Kantor'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpKantor
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpKegiatan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'kbli.id',
            'label' => 'Kbli',
        ],
        [
            'attribute' => 'izinTdp.id',
            'label' => 'Izin Tdp',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpKegiatan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Izin Tdp Kegiatan'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpKegiatan
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpLeglain = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => 'Izin Tdp',
        ],
        'izin_tdp_leglain_nama_petugas',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpLeglain,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Izin Tdp Leglain'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpLeglain
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpPemegang = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => 'Izin Tdp',
        ],
        'izin_tdp_pemegang_nama',
        'izin_tdp_pemegang_alamat:ntext',
        'izin_tdp_pemegang_kodepos',
        'izin_tdp_pemegang_tlpn',
        'izin_tdp_pemegang_kewarganegaraan',
        'izin_tdp_pemegang_npwp',
        'izin_tdp_pemegang_jum_saham',
        'izin_tdp_pemegang_jum_modal',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpPemegang,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Izin Tdp Pemegang'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpPemegang
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
            'label' => 'Izin Tdp',
        ],
        'izin_tdp_pimpinan_kedudukan',
        'izin_tdp_pimpinan_nama',
        'izin_tdp_pimpinan',
        'izin_tdp_pimpinan_tmpt_lahir',
        'izin_tdp_pimpinan_tgl_lahir',
        'izin_tdp_pimpinan_alamat:ntext',
        'izin_tdp_pimpinan_kodepos',
        'izin_tdp_pimpinan_tlpn',
        'izin_tdp_pimpinan_kewarganegara',
        'izin_tdp_pimpinan_tgl_mulai',
        'izin_tdp_pimpinan_jum_saham',
        'izin_tdp_pimpinan_jum_modal',
        'izin_tdp_pimpinan_kedudukan_lain',
        'izin_tdp_pimpinan_nama_perusahaan',
        'izin_tdp_pimpinan_alamat_perusahaan:ntext',
        'izin_tdp_pimpinan_kodepos_perusahaan',
        'izin_tdp_pimpinan_tlpn_perusahaan',
        'izin_tdp_pimpinan_tgl_mulai_perusahaan',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpPimpinan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Izin Tdp Pimpinan'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpPimpinan
    ]);
?>
    </div>
</div>