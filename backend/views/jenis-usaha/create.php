<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisUsaha */

$this->title = Yii::t('app', 'Create Jenis Usaha');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Usaha'), 'url' => ['index', 'id' => $id_induk]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">
    <?=
    $this->render('_form', [
        'model' => $model,
        'id_induk' => $id_induk,
    ])
    ?>

</div>
