<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKegiatan */

$this->title = Yii::t('app', 'Create Izin Tdp Kegiatan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp Kegiatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
