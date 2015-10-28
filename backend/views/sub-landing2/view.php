<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding2 */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Sub Landing2',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Landing2'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="sub-landing2-view">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/sub-landing2/index'], ['class' => 'btn btn-warning']) ?>
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
					'icon',
					'info:ntext',
					'info_en:ntext',
					'urutan',
					'link',
					'link_en',
					'target',
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