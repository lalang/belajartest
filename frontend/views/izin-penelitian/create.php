<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPenelitian */

$this->title = 'Create Izin Penelitian';
$this->params['breadcrumbs'][] = ['label' => 'Izin Penelitian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-penelitian-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
