<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPenelitian */

$this->title = Yii::t('app', 'Create Izin Penelitian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Penelitian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-penelitian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
