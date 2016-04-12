<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinSkdp */

$this->title = Yii::t('app', 'Create Izin Skdp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Skdp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-skdp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
