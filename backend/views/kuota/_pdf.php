<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kuota */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kuota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuota-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Kuota').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'lokasi.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'sesi_1_kuota',
        'sesi_1_mulai',
        'sesi_1_selesai',
        'sesi_2_kuota',
        'sesi_2_mulai',
        'sesi_2_selesai',
        'sesi_3_kuota',
        'sesi_3_mulai',
        'sesi_3_selesai',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>