<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisManum */

$this->title = Yii::t('app', 'Create Jenis Manum');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Manum'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-manum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
