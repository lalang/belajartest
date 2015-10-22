<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelaksana */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Pelaksana',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pelaksana'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">
    <div class="col-md-12">
        <div class="col-sm-9">

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
    </div>

   
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
		//'warna',
		[
			'format' => 'html',    
			'label' => 'Warna',
			'value'=>'<div style="width: 200px; margin:0px; background:'.$model->warna.'">&nbsp;</div>'
		],
        'aktif',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
   
</div>