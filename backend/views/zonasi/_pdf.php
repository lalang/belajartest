<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Zonasi */

$this->title = $model->zonasi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zonasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zonasi-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Zonasi').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'kode',
        'zonasi',
        'rdtr',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPerizinan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'kode_registrasi',
        [
            'attribute' => 'perizinans.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'pemohon.id',
            'label' => Yii::t('app', 'User'),
        ],
        'referrer_id',
        'id_groupizin',
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        'status_izin',
        'jumlah_tahap',
        'no_urut',
        'tanggal_mohon',
        'no_izin',
        'berkas_noizin',
        'tanggal_izin',
        'tanggal_expired',
        'status',
        'aktif',
        'registrasi_urutan',
        'nomor_sp_rt_rw',
        'tanggal_sp_rt_rw',
        'peruntukan',
        'nama_perusahaan',
        'tanggal_cek_lapangan',
        'petugas_cek',
        [
            'attribute' => 'petugasDaftar.id',
            'label' => Yii::t('app', 'User'),
        ],
        [
            'attribute' => 'lokasiIzin.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        [
            'attribute' => 'lokasiPengambilan.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'keterangan:ntext',
        'qr_code',
        'tanggal_pertemuan',
        'status_daftar',
        'pengambilan_tanggal',
        'pengambilan_sesi',
        'pengambil_nik',
        'pengambil_nama',
        'pengambil_telepon',
        [
            'attribute' => 'zonasi.zonasi',
            'label' => Yii::t('app', 'Zonasi'),
        ],
        'zonasi_sesuai',
        'alamat_valid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinan
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPerizinanProses = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'sop.id',
            'label' => Yii::t('app', 'Sop'),
        ],
        'urutan',
        'nama_sop',
        'deskripsi_sop:ntext',
        'action:ntext',
        [
            'attribute' => 'pelaksana.id',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        'dokumen:ntext',
        'status',
        'keterangan:ntext',
        [
            'attribute' => 'zonasi.zonasi',
            'label' => Yii::t('app', 'Zonasi'),
        ],
        'zonasi_sesuai',
        'pengambil_nik',
        'pengambil_nama',
        'pengambil_telepon',
        'alamat_valid',
        'tanggal_proses',
        'mulai',
        'selesai',
        'active',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinanProses,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan Proses').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinanProses
    ]);
?>
    </div>
</div>