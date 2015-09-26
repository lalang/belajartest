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

    <div class="col-md-12">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Kuota').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa fa-file-pdf-o"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model['id']], 
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>                        
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

    <div class="col-md-12">
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