<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisIzin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Izin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-izin-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Jenis Izin').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        'action',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinPariwisataTeknis = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
        [
                'attribute' => 'jenisIzin.id',
                'label' => Yii::t('app', 'Jenis Izin')
        ],
        'no_izin',
        'tanggal_izin',
        'tanggal_masa_berlaku',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataTeknis,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-teknis']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Izin Pariwisata Teknis').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataTeknis
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
                'label' => Yii::t('app', 'Izin Tdp')
        ],
        [
                'attribute' => 'jenisIzin.id',
                'label' => Yii::t('app', 'Jenis')
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-tdp-legal']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Izin Tdp Legal').' '. $this->title),
        ],
        'columns' => $gridColumnIzinTdpLegal
    ]);
?>
    </div>
</div>
