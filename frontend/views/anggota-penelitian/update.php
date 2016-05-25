<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnggotaPenelitian */

$this->title = 'Update Anggota Penelitian: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Penelitian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-penelitian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>