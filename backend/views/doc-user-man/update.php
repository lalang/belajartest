<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DocUserMan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Doc User Man',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doc User Man'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="doc-user-man-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
