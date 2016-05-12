<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPenelitianMetode */

$this->title = Yii::t('app', 'Create Izin Penelitian Metode');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Penelitian Metode'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-penelitian-metode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
