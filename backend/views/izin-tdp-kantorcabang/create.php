<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKantorcabang */

$this->title = Yii::t('app', 'Create Izin Tdp Kantorcabang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp Kantorcabang'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-kantorcabang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
