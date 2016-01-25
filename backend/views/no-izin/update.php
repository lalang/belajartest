<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NoIzin */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'No Izin',
]) . ' ' . $model->no_izin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'No Izin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_izin, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
