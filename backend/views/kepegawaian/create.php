<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kepegawaian */

$this->title = Yii::t('app', 'Create Kepegawaian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kepegawaian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepegawaian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
