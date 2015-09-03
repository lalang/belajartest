<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanDokumenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-dokumen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'perizinan_id') ?>

    <?= $form->field($model, 'dokumen_pendukung_id') ?>

    <?= $form->field($model, 'urutan') ?>

    <?= $form->field($model, 'isi') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'check') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'user_check') ?>

    <?php // echo $form->field($model, 'time_check') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
