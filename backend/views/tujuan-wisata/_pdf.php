<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\TujuanWisata */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tujuan Wisata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tujuan-wisata-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Tujuan Wisata').' '. Html::encode($this->title) ?></h2>
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
    $gridColumnIzinPariwisataTujuanWisata = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
        [
                'attribute' => 'tujuanWisata.id',
                'label' => Yii::t('app', 'Tujuan Wisata')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataTujuanWisata,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-tujuan-wisata']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Izin Pariwisata Tujuan Wisata').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataTujuanWisata
    ]);
?>
    </div>
</div>
