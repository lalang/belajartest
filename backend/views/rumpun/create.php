<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Rumpun */

$this->title = Yii::t('app', 'Create Rumpun');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rumpun'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rumpun-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
