<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPenelitian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Penelitian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-penelitian-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Izin Penelitian').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
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
            'label' => Yii::t('app', 'Izin Penelitian'),
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Anggota Penelitian').' '. $this->title) . ' </h3>',
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
            'label' => Yii::t('app', 'Izin Penelitian'),
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Penelitian Lokasi').' '. $this->title) . ' </h3>',
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
            'label' => Yii::t('app', 'Izin Penelitian'),
        ],
        [
            'attribute' => 'metode.id',
            'label' => Yii::t('app', 'Metode Penelitian'),
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPenelitianMetode,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Penelitian Metode').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinPenelitianMetode
    ]);
?>
    </div>
</div>