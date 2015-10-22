<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKantor */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-tdp-kantor-form">

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

    <?= $form->field($model, 'izin_tdp_kantor_nama')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kantor Nama']) ?>

    <?= $form->field($model, 'izin_tdp_kantor_notdp')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kantor Notdp']) ?>

    <?= $form->field($model, 'izin_tdp_kantor_alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'izin_tdp_kantor_kota')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kantor Kota']) ?>

    <?= $form->field($model, 'izin_tdp_kantor_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kantor Propinsi']) ?>

    <?= $form->field($model, 'izin_tdp_kantor_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kantor Kodepos']) ?>

    <?= $form->field($model, 'izin_tdp_kantor_tlpn')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kantor Tlpn']) ?>

    <?= $form->field($model, 'izin_tdp_kantor_status')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kantor Status']) ?>

    <?= $form->field($model, 'izin_tdp_kantor_kegiatan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Kbli'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
