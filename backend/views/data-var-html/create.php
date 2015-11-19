<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DataVarHtml */

$this->title = Yii::t('app', 'Create Data Var Html');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Var Html'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-var-html-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
