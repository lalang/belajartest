<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding1 */

$this->title = Yii::t('app', 'Create Sub Landing1');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Landing1'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
