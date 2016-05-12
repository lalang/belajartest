<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AnggotaPenelitian */

$this->title = Yii::t('app', 'Create Anggota Penelitian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Anggota Penelitian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-penelitian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
