<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPenelitian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Penelitian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-penelitian-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Penelitian'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'user.id',
            'label' => 'User',
        ],
        [
            'attribute' => 'status.id',
            'label' => 'Status',
        ],
        [
            'attribute' => 'lokasi.id',
            'label' => 'Lokasi',
        ],
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_pemohon',
        'rt',
        'rw',
        'kelurahan_pemohon',
        'kecamatan_pemohon',
        'kabupaten_pemohon',
        'provinsi_pemohon',
        'telepon_pemohon',
        'email:email',
        'kode_pos',
        'pekerjaan_pemohon',
        'npwp',
        'nama_instansi',
        'fakultas',
        'alamat_instansi',
        'kelurahan_instansi',
        'kecamatan_instansi',
        'kabupaten_instansi',
        'provinsi_instansi',
        'email_instansi:email',
        'kodepos_instansi',
        'telepon_instansi',
        'fax_instansi',
        'tema',
        'kab_penelitian',
        'kec_penelitian',
        'kel_penelitian',
        'instansi_penelitian',
        'alamat_penelitian',
        'bidang_penelitian',
        'tgl_mulai_penelitian',
        'tgl_akhir_penelitian',
        'anggota',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnAnggotaPenelitian = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'penelitian.id',
            'label' => 'Izin Penelitian',
        ],
        'nik_peneliti',
        'nama_peneliti',
        'bidang',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerAnggotaPenelitian,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Anggota Penelitian'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnAnggotaPenelitian
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinPenelitianLokasi = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'penelitian.id',
            'label' => 'Izin Penelitian',
        ],
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPenelitianLokasi,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Izin Penelitian Lokasi'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinPenelitianLokasi
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinPenelitianMetode = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'penelitian.id',
            'label' => 'Izin Penelitian',
        ],
        [
            'attribute' => 'metode.id',
            'label' => 'Metode Penelitian',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPenelitianMetode,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Izin Penelitian Metode'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinPenelitianMetode
    ]);
?>
    </div>
</div>