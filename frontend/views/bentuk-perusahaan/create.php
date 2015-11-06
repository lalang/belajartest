<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BentukPerusahaan */

$this->title = 'Create Bentuk Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Bentuk Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bentuk-perusahaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
