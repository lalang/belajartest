<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumenPendukung */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dokumen Pendukung',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokumen Pendukung'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update <i class="fa fa-edit"></i>');
?>
<div class="box"  style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
