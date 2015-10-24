<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kuota */

$this->title = Yii::t('app', 'Create Kuota: '.\backend\models\Lokasi::findOne($_SESSION['id_induk'])->nama);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kuota'), 'url' => ['index','id'=>$_SESSION['id_induk']]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>

<div class="box" style="padding:10px 4px;">
    
    <?= $this->render('_form', [
        'model' => $model,
        'namaLoc' => $namaLoc,
    ]) ?>

</div>
