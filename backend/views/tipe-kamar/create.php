<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TipeKamar */

$this->title = Yii::t('app', 'Create Tipe Kamar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipe Kamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-kamar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
