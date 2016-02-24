<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Jabatan */

$this->title = Yii::t('app', 'Jabatan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jabatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
