<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MetodePenelitian */

$this->title = Yii::t('app', 'Create Metode Penelitian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Metode Penelitian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metode-penelitian-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
