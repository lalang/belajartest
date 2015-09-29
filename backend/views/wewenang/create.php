<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Wewenang */

$this->title = Yii::t('app', 'Create Wewenang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wewenang'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
