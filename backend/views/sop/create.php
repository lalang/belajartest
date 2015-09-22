<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sop */

$this->title = Yii::t('app', 'Create Sop');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sop'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
