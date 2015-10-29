<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TitleSubLandingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Title Sub Landing';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="title-sub-landing-index">

    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
		[
			'format' => 'text',    
			'label' => 'Url',
			'value'=>function ($data) {
				$data = '#'.$data['nama_seo'];
				return $data;
			},
		],
		[
			'format' => 'text',    
			'label' => 'Url English',
			'value'=>function ($data) {
				$data = '#'.$data['nama_seo_en'];
				return $data;
			},
		],
        'nama',
		'nama_en',
        'publish',
        [
            'class' => 'yii\grid\ActionColumn',
			'template' => '{update}',
			'header' => 'Action',
			'buttons' => [
				'update' => function ($data) {
						return Html::a(Yii::t('app', 'Edit'), [$data], ['class' => 'btn btn-xs btn-info']);
					},
					
				],
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
