<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuNavSub */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Menu Nav Sub',
]) . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu Nav Sub'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">

        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
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

    <div class="row">
		<div class="col-md-12">
			<?php 
				$gridColumn = [
					['attribute' => 'id', 'hidden' => true],
					[
						'attribute' => 'idMenuNav.nama',
						'label' => Yii::t('app', 'Menu Nav Main'),
					],
					'nama',
					'nama_en',
					'link',
					'link_en',
					'target',
					'urutan',
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