<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiupAktaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-siup-akta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'izin_siup_id') ?>

    <?= $form->field($model, 'nomor_akta') ?>

    <?= $form->field($model, 'tanggal_akta') ?>

    <?= $form->field($model, 'nomor_pengesahan') ?>

    <?php // echo $form->field($model, 'tanggal_pengesahan') ?>

    <div class="box-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'Search <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
