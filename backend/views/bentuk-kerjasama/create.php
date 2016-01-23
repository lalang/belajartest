<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BentukKerjasama */

$this->title = Yii::t('app', 'Create Bentuk Kerjasama');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bentuk Kerjasama'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bentuk-kerjasama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
