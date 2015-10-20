<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Migration */

$this->title = Yii::t('app', 'Create Migration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Migration'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
