<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding2 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sub Landing2',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Landing2'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>