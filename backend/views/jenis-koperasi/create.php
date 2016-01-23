<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisKoperasi */

$this->title = Yii::t('app', 'Create Jenis Koperasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Koperasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-koperasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
