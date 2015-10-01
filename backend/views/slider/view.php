<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/*
$this->title2 = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Slider',
]) . ' ' . $model->title;
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slider'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
*/
$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Slider',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slider'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
            
        </div>
        <div class="col-sm-3" style="margin-top: 15px">                
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
		[
			'attribute' => 'image',
			'format' => 'html', 
			'value' => Html::img(Yii::getAlias('@web').'/images/slider/'.$model->image,
			['width' => '200px'])
		 ],
        'title',
        'title_en',
        'conten:ntext',
        'conten_en:ntext',
        'urutan',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>