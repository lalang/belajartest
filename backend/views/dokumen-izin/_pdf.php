<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumenIzin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokumen Izin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokumen-izin-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Dokumen Izin').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        'judul',
        'isi:ntext',
        'file',
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
    $gridColumnMekanismePelayanan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        'isi:ntext',
        'berkas',
        [
            'attribute' => 'pelaksana.id',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        [
            'attribute' => 'dokInput.id',
            'label' => Yii::t('app', 'Dokumen Izin'),
        ],
        [
            'attribute' => 'dokProses.id',
            'label' => Yii::t('app', 'Dokumen Izin'),
        ],
        [
            'attribute' => 'dokOutput.id',
            'label' => Yii::t('app', 'Dokumen Izin'),
        ],
        'durasi',
        'dur_sat',
        'dur_sat1',
        'dur_sat2',
        'dur_sat3',
        'durasi_satuan',
        'urutan',
        'dokpendukung_tipe',
        'aktif',
        'petugas_cek',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMekanismePelayanan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode(Yii::t('app', 'Mekanisme Pelayanan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnMekanismePelayanan
    ]);
?>
    </div>
</div>