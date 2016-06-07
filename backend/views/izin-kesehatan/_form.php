<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKesehatan */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinKesehatanJadwal', 
        'relID' => 'izin-kesehatan-jadwal', 
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinKesehatanJadwalDua', 
        'relID' => 'izin-kesehatan-jadwal-dua', 
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwalDuas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinKesehatanJadwalSatu', 
        'relID' => 'izin-kesehatan-jadwal-satu', 
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwalSatus),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="izin-kesehatan-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

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

    <?= $form->field($model, 'lokasi_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'tipe')->dropDownList([ 'Perusahaan' => 'Perusahaan', 'Perorangan' => 'Perorangan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) ?>

    <?= $form->field($model, 'propinsi_id')->textInput(['placeholder' => 'Propinsi']) ?>

    <?= $form->field($model, 'wilayah_id')->textInput(['placeholder' => 'Wilayah']) ?>

    <?= $form->field($model, 'kecamatan_id')->textInput(['placeholder' => 'Kecamatan']) ?>

    <?= $form->field($model, 'kelurahan_id')->textInput(['placeholder' => 'Kelurahan']) ?>

    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'kitas')->textInput(['maxlength' => true, 'placeholder' => 'Kitas']) ?>

    <?= $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'status_sip_offline')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jumlah_sip_offline')->textInput(['placeholder' => 'Jumlah Sip Offline']) ?>

    <?= $form->field($model, 'nomor_str')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Str']) ?>

    <?= $form->field($model, 'tanggal_berlaku_str')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Str')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'perguruan_tinggi')->textInput(['maxlength' => true, 'placeholder' => 'Perguruan Tinggi']) ?>

    <?= $form->field($model, 'tanggal_lulus')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lulus')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nomor_rekomendasi')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Rekomendasi']) ?>

    <?= $form->field($model, 'kepegawaian_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kepegawaian::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Kepegawaian')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nomor_fasilitas_kesehatan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Fasilitas Kesehatan']) ?>

    <?= $form->field($model, 'tanggal_fasilitas_kesehatan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Fasilitas Kesehatan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nomor_pimpinan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Pimpinan']) ?>

    <?= $form->field($model, 'tanggal_pimpinan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pimpinan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'npwp_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Tempat Praktik']) ?>

    <?= $form->field($model, 'nama_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktik']) ?>

    <?= $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true, 'placeholder' => 'Titik Koordinat']) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) ?>

    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => true, 'placeholder' => 'Longtitude']) ?>

    <?= $form->field($model, 'nama_gedung_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Praktik']) ?>

    <?= $form->field($model, 'blok_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Blok Tempat Praktik']) ?>

    <?= $form->field($model, 'alamat_tempat_praktik')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Rt Tempat Praktik']) ?>

    <?= $form->field($model, 'rw_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Rw Tempat Praktik']) ?>

    <?= $form->field($model, 'wilayah_id_tempat_praktik')->textInput(['placeholder' => 'Wilayah Id Tempat Praktik']) ?>

    <?= $form->field($model, 'kecamatan_id_tempat_praktik')->textInput(['placeholder' => 'Kecamatan Id Tempat Praktik']) ?>

    <?= $form->field($model, 'kelurahan_id_tempat_praktik')->textInput(['placeholder' => 'Kelurahan Id Tempat Praktik']) ?>

    <?= $form->field($model, 'kodepos_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Tempat Praktik']) ?>

    <?= $form->field($model, 'telpon_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Tempat Praktik']) ?>

    <?= $form->field($model, 'fax_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Fax Tempat Praktik']) ?>

    <?= $form->field($model, 'email_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Email Tempat Praktik']) ?>

    <?= $form->field($model, 'nomor_izin_kesehatan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Izin Kesehatan']) ?>

    <?= $form->field($model, 'jenis_praktik_i')->dropDownList([ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktik I']) ?>

    <?= $form->field($model, 'nomor_sip_i')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Sip I']) ?>

    <?= $form->field($model, 'tanggal_berlaku_sip_i')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Sip I')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nama_gedung_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Praktik I']) ?>

    <?= $form->field($model, 'blok_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Blok Tempat Praktik I']) ?>

    <?= $form->field($model, 'alamat_tempat_praktik_i')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Rt Tempat Praktik I']) ?>

    <?= $form->field($model, 'rw_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Rw Tempat Praktik I']) ?>

    <?= $form->field($model, 'propinsi_id_tempat_praktik_i')->textInput(['placeholder' => 'Propinsi Id Tempat Praktik I']) ?>

    <?= $form->field($model, 'wilayah_id_tempat_praktik_i')->textInput(['placeholder' => 'Wilayah Id Tempat Praktik I']) ?>

    <?= $form->field($model, 'kecamatan_id_tempat_praktik_i')->textInput(['placeholder' => 'Kecamatan Id Tempat Praktik I']) ?>

    <?= $form->field($model, 'kelurahan_id_tempat_praktik_i')->textInput(['placeholder' => 'Kelurahan Id Tempat Praktik I']) ?>

    <?= $form->field($model, 'telpon_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Tempat Praktik I']) ?>

    <?= $form->field($model, 'jenis_praktik_ii')->dropDownList([ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'nomor_sip_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Sip Ii']) ?>

    <?= $form->field($model, 'tanggal_berlaku_sip_ii')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Sip Ii')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nama_gedung_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Praktik Ii']) ?>

    <?= $form->field($model, 'blok_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Blok Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'alamat_tempat_praktik_ii')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Rt Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'rw_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Rw Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'propinsi_id_tempat_praktik_ii')->textInput(['placeholder' => 'Propinsi Id Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'wilayah_id_tempat_praktik_ii')->textInput(['placeholder' => 'Wilayah Id Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'kecamatan_id_tempat_praktik_ii')->textInput(['placeholder' => 'Kecamatan Id Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'kelurahan_id_tempat_praktik_ii')->textInput(['placeholder' => 'Kelurahan Id Tempat Praktik Ii']) ?>

    <?= $form->field($model, 'telpon_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Tempat Praktik Ii']) ?>

    <div class="form-group" id="add-izin-kesehatan-jadwal"></div>

    <div class="form-group" id="add-izin-kesehatan-jadwal-dua"></div>

    <div class="form-group" id="add-izin-kesehatan-jadwal-satu"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
