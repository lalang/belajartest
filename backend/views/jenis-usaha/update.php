<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisUsaha */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jenis Usaha',
]) . ' ' . $model->keterangan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Usaha'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
        'id_induk'=>$id_induk
    ]) ?>

</div>
