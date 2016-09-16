<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataJenisManum */

$this->title = Yii::t('app', 'Create Izin Pariwisata Jenis Manum');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata Jenis Manum'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-jenis-manum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
