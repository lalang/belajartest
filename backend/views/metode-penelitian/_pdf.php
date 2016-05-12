<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\MetodePenelitian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Metode Penelitian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metode-penelitian-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Metode Penelitian').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'metode',
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