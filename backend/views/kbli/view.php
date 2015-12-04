<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kbli */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Kbli',
]) . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kbli'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box"  style="padding:10px 4px;">
  <div class="col-sm-9">
	  <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/kbli/index'], ['class' => 'btn btn-warning']) ?>
  </div>
  <div class="col-sm-3" style="margin-top: 15px">                        
	  <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  <?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
		  'class' => 'btn btn-danger',
		  'data' => [
			  'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
			  'method' => 'post',
		  ],
	  ])
	  ?>
  </div>


<?php 
  $get_data = \backend\models\Kbli::find()->where(['id'=>$model->parent_id])->One();	
  $gridColumn = [
      ['attribute' => 'id', 'hidden' => true],
	  [
		'attribute' => 'parent_id',
		'format' => 'raw',
		'value' => $get_data->kode.' | '.$get_data->nama,
	 ],
	'kode',
	'nama',
  ];
  echo DetailView::widget([
      'model' => $model,
      'attributes' => $gridColumn
  ]); 
?>

<?php
  $gridColumnIzinSiupKbli = [
      ['class' => 'yii\grid\SerialColumn'],
      ['attribute' => 'id', 'hidden' => true],
      [
          'attribute' => 'izinSiup.id',
          'label' => Yii::t('app', 'Izin Siup'),
      ],
      [
          'attribute' => 'kbli.id',
          'label' => Yii::t('app', 'Kbli'),
      ],
  ];
  
  /*
  echo Gridview::widget([
      'dataProvider' => $providerIzinSiupKbli,
      'pjax' => true,
      'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
      'panel' => [
      'type' => GridView::TYPE_PRIMARY,
      'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Kbli').' '. $this->title) . ' </h3>',
      ],
      'columns' => $gridColumnIzinSiupKbli
  ]);*/
?>

</div>
