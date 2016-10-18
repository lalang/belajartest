<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisUsaha */

$this->title = Yii::t('app', 'View {modelClass} ', [
            'modelClass' => 'Berkas Izin',
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Usaha'), 'url' => ['index', 'id' => $id_induk]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
            <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index', 'id' => $id_induk], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">

            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
                [
                    'attribute' => 'bidangIzinUsaha.keterangan',
                    'label' => Yii::t('app', 'Bidang Izin Usaha'),
                ],
                'keterangan',
                'aktif',
            ];
            echo DetailView::widget([
                'model' => $model,
                'attributes' => $gridColumn
            ]);
            ?>
        </div>
    </div>
</div>