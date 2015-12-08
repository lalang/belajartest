<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSiupOffline */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="perizinan-siup-offline-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'no_izin')->textInput(['maxlength' => true, 'placeholder' => 'No Izin']) ?>

    <?= $form->field($model, 'pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Nama']) ?>

    <?= $form->field($model, 'pemilik_tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Tempat Lahir']) ?>
	
	<?= $form->field($model, 'pemilik_tanggal_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Pemilik Tanggal Lahir')],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'pemilik_alamat_rumah')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Alamat Rumah']) ?>

    <?= $form->field($model, 'pemilik_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Propinsi']) ?>

    <?= $form->field($model, 'pemilik_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kabupaten']) ?>

    <?= $form->field($model, 'pemilik_kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kecamatan']) ?>

    <?= $form->field($model, 'pemilik_kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kelurahan']) ?>

    <?= $form->field($model, 'pemilik_no_telpon')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik No Telpon']) ?>

    <?= $form->field($model, 'pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik No Ktp']) ?>

    <?= $form->field($model, 'pemilik_kewarganegaraan')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kewarganegaraan']) ?>

    <?= $form->field($model, 'perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Nama']) ?>

    <?= $form->field($model, 'perusahaan_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Alamat']) ?>

    <?= $form->field($model, 'perusahaan_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Propinsi']) ?>

    <?= $form->field($model, 'perusahaan_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kabupaten']) ?>

    <?= $form->field($model, 'perusahaan_kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kecamatan']) ?>

    <?= $form->field($model, 'perusahaan_kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kelurahan']) ?>

    <?= $form->field($model, 'perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kodepos']) ?>

    <?= $form->field($model, 'perusahaan_no_telpon')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan No Telpon']) ?>

    <?= $form->field($model, 'perusahaan_no_fax')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan No Fax']) ?>

    <?= $form->field($model, 'perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Email']) ?>
	
	<?= $form->field($model, 'created_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Created Date')],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>
	
	<?= $form->field($model, 'updated_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Updated Date')],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
