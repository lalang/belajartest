<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpSaham */

$this->title = Yii::t('app', 'Create Izin Tdp Saham');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp Saham'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-saham-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
