<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KbliIzin */

$this->title = 'Update Kbli Izin: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kbli Izin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kbli-izin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
