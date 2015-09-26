<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kuota */

$this->title = Yii::t('app', 'Create Kuota');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kuota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuota-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
