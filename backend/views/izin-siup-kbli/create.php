<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiupKbli */

$this->title = Yii::t('app', 'Create Izin Siup Kbli');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Siup Kbli'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-siup-kbli-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
