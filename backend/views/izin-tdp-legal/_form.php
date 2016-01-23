<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpLegal */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-tdp-legal-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'izin_tdp_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\IzinTdp::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Izin tdp')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'jenis')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\JenisIzin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Jenis izin')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor']) ?>

    <?= $form->field($model, 'dikeluarkan_oleh')->textInput(['maxlength' => true, 'placeholder' => 'Dikeluarkan Oleh']) ?>

    <?= $form->field($model, 'tanggal_dikeluarkan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Dikeluarkan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'masa_laku')->textInput(['placeholder' => 'Masa Laku']) ?>

    <?= $form->field($model, 'masa_laku_satuan')->dropDownList([ 'Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Hari' => 'Hari', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'create_by')->textInput(['placeholder' => 'Create By']) ?>

    <?= $form->field($model, 'create_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Create Date')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'update_by')->textInput(['placeholder' => 'Update By']) ?>

    <?= $form->field($model, 'update_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Update Date')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
