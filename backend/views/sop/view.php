<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sop */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sop'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sop-view">

    <div class="col-md-12">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Sop').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="col-md-12">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        'nama_sop',
        'deskripsi_sop:ntext',
        [
            'attribute' => 'pelaksana.id',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        'durasi',
        'durasi_satuan',
        'urutan',
        'action',
        'aktif',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="col-md-12">
<?php
    $gridColumnPerizinanProses = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'sop.id',
            'label' => Yii::t('app', 'Sop'),
        ],
        'urutan',
        'nama_sop',
        'deskripsi_sop',
        [
            'attribute' => 'pelaksana.id',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        'dokumen:ntext',
        'status',
        'keterangan:ntext',
        'tanggal_proses',
        'mulai',
        'selesai',
        'active',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinanProses,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan Proses').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinanProses
    ]);
?>
    </div>
    
    <div class="col-md-12">
<?php
    $gridColumnPerizinanSop = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'sop.id',
            'label' => Yii::t('app', 'Sop'),
        ],
        'active',
        'urutan',
        'proses',
        'prosedur:ntext',
        [
            'attribute' => 'pelaksana.id',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        'dokumen:ntext',
        'status',
        'keterangan:ntext',
        'tanggal_proses',
        'mulai',
        'selesai',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinanSop,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan Sop').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinanSop
    ]);
?>
    </div>
</div>