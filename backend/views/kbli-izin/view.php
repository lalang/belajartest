<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\KbliIzin */

$this->title = Yii::t('app', 'View {modelClass}', [
    'modelClass' => 'Kbli Izin',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kbli Izin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/kbli-izin/index','id'=>$model->kbli_id], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
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
					'attribute' => 'kbli.nama',
					'label' => 'Kbli',
				],
				[
					'attribute' => 'izin.nama',
					'label' => 'Izin',
				],
			];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		</div>
    </div>
</div>