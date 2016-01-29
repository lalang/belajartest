<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;

$session = Yii::$app->session;
$session->set('izin_id',$model->izin_id);

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

$this->registerCss('.form-horizontal .control-label{
  /* text-align:right; */
  text-align:left;
 
}');

$search = "$(document).ready(function(){
    
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

<div class="row">
            <div class="col-md-12">
                <div class="box">
                    
                        <div class="box-header with-border">
                            <h3 class="box-title">Buat Permohonan</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">


    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-tdp']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>            
    <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <?= $form->field($model, 'bentuk_perusahaan', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                            
    <div class="tdp-form-bul">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                <li><a href="#tab_2" data-toggle="tab">Lokasi Perusahaan</a></li>
                <li><a href="#tab_3" data-toggle="tab">Data Umum Perusahaan</a></li>
                <li><a href="#tab_4" data-toggle="tab">Legalitas Perusahaan</a></li>
                <li><a href="#tab_5" data-toggle="tab">Data Pimpinan Perusahaan</a></li>
                <li><a href="#tab_6" data-toggle="tab">Data Kegiatan Perusahaan</a></li>
                <li><a href="#tab_7" data-toggle="tab">Kategori Perusahaan</a></li>
                <li><a href="#tab_8" data-toggle="tab">Disclaimer</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
        <div id="result"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

    <?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan Ke']) ?>

    <?= $form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pemilik ']) ?>

    <?= $form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => ' Tempat Lahir Pemilik']) ?>

    <?=
        $form->field($model, 'i_2_pemilik_tgl_lahir', [
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-3',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'endDate' => '0d',
                ],
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

   <?= $form->field($model, 'i_3_pemilik_alamat')->textInput(['maxlength' => true, 'placeholder' => ' Alamat Pemilik']) 
                                        ->hint('Diisi Nama jalan, Nomor, Rt/Rw')
                                        ?>
    <?php
        $model->i_3_pemilik_propinsi = 11;
    ?>
    <?= $form->field($model, 'i_3_pemilik_propinsi')->dropDownList([ '11' => 'DKI Jakarta']) ?>
                    
    <?= $form->field($model, 'i_3_pemilik_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
    <?php echo Html::hiddenInput('i_3_pemilik_kecamatan', $model->i_3_pemilik_kecamatan, ['id'=>'model_id1']);?>
                    
    <?=
    $form->field($model, 'i_3_pemilik_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
        'options' => ['id' => 'kec-id'],
        'pluginOptions' => [
            'depends' => ['kabkota-id'],
            'placeholder' => 'Pilih Kecamatan...',
            'url' => Url::to(['subcat']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id1']
        ]
    ]);
    ?>

    <?php echo Html::hiddenInput('i_3_pemilik_kelurahan', $model->i_3_pemilik_kelurahan, ['id'=>'model_id2']);?>
    <?=
    $form->field($model, 'i_3_pemilik_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
        'pluginOptions' => [
            'depends' => ['kabkota-id', 'kec-id'],
            'placeholder' => 'Pilih Kelurahan...',
            'url' => Url::to(['prod']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id2']
        ]
    ]);
    ?>
                    
    <?= $form->field($model, 'i_4_pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'No Telepon Pemilik']) ?>

    <?= $form->field($model, 'i_5_pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'No Ktp Pemilik ']) ?>

    
<?= $form->field($model, 'i_6_pemilik_kewarganegaraan')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->all(), 'id', 'nama_negara'),
                'options' => ['placeholder' => Yii::t('app', 'Pilih kewarganegaraan')],
                'hideSearch' => true,
                'pluginOptions' => [
                  'allowClear' => true
                ],
              ]) ?>
    </div>
    <div class="tab-pane" id="tab_2">
       <?= $form->field($model, 'ii_1_perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan ']) ?>

        <?= $form->field($model, 'ii_2_perusahaan_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Perusahaan ']) 
                ->hint('Diisi Nama jalan, Nomor, Rt/Rw')
                ?>
        <?= $form->field($model, 'ii_2_perusahaan_propinsi')->dropDownList([ '11' => 'DKI Jakarta']) ?>
     

        <?= $form->field($model, 'ii_2_perusahaan_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id-tab2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>

        <?php echo Html::hiddenInput('ii_2_perusahaan_kecamatan', $model->ii_2_perusahaan_kecamatan, ['id'=>'model_id1-tab2']);?>

        <?=
        $form->field($model, 'ii_2_perusahaan_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
            'options' => ['id' => 'kec-id-tab2'],
            'pluginOptions' => [
                'depends' => ['kabkota-id-tab2'],
                'placeholder' => 'Pilih Kecamatan...',
                'url' => Url::to(['subcat']),
                'loading'=>false,
                'initialize'=>true,
                'params'=>['model_id1-tab2']
            ]
        ]);
        ?>

        <?php echo Html::hiddenInput('ii_2_perusahaan_kelurahan', $model->ii_2_perusahaan_kelurahan, ['id'=>'model_id2-tab2']);?>
        <?=
        $form->field($model, 'ii_2_perusahaan_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
            'pluginOptions' => [
                'depends' => ['kabkota-id-tab2', 'kec-id-tab2'],
                'placeholder' => 'Pilih Kelurahan...',
                'url' => Url::to(['prod']),
                'loading'=>false,
                'initialize'=>true,
                'params'=>['model_id2-tab2']
            ]
        ]);
        ?>

        <?= $form->field($model, 'ii_2_perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan ']) ?>

        <?= $form->field($model, 'ii_2_perusahaan_no_telp')->textInput(['maxlength' => true, 'placeholder' => 'No Telp Perusahaan ']) ?>

        <?= $form->field($model, 'ii_2_perusahaan_no_fax')->textInput(['maxlength' => true, 'placeholder' => 'No Fax Perusahaan ']) ?>

        <?= $form->field($model, 'ii_2_perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Email Perusahaan ']) ?>

    </div>
    <div class="tab-pane" id="tab_3">
        <?= $form->field($model, 'iii_1_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Kelompok/Group ']) ?>

        <?= $form->field($model, 'iii_2_status_prsh')->dropDownList([ 'Kantor Tunggal' => 'Kantor Tunggal', 'Kantor Pusat' => 'Kantor Pusat', 
            'Kantor Cabang' => 'Kantor Cabang', 'Kantor Pembantu' => 'Kantor Pembantu', 'Perwakilan' => 'Perwakilan', ]
            ,['id'=>'kantor','onchange'=>'getval(this)']) ?>
        
        <div id="optional1" style="display: none;">
            <div class="box-body" style="background: #dddddd;">
            <?= $form->field($model, 'iii_2_induk_nama_prsh')->textInput(['maxlength' => true, 'placeholder' => 'Induk Perusahaan']) ?>

            <?= $form->field($model, 'iii_2_induk_nomor_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Induk Tdp']) ?>

            <?= $form->field($model, 'iii_2_induk_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Induk Alamat']) ?>
            
            <?= $form->field($model, 'iii_2_induk_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>

            <?= $form->field($model, 'iii_2_induk_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>

            <?php echo Html::hiddenInput('iii_2_induk_kecamatan', $model->iii_2_induk_kecamatan, ['id'=>'model_id1-tab3']);?>

            <?=
            $form->field($model, 'iii_2_induk_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
                'options' => ['id' => 'kec-id-tab3'],
                'pluginOptions' => [
                    'depends' => ['kabkota-id-tab3'],
                    'placeholder' => 'Pilih Kecamatan...',
                    'url' => Url::to(['subcat']),
                    'loading'=>false,
                    'initialize'=>true,
                    'params'=>['model_id1-tab3']
                ]
            ]);
            ?>

            <?php echo Html::hiddenInput('iii_2_induk_kelurahan', $model->iii_2_induk_kelurahan, ['id'=>'model_id2-tab3']);?>
            <?=
            $form->field($model, 'iii_2_induk_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
                'pluginOptions' => [
                    'depends' => ['kabkota-id-tab3', 'kec-id-tab3'],
                    'placeholder' => 'Pilih Kelurahan...',
                    'url' => Url::to(['prod']),
                    'loading'=>false,
                    'initialize'=>true,
                    'params'=>['model_id2-tab3']
                ]
            ]);
            ?>
            </div>
        </div>
        <div class="optional2">
            
            <?= $form->field($model, 'iii_3_lokasi_unit_produksi')->textInput(['maxlength' => true, 'placeholder' => 'Lokasi Unit Produksi']) ?>

            <?= $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-opt-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>

            <?= $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-opt-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
            
        </div>
            
        <?= $form->field($model, 'iii_4_bank_utama_1')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
            'hideSearch' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
        
        <?= $form->field($model, 'iii_4_bank_utama_2')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
            'hideSearch' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <?= $form->field($model, 'iii_4_jumlah_bank')->textInput(['placeholder' => 'Jumlah Bank']) ?>

        <?= $form->field($model, 'iii_5_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Npwp']) ?>

        <?= $form->field($model, 'iii_6_status_perusahaan_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\StatusPerusahaan::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
            'hideSearch' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <?= $form->field($model, 'iii_7a_tgl_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
            'options' => ['placeholder' => Yii::t('app', 'Tgl Pendirian')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]); ?>

        <?= $form->field($model, 'iii_7b_tgl_mulai_kegiatan')->widget(\kartik\widgets\DatePicker::classname(), [
            'options' => ['placeholder' => Yii::t('app', 'Tgl Mulai Kegiatan')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]); ?>

        <?= $form->field($model, 'iii_8_bentuk_kerjasama_pihak3')->textInput(['placeholder' => 'Bentuk Kerjasama Pihak ke-3']) ?>

        <?= $form->field($model, 'iii_9a_merek_dagang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Merek Dagang ']) ?>

        <?= $form->field($model, 'iii_9a_merek_dagang_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Merek Dagang ']) ?>

        <?= $form->field($model, 'iii_9b_hak_paten_nama')->textInput(['maxlength' => true, 'placeholder' => 'Hak Paten']) ?>

        <?= $form->field($model, 'iii_9b_hak_paten_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Hak Paten ']) ?>

        <?= $form->field($model, 'iii_9c_hak_cipta_nama')->textInput(['maxlength' => true, 'placeholder' => ' Hak Cipta ']) ?>

        <?= $form->field($model, 'iii_9c_hak_cipta_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Hak Cipta ']) ?>
    </div>
    <div class="tab-pane" id="tab_4">
        <?= $form->field($model, 'iv_a1_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor']) ?>
         <?= $form->field($model, 'iv_a1_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Iv A1 Tanggal')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
        ]); ?>
       <?= $form->field($model, 'iv_a1_notaris_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris ']) ?>
       <?= $form->field($model, 'iv_a1_notaris_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Notaris ']) ?>
       <?= $form->field($model, 'iv_a1_telpon')->textInput(['maxlength' => true, 'placeholder' => 'No Telpon Notaris']) ?>

        <div class="form-group" id="add-izin-tdp-legal"></div>         
        
    </div>
    
    <div class="tab-pane" id="tab_5">

        <div class="form-group" id="add-izin-tdp-pimpinan"></div>      

    </div> 
   
    <div class="tab-pane" id="tab_6">
        <div class="form-group" id="add-izin-tdp-kegiatan"></div>
        Omset Perusahaan
        <?= $form->field($model, 'vii_b_omset')->textInput(['placeholder' => 'Omset']) ?>

        <?= $form->field($model, 'vii_b_terbilang')->textInput(['maxlength' => true, 'placeholder' => 'Terbilang']) ?>
        Modal & saham
        <?= $form->field($model, 'vii_c1_dasar')->textInput(['placeholder' => 'Modal Dasar']) ?>

        <?= $form->field($model, 'vii_c2_ditempatkan')->textInput(['placeholder' => 'Modal Ditempatkan']) ?>

        <?= $form->field($model, 'vii_c3_disetor')->textInput(['placeholder' => 'Modal Disetor']) ?>

        <?= $form->field($model, 'vii_c4_saham')->textInput(['placeholder' => 'Lembar Saham']) ?>

        <?= $form->field($model, 'vii_c5_nominal')->textInput(['placeholder' => 'Nilai Nominal per Saham']) ?>
         Total Asset
         <?= $form->field($model, 'vii_d_totalaset')->textInput(['placeholder' => 'Total aset']) ?>
         Jumlah Karyawan
        <?= $form->field($model, 'vii_e_wni')->textInput(['placeholder' => 'WNI']) ?>

        <?= $form->field($model, 'vii_e_wna')->textInput(['placeholder' => 'WNA']) ?>
        Kedudukan Dan mata rantai
       
       
         <?= $form->field($model, 'vii_f_matarantai')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(backend\models\Matarantai::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Pilih Tipe perusahaan')],
            'hideSearch' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ],['id'=>'matarnt']) ?>
        <div id="optional3" style="display :none">
        
        <?= $form->field($model, 'vii_fb_jumlah')->textInput(['placeholder' => 'Kapasitas']) ?>

        <?= $form->field($model, 'vii_fb_satuan')->textInput(['placeholder' => 'Satuan']) ?>

        <?= $form->field($model, 'vii_fc_lokal')->textInput(['maxlength' => true, 'placeholder' => 'Lokal']) ?>

        <?= $form->field($model, 'vii_fc_impor')->textInput(['maxlength' => true, 'placeholder' => 'Impor']) ?>
        </div>

        <?= $form->field($model, 'vii_f_pengecer')->dropDownList([ 'Swalayan /Supermarket' => 'Swalayan /Supermarket', 'Toserba /Dept. Store' => 'Toserba /Dept. Store', 'Toko /Kios' => 'Toko /Kios', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>

    </div>
    <div class="tab-pane" id="tab_7">
         <div class="form-group" id="add-izin-tdp-kantorcabang"></div>
    </div>
     <div class="tab-pane" id="tab_8">
        <div class="callout callout-warning">
            <font size="3px"> <?= Params::findOne("disclaimer")->value; ?></font>
        </div>
        <br/>
        <input type="checkbox" id="check-dis" /> Saya Setuju
        <div class="box text-center">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Daftar Permohonan Izin') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <br/>
    </div>
        <ul class="pager wizard">
            <li class="previous"><a href="#">Previous</a></li>
            <li class="next"><a href="#">Next</a></li>
            <li class="next finish" style="display:none;"><a href="#">Finish</a></li>
        </ul>
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
</div><!-- /.col --> 
    <?php ActiveForm::end(); 
//    <?= $form->field($model, 'vii_f_matarantai')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Matarantai::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
//        'options' => ['placeholder' => Yii::t('app', 'Kedudukan Mata rantai')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ],['id'=>'matarnt','onchange'=>'getval(this)']) 
    ?>

            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>

<head>
<script src="<?=Yii::getAlias('@front')?>/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#kantor").change(function() {
     if (this.value == 'Kantor Tunggal' || this.value == 'Kantor Pusat') {
            
              $('#optional1').hide();
         }else{
      
      $('#optional1').show();
    }
    });
  });
$(document).ready(function() {
    $("#matarnt").change(function() {
     if (this.value === '1') {
            
              $('#optional3').show();
         }else{
      
      $('#optional3').hide();
    }
    });
  });

</script>
</head>
<script src="/js/wizard_bul_kop.js"></script> 