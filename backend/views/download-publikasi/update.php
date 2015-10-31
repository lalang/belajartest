<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DownloadPublikasi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Download Publikasi',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Download Publikasi'), 'url' => ['index','id'=>$_SESSION['id_induk']]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
