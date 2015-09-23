<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DokumenPendukungSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dokumen Pendukung');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>

<section id="page-content">

    <div class="body-content animated fadeIn">

	<div class="dokumen-pendukung-index">
		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

		<p>
			<?= Html::a(Yii::t('app', 'Create Dokumen Pendukung'), ['create'], ['class' => 'btn btn-success']) ?>
			<?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
		</p>
		<div class="search-form" style="display:none">
			<?=  $this->render('_search', ['model' => $searchModel]); ?>
		</div>

		<?php 
		$gridColumn = [
			['class' => 'yii\grid\SerialColumn'],
			['attribute' => 'id', 'hidden' => true],
			'kategori',
			[
				'attribute' => 'izin.id',
				'label' => Yii::t('app', 'Izin'),
			],
			'isi:ntext',
			'file',
			'urutan',
			'tipe',
			[
				'class' => 'yii\grid\ActionColumn',
			],
		]; 
		?>
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => $gridColumn,
			'pjax' => true,
			'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
			'panel' => [
				'type' => GridView::TYPE_PRIMARY,
				'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
			],
			// set a label for default menu
			'export' => [
				'label' => 'Page',
				'fontAwesome' => true,
			],
			// your toolbar can include the additional full export menu
			'toolbar' => [
				'{export}',
				ExportMenu::widget([
					'dataProvider' => $dataProvider,
					'columns' => $gridColumn,
					'target' => ExportMenu::TARGET_BLANK,
					'fontAwesome' => true,
					'dropdownOptions' => [
						'label' => 'Full',
						'class' => 'btn btn-default',
						'itemsBefore' => [
							'<li class="dropdown-header">Export All Data</li>',
						],
					],
				]) ,
			],
		]); ?>

	</div>
    </div><!-- /.body-content -->
    <!--/ End body content -->
</section>