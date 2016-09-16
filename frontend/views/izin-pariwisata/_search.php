<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPariwisataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-izin-pariwisata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'perizinan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Perizinan')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'izin_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Izin')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Status')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?php /* echo $form->field($model, 'lokasi_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'tipe')->dropDownList([ 'Perusahaan' => 'Perusahaan', 'Perorangan' => 'Perorangan', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik']) */ ?>

    <?php /* echo $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) */ ?>

    <?php /* echo $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'jenkel')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'alamat')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) */ ?>

    <?php /* echo $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) */ ?>

    <?php /* echo $form->field($model, 'propinsi_id')->textInput(['placeholder' => 'Propinsi']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id')->textInput(['placeholder' => 'Wilayah']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id')->textInput(['placeholder' => 'Kecamatan']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id')->textInput(['placeholder' => 'Kelurahan']) */ ?>

    <?php /* echo $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) */ ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) */ ?>

    <?php /* echo $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'kitas')->textInput(['maxlength' => true, 'placeholder' => 'Kitas']) */ ?>

    <?php /* echo $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) */ ?>

    <?php /* echo $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'nama_gedung_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'blok_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Blok Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'propinsi_id_perusahaan')->textInput(['placeholder' => 'Propinsi Id Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id_perusahaan')->textInput(['placeholder' => 'Wilayah Id Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id_perusahaan')->textInput(['placeholder' => 'Kecamatan Id Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id_perusahaan')->textInput(['placeholder' => 'Kelurahan Id Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'kodepos_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'email_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Email Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'nomor_akta_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Akta Pendirian']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pendirian')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nama_notaris_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pendirian']) */ ?>

    <?php /* echo $form->field($model, 'nomor_sk_pengesahan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Sk Pengesahan']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_pengesahan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pengesahan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nomor_akta_cabang')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Akta Cabang']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_cabang')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Cabang')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nama_notaris_cabang')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Cabang']) */ ?>

    <?php /* echo $form->field($model, 'keputusan_cabang')->textInput(['maxlength' => true, 'placeholder' => 'Keputusan Cabang']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_keputusan_cabang')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Keputusan Cabang')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'identitas_sama')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'nik_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Nik Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'nama_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Nama Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'tempat_lahir_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_lahir_penanggung_jawab')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir Penanggung Jawab')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'jenkel_penanggung_jawab')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'alamat_penanggung_jawab')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Rt Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'rw_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Rw Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'propinsi_id_penanggung_jawab')->textInput(['placeholder' => 'Propinsi Id Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id_penanggung_jawab')->textInput(['placeholder' => 'Wilayah Id Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id_penanggung_jawab')->textInput(['placeholder' => 'Kecamatan Id Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id_penanggung_jawab')->textInput(['placeholder' => 'Kelurahan Id Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'kodepos_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'telepon_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'kewarganegaraan_id_penanggung_jawab')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'kitas_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Kitas Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'passport_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Passport Penanggung Jawab']) */ ?>

    <?php /* echo $form->field($model, 'no_tdup')->textInput(['maxlength' => true, 'placeholder' => 'No Tdup']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_tdup')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Tdup')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'merk_nama_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Merk Nama Usaha']) */ ?>

    <?php /* echo $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true, 'placeholder' => 'Titik Koordinat']) */ ?>

    <?php /* echo $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) */ ?>

    <?php /* echo $form->field($model, 'longtitude')->textInput(['maxlength' => true, 'placeholder' => 'Longtitude']) */ ?>

    <?php /* echo $form->field($model, 'nama_gedung_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Usaha']) */ ?>

    <?php /* echo $form->field($model, 'blok_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Blok Usaha']) */ ?>

    <?php /* echo $form->field($model, 'alamat_usaha')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Rt Usaha']) */ ?>

    <?php /* echo $form->field($model, 'rw_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Rw Usaha']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id_usaha')->textInput(['placeholder' => 'Wilayah Id Usaha']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id_usaha')->textInput(['placeholder' => 'Kecamatan Id Usaha']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id_usaha')->textInput(['placeholder' => 'Kelurahan Id Usaha']) */ ?>

    <?php /* echo $form->field($model, 'kodepos_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Usaha']) */ ?>

    <?php /* echo $form->field($model, 'telpon_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Usaha']) */ ?>

    <?php /* echo $form->field($model, 'fax_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Fax Usaha']) */ ?>

    <?php /* echo $form->field($model, 'nomor_objek_pajak_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Objek Pajak Usaha']) */ ?>

    <?php /* echo $form->field($model, 'jumlah_karyawan')->textInput(['placeholder' => 'Jumlah Karyawan']) */ ?>

    <?php /* echo $form->field($model, 'npwpd')->textInput(['maxlength' => true, 'placeholder' => 'Npwpd']) */ ?>

    <?php /* echo $form->field($model, 'intensitas_jasa_perjalanan')->textInput(['placeholder' => 'Intensitas Jasa Perjalanan']) */ ?>

    <?php /* echo $form->field($model, 'kapasitas_penyedia_akomodasi')->textInput(['placeholder' => 'Kapasitas Penyedia Akomodasi']) */ ?>

    <?php /* echo $form->field($model, 'jum_kursi_jasa_manum')->textInput(['placeholder' => 'Jum Kursi Jasa Manum']) */ ?>

    <?php /* echo $form->field($model, 'jum_stand_jasa_manum')->textInput(['placeholder' => 'Jum Stand Jasa Manum']) */ ?>

    <?php /* echo $form->field($model, 'jum_pack_jasa_manum')->textInput(['placeholder' => 'Jum Pack Jasa Manum']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
