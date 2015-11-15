<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\HariLibur */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Hari Libur',
]) . ' ' . $model->keterangan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hari Libur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/hari-libur/index'], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3" >
                        
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

    <div class="row" style="margin-top: 15px">
		<div class="col-md-12">
		<?php 
			$gridColumn = [
				'tanggal',
				'keterangan',
				'keterangan_en',
			];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>	
		</div>
    </div>
</div>