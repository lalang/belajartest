<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiupAkta */

$this->title = Yii::t('app', 'Create Izin Siup Akta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Siup Akta'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-siup-akta-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
