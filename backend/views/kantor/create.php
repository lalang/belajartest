<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kantor */

$this->title = Yii::t('app', 'Create Kantor '.\backend\models\Lokasi::findOne($_SESSION['id_induk'])->nama);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kantor'), 'url' => ['index','id'=>$_SESSION['id_induk']]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
        'namaLoc' => $namaLoc
    ]) ?>

</div>
