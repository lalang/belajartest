<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpLegal */

$this->title = Yii::t('app', 'Create Izin Tdp Legal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Tdp Legal'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-legal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
