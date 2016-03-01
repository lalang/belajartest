<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BentukKerjasama */

$this->title = Yii::t('app', 'Bentuk Kerjasama');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bentuk Kerjasama'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>   
