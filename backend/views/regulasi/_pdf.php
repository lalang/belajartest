<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Regulasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Regulasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regulasi-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Regulasi'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        'nama_en',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnDownload = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'idRegulasi.id',
            'label' => 'Regulasi',
        ],
        'judul',
        'judul_eng',
        'deskripsi:ntext',
        'deskripsi_eng:ntext',
        'nama_file',
        'jenis_file',
        'tanggal',
        'diunduh',
        'publish',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerDownload,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Download'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnDownload
    ]);
?>
    </div>
</div>