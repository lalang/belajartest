<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GolonganGudang */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="golongan-gudang-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'luas')->textInput(['maxlength' => true, 'placeholder' => 'Luas']) ?>

    <?= $form->field($model, 'kapasitas_penyimpanan')->textInput(['maxlength' => true, 'placeholder' => 'Kapasitas Penyimpanan']) ?>

    <?= $form->field($model, 'bentuk')->textInput(['maxlength' => true, 'placeholder' => 'Bentuk']) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
