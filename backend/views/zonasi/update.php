<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Zonasi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Zonasi',
]) . ' ' . $model->zonasi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zonasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->zonasi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
