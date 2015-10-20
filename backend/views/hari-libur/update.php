<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HariLibur */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Hari Libur',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hari Libur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>