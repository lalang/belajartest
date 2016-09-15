<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\TipeKamar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipe Kamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-kamar-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Tipe Kamar').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'keterangan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinPariwisataKapasitasAkomodasi = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
        [
                'attribute' => 'tipeKamar.id',
                'label' => Yii::t('app', 'Tipe Kamar')
        ],
        'jumlah_kapasitas',
        'jumlah_unit',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataKapasitasAkomodasi,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-kapasitas-akomodasi']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Izin Pariwisata Kapasitas Akomodasi').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataKapasitasAkomodasi
    ]);
?>
    </div>
</div>
