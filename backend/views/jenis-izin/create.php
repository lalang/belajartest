<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisIzin */

$this->title = Yii::t('app', 'Create Jenis Izin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Izin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-izin-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
