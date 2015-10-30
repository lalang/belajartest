<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rumpun */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rumpun'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rumpun-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Rumpun').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
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
            'label' => Yii::t('app', 'Bidang'),
        ],
        [
            'attribute' => 'rumpun.id',
            'label' => Yii::t('app', 'Rumpun'),
        ],
        'tipe',
        [
            'attribute' => 'status.id',
            'label' => Yii::t('app', 'Status'),
        ],
        'nama',
        'kode',
        'fno_surat',
        'aktif',
        [
            'attribute' => 'wewenang.id',
            'label' => Yii::t('app', 'Wewenang'),
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
            'label' => Yii::t('app', 'Arsip'),
        ],
        'type',
        'template_sk:ntext',
        'template_penolakan:ntext',
        'template_preview:ntext',
        'template_valid:ntext',
        'template_ba_lapangan:ntext',
        'template_ba_teknis:ntext',
        'action',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzin,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzin
    ]);
?>
    </div>
</div>