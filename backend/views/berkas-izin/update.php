<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BerkasIzin */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Berkas Izin',
]) . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berkas Izin'), 'url' => ['index','id'=>$id_induk]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,'id_induk'=>$id_induk
    ]) ?>

</div>
