<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserFile */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User File',
]) . ' ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User File'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-file-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
