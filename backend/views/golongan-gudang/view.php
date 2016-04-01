<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\GolonganGudang */

$this->title = Yii::t('app', 'View {modelClass}', [
    'modelClass' => 'Golongan Gudang',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Golongan Gudang'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

	<div class="row">
		<div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/golongan-gudang/index'], ['class' => 'btn btn-warning']) ?>
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
				'nama',
				'luas',
				'kapasitas_penyimpanan',
				'bentuk',
				'publish',
			];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>		
		</div>
    </div>
</div>