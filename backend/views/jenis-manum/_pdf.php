<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisManum */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Manum'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-manum-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Jenis Manum').' '. Html::encode($this->title) ?></h2>
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
    $gridColumnIzinPariwisataJenisManum = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
        [
                'attribute' => 'jenisManum.id',
                'label' => Yii::t('app', 'Jenis Manum')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataJenisManum,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-jenis-manum']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Izin Pariwisata Jenis Manum').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataJenisManum
    ]);
?>
    </div>
</div>
