<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSiupOffline */

$this->title = 'Create Perizinan Siup Offline';
$this->params['breadcrumbs'][] = ['label' => 'Perizinan Siup Offline', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
