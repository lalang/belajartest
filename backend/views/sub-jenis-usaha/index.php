<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubJenisUsahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sub Jenis Usaha');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="sub-jenis-usaha-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali Ke Izin Usaha'), ['/jenis-usaha/', 'id' => $id_induk], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Create Sub Jenis Usaha <i class="fa fa-plus"></i>'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>
        <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
        <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'jenis_usaha_id',
                'label' => Yii::t('app', 'Jenis Usaha'),
                'value' => function($model){
                    return $model->jenisUsaha->keterangan;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\JenisUsaha::find()->asArray()->all(), 'id', 'keterangan'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Jenis usaha', 'id' => 'grid-sub-jenis-usaha-search-jenis_usaha_id']
            ],
        'keterangan',
        'aktif',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sub-jenis-usaha']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
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
