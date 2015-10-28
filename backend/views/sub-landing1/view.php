<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding1 */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Sub Landing1',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Landing1'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/sub-landing1/index'], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update', ['update <i class="fa fa-edit"></i>', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete <i class="fa fa-trash"></i>', 'id' => $model->id], [
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
					'no_urut',
					'nama',
					'nama_en',
				];
				echo DetailView::widget([
					'model' => $model,
					'attributes' => $gridColumn
				]); 
			?>
		</div>	
    </div>
</div>