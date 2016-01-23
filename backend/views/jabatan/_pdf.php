<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Jabatan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jabatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Jabatan').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama_jabatan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpPimpinan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        [
            'attribute' => 'jabatan.id',
            'label' => Yii::t('app', 'Jabatan'),
        ],
        [
            'attribute' => 'kewarganegaraan.id',
            'label' => Yii::t('app', 'Negara'),
        ],
        [
            'attribute' => 'jabatanLain.id',
            'label' => Yii::t('app', 'Jabatan'),
        ],
        'nama_lengkap',
        'tmplahir',
        'tgllahir',
        'alamat_lengkap',
        'kodepos',
        'telepon',
        'mulai_jabat',
        'jml_lbr_saham',
        'jml_rp_modal',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpPimpinan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Pimpinan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpPimpinan
    ]);
?>
    </div>
</div>