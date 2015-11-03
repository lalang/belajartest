<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Popup */


$this->title = Yii::t('app', 'Update {modelClass}', [
    'modelClass' => 'Popup',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Popup'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="popup-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
