<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Matarantai */

$this->title = Yii::t('app', 'Create Matarantai');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matarantai'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matarantai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
