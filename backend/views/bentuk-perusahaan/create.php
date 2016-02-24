<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BentukPerusahaan */

$this->title = Yii::t('app', 'Create Bentuk Perusahaan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bentuk Perusahaan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
