<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Lokasi */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lokasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">
	<div class="row">
		<div class="col-sm-9">

		</div>
        <div class="col-sm-3" style="margin-top: 15px">
            <p>
            <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
                <?= Html::a(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['index'], ['class' => 'btn btn-warning']) ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php 
                $gridColumn = [
                    ['attribute' => 'id', 'hidden' => true],
                    'kode',
                    'nama',
                    'keterangan:ntext',
                    'latitude',
                    'longtitude',
                    'propinsi',
                    'kabupaten_kota',
                    'kecamatan',
                    'kelurahan',
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