<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MenuNavMain */

$this->title = Yii::t('app', 'Create Menu Nav Main');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu Nav Main'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
