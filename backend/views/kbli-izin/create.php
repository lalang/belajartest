<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KbliIzin */

$this->title = 'Create Kbli Izin';
$this->params['breadcrumbs'][] = ['label' => 'Kbli Izin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kbli-izin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
