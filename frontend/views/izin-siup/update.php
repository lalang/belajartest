<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Izin Siup',
]) . ' ' . $model->perizinan->kode_registrasi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Siup'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->kode_registrasi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="izin-siup-update">

    <?= $this->render('_form', [
        'model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,
    ]) ?>

</div>
