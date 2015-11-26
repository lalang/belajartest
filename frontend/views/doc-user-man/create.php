<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\DocUserMan */

$this->title = 'Create Document User Manual';
$this->params['breadcrumbs'][] = ['label' => 'Doc User Man', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-user-man-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
