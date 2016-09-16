<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\FasilitasKamar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fasilitas Kamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-kamar-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Fasilitas Kamar').' '. Html::encode($this->title) ?></h2>
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
    $gridColumnIzinPariwisataFasilitas = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
        [
                'attribute' => 'fasilitasKamar.id',
                'label' => Yii::t('app', 'Fasilitas Kamar')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataFasilitas,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-fasilitas']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Izin Pariwisata Fasilitas').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataFasilitas
    ]);
?>
    </div>
</div>
