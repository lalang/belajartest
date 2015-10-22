<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DokumenPendukung */

$this->title = Yii::t('app', 'Create Dokumen Pendukung');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokumen Pendukung'), 'url' => ['index','id'=>$id_induk]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="box" style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model, 'id_induk'=>$id_induk
    ]) ?>

</div>
