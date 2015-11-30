<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpKantor', 
        'relID' => 'izin-tdp-kantor', 
        'value' => \yii\helpers\Json::encode($model->izinTdpKantors),
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
        'class' => 'IzinTdpLeglain', 
        'relID' => 'izin-tdp-leglain', 
        'value' => \yii\helpers\Json::encode($model->izinTdpLeglains),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpPemegang', 
        'relID' => 'izin-tdp-pemegang', 
        'value' => \yii\helpers\Json::encode($model->izinTdpPemegangs),
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
?>

<div class="izin-tdp-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'siup_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\IzinSiup::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Izin siup'],
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

    <?= $form->field($model, 'tdp_jenis_daftar')->dropDownList([ 'Perubahan' => 'Perubahan', 'Perpanjangan' => 'Perpanjangan', 'Baru' => 'Baru', ]) ?>

    <?= $form->field($model, 'tdp_pembaruan_ke')->textInput(['placeholder' => 'Tdp Pembaruan Ke']) ?>

    <?= $form->field($model, 'tdp_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Nama Kelompok']) ?>

    <?= $form->field($model, 'tdp_status_perusahaan')->dropDownList([ 'Ktr. Tunggal' => 'Ktr. Tunggal', 'Ktr. Pusat' => 'Ktr. Pusat', 'Ktr. Cabang' => 'Ktr. Cabang', 'Ktr. Pembantu' => 'Ktr. Pembantu', 'Perwakilan' => 'Perwakilan', ]) ?>

    <?= $form->field($model, 'tdp_id_perusahaan_induk')->textInput(['placeholder' => 'Tdp Id Perusahaan Induk']) ?>

    <?= $form->field($model, 'tdr_perusahaan_induk_no_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Tdr Perusahaan Induk No Tdp']) ?>

    <?= $form->field($model, 'tdp_id_lokasi_produk_unit')->textInput(['placeholder' => 'Tdp Id Lokasi Produk Unit']) ?>

    <?= $form->field($model, 'tdp_tanggal_mulai')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Tdp Tanggal Mulai'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'tdp_jangka_waktu_berdiri')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Jangka Waktu Berdiri']) ?>

    <?= $form->field($model, 'tdp_bentuk_kerja_sama')->dropDownList([ 'Jaringan Internasional' => 'Jaringan Internasional', 'Jaringan Nasional' => 'Jaringan Nasional', 'Waralaba Internasional' => 'Waralaba Internasional', 'Waralaba Nasional' => 'Waralaba Nasional', 'KSO' => 'KSO', 'Mandiri' => 'Mandiri', ]) ?>

    <?= $form->field($model, 'tdp_merek_dagang')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Merek Dagang']) ?>

    <?= $form->field($model, 'tdp_merek_dagang_no')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Merek Dagang No']) ?>

    <?= $form->field($model, 'tdp_hak_paten')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Hak Paten']) ?>

    <?= $form->field($model, 'tdp_hak_paten_no')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Hak Paten No']) ?>

    <?= $form->field($model, 'tdp_hak_cipta')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Hak Cipta']) ?>

    <?= $form->field($model, 'tdp_hak_cipta_no')->textInput(['maxlength' => true, 'placeholder' => 'Tdp Hak Cipta No']) ?>

    <?= $form->field($model, 'izin_tdp_jum_dirut')->textInput(['placeholder' => 'Izin Tdp Jum Dirut']) ?>

    <?= $form->field($model, 'izin_tdp_jum_direktur')->textInput(['placeholder' => 'Izin Tdp Jum Direktur']) ?>

    <?= $form->field($model, 'izin_tdp_komisaris')->textInput(['placeholder' => 'Izin Tdp Komisaris']) ?>

    <?= $form->field($model, 'izin_tdp_akta_pendirian_no')->textInput(['placeholder' => 'Izin Tdp Akta Pendirian No']) ?>

    <?= $form->field($model, 'izin_tdp_akta_pendirian_nama_notaris')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Akta Pendirian Nama Notaris']) ?>

    <?= $form->field($model, 'izin_tdp_akta_pendirian_alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'izin_tdp_akta_pendirian_tlpn')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Akta Pendirian Tlpn']) ?>

    <?= $form->field($model, 'izin_tdp_akta_pendirian_tgl')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Akta Pendirian Tgl'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_akta_perubahan_no')->textInput(['placeholder' => 'Izin Tdp Akta Perubahan No']) ?>

    <?= $form->field($model, 'izin_tdp_akta_perubahan_nama_notaris')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Akta Perubahan Nama Notaris']) ?>

    <?= $form->field($model, 'izin_tdp_akta_perubahan_tgl')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Akta Perubahan Tgl'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_pengesahan_menkuham_no')->textInput(['placeholder' => 'Izin Tdp Pengesahan Menkuham No']) ?>

    <?= $form->field($model, 'izin_tdp_pengesahan_menkuham_tgl')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Pengesahan Menkuham Tgl'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_persetujuan_menkuham_no')->textInput(['placeholder' => 'Izin Tdp Persetujuan Menkuham No']) ?>

    <?= $form->field($model, 'izin_tdp_persetujuan_menkuham_tgl')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Persetujuan Menkuham Tgl'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_perubahan_anggaran_no')->textInput(['placeholder' => 'Izin Tdp Perubahan Anggaran No']) ?>

    <?= $form->field($model, 'izin_tdp_perubahan_anggaran_tgl')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Perubahan Anggaran Tgl'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_perubahan_direksi_no')->textInput(['placeholder' => 'Izin Tdp Perubahan Direksi No']) ?>

    <?= $form->field($model, 'izin_tdp_perubahan_direksi_tgl')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Izin Tdp Perubahan Direksi Tgl'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'izin_tdp_jum_pemegang_saham')->textInput(['placeholder' => 'Izin Tdp Jum Pemegang Saham']) ?>

    <?= $form->field($model, 'izin_tdp_komoditi_pokok')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Komoditi Pokok']) ?>

    <?= $form->field($model, 'izin_tdp_komoditi_lainsatu')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Komoditi Lainsatu']) ?>

    <?= $form->field($model, 'izin_tdp_komoditi_laindua')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Komoditi Laindua']) ?>

    <?= $form->field($model, 'izin_tdp_omset_pertahun_int')->textInput(['placeholder' => 'Izin Tdp Omset Pertahun Int']) ?>

    <?= $form->field($model, 'izin_tdp_omset_pertahun_string')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Omset Pertahun String']) ?>

    <?= $form->field($model, 'izin_tdp_jum_karyawan_wni')->textInput(['placeholder' => 'Izin Tdp Jum Karyawan Wni']) ?>

    <?= $form->field($model, 'izin_tdp_jum_karyawan_wna')->textInput(['placeholder' => 'Izin Tdp Jum Karyawan Wna']) ?>

    <?= $form->field($model, 'izin_tdp_bidang_usaha')->dropDownList([ 'Produsen' => 'Produsen', 'Sub Distributor' => 'Sub Distributor', 'Eksportir' => 'Eksportir', 'Distributor/Wholessaler/Grosir' => 'Distributor/Wholessaler/Grosir', 'Importir' => 'Importir', 'Pengecer' => 'Pengecer', 'Agen' => 'Agen', ]) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_terpasang')->textInput(['placeholder' => 'Izin Tdp Kapasitas Mesin Terpasang']) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_terpasang_satuan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kapasitas Mesin Terpasang Satuan']) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_produksi')->textInput(['placeholder' => 'Izin Tdp Kapasitas Mesin Produksi']) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_produksi_satuan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kapasitas Mesin Produksi Satuan']) ?>

    <?= $form->field($model, 'izin_tdp_komponen_mesin_lokal')->textInput(['placeholder' => 'Izin Tdp Komponen Mesin Lokal']) ?>

    <?= $form->field($model, 'izin_tdp_komponen_mesin_impor')->textInput(['placeholder' => 'Izin Tdp Komponen Mesin Impor']) ?>

    <?= $form->field($model, 'izin_tdp_jenis_usaha')->dropDownList([ 'Swalayan/Supermarket' => 'Swalayan/Supermarket', 'Toserba/Departement Store' => 'Toserba/Departement Store', 'Toko/Kios' => 'Toko/Kios', 'Lainnya' => 'Lainnya', ]) ?>

    <?= $form->field($model, 'izin_tdp_jenis_perusahaan')->dropDownList([ 'Swasta' => 'Swasta', 'Swasta Tbk/Go Publik' => 'Swasta Tbk/Go Publik', 'Persero' => 'Persero', 'Persero Tbk/Go Publik' => 'Persero Tbk/Go Publik', 'Persh Daerah' => 'Persh Daerah', 'Persh Daerah Tbk/Go Publik' => 'Persh Daerah Tbk/Go Publik', ]) ?>

    <div class="form-group" id="add-izin-tdp-kantor"></div>

    <div class="form-group" id="add-izin-tdp-kegiatan"></div>

    <div class="form-group" id="add-izin-tdp-leglain"></div>

    <div class="form-group" id="add-izin-tdp-pemegang"></div>

    <div class="form-group" id="add-izin-tdp-pimpinan"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
