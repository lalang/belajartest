<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSiupOffline */

$this->title = 'Create Perizinan Siup Offline';
$this->params['breadcrumbs'][] = ['label' => 'Perizinan Siup Offline', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perizinan-siup-offline-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
