<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Package */

$this->title = Yii::t('app', 'Create Package '.\backend\models\Izin::findOne($_SESSION['id_induk'])->nama);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Package'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
