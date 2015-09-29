<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pelaksana */

$this->title = Yii::t('app', 'Create Pelaksana');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pelaksana'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
