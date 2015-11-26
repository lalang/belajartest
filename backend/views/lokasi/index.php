<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LokasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lokasi');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<section id="page-content">

   
    <div class="body-content animated fadeIn">
	<div class="lokasi-index">
	
		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

		<p>
			<?= Html::a(Yii::t('app', 'Create Lokasi <i class="fa fa-plus"></i>'), ['create'], ['class' => 'btn btn-success']) ?>
			<?= Html::a(Yii::t('app', 'Advance Search <i class="fa fa-search-plus"></i>'), '#', ['class' => 'btn btn-info search-button']) ?>
		</p>
		<div class="search-form" style="display:none">
			<?=  $this->render('_search', ['model' => $searchModel]); ?>
		</div>

		<?php 
		$gridColumn = [
			['class' => 'yii\grid\SerialColumn'],
			['attribute' => 'id', 'hidden' => true],
			'kode',
			'nama',
			'keterangan:ntext',
			'propinsi',
			'kabupaten_kota',
			'kecamatan',
			'kelurahan',
			'aktif',
                        ['attribute' => 'Kuota',
                        'value' => function ($model) {

                            return Html::a(Yii::t('user', '<i class="fa fa-search"></i> Detail'), ['/kuota/index', 'id' => $model->id], [
                            'class' => 'btn btn-xs btn-primary',
                            'data-method' => 'post',
                            ]);
                        },

                        'format' => 'raw',
                        ],
                        ['attribute' => 'Kantor',
                        'value' => function ($model) {

                            return Html::a(Yii::t('user', '<i class="fa fa-search"></i> Detail'), ['/kantor/index', 'id' => $model->id], [
                            'class' => 'btn btn-xs btn-primary',
                            'data-method' => 'get',
                            ]);
                        },

                        'format' => 'raw',
                        ],
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
				'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode($this->title) . ' </h3>',
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
</section><!-- /#page-content -->