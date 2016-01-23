<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpKantorcabang', 
        'relID' => 'izin-tdp-kantorcabang', 
        'value' => \yii\helpers\Json::encode($model->izinTdpKantorcabangs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpKegiatan', 
        'relID' => 'izin-tdp-kegiatan', 
        'value' => \yii\helpers\Json::encode($model->izinTdpKegiatans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpLegal', 
        'relID' => 'izin-tdp-legal', 
        'value' => \yii\helpers\Json::encode($model->izinTdpLegals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpPimpinan', 
        'relID' => 'izin-tdp-pimpinan', 
        'value' => \yii\helpers\Json::encode($model->izinTdpPimpinans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpSaham', 
        'relID' => 'izin-tdp-saham', 
        'value' => \yii\helpers\Json::encode($model->izinTdpSahams),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="izin-tdp-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'bentuk_perusahaan')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\BentukPerusahaan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bentuk perusahaan')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

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

    <?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan Ke']) ?>

    <?= $form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'I 1 Pemilik Nama']) ?>

    <?= $form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'I 2 Pemilik Tpt Lahir']) ?>

    <?= $form->field($model, 'i_2_pemilik_tgl_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose I 2 Pemilik Tgl Lahir')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'i_3_pemilik_alamat')->textInput(['maxlength' => true, 'placeholder' => 'I 3 Pemilik Alamat']) ?>

    <?= $form->field($model, 'i_3_pemilik_propinsi')->textInput(['placeholder' => 'I 3 Pemilik Propinsi']) ?>

    <?= $form->field($model, 'i_3_pemilik_kabupaten')->textInput(['placeholder' => 'I 3 Pemilik Kabupaten']) ?>

    <?= $form->field($model, 'i_3_pemilik_kecamatan')->textInput(['placeholder' => 'I 3 Pemilik Kecamatan']) ?>

    <?= $form->field($model, 'i_3_pemilik_kelurahan')->textInput(['placeholder' => 'I 3 Pemilik Kelurahan']) ?>

    <?= $form->field($model, 'i_4_pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'I 4 Pemilik Telepon']) ?>

    <?= $form->field($model, 'i_5_pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'I 5 Pemilik No Ktp']) ?>

    <?= $form->field($model, 'i_6_pemilik_kewarganegaraan')->textInput(['placeholder' => 'I 6 Pemilik Kewarganegaraan']) ?>

    <?= $form->field($model, 'ii_1_perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Ii 1 Perusahaan Nama']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Ii 2 Perusahaan Alamat']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_propinsi')->textInput(['placeholder' => 'Ii 2 Perusahaan Propinsi']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_kabupaten')->textInput(['placeholder' => 'Ii 2 Perusahaan Kabupaten']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_kecamatan')->textInput(['placeholder' => 'Ii 2 Perusahaan Kecamatan']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_kelurahan')->textInput(['placeholder' => 'Ii 2 Perusahaan Kelurahan']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Ii 2 Perusahaan Kodepos']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_no_telp')->textInput(['maxlength' => true, 'placeholder' => 'Ii 2 Perusahaan No Telp']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_no_fax')->textInput(['maxlength' => true, 'placeholder' => 'Ii 2 Perusahaan No Fax']) ?>

    <?= $form->field($model, 'ii_2_perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Ii 2 Perusahaan Email']) ?>

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

    <?= $form->field($model, 'iii_4_bank_utama_1')->textInput(['placeholder' => 'Iii 4 Bank Utama 1']) ?>

    <?= $form->field($model, 'iii_4_bank_utama_2')->textInput(['placeholder' => 'Iii 4 Bank Utama 2']) ?>

    <?= $form->field($model, 'iii_4_jumlah_bank')->textInput(['placeholder' => 'Iii 4 Jumlah Bank']) ?>

    <?= $form->field($model, 'iii_5_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Iii 5 Npwp']) ?>

    <?= $form->field($model, 'iii_6_status_perusahaan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\StatusPerusahaan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'iii_7a_tgl_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iii 7a Tgl Pendirian')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iii_7b_tgl_mulai_kegiatan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iii 7b Tgl Mulai Kegiatan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iii_8_bentuk_kerjasama_pihak3')->textInput(['placeholder' => 'Iii 8 Bentuk Kerjasama Pihak3']) ?>

    <?= $form->field($model, 'iii_9a_merek_dagang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9a Merek Dagang Nama']) ?>

    <?= $form->field($model, 'iii_9a_merek_dagang_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9a Merek Dagang Nomor']) ?>

    <?= $form->field($model, 'iii_9b_hak_paten_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9b Hak Paten Nama']) ?>

    <?= $form->field($model, 'iii_9b_hak_paten_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9b Hak Paten Nomor']) ?>

    <?= $form->field($model, 'iii_9c_hak_cipta_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9c Hak Cipta Nama']) ?>

    <?= $form->field($model, 'iii_9c_hak_cipta_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9c Hak Cipta Nomor']) ?>

    <?= $form->field($model, 'iv_a1_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A1 Nomor']) ?>

    <?= $form->field($model, 'iv_a1_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iv A1 Tanggal')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iv_a1_notaris_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iv A1 Notaris Nama']) ?>

    <?= $form->field($model, 'iv_a1_notaris_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Iv A1 Notaris Alamat']) ?>

    <?= $form->field($model, 'iv_a1_telpon')->textInput(['maxlength' => true, 'placeholder' => 'Iv A1 Telpon']) ?>

    <?= $form->field($model, 'iv_a2_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A2 Nomor']) ?>

    <?= $form->field($model, 'iv_a2_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iv A2 Tanggal')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iv_a2_notaris')->textInput(['maxlength' => true, 'placeholder' => 'Iv A2 Notaris']) ?>

    <?= $form->field($model, 'iv_a3_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A3 Nomor']) ?>

    <?= $form->field($model, 'iv_a3_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iv A3 Tanggal')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iv_a4_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A4 Nomor']) ?>

    <?= $form->field($model, 'iv_a4_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iv A4 Tanggal')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iv_a5_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A5 Nomor']) ?>

    <?= $form->field($model, 'iv_a5_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iv A5 Tanggal')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'iv_a6_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iv A6 Nomor']) ?>

    <?= $form->field($model, 'iv_a6_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iv A6 Tanggal')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'v_jumlah_dirut')->textInput(['placeholder' => 'V Jumlah Dirut']) ?>

    <?= $form->field($model, 'v_jumlah_direktur')->textInput(['placeholder' => 'V Jumlah Direktur']) ?>

    <?= $form->field($model, 'v_jumlah_komisaris')->textInput(['placeholder' => 'V Jumlah Komisaris']) ?>

    <?= $form->field($model, 'v_jumlah_pengurus')->textInput(['placeholder' => 'V Jumlah Pengurus']) ?>

    <?= $form->field($model, 'v_jumlah_pengawas')->textInput(['placeholder' => 'V Jumlah Pengawas']) ?>

    <?= $form->field($model, 'v_jumlah_sekutu_aktif')->textInput(['placeholder' => 'V Jumlah Sekutu Aktif']) ?>

    <?= $form->field($model, 'v_jumlah_sekutu_pasif')->textInput(['placeholder' => 'V Jumlah Sekutu Pasif']) ?>

    <?= $form->field($model, 'v_jumlah_sekutu_aktif_baru')->textInput(['placeholder' => 'V Jumlah Sekutu Aktif Baru']) ?>

    <?= $form->field($model, 'v_jumlah_sekutu_pasif_baru')->textInput(['placeholder' => 'V Jumlah Sekutu Pasif Baru']) ?>

    <?= $form->field($model, 'vi_jumlah_pemegang_saham')->textInput(['placeholder' => 'Vi Jumlah Pemegang Saham']) ?>

    <?= $form->field($model, 'vii_b_omset')->textInput(['placeholder' => 'Vii B Omset']) ?>

    <?= $form->field($model, 'vii_b_terbilang')->textInput(['maxlength' => true, 'placeholder' => 'Vii B Terbilang']) ?>

    <?= $form->field($model, 'vii_c1_dasar')->textInput(['placeholder' => 'Vii C1 Dasar']) ?>

    <?= $form->field($model, 'vii_c2_ditempatkan')->textInput(['placeholder' => 'Vii C2 Ditempatkan']) ?>

    <?= $form->field($model, 'vii_c3_disetor')->textInput(['placeholder' => 'Vii C3 Disetor']) ?>

    <?= $form->field($model, 'vii_c4_saham')->textInput(['placeholder' => 'Vii C4 Saham']) ?>

    <?= $form->field($model, 'vii_c5_nominal')->textInput(['placeholder' => 'Vii C5 Nominal']) ?>

    <?= $form->field($model, 'vii_c6_aktif')->textInput(['placeholder' => 'Vii C6 Aktif']) ?>

    <?= $form->field($model, 'vii_c7_pasif')->textInput(['placeholder' => 'Vii C7 Pasif']) ?>

    <?= $form->field($model, 'vii_d_totalaset')->textInput(['placeholder' => 'Vii D Totalaset']) ?>

    <?= $form->field($model, 'vii_e_wni')->textInput(['placeholder' => 'Vii E Wni']) ?>

    <?= $form->field($model, 'vii_e_wna')->textInput(['placeholder' => 'Vii E Wna']) ?>

    <?= $form->field($model, 'vii_f_matarantai')->textInput(['placeholder' => 'Vii F Matarantai']) ?>

    <?= $form->field($model, 'vii_fa_jumlah')->textInput(['placeholder' => 'Vii Fa Jumlah']) ?>

    <?= $form->field($model, 'vii_fa_satuan')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Satuan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Satuan')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'vii_fb_jumlah')->textInput(['placeholder' => 'Vii Fb Jumlah']) ?>

    <?= $form->field($model, 'vii_fb_satuan')->textInput(['placeholder' => 'Vii Fb Satuan']) ?>

    <?= $form->field($model, 'vii_fc_lokal')->textInput(['maxlength' => true, 'placeholder' => 'Vii Fc Lokal']) ?>

    <?= $form->field($model, 'vii_fc_impor')->textInput(['maxlength' => true, 'placeholder' => 'Vii Fc Impor']) ?>

    <?= $form->field($model, 'vii_f_pengecer')->dropDownList([ 'Swalayan /Supermarket' => 'Swalayan /Supermarket', 'Toserba /Dept. Store' => 'Toserba /Dept. Store', 'Toko /Kios' => 'Toko /Kios', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'viii_jenis_perusahaan')->textInput(['placeholder' => 'Viii Jenis Perusahaan']) ?>

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

    <div class="form-group" id="add-izin-tdp-kantorcabang"></div>

    <div class="form-group" id="add-izin-tdp-kegiatan"></div>

    <div class="form-group" id="add-izin-tdp-legal"></div>

    <div class="form-group" id="add-izin-tdp-pimpinan"></div>

    <div class="form-group" id="add-izin-tdp-saham"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
