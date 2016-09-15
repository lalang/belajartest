<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisata */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataAkta', 
        'relID' => 'izin-pariwisata-akta', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataAktas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataFasilitas', 
        'relID' => 'izin-pariwisata-fasilitas', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataFasilitas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataJenisManum', 
        'relID' => 'izin-pariwisata-jenis-manum', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataJenisManums),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataKapasitasAkomodasi', 
        'relID' => 'izin-pariwisata-kapasitas-akomodasi', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataKapasitasAkomodasis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataKapasitasTransport', 
        'relID' => 'izin-pariwisata-kapasitas-transport', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataKapasitasTransports),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataKbli', 
        'relID' => 'izin-pariwisata-kbli', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataKblis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataTeknis', 
        'relID' => 'izin-pariwisata-teknis', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataTeknis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPariwisataTujuanWisata', 
        'relID' => 'izin-pariwisata-tujuan-wisata', 
        'value' => \yii\helpers\Json::encode($model->izinPariwisataTujuanWisatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="izin-pariwisata-form">

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

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) ?>

    <?= $form->field($model, 'propinsi_id')->textInput(['placeholder' => 'Propinsi']) ?>

    <?= $form->field($model, 'wilayah_id')->textInput(['placeholder' => 'Wilayah']) ?>

    <?= $form->field($model, 'kecamatan_id')->textInput(['placeholder' => 'Kecamatan']) ?>

    <?= $form->field($model, 'kelurahan_id')->textInput(['placeholder' => 'Kelurahan']) ?>

    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>

    <?= $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'kitas')->textInput(['maxlength' => true, 'placeholder' => 'Kitas']) ?>

    <?= $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) ?>

    <?= $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan']) ?>

    <?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) ?>

    <?= $form->field($model, 'nama_gedung_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Perusahaan']) ?>

    <?= $form->field($model, 'blok_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Blok Perusahaan']) ?>

    <?= $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'propinsi_id_perusahaan')->textInput(['placeholder' => 'Propinsi Id Perusahaan']) ?>

    <?= $form->field($model, 'wilayah_id_perusahaan')->textInput(['placeholder' => 'Wilayah Id Perusahaan']) ?>

    <?= $form->field($model, 'kecamatan_id_perusahaan')->textInput(['placeholder' => 'Kecamatan Id Perusahaan']) ?>

    <?= $form->field($model, 'kelurahan_id_perusahaan')->textInput(['placeholder' => 'Kelurahan Id Perusahaan']) ?>

    <?= $form->field($model, 'kodepos_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan']) ?>

    <?= $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) ?>

    <?= $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) ?>

    <?= $form->field($model, 'email_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Email Perusahaan']) ?>

    <?= $form->field($model, 'nomor_akta_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Akta Pendirian']) ?>

    <?= $form->field($model, 'tanggal_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pendirian')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nama_notaris_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pendirian']) ?>

    <?= $form->field($model, 'nomor_sk_pengesahan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Sk Pengesahan']) ?>

    <?= $form->field($model, 'tanggal_pengesahan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pengesahan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nomor_akta_cabang')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Akta Cabang']) ?>

    <?= $form->field($model, 'tanggal_cabang')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Cabang')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nama_notaris_cabang')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Cabang']) ?>

    <?= $form->field($model, 'keputusan_cabang')->textInput(['maxlength' => true, 'placeholder' => 'Keputusan Cabang']) ?>

    <?= $form->field($model, 'tanggal_keputusan_cabang')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Keputusan Cabang')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'identitas_sama')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nik_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Nik Penanggung Jawab']) ?>

    <?= $form->field($model, 'nama_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Nama Penanggung Jawab']) ?>

    <?= $form->field($model, 'tempat_lahir_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Penanggung Jawab']) ?>

    <?= $form->field($model, 'tanggal_lahir_penanggung_jawab')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir Penanggung Jawab')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'jenkel_penanggung_jawab')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat_penanggung_jawab')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Rt Penanggung Jawab']) ?>

    <?= $form->field($model, 'rw_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Rw Penanggung Jawab']) ?>

    <?= $form->field($model, 'propinsi_id_penanggung_jawab')->textInput(['placeholder' => 'Propinsi Id Penanggung Jawab']) ?>

    <?= $form->field($model, 'wilayah_id_penanggung_jawab')->textInput(['placeholder' => 'Wilayah Id Penanggung Jawab']) ?>

    <?= $form->field($model, 'kecamatan_id_penanggung_jawab')->textInput(['placeholder' => 'Kecamatan Id Penanggung Jawab']) ?>

    <?= $form->field($model, 'kelurahan_id_penanggung_jawab')->textInput(['placeholder' => 'Kelurahan Id Penanggung Jawab']) ?>

    <?= $form->field($model, 'kodepos_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Penanggung Jawab']) ?>

    <?= $form->field($model, 'telepon_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Penanggung Jawab']) ?>

    <?= $form->field($model, 'kewarganegaraan_id_penanggung_jawab')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'kitas_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Kitas Penanggung Jawab']) ?>

    <?= $form->field($model, 'passport_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Passport Penanggung Jawab']) ?>

    <?= $form->field($model, 'no_tdup')->textInput(['maxlength' => true, 'placeholder' => 'No Tdup']) ?>

    <?= $form->field($model, 'tanggal_tdup')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Tdup')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'merk_nama_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Merk Nama Usaha']) ?>

    <?= $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true, 'placeholder' => 'Titik Koordinat']) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) ?>

    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => true, 'placeholder' => 'Longtitude']) ?>

    <?= $form->field($model, 'nama_gedung_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Usaha']) ?>

    <?= $form->field($model, 'blok_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Blok Usaha']) ?>

    <?= $form->field($model, 'alamat_usaha')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Rt Usaha']) ?>

    <?= $form->field($model, 'rw_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Rw Usaha']) ?>

    <?= $form->field($model, 'wilayah_id_usaha')->textInput(['placeholder' => 'Wilayah Id Usaha']) ?>

    <?= $form->field($model, 'kecamatan_id_usaha')->textInput(['placeholder' => 'Kecamatan Id Usaha']) ?>

    <?= $form->field($model, 'kelurahan_id_usaha')->textInput(['placeholder' => 'Kelurahan Id Usaha']) ?>

    <?= $form->field($model, 'kodepos_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Usaha']) ?>

    <?= $form->field($model, 'telpon_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Usaha']) ?>

    <?= $form->field($model, 'fax_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Fax Usaha']) ?>

    <?= $form->field($model, 'nomor_objek_pajak_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Objek Pajak Usaha']) ?>

    <?= $form->field($model, 'jumlah_karyawan')->textInput(['placeholder' => 'Jumlah Karyawan']) ?>

    <?= $form->field($model, 'npwpd')->textInput(['maxlength' => true, 'placeholder' => 'Npwpd']) ?>

    <?= $form->field($model, 'intensitas_jasa_perjalanan')->textInput(['placeholder' => 'Intensitas Jasa Perjalanan']) ?>

    <?= $form->field($model, 'kapasitas_penyedia_akomodasi')->textInput(['placeholder' => 'Kapasitas Penyedia Akomodasi']) ?>

    <?= $form->field($model, 'jum_kursi_jasa_manum')->textInput(['placeholder' => 'Jum Kursi Jasa Manum']) ?>

    <?= $form->field($model, 'jum_stand_jasa_manum')->textInput(['placeholder' => 'Jum Stand Jasa Manum']) ?>

    <?= $form->field($model, 'jum_pack_jasa_manum')->textInput(['placeholder' => 'Jum Pack Jasa Manum']) ?>

    <div class="form-group" id="add-izin-pariwisata-akta"></div>

    <div class="form-group" id="add-izin-pariwisata-fasilitas"></div>

    <div class="form-group" id="add-izin-pariwisata-jenis-manum"></div>

    <div class="form-group" id="add-izin-pariwisata-kapasitas-akomodasi"></div>

    <div class="form-group" id="add-izin-pariwisata-kapasitas-transport"></div>

    <div class="form-group" id="add-izin-pariwisata-kbli"></div>

    <div class="form-group" id="add-izin-pariwisata-teknis"></div>

    <div class="form-group" id="add-izin-pariwisata-tujuan-wisata"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
