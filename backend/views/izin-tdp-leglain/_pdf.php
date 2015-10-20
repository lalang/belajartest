<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpLeglain */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp Leglain', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-leglain-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Tdp Leglain'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => 'Izin Tdp',
        ],
        'izin_tdp_leglain_nama_petugas',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>