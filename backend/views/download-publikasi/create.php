<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DownloadPublikasi */

$this->title = 'Create Download Publikasi';
$this->params['breadcrumbs'][] = ['label' => 'Download Publikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
