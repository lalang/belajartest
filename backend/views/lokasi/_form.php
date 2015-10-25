<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Lokasi */
/* @var $form yii\widgets\ActiveForm */
?>
        <div class="lokasi-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'kode')->textInput(['maxlength' => true, 'placeholder' => 'Kode']) ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

            <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'latitude')->textInput(['placeholder' => 'Latitude']) ?>

            <?= $form->field($model, 'longtitude')->textInput(['placeholder' => 'Longtitude']) ?>

            <?= $form->field($model, 'propinsi')->textInput(['placeholder' => 'Propinsi']) ?>

            <?= $form->field($model, 'kabupaten_kota')->textInput(['maxlength' => true, 'placeholder' => 'Kabupaten Kota']) ?>

            <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Kecamatan']) ?>

            <?= $form->field($model, 'kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Kelurahan']) ?>

            <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N',], ['prompt' => '']) ?>

            <div class="form-group">
                <?= Html::button(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'goBack()']) ?>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    