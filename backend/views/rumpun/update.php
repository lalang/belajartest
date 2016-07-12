<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rumpun */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Rumpun',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rumpun'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rumpun-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
