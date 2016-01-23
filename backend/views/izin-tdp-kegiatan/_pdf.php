<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKegiatan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp Kegiatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-kegiatan-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Izin Tdp Kegiatan').' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'kbli.id',
            'label' => Yii::t('app', 'Kbli'),
        ],
        'produk',
        'flag_utama',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>