<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Page',
]) . ' ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
