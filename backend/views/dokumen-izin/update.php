<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumenIzin */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dokumen Izin',
]) . ' ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokumen Izin'), 'url' => ['index','id'=>$id_induk]];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,'id_induk'=>$_SESSION['id_induk']
    ]) ?>

</div>
