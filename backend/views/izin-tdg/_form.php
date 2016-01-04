<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdg */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-tdg-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

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

    <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Status'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'tipe')->dropDownList([ 'Perusahaan' => 'Perusahaan', 'Perorangan' => 'Perorangan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pemilik_nik')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Nik']) ?>

    <?= $form->field($model, 'pemilik_pengenal')->dropDownList([ 'NIK' => 'NIK', 'KITAS' => 'KITAS', 'PASPOR' => 'PASPOR', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Nama']) ?>

    <?= $form->field($model, 'pemilik_alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pemilik_rt')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Rt']) ?>

    <?= $form->field($model, 'pemilik_rw')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Rw']) ?>

    <?= $form->field($model, 'pemilik_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Propinsi']) ?>

    <?= $form->field($model, 'pemilik_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kabupaten']) ?>

    <?= $form->field($model, 'pemilik_kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kecamatan']) ?>

    <?= $form->field($model, 'pemilik_kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kelurahan']) ?>

    <?= $form->field($model, 'pemilik_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Kodepos']) ?>

    <?= $form->field($model, 'pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Telepon']) ?>

    <?= $form->field($model, 'pemilik_fax')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Fax']) ?>

    <?= $form->field($model, 'pemilik_email')->textInput(['maxlength' => true, 'placeholder' => 'Pemilik Email']) ?>

    <?= $form->field($model, 'perusahaan_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Npwp']) ?>

    <?= $form->field($model, 'perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Nama']) ?>

    <?= $form->field($model, 'perusahaan_namagedung')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Namagedung']) ?>

    <?= $form->field($model, 'perusahaan_blok_lantai')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Blok Lantai']) ?>

    <?= $form->field($model, 'perusahaan_namajalan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perusahaan_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Propinsi']) ?>

    <?= $form->field($model, 'perusahaan_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kabupaten']) ?>

    <?= $form->field($model, 'perusahaan_kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kecamatan']) ?>

    <?= $form->field($model, 'perusahaan_kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kelurahan']) ?>

    <?= $form->field($model, 'perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Kodepos']) ?>

    <?= $form->field($model, 'perusahaan_fax')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Fax']) ?>

    <?= $form->field($model, 'perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Perusahaan Email']) ?>

    <?= $form->field($model, 'gudang_koordinat_1')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Koordinat 1']) ?>

    <?= $form->field($model, 'gudang_koordinat_2')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Koordinat 2']) ?>

    <?= $form->field($model, 'gudang_blok_lantai')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Blok Lantai']) ?>

    <?= $form->field($model, 'gudang_namajalan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gudang_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Propinsi']) ?>

    <?= $form->field($model, 'gudang_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Kabupaten']) ?>

    <?= $form->field($model, 'gudang_kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Kecamatan']) ?>

    <?= $form->field($model, 'gudang_kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Kelurahan']) ?>

    <?= $form->field($model, 'gudang_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Kodepos']) ?>

    <?= $form->field($model, 'gudang_telepon')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Telepon']) ?>

    <?= $form->field($model, 'gudang_fax')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Fax']) ?>

    <?= $form->field($model, 'gudang_email')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Email']) ?>

    <?= $form->field($model, 'gudang_luas')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Luas']) ?>

    <?= $form->field($model, 'gudang_kapasitas')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Kapasitas']) ?>

    <?= $form->field($model, 'gudang_kapasitas_satuan')->dropDownList([ 'M3' => 'M3', 'TON' => 'TON', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'gudang_nilai')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Nilai']) ?>

    <?= $form->field($model, 'gudang_komposisi_nasional')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Komposisi Nasional']) ?>

    <?= $form->field($model, 'gudang_komposisi_asing')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Komposisi Asing']) ?>

    <?= $form->field($model, 'gudang_kelengkapan')->dropDownList([ 'Berpendingin' => 'Berpendingin', 'Tidak berpendingin' => 'Tidak berpendingin', 'Keduanya' => 'Keduanya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'gudang_sarana_listrik')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Sarana Listrik']) ?>

    <?= $form->field($model, 'gudang_sarana_air')->dropDownList([ 'PAM' => 'PAM', 'Sumur bor' => 'Sumur bor', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'gudang_sarana_pendingin')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Sarana Pendingin']) ?>

    <?= $form->field($model, 'gudang_sarana_forklif')->textInput(['placeholder' => 'Gudang Sarana Forklif']) ?>

    <?= $form->field($model, 'gudang_sarana_komputer')->textInput(['placeholder' => 'Gudang Sarana Komputer']) ?>

    <?= $form->field($model, 'gudang_kepemilikan')->dropDownList([ 'Milik sendiri' => 'Milik sendiri', 'Sewa' => 'Sewa', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'gudang_imb_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Imb Nomor']) ?>

    <?= $form->field($model, 'gudang_imb_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Gudang Imb Tanggal'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'gudang_uug_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Gudang Uug Nomor']) ?>

    <?= $form->field($model, 'gudang_uug_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Gudang Uug Tanggal'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'gudang_uug_berlaku')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Gudang Uug Berlaku'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'gudang_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hs_koordinat_1')->textInput(['maxlength' => true, 'placeholder' => 'Hs Koordinat 1']) ?>

    <?= $form->field($model, 'hs_koordinat_2')->textInput(['maxlength' => true, 'placeholder' => 'Hs Koordinat 2']) ?>

    <?= $form->field($model, 'hs_namagedung')->textInput(['maxlength' => true, 'placeholder' => 'Hs Namagedung']) ?>

    <?= $form->field($model, 'hs_blok_lantai')->textInput(['maxlength' => true, 'placeholder' => 'Hs Blok Lantai']) ?>

    <?= $form->field($model, 'hs_namajalan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hs_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Hs Propinsi']) ?>

    <?= $form->field($model, 'hs_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Hs Kabupaten']) ?>

    <?= $form->field($model, 'hs_kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Hs Kecamatan']) ?>

    <?= $form->field($model, 'hs_kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Hs Kelurahan']) ?>

    <?= $form->field($model, 'hs_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Hs Kodepos']) ?>

    <?= $form->field($model, 'hs_telepon')->textInput(['maxlength' => true, 'placeholder' => 'Hs Telepon']) ?>

    <?= $form->field($model, 'hs_fax')->textInput(['maxlength' => true, 'placeholder' => 'Hs Fax']) ?>

    <?= $form->field($model, 'hs_email')->textInput(['maxlength' => true, 'placeholder' => 'Hs Email']) ?>

    <?= $form->field($model, 'hs_luas')->textInput(['maxlength' => true, 'placeholder' => 'Hs Luas']) ?>

    <?= $form->field($model, 'hs_kapasitas')->textInput(['maxlength' => true, 'placeholder' => 'Hs Kapasitas']) ?>

    <?= $form->field($model, 'hs_kapasitas_satuan')->dropDownList([ 'M3' => 'M3', 'TON' => 'TON', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hs_nilai')->textInput(['maxlength' => true, 'placeholder' => 'Hs Nilai']) ?>

    <?= $form->field($model, 'hs_komposisi_nasional')->textInput(['maxlength' => true, 'placeholder' => 'Hs Komposisi Nasional']) ?>

    <?= $form->field($model, 'hs_komposisi_asing')->textInput(['maxlength' => true, 'placeholder' => 'Hs Komposisi Asing']) ?>

    <?= $form->field($model, 'hs_kelengkapan')->dropDownList([ 'Berpendingin' => 'Berpendingin', 'Tidak berpendingin' => 'Tidak berpendingin', 'Keduanya' => 'Keduanya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hs_sarana_listrik')->textInput(['maxlength' => true, 'placeholder' => 'Hs Sarana Listrik']) ?>

    <?= $form->field($model, 'hs_sarana_air')->dropDownList([ 'PAM' => 'PAM', 'Sumur bor' => 'Sumur bor', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hs_sarana_pendingin')->textInput(['maxlength' => true, 'placeholder' => 'Hs Sarana Pendingin']) ?>

    <?= $form->field($model, 'hs_sarana_forklif')->textInput(['placeholder' => 'Hs Sarana Forklif']) ?>

    <?= $form->field($model, 'hs_sarana_komputer')->textInput(['placeholder' => 'Hs Sarana Komputer']) ?>

    <?= $form->field($model, 'hs_kepemilikan')->dropDownList([ 'Milik sendiri' => 'Milik sendiri', 'Sewa' => 'Sewa', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hs_imb_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Hs Imb Nomor']) ?>

    <?= $form->field($model, 'hs_imb_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Hs Imb Tanggal'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'hs_uug_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Hs Uug Nomor']) ?>

    <?= $form->field($model, 'hs_uug_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Hs Uug Tanggal'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'hs_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bapl_file')->textInput(['maxlength' => true, 'placeholder' => 'Bapl File']) ?>

    <?= $form->field($model, 'catatan_tambahan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_by')->textInput(['placeholder' => 'Create By']) ?>

    <?= $form->field($model, 'create_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Create Date'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'update_by')->textInput(['placeholder' => 'Update By']) ?>

    <?= $form->field($model, 'update_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Update Date'],
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
