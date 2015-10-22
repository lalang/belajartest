<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinTdp */
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

$this->registerCss('.form-horizontal .control-label{
  /* text-align:right; */
  text-align:left;
 
}');

$search = "$(document).ready(function(){

    $('.akta-button').click(function(){
	$('.akta-form').toggle(1000);
	return false;
    });
    
     $('.btnNext').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
      });

    $('.btnPrevious').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
    $('#btnsub').attr('disabled', 'disabled');
   $('#check-dis').change(function(){
        if($(this).is(':checked')){
            $('#btnsub').removeAttr('disabled');
        }else{
            $('#btnsub').attr('disabled', 'disabled');
        }
    });



});";
$this->registerJs($search);

?>
<style>
form .form-group .control-label {
    font-size: 14px;
    font-weight: 600;
    min-width: 200px;
    padding-top: 10px;
}
.nav>li>a:focus, .nav>li>a:hover {
    background:none;    
}

</style>

<div class="izin-tdp-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'siup_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\IzinSiup::find()->orderBy('id')->asArray()->all(), 'id', 'nama_perusahaan'),
        'options' => ['placeholder' => 'Pilih Nama Perusahaan yang Didaftarkan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'tdp_jenis_daftar')->dropDownList([ 'Perubahan' => 'Perubahan', 'Perpanjangan' => 'Perpanjangan', 'Baru' => 'Baru', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tdp_pembaruan_ke')->textInput(['placeholder' => 'Masukan jumlah pembaharuan/perpanjangan yang ke- ']) ?>

    <?= $form->field($model, 'tdp_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Apabila Ada']) ?>

    <?= $form->field($model, 'tdp_status_perusahaan')->radioList([ 'Ktr. Tunggal' => 'Ktr. Tunggal', 'Ktr. Pusat' => 'Ktr. Pusat', 'Ktr. Cabang' => 'Ktr. Cabang', 'Ktr. Pembantu' => 'Ktr. Pembantu', 'Perwakilan' => 'Perwakilan', ]) ?>

    <?= $form->field($model, 'tdp_id_perusahaan_induk')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\IzinSiup::find()->orderBy('id')->asArray()->all(), 'id', 'nama_perusahaan'),
        'options' => ['placeholder' => 'Pilih Nama Perusahaan Induk'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    
    <?= $form->field($model, 'tdr_perusahaan_induk_no_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Gak Penting Hapus aja']) ?>

    <?= $form->field($model, 'tdp_id_lokasi_produk_unit')->textInput(['maxlength' => true, 'placeholder' => 'Apabila Ada']) ?>

    <?= $form->field($model, 'tdp_tanggal_mulai')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal Mulai Kegiatan'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'tdp_jangka_waktu_berdiri', [
        'template' => '{label} <div class="row"><div class="col-xs-4">{input}{error}{hint}</div><div style="font-size:16px; height:35px; line-height:35px ">Tahun</div></div>',
    ])->textInput(['maxlength' => true, 'placeholder' => 'Tahun'],['']) ?>
    
    <?= $form->field($model, 'tdp_bentuk_kerja_sama')->radioList([ 'Jaringan Internasional' => 'Jaringan Internasional', 'Jaringan Nasional' => 'Jaringan Nasional', 'Waralaba Internasional' => 'Waralaba Internasional', 'Waralaba Nasional' => 'Waralaba Nasional', 'KSO' => 'KSO', 'Mandiri' => 'Mandiri', ]) ?>
        
    <div class="form-group field-izintdp-tdp_merek_dagang field-izintdp-tdp_merek_dagang_no has-success">
        <div>
            <label>Merek Dagang dan No. Merek Dagang (Jika Ada) :</label>
        </div>
        <div class="input-group">
            <?= Html::activeTextInput($model, 'tdp_merek_dagang',['maxlength' => true, 'placeholder' => 'Merek Dagang', 'class' => 'form-control']); ?>
            <div class="input-group-addon">No.</div>
            <?= Html::activeTextInput($model, 'tdp_merek_dagang_no',['maxlength' => true, 'placeholder' => 'No. Merek Dagang', 'class' => 'form-control']); ?>

        </div>
    </div>
    
    <div class="form-group field-izintdp-tdp_hak_paten field-izintdp-tdp_hak_paten_no has-success">
        <div>
            <label>Pemegang Hak Paten dan No. Hak Paten (Jika Ada) :</label>
        </div>
        <div class="input-group">

            <?= Html::activeTextInput($model, 'tdp_hak_paten',['maxlength' => true, 'placeholder' => 'Hak Paten', 'class' => 'form-control']); ?>
            <div class="input-group-addon">No.</div>
            <?= Html::activeTextInput($model, 'tdp_hak_paten_no',['maxlength' => true, 'placeholder' => 'No. Hak Paten', 'class' => 'form-control']); ?>

        </div>
    </div>
    
    <div class="form-group field-izintdp-tdp_hak_cipta field-izintdp-tdp_hak_cipta_no has-success">
        <div>
            <label>Pemegang Hak Cipta dan No. Hak Cipta (Jika Ada) :</label>
        </div>
        <div class="input-group">

            <?= Html::activeTextInput($model, 'tdp_hak_cipta',['maxlength' => true, 'placeholder' => 'Hak Cipta', 'class' => 'form-control']); ?>
            <div class="input-group-addon">No.</div>
            <?= Html::activeTextInput($model, 'tdp_hak_cipta_no',['maxlength' => true, 'placeholder' => 'No. Hak Cipta', 'class' => 'form-control']); ?>

        </div>
    </div>
    
    <div class="jumbotronEdit">
        <h2>Jumlah Pimpinan Perusahaan :</h2>
        <div>
            <p class="clear"></p>
        </div>
        <div class="form-group field-izintdp-tdp_merek_dagang field-izintdp-tdp_merek_dagang_no has-success">
            <div class="input-group">
                <div class="input-group-addon " style="width: 255px">Dirut/Dir.Cabang/PenanggungJawab</div>
                <?= Html::activeTextInput($model, 'tdp_merek_dagang',['maxlength' => true, 'placeholder' => 'Merek Dagang', 'class' => 'form-control col-sm-4']); ?>
                <div class="input-group-addon ">Orang</div>
            </div>
        </div>

        <div class="form-group field-izintdp-tdp_hak_paten field-izintdp-tdp_hak_paten_no has-success">
            <div class="input-group">
                <div class="input-group-addon " style="width: 255px">Direktur</div>
                <?= Html::activeTextInput($model, 'tdp_merek_dagang',['maxlength' => true, 'placeholder' => 'Merek Dagang', 'class' => 'form-control col-sm-4']); ?>
                <div class="input-group-addon ">Orang</div>
            </div>
        </div>

        <div class="form-group field-izintdp-tdp_hak_paten field-izintdp-tdp_hak_paten_no has-success">
            <div class="input-group">
                <div class="input-group-addon " style="width: 255px">Komisaris</div>
                <?= Html::activeTextInput($model, 'tdp_merek_dagang',['maxlength' => true, 'placeholder' => 'Merek Dagang', 'class' => 'form-control col-sm-4']); ?>
                <div class="input-group-addon ">Orang</div>
            </div>
        </div>
    </div>
    
    
    <?= $form->field($model, 'izin_tdp_jum_dirut')->textInput(['placeholder' => 'Jumlah Dirut']) ?>

    <?= $form->field($model, 'izin_tdp_jum_direktur')->textInput(['placeholder' => 'Jumlah Direktur']) ?>

    <?= $form->field($model, 'izin_tdp_komisaris')->textInput(['placeholder' => 'Jumlah Komisaris']) ?>

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

    <?= $form->field($model, 'izin_tdp_bidang_usaha')->dropDownList([ 'Produsen' => 'Produsen', 'Sub Distributor' => 'Sub Distributor', 'Eksportir' => 'Eksportir', 'Distributor/Wholessaler/Grosir' => 'Distributor/Wholessaler/Grosir', 'Importir' => 'Importir', 'Pengecer' => 'Pengecer', 'Agen' => 'Agen', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_terpasang')->textInput(['placeholder' => 'Izin Tdp Kapasitas Mesin Terpasang']) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_terpasang_satuan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kapasitas Mesin Terpasang Satuan']) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_produksi')->textInput(['placeholder' => 'Izin Tdp Kapasitas Mesin Produksi']) ?>

    <?= $form->field($model, 'izin_tdp_kapasitas_mesin_produksi_satuan')->textInput(['maxlength' => true, 'placeholder' => 'Izin Tdp Kapasitas Mesin Produksi Satuan']) ?>

    <?= $form->field($model, 'izin_tdp_komponen_mesin_lokal')->textInput(['placeholder' => 'Izin Tdp Komponen Mesin Lokal']) ?>

    <?= $form->field($model, 'izin_tdp_komponen_mesin_impor')->textInput(['placeholder' => 'Izin Tdp Komponen Mesin Impor']) ?>

    <?= $form->field($model, 'izin_tdp_jenis_usaha')->dropDownList([ 'Swalayan/Supermarket' => 'Swalayan/Supermarket', 'Toserba/Departement Store' => 'Toserba/Departement Store', 'Toko/Kios' => 'Toko/Kios', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'izin_tdp_jenis_perusahaan')->dropDownList([ 'Swasta' => 'Swasta', 'Swasta Tbk/Go Publik' => 'Swasta Tbk/Go Publik', 'Persero' => 'Persero', 'Persero Tbk/Go Publik' => 'Persero Tbk/Go Publik', 'Persh Daerah' => 'Persh Daerah', 'Persh Daerah Tbk/Go Publik' => 'Persh Daerah Tbk/Go Publik', ], ['prompt' => '']) ?>

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
