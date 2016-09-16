<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataFasilitas */

$this->title = Yii::t('app', 'Create Izin Pariwisata Fasilitas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata Fasilitas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-fasilitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
