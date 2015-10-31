<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kbli */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Kbli',
]) . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kbli'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box"  style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
