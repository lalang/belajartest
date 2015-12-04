<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKbli */

$this->title = Yii::t('app', '{modelClass} ', [
    'modelClass' => $judul,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Kbli'), 'url' => ['index', 'id'=>$_SESSION['id_induk']]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index', 'id'=>$_SESSION['id_induk']], ['class' => 'btn btn-warning']) ?>
		</div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update <i class="fa fa-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete <i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
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
				[
					'attribute' => 'kbli.KodeNama',
					'label' => 'Kbli',
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