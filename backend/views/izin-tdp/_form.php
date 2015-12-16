<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-tdp-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'bentuk_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Bentuk Perusahaan']) ?>

    <?= $form->field($model, 'perizinan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Perizinan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'izin_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Izin'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Status'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan Ke']) ?>

    <?= $form->field($model, 'iii_1_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Iii 1 Nama Kelompok']) ?>

    <?= $form->field($model, 'iii_2_status_prsh')->dropDownList([ 'Kantor Tunggal' => 'Kantor Tunggal', 'Kantor Pusat' => 'Kantor Pusat', 'Kantor Cabang' => 'Kantor Cabang', 'Kantor Pembantu' => 'Kantor Pembantu', 'Perwakilan' => 'Perwakilan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'iii_2_induk_nama_prsh')->textInput(['maxlength' => true, 'placeholder' => 'Iii 2 Induk Nama Prsh']) ?>

    <?= $form->field($model, 'iii_2_induk_nomor_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Iii 2 Induk Nomor Tdp']) ?>

    <?= $form->field($model, 'iii_2_induk_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Iii 2 Induk Alamat']) ?>

    <?= $form->field($model, 'iii_2_induk_propinsi')->textInput(['placeholder' => 'Iii 2 Induk Propinsi']) ?>

    <?= $form->field($model, 'iii_2_induk_kabupaten')->textInput(['placeholder' => 'Iii 2 Induk Kabupaten']) ?>

    <?= $form->field($model, 'iii_2_induk_kecamatan')->textInput(['placeholder' => 'Iii 2 Induk Kecamatan']) ?>

    <?= $form->field($model, 'iii_2_induk_kelurahan')->textInput(['placeholder' => 'Iii 2 Induk Kelurahan']) ?>

    <?= $form->field($model, 'iii_3_lokasi_unit_produksi')->textInput(['maxlength' => true, 'placeholder' => 'Iii 3 Lokasi Unit Produksi']) ?>

    <?= $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi')->textInput(['placeholder' => 'Iii 3 Lokasi Unit Produksi Propinsi']) ?>

    <?= $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten')->textInput(['placeholder' => 'Iii 3 Lokasi Unit Produksi Kabupaten']) ?>

    <?= $form->field($model, 'iii_4_bank_utama_1')->textInput(['maxlength' => true, 'placeholder' => 'Iii 4 Bank Utama 1']) ?>

    <?= $form->field($model, 'iii_4_bank_utama_2')->textInput(['maxlength' => true, 'placeholder' => 'Iii 4 Bank Utama 2']) ?>

    <?= $form->field($model, 'iii_4_jumlah_bank')->textInput(['placeholder' => 'Iii 4 Jumlah Bank']) ?>

    <?= $form->field($model, 'iii_7b_tgl_mulai_kegiatan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Iii 7b Tgl Mulai Kegiatan'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iii_8_bentuk_kerjasama_pihak3')->dropDownList([ '(Tidak Ada' => '(Tidak Ada', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'iii_9a_merek_dagang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9a Merek Dagang Nama']) ?>

    <?= $form->field($model, 'iii_9a_merek_dagang_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9a Merek Dagang Nomor']) ?>

    <?= $form->field($model, 'iii_9b_hak_paten_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9b Hak Paten Nama']) ?>

    <?= $form->field($model, 'iii_9b_hak_paten_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9b Hak Paten Nomor']) ?>

    <?= $form->field($model, 'iii_9c_hak_cipta_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9c Hak Cipta Nama']) ?>

    <?= $form->field($model, 'iii_9c_hak_cipta_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9c Hak Cipta Nomor']) ?>

    <?= $form->field($model, 'iv_a1_notaris_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iv A1 Notaris Nama']) ?>

    <?= $form->field($model, 'iv_a1_notaris_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Iv A1 Notaris Alamat']) ?>

    <?= $form->field($model, 'iv_a1_telpon')->textInput(['maxlength' => true, 'placeholder' => 'Iv A1 Telpon']) ?>

    <?= $form->field($model, 'iv_a2_notaris')->textInput(['maxlength' => true, 'placeholder' => 'Iv A2 Notaris']) ?>

    <?= $form->field($model, 'iv_a4_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A4 Nomor']) ?>

    <?= $form->field($model, 'iv_a4_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Iv A4 Tanggal'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iv_a5_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A5 Nomor']) ?>

    <?= $form->field($model, 'iv_a5_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Iv A5 Tanggal'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iv_a6_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A6 Nomor']) ?>

    <?= $form->field($model, 'iv_a6_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Iv A6 Tanggal'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'v_jumlah_dirut')->textInput(['placeholder' => 'V Jumlah Dirut']) ?>

    <?= $form->field($model, 'v_jumlah_direktur')->textInput(['placeholder' => 'V Jumlah Direktur']) ?>

    <?= $form->field($model, 'v_jumlah_komisaris')->textInput(['placeholder' => 'V Jumlah Komisaris']) ?>

    <?= $form->field($model, 'vi_jumlah_pemegang_saham')->textInput(['placeholder' => 'Vi Jumlah Pemegang Saham']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
