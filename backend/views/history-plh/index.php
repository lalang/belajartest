<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\HistoryPlhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'History PLH');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="history-plh-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create History PLH'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'View History PLH'), ['view'], ['class' => 'btn btn-info']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' =>'user_id',
            'value' => 'user.username',
            //'label'=>Yii::t('app', 'status job'),
        ],
        [
            'attribute' =>'user_lokasi',
            'value' => 'lokasi.nama',
            //'label'=>Yii::t('app', 'status job'),
        ],
        [
            'attribute' =>'user_plh_id',
            'value' => 'user_plh.username',
            //'label'=>Yii::t('app', 'status job'),
        ],
        [
            'attribute' =>'user_plh_lokasi',
            'value' => 'lokasi_plh.nama',
            //'label'=>Yii::t('app', 'status job'),
        ],
        'tanggal_mulai',
        'tanggal_akhir',
        'status',
        [
            'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'header' => 'Action',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                            if(($model->tanggal_mulai<=date("Y-m-d")) && (date("Y-m-d") <= $model->tanggal_akhir)){
                                return '';
                            } else {
                                $url = \yii\helpers\Url::toRoute(['delete', 'id' => $model->id]);
                        
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                                            'title' => Yii::t('yii', 'Delete'),
                                            'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                                            'data-method' => 'post',
                                ]);
                            }
                            
                        
                    },
                            
                ]
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
