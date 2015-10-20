<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKantor */

$this->title = 'Update Izin Tdp Kantor: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp Kantor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-tdp-kantor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
