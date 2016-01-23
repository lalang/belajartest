<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpLegal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp Legal'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-legal-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Izin Tdp Legal').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        [
            'attribute' => 'jenis0.id',
            'label' => Yii::t('app', 'Jenis Izin'),
        ],
        'nomor',
        'dikeluarkan_oleh',
        'tanggal_dikeluarkan',
        'masa_laku',
        'masa_laku_satuan',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>