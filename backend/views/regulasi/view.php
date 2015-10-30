<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Regulasi */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Regulasi',
]) . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regulasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
            <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/regulasi/index'], ['class' => 'btn btn-warning']) ?>
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
				'urutan',
				'nama',
				'nama_en',
				'publish',
			];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>		
		</div>
    </div>
    
    <div class="row">
		<div class="col-md-12">
		<?php
			$gridColumnDownload = [
				['class' => 'yii\grid\SerialColumn'],
				['attribute' => 'id', 'hidden' => true],
				'judul',
				'judul_eng',
				'nama_file',
				'jenis_file',
				'tanggal',
				'publish',
			];
			echo Gridview::widget([
				'dataProvider' => $providerDownload,
				'pjax' => true,
				'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
				'panel' => [
				'type' => GridView::TYPE_PRIMARY,
				'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Download'.' '. $this->title) . ' </h3>',
				],
				'columns' => $gridColumnDownload
			]);
		?>		
		</div>
    </div>
</div>