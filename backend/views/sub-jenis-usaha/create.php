<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubJenisUsaha */

$this->title = Yii::t('app', 'Create Sub Jenis Usaha');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Jenis Usaha'), 'url' => ['index', 'id' => $id_induk_jenis]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
        'id_induk_jenis' => $id_induk_jenis,
    ]) ?>

</div>
