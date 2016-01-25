<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocUserMan */

$this->title = 'Update Doc User Man: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doc User Man', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doc-user-man-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
