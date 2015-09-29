<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kbli */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kbli'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
  <div class="col-md-12">

      <div class="col-sm-9">
          <h2><?= Yii::t('app', 'Kbli').' '. Html::encode($this->title) ?></h2>
      </div>
      <div class="col-sm-3" style="margin-top: 15px">
          <?=             
           Html::a('<i class="fa fa-file-pdf-o"></i> ' . Yii::t('app', 'PDF'), 
              ['pdf', 'id' => $model['id']], 
              [
                  'class' => 'btn btn-danger',
                  'target' => '_blank',
                  'data-toggle' => 'tooltip',
                  'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
              ]
          )?>                        
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
  </div>

<?php 
  $gridColumn = [
      ['attribute' => 'id', 'hidden' => true],
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
  echo Gridview::widget([
      'dataProvider' => $providerIzinSiupKbli,
      'pjax' => true,
      'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
      'panel' => [
      'type' => GridView::TYPE_PRIMARY,
      'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Kbli').' '. $this->title) . ' </h3>',
      ],
      'columns' => $gridColumnIzinSiupKbli
  ]);
?>

</div>
