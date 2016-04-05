<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\kuota */

$this->title = Yii::t('app', 'Create Kuota');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kuota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
