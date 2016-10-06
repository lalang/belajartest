<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\BidangIzinUsaha */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bidang Izin Usaha'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bidang-izin-usaha-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Bidang Izin Usaha').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'keterangan',
        'kode',
        'aktif',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzin = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'jenis',
        [
                'attribute' => 'bidang.id',
                'label' => Yii::t('app', 'Bidang')
        ],
        [
                'attribute' => 'rumpun.id',
                'label' => Yii::t('app', 'Rumpun')
        ],
        'tipe',
        [
                'attribute' => 'status.id',
                'label' => Yii::t('app', 'Status')
        ],
        'nama',
        'alias',
        'kode',
        'fno_surat',
        'aktif',
        [
                'attribute' => 'wewenang.id',
                'label' => Yii::t('app', 'Wewenang')
        ],
        'cek_lapangan',
        'cek_sprtrw',
        'cek_obyek',
        'durasi',
        'durasi_satuan',
        'cek_perusahaan',
        'masa_berlaku',
        'masa_berlaku_satuan',
        'latar_belakang:ntext',
        'persyaratan:ntext',
        'mekanisme:ntext',
        'pengaduan:ntext',
        'dasar_hukum:ntext',
        'definisi:ntext',
        'biaya',
        'brosur:ntext',
        [
                'attribute' => 'arsip.id',
                'label' => Yii::t('app', 'Arsip')
        ],
        'type',
        'preview_data:ntext',
        'template_sk:ntext',
        'template_penolakan:ntext',
        'template_preview:ntext',
        'template_valid:ntext',
        'template_batal:ntext',
        'template_ba_lapangan:ntext',
        'template_ba_teknis:ntext',
        'action',
        'min',
        'max',
        'zonasi',
        'mulai_perpanjangan',
        'mulai_perpanjangan_satuan',
        [
                'attribute' => 'bidangIzinUsaha.id',
                'label' => Yii::t('app', 'Bidang Izin')
        ],
        [
                'attribute' => 'jenisUsaha.id',
                'label' => Yii::t('app', 'Jenis Usaha')
        ],
        [
                'attribute' => 'subJenisUsaha.id',
                'label' => Yii::t('app', 'Sub Jenis')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzin,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Izin').' '. $this->title),
        ],
        'columns' => $gridColumnIzin
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnJenisUsaha = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'bidangIzinUsaha.id',
                'label' => Yii::t('app', 'Bidang Izin Usaha')
        ],
        'keterangan',
        'aktif',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerJenisUsaha,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-jenis-usaha']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Jenis Usaha').' '. $this->title),
        ],
        'columns' => $gridColumnJenisUsaha
    ]);
?>
    </div>
</div>
