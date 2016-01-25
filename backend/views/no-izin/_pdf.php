<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\NoIzin */

$this->title = $model->no_izin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'No Izin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="no-izin-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'No Izin').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'tahun',
        [
            'attribute' => 'lokasi.nama',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        [
            'attribute' => 'izin.nama',
            'label' => Yii::t('app', 'Izin'),
        ],
        'no_izin',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>