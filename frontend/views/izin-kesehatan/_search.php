<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinKesehatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-izin-kesehatan-search">

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

    <?php /* echo $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'alamat')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) */ ?>

    <?php /* echo $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) */ ?>

    <?php /* echo $form->field($model, 'propinsi_id')->textInput(['placeholder' => 'Propinsi']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id')->textInput(['placeholder' => 'Wilayah']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id')->textInput(['placeholder' => 'Kecamatan']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id')->textInput(['placeholder' => 'Kelurahan']) */ ?>

    <?php /* echo $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) */ ?>

    <?php /* echo $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) */ ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'kitas')->textInput(['maxlength' => true, 'placeholder' => 'Kitas']) */ ?>

    <?php /* echo $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'status_sip_offline')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'jumlah_sip_offline')->textInput(['placeholder' => 'Jumlah Sip Offline']) */ ?>

    <?php /* echo $form->field($model, 'nomor_str')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Str']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_berlaku_str')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Str')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'perguruan_tinggi')->textInput(['maxlength' => true, 'placeholder' => 'Perguruan Tinggi']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_lulus')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lulus')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nomor_rekomendasi')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Rekomendasi']) */ ?>

    <?php /* echo $form->field($model, 'kepegawaian_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kepegawaian::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Kepegawaian')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'nomor_fasilitas_kesehatan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Fasilitas Kesehatan']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_fasilitas_kesehatan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Fasilitas Kesehatan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nomor_pimpinan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Pimpinan']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_pimpinan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pimpinan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'npwp_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'nama_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true, 'placeholder' => 'Titik Koordinat']) */ ?>

    <?php /* echo $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) */ ?>

    <?php /* echo $form->field($model, 'longtitude')->textInput(['maxlength' => true, 'placeholder' => 'Longtitude']) */ ?>

    <?php /* echo $form->field($model, 'nama_gedung_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Praktik']) */ ?>

    <?php /* echo $form->field($model, 'blok_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Blok Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'alamat_tempat_praktik')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Rt Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'rw_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Rw Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id_tempat_praktik')->textInput(['placeholder' => 'Wilayah Id Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id_tempat_praktik')->textInput(['placeholder' => 'Kecamatan Id Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id_tempat_praktik')->textInput(['placeholder' => 'Kelurahan Id Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'kodepos_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'telpon_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'fax_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Fax Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'email_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Email Tempat Praktik']) */ ?>

    <?php /* echo $form->field($model, 'nomor_izin_kesehatan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Izin Kesehatan']) */ ?>

    <?php /* echo $form->field($model, 'jenis_praktik_i')->dropDownList([ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'nama_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'nomor_sip_i')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Sip I']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_berlaku_sip_i')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Sip I')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nama_gedung_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'blok_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Blok Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'alamat_tempat_praktik_i')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Rt Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'rw_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Rw Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'propinsi_id_tempat_praktik_i')->textInput(['placeholder' => 'Propinsi Id Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id_tempat_praktik_i')->textInput(['placeholder' => 'Wilayah Id Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id_tempat_praktik_i')->textInput(['placeholder' => 'Kecamatan Id Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id_tempat_praktik_i')->textInput(['placeholder' => 'Kelurahan Id Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'telpon_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Tempat Praktik I']) */ ?>

    <?php /* echo $form->field($model, 'jenis_praktik_ii')->dropDownList([ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'nama_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'nomor_sip_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Sip Ii']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_berlaku_sip_ii')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Sip Ii')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nama_gedung_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'blok_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Blok Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'alamat_tempat_praktik_ii')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Rt Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'rw_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Rw Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'propinsi_id_tempat_praktik_ii')->textInput(['placeholder' => 'Propinsi Id Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id_tempat_praktik_ii')->textInput(['placeholder' => 'Wilayah Id Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id_tempat_praktik_ii')->textInput(['placeholder' => 'Kecamatan Id Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id_tempat_praktik_ii')->textInput(['placeholder' => 'Kelurahan Id Tempat Praktik Ii']) */ ?>

    <?php /* echo $form->field($model, 'telpon_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Tempat Praktik Ii']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
