<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinTdp */

$this->title = 'Update Izin Tdp: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-tdp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
