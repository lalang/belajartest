<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bank */

$this->title = Yii::t('app', 'Create Bank');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
