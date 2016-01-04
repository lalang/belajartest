<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdg */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdg-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Tdg'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => 'Perizinan',
        ],
        [
            'attribute' => 'izin.id',
            'label' => 'Izin',
        ],
        [
            'attribute' => 'status.id',
            'label' => 'Status',
        ],
        'tipe',
        'pemilik_nik',
        'pemilik_pengenal',
        'pemilik_nama',
        'pemilik_alamat:ntext',
        'pemilik_rt',
        'pemilik_rw',
        'pemilik_propinsi',
        'pemilik_kabupaten',
        'pemilik_kecamatan',
        'pemilik_kelurahan',
        'pemilik_kodepos',
        'pemilik_telepon',
        'pemilik_fax',
        'pemilik_email:email',
        'perusahaan_npwp',
        'perusahaan_nama',
        'perusahaan_namagedung',
        'perusahaan_blok_lantai',
        'perusahaan_namajalan:ntext',
        'perusahaan_propinsi',
        'perusahaan_kabupaten',
        'perusahaan_kecamatan',
        'perusahaan_kelurahan',
        'perusahaan_kodepos',
        'perusahaan_fax',
        'perusahaan_email:email',
        'gudang_koordinat_1',
        'gudang_koordinat_2',
        'gudang_blok_lantai',
        'gudang_namajalan:ntext',
        'gudang_propinsi',
        'gudang_kabupaten',
        'gudang_kecamatan',
        'gudang_kelurahan',
        'gudang_kodepos',
        'gudang_telepon',
        'gudang_fax',
        'gudang_email:email',
        'gudang_luas',
        'gudang_kapasitas',
        'gudang_kapasitas_satuan',
        'gudang_nilai',
        'gudang_komposisi_nasional',
        'gudang_komposisi_asing',
        'gudang_kelengkapan',
        'gudang_sarana_listrik',
        'gudang_sarana_air',
        'gudang_sarana_pendingin',
        'gudang_sarana_forklif',
        'gudang_sarana_komputer',
        'gudang_kepemilikan',
        'gudang_imb_nomor',
        'gudang_imb_tanggal',
        'gudang_uug_nomor',
        'gudang_uug_tanggal',
        'gudang_uug_berlaku',
        'gudang_isi:ntext',
        'hs_koordinat_1',
        'hs_koordinat_2',
        'hs_namagedung',
        'hs_blok_lantai',
        'hs_namajalan:ntext',
        'hs_propinsi',
        'hs_kabupaten',
        'hs_kecamatan',
        'hs_kelurahan',
        'hs_kodepos',
        'hs_telepon',
        'hs_fax',
        'hs_email:email',
        'hs_luas',
        'hs_kapasitas',
        'hs_kapasitas_satuan',
        'hs_nilai',
        'hs_komposisi_nasional',
        'hs_komposisi_asing',
        'hs_kelengkapan',
        'hs_sarana_listrik',
        'hs_sarana_air',
        'hs_sarana_pendingin',
        'hs_sarana_forklif',
        'hs_sarana_komputer',
        'hs_kepemilikan',
        'hs_imb_nomor',
        'hs_imb_tanggal',
        'hs_uug_nomor',
        'hs_uug_tanggal',
        'hs_isi:ntext',
        'bapl_file',
        'catatan_tambahan:ntext',
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
</div>