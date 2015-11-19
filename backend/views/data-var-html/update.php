<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataVarHtml */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Data Var Html',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Var Html'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="data-var-html-update">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
