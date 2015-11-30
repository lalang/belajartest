<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DocUserMan */

$this->title = Yii::t('app', 'Create Document User Manual');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doc User Man'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
