<?php

use yii\helpers\Html;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */

$this->title = Yii::t('app', 'Buat Permohonan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Siup'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?= $this->render('_step', ['value' => 2]) ?>
    </div>
    <div class="col-sm-1"></div>
</div>
                
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
