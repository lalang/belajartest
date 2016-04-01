<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GolonganGudang */

$this->title = 'Create Golongan Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Golongan Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
