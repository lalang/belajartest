<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BentukKerjasama */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bentuk Kerjasama',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bentuk Kerjasama'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box"  style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>   
