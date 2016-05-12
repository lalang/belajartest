<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPenelitian */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Izin Penelitian',
]) . ' ' . $model->perizinan->kode_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Izin Penelitian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->kode_registrasi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-penelitian-update">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
