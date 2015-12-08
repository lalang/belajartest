<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSiupOffline */

$this->title = 'Update Perizinan Siup Offline: ' . ' ' . $model->perizinan_id;
$this->params['breadcrumbs'][] = ['label' => 'Perizinan Siup Offline', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perizinan_id, 'url' => ['view', 'id' => $model->perizinan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perizinan-siup-offline-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
