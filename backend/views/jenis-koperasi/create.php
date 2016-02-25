<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisKoperasi */

$this->title = Yii::t('app', 'Create Jenis Koperasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Koperasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
