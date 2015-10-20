<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Migration */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Migration',
]) . ' ' . $model->version;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Migration'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->version, 'url' => ['view', 'id' => $model->version]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box"  style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
