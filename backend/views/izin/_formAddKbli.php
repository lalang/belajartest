<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\KbliIzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>



    <p>
        <?= Html::a('Create Kbli Izin', ['create-kbli'], ['class' => 'btn btn-success']) ?>
    </p>
	<div class="search-form" style="display:none">
        <?=  $this->render('_searchKbli', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'kbli.nama',
            'label' => 'Kbli',
        ],
		[
		'attribute' => '',
		'value' => function ($model) {

			return Html::a(Yii::t('user', '<i class="fa fa-trash"></i> Hapus'), ['/izin/kbli-delete', 'id' => $model->id], [
				'class' => 'btn btn-xs btn-danger',
				'data-method' => 'post',
				'data-confirm' => Yii::t('yii', 'Apakah Anda yakin akan menghapus ini?'),
			]); },

			'format' => 'raw',
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

        
    ]); ?>


