<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NoPenolakan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'No Penolakan',
]) . ' ' . $model->no_izin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'No Penolakan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_izin, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>