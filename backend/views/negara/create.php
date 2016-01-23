<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Negara */

$this->title = Yii::t('app', 'Create Negara');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Negara'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negara-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
