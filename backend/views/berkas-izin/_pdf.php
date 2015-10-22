<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\BerkasIzin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berkas Izin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-izin-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Berkas Izin').' '. Html::encode($this->title) ?></h2>
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
        'nama',
        'extension',
        'wajib',
        'urutan',
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
    $gridColumnPerizinanBerkas = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'berkasIzin.id',
            'label' => Yii::t('app', 'Berkas Izin'),
        ],
        [
            'attribute' => 'userFile.id',
            'label' => Yii::t('app', 'User File'),
        ],
        'urutan',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinanBerkas,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan Berkas').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinanBerkas
    ]);
?>
    </div>
</div>