<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdg */

$this->title = 'Create Izin Tdg';
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
