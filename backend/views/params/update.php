<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Params */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Params',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Params'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
