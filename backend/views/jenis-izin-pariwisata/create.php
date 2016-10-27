<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisIzinPariwisata */

$this->title = Yii::t('app', 'Create Jenis Izin Pariwisata');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Izin Pariwisata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-izin-pariwisata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
