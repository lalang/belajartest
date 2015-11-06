<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BentukPerusahaan */

$this->title = 'Create Bentuk Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Bentuk Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
