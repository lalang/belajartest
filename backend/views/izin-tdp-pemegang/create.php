<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPemegang */

$this->title = 'Create Izin Tdp Pemegang';
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp Pemegang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-pemegang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
