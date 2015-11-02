<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\NoPenolakan */

$this->title = 'No Penolakan : '.$model->no_izin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'No Penolakan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
            <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index'], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <p>        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php 
                $gridColumn = [
                    ['attribute' => 'id', 'hidden' => true],
                    'tahun',
                    [
                        'attribute' => 'lokasi.nama',
                        'label' => Yii::t('app', 'Lokasi'),
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
</div>