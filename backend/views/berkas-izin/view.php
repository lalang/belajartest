<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\BerkasIzin */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Berkas Izin',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berkas Izin'), 'url' => ['index', 'id'=>$id_induk]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">

        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
		<div class="col-md-12">
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
    </div>
    
    <div class="row">
		<div class="col-md-12">
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
</div>