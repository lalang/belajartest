<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FasilitasKamar */

$this->title = Yii::t('app', 'Create Fasilitas Kamar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fasilitas Kamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-kamar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
