<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPimpinan */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-tdp-pimpinan-form">
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

    <?= $form->field($model, 'izin_tdp_pimpinan_kedudukan')->textInput(['placeholder' => 'Izin Tdp Pimpinan Kedudukan']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Nama']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan')->textInput(['placeholder' => 'Izin Tdp Pimpinan']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_tmpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Tmpt Lahir']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_tgl_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Pimpinan Tgl Lahir'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Kodepos']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_tlpn')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Tlpn']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_kewarganegara')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Kewarganegara']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_tgl_mulai')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Pimpinan Tgl Mulai'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_jum_saham')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Jum Saham']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_jum_modal')->textInput(['placeholder' => 'Izin Tdp Pimpinan Jum Modal']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_kedudukan_lain')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Kedudukan Lain']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Nama Perusahaan']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_alamat_perusahaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_kodepos_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Kodepos Perusahaan']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_tlpn_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Pimpinan Tlpn Perusahaan']) ?>

    <?= $form->field($model, 'izin_tdp_pimpinan_tgl_mulai_perusahaan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Pimpinan Tgl Mulai Perusahaan'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
