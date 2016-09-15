<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataKapasitasTransport */

$this->title = Yii::t('app', 'Create Izin Pariwisata Kapasitas Transport');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata Kapasitas Transport'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-kapasitas-transport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
