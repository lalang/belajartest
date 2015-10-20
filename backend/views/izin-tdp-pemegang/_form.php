<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPemegang */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-tdp-pemegang-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'izin_tdp_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\IzinTdp::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Izin tdp'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pemegang Nama']) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pemegang Kodepos']) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_tlpn')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pemegang Tlpn']) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_kewarganegaraan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pemegang Kewarganegaraan']) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pemegang Npwp']) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_jum_saham')->textInput(['placeholder' => 'Izin Tdp Pemegang Jum Saham']) ?>

    <?= $form->field($model, 'izin_tdp_pemegang_jum_modal')->textInput(['placeholder' => 'Izin Tdp Pemegang Jum Modal']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
