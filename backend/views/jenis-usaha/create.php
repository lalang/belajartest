<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisUsaha */

$this->title = Yii::t('app', 'Create Jenis Usaha');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Usaha'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-usaha-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
