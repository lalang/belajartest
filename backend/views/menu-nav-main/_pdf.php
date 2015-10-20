<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuNavMain */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu Nav Main'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-nav-main-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Menu Nav Main').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        'nama_en',
        'link',
        'link_en',
        'target',
        'urutan',
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
    $gridColumnMenuNavSub = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'idMenuNav.id',
            'label' => Yii::t('app', 'Menu Nav Main'),
        ],
        'nama',
        'nama_en',
        'link',
        'link_en',
        'target',
        'urutan',
        'publish',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMenuNavSub,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Menu Nav Sub').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnMenuNavSub
    ]);
?>
    </div>
</div>