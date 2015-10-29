<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding3 */

$this->title = Yii::t('app', 'Create Sub Landing3');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Landing3'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
