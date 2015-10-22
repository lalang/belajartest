<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Manfaat */

$this->title = Yii::t('app', 'Create Manfaat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Manfaat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
