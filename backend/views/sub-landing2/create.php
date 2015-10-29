<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding2 */

$this->title = Yii::t('app', 'Create Sub Landing2');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Landing2'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>