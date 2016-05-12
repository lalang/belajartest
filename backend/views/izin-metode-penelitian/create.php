<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinMetodePenelitian */

$this->title = Yii::t('app', 'Create Izin Metode Penelitian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Metode Penelitian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-metode-penelitian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
