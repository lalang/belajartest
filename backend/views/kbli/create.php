<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kbli */

$this->title = Yii::t('app', 'Create Kbli');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kbli'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kbli-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
