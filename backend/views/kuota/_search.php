<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KuotaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kuota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lokasi_id') ?>

    <?= $form->field($model, 'sesi_1_kuota') ?>

    <?= $form->field($model, 'sesi_1_mulai') ?>

    <?= $form->field($model, 'sesi_1_selesai') ?>

    <?php // echo $form->field($model, 'sesi_2_kuota') ?>

    <?php // echo $form->field($model, 'sesi_2_mulai') ?>

    <?php // echo $form->field($model, 'sesi_2_selesai') ?>

    <?php // echo $form->field($model, 'sesi_3_kuota') ?>

    <?php // echo $form->field($model, 'sesi_3_mulai') ?>

    <?php // echo $form->field($model, 'sesi_3_selesai') ?>

    <div class="box-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'Search <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
