<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPimpinan */

$this->title = 'Update Izin Tdp Pimpinan: ' . ' ' . $model->izin_tdp_pimpinan;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp Pimpinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->izin_tdp_pimpinan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-tdp-pimpinan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
