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
$session->set('izin_id', $model->izin_id);

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpKantorcabang',
        'relID' => 'izin-tdp-kantorcabang',
        'value' => \yii\helpers\Json::encode($model->izinTdpKantorcabangs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpKegiatan',
        'relID' => 'izin-tdp-kegiatan',
        'value' => \yii\helpers\Json::encode($model->izinTdpKegiatans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpLegal',
        'relID' => 'izin-tdp-legal',
        'value' => \yii\helpers\Json::encode($model->izinTdpLegals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpPimpinan',
        'relID' => 'izin-tdp-pimpinan',
        'value' => \yii\helpers\Json::encode($model->izinTdpPimpinans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpSaham',
        'relID' => 'izin-tdp-saham',
        'value' => \yii\helpers\Json::encode($model->izinTdpSahams),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

$search = "$(document).ready(function(){
$('.kegiatan-button').click(function(){
	$('.kegiatan-form').toggle(1000);
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
                <?php $model->i_3_pemilik_propinsi = 11; ?>
                <?php $model->ii_2_perusahaan_propinsi = 11; ?>
                <?php  $form = ActiveForm::begin(
					[	
						'action' => ['/izin-tdp/revisi'],
						'id'=>'form-izin-tdp'
					]
				); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'bentuk_perusahaan', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
				<?= $form->field($model, 'kode_registrasi', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
				<?= $form->field($model, 'url_back', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
				<?= $form->field($model, 'perizinan_proses_id', ['template' => '{input}'])->textInput(['style' => 'display:none']) ?>
				
                <div class="row">
					<?php //if($model->status_id!=1){?>
                    <div class="col-md-4">
                        <?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan izin ke']) ?>
                    </div>
					<?php //} ?>
                    <div class="col-md-4">
                        <?= $form->field($model, 'no_pembukuan')->textInput(['placeholder' => 'Nomor Pembukuan']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'no_sk_siup')->textInput(['placeholder' => 'Nomor SK SIUP']) ?>
                    </div>
                </div>

                <div class="tdp-form-fa">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active" title="Identitas Pemilik/Pengurus/Penanggungjawab"><a href="#tab_1" data-toggle="tab">Bagian I</a></li>
                            <li title="Lokasi Perusahaan"><a href="#tab_2" data-toggle="tab">Bagian II</a></li>
                            <li title="Data Umum Perusahaan"><a href="#tab_3" data-toggle="tab">Bagian III</a></li>
                            <li title="Legalitas Perusahaan"><a href="#tab_4" data-toggle="tab">Bagian IV</a></li>
                            <li title="Pimpinan Perusahaan"><a href="#tab_5" data-toggle="tab">Bagian V</a></li>
                            <li title="Kegiatan Perusahaan"><a href="#tab_6" data-toggle="tab">Bagian VI</a></li>
                            <li title="Kategori Perusahaan"><a href="#tab_7" data-toggle="tab">Bagian VII</a></li>
                        </ul>
                        <div id="result"></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Pemilik/Pengurus/Penanggungjawab</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Lengkap']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>
                                            </div>
                                            <div class="col-md-4">
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
                                                        'disabled' => FALSE
                                                    ],
                                                    'type' => DateControl::FORMAT_DATE,
                                                ])->hint('<small>format : dd-mm-yyyy (cth. 27-04-1990)</small>');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'i_3_pemilik_alamat')->textArea(['maxlength' => true, 'placeholder' => 'Alamat Lengkap']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_3_pemilik_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_3_pemilik_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('i_3_pemilik_kecamatan', $model->i_3_pemilik_kecamatan, ['id' => 'model_id1']); ?>
                                                <?=
                                                $form->field($model, 'i_3_pemilik_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subcat']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('i_3_pemilik_kelurahan', $model->i_3_pemilik_kelurahan, ['id' => 'model_id2']); ?>
                                                <?=
                                                $form->field($model, 'i_3_pemilik_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id', 'kec-id'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['prod']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_4_pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'No. Telepon']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_5_pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'No. KTP']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?=
                                                $form->field($model, 'i_6_pemilik_kewarganegaraan')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih Negara')],
                                                    'hideSearch' => false,
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Lokasi Perusahaan</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'ii_1_perusahaan_nama')->textInput(['maxlength' => true, 'readonly' =>true, 'placeholder' => 'Nama Perusahaan ']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'ii_2_perusahaan_alamat')->textArea(['maxlength' => true, 'readonly' =>true, 'placeholder' => 'Alamat Perusahaan '])->hint('<small>Diisi Nama jalan, Nomor, Rt/Rw</small>')?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'ii_2_perusahaan_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id-tab2', 'class' => 'input-large form-control', 'readonly' =>true, 'prompt' => 'Pilih Propinsi..']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'ii_2_perusahaan_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id-tab2', 'readonly' =>true, 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?=
												$form->field($model, 'ii_2_perusahaan_kecamatan')
												 ->dropDownList(
														\yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->where(['id'=>$model->ii_2_perusahaan_kecamatan])->all(), 'id', 'nama'),['disabled' => true]
														);
												?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?=
												$form->field($model, 'ii_2_perusahaan_kelurahan')
												 ->dropDownList(
														\yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->where(['id'=>$model->ii_2_perusahaan_kelurahan])->all(), 'id', 'nama'),['disabled' => true]
														);
												?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'ii_2_perusahaan_kodepos')->textInput(['maxlength' => true, 'readonly' =>true, 'placeholder' => 'Kodepos']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'ii_2_perusahaan_no_telp')->textInput(['maxlength' => true, 'readonly' =>true, 'placeholder' => 'No. Telepon']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'ii_2_perusahaan_no_fax')->textInput(['maxlength' => true, 'readonly' =>true, 'placeholder' => 'No. Fax']) ?>
                                            </div>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'ii_2_perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Email Perusahaan']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Data Umum Perusahaan</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_1_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Nama Kelompok/Group'])->label('Nama Kelompok/Group (Bila Ada)'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_2_status_prsh')->dropDownList([ 'Kantor Tunggal' => 'Kantor Tunggal', 'Kantor Pusat' => 'Kantor Pusat', 'Kantor Cabang' => 'Kantor Cabang', 'Kantor Pembantu' => 'Kantor Pembantu', 'Perwakilan' => 'Perwakilan',], ['id' => 'field_cpp', 'onchange' => 'getval(this)']) ?>
                                            </div>
                                        </div>

                                        <div id="cpp" style="display: none;">
                                            <div class="row">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">Jika Kantor Cabang/Kantor Pembantu/Perwakilan, Lengkapi data:</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?= $form->field($model, 'iii_2_induk_nama_prsh')->textInput(['maxlength' => true, 'placeholder' => 'Induk Perusahaan']) ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?= $form->field($model, 'iii_2_induk_nomor_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Induk Tdp']) ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?= $form->field($model, 'iii_2_induk_alamat')->textArea(['maxlength' => true, 'placeholder' => 'Alamat Induk Alamat']) ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?= $form->field($model, 'iii_2_induk_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?= $form->field($model, 'iii_2_induk_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?php echo Html::hiddenInput('iii_2_induk_kecamatan', $model->iii_2_induk_kecamatan, ['id' => 'model_id1-tab3']); ?>

                                                                <?=
                                                                $form->field($model, 'iii_2_induk_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                                    'options' => ['id' => 'kec-id-tab3'],
                                                                    'pluginOptions' => [
                                                                        'depends' => ['kabkota-id-tab3'],
                                                                        'placeholder' => 'Pilih Kecamatan...',
                                                                        'url' => Url::to(['subcat']),
                                                                        'loading' => false,
                                                                        'initialize' => true,
                                                                        'params' => ['model_id1-tab3']
                                                                    ]
                                                                ]);
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php echo Html::hiddenInput('iii_2_induk_kelurahan', $model->iii_2_induk_kelurahan, ['id' => 'model_id2-tab3']); ?>
                                                                <?=
                                                                $form->field($model, 'iii_2_induk_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                                    'pluginOptions' => [
                                                                        'depends' => ['kabkota-id-tab3', 'kec-id-tab3'],
                                                                        'placeholder' => 'Pilih Kelurahan...',
                                                                        'url' => Url::to(['prod']),
                                                                        'loading' => false,
                                                                        'initialize' => true,
                                                                        'params' => ['model_id2-tab3']
                                                                    ]
                                                                ]);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">Lokasi Unit Produksi (Apabila Ada)</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <?= $form->field($model, 'iii_3_lokasi_unit_produksi')->textInput(['maxlength' => true, 'placeholder' => 'Lokasi'])->label('Nama lokasi'); ?>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <?= $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-opt-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi...'])->label('Propinsi'); ?>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <?= $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-opt-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota...'])->label('Kota/Kab.'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">Nasabah Utama Bank</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <?=
                                                                $form->field($model, 'iii_4_bank_utama_1')->widget(\kartik\widgets\Select2::classname(), [
                                                                    'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih...')],
                                                                    'hideSearch' => false,
                                                                    'pluginOptions' => [
                                                                        'allowClear' => true
                                                                    ],
                                                                ])->label('1.')
                                                                ?>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <?=
                                                                $form->field($model, 'iii_4_bank_utama_2')->widget(\kartik\widgets\Select2::classname(), [
                                                                    'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih...')],
                                                                    'hideSearch' => false,
                                                                    'pluginOptions' => [
                                                                        'allowClear' => true
                                                                    ],
                                                                ])->label('2.')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <?= $form->field($model, 'iii_4_jumlah_bank')->textInput(['placeholder' => 'Jumlah Bank'])->label('Jumlah Bank') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_5_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Npwp']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?=
                                                $form->field($model, 'iii_6_status_perusahaan_id')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\StatusPerusahaan::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih...')],
                                                    'hideSearch' => true,
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
												<?=
                                                    $form->field($model, 'iii_7a_tgl_pendirian',[
                                                        'horizontalCssClasses' => [
                                                            'wrapper' => 'col-sm-4',
                                                        ]
                                                    ])->widget(DateControl::classname(), [
                                                        'options' => [
                                                            'pluginOptions' => [
                                                                'autoclose' => true,
																'endDate' => '0d',
                                                            ]
                                                        ],
                                                        'type' => DateControl::FORMAT_DATE,
                                                    ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                                                    ?>
                                            </div>
                                            <div class="col-md-6">
												<?=
                                                    $form->field($model, 'iii_7b_tgl_mulai_kegiatan',[
                                                        'horizontalCssClasses' => [
                                                            'wrapper' => 'col-sm-4',
                                                        ]
                                                    ])->widget(DateControl::classname(), [
                                                        'options' => [
                                                            'pluginOptions' => [
                                                                'autoclose' => true,
																'endDate' => '0d',
                                                            ]
                                                        ],
                                                        'type' => DateControl::FORMAT_DATE,
                                                    ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?=
                                                $form->field($model, 'iii_8_bentuk_kerjasama_pihak3')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\BentukKerjasama::find()->orderBy('id')->all(), 'id', 'nama'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih...')],
                                                    'hideSearch' => true,
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])->label('Bentuk Kerjasama Dengan Pihak Ketiga (apabila ada)')
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_9a_merek_dagang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Merek Dagang'])->label('Merek Dagang (apabila ada)') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_9a_merek_dagang_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor'])->label('No. Merek Dagang') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_9b_hak_paten_nama')->textInput(['maxlength' => true, 'placeholder' => 'Hak Paten'])->label('Pemegang Hak Paten (apabila ada)') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_9b_hak_paten_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor'])->label('No. Hak Paten') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_9c_hak_cipta_nama')->textInput(['maxlength' => true, 'placeholder' => 'Hak Cipta'])->label('Pemegang Hak Cipta (apabila ada)') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'iii_9c_hak_cipta_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor'])->label('No. Hak Cipta') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Legalitas Perusahaan</div>
                                    <div class="panel-body">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Akta Pendirian Dan Pengesahan</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'iv_a1_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor'])->label('Nomor')->label('<i class="glyphicon glyphicon-book"></i> AKTA PENDIRIAN (apabila ada)') ?>
                                                    </div>
                                                    <div class="col-md-4">
														<?=
														$form->field($model, 'iv_a1_tanggal',[
															'horizontalCssClasses' => [
																'wrapper' => 'col-sm-4',
															]
														])->widget(DateControl::classname(), [
															'options' => [
																'pluginOptions' => [
																	'autoclose' => true,
																	'endDate' => '0d',
																]
															],
															'type' => DateControl::FORMAT_DATE,
														])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
														?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'iv_a1_notaris_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris ']) ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <?= $form->field($model, 'iv_a1_notaris_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Notaris ']) ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'iv_a1_telpon')->textInput(['maxlength' => true, 'placeholder' => 'No Telpon Notaris']) ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'iv_a2_nomor')->textInput(['maxlength' => true, 'placeholder' => 'No. Tlp.'])->label('<i class="glyphicon glyphicon-book"></i> AKTA PERUBAHAN TERAKHIR') ?>
                                                    </div>
                                                    <div class="col-md-4">
														<?=
														$form->field($model, 'iv_a2_tanggal',[
															'horizontalCssClasses' => [
																'wrapper' => 'col-sm-4',
															]
														])->widget(DateControl::classname(), [
															'options' => [
																'pluginOptions' => [
																	'autoclose' => true,
																	'endDate' => '0d',
																]
															],
															'type' => DateControl::FORMAT_DATE,
														])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
														?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'iv_a2_notaris')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris']) ?>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <?= $form->field($model, 'iv_a3_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor'])->label('<i class="glyphicon glyphicon-book"></i> PENGESAHAN') ?>
                                                    </div>
                                                    <div class="col-md-4">
														<?=
															$form->field($model, 'iv_a3_tanggal',[
																'horizontalCssClasses' => [
																	'wrapper' => 'col-sm-4',
																]
															])->widget(DateControl::classname(), [
																'options' => [
																	'pluginOptions' => [
																		'autoclose' => true,
																		'endDate' => '0d',
																	]
																],
																'type' => DateControl::FORMAT_DATE,
															])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
															?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Izin-izin dan legalitas lainnya yang dimiliki</div>
                                            <div class="panel-body">
                                                <div class="form-group" id="add-izin-tdp-legal"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_5">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Pimpinan Perusahaan</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'v_jumlah_dirut')->textInput(['placeholder' => 'Isi Angka'])->label('Jumlah Dirut/Penanggungjawab') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'v_jumlah_sekutu_aktif')->textInput(['placeholder' => 'Isi Angka'])->label('Jumlah Sekutu') ?>
                                            </div>
                                        </div>
                                        <div class="form-group" id="add-izin-tdp-pimpinan"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Kegiatan Perusahaan</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">Jenis Kegiatan Usaha</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?php
                                                                $query1 = \backend\models\Kbli::find()
                                                                                ->joinWith('izinSiupKblis')
                                                                                ->join('LEFT JOIN', 'kbli kc', 'kc.parent_id = kbli.id')
                                                                                ->where(['izin_siup_kbli.izin_siup_id' => $model->izin_siup_id])
                                                                                ->andWhere(['kbli.parent_id'=>0])
                                                                                ->select(['kc.id as id', 'concat(kc.kode,concat(" | ",kc.nama)) as nama']);

                                                                $query = \backend\models\Kbli::find()
                                                                                ->joinWith('izinSiupKblis')
                                                                                ->where(['izin_siup_kbli.izin_siup_id' => $model->izin_siup_id])
                                                                                ->andWhere('kbli.parent_id <> 0')
                                                                                ->select(['kbli.id as id', 'concat(kbli.kode,concat(" | ",kbli.nama)) as nama'])
                                                                                ->union($query1)
                                                                                ->orderBy('id')
                                                                                ->asArray()->all();
                                                                ?>
                                                                <?=
                                                                $form->field($model, 'vi_a_kegiatan_utama')->widget(\kartik\widgets\Select2::classname(), [
                                                                    'data' => \yii\helpers\ArrayHelper::map($query, 'id', 'nama'),
                                                                    'options' => [
                                                                        'placeholder' => Yii::t('app', 'Pilih Kegiatan Pokok'),
                                                                        'onchange' => '
                                                                                $.post( "' . Yii::$app->urlManager->createUrl('izin-tdp/ket-kbli?kbli=') . '"+$(this).val()+"&izin=' . $model->izin_siup_id . '", function( data ) {
                                                                                    $( "#kbli_ket_utama" ).val( data );
                                                                                });
                                                                            '
                                                                    ],
                                                                    'pluginOptions' => [
                                                                        'allowClear' => true
                                                                    ],
                                                                ])
                                                                ?>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <?= $form->field($model, 'vi_a_produk_utama')->textInput(['maxlength' => '200', 'placeholder' => 'Produk Pokok', 'id' => 'kbli_ket_utama']); ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?= Html::a(Yii::t('app', 'Tambah Kegiatan Lainnya <i class="fa fa-plus"></i>'), '#', ['class' => 'btn btn-success kegiatan-button']) ?>
                                                            </div>

                                                        </div>
                                                        </br>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="kegiatan-form" style="display: none">
                                                                    <div class="form-group" id="add-izin-tdp-kegiatan"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
												<?= $form->field($model, 'vii_b_omset',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan nilai omset', 'class'=>'form-control number'])->label('Omset Perusahaan Ini Per Tahun <small>(setelah perusahaan beroperasi)</small>') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'vii_b_terbilang')->textInput(['maxlength' => true, 'placeholder' => 'Terbilang']) ?>
                                            </div>
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Modal Saham</div>
                                            <table class="table table-condensed">
                                                <tr>
                                                    <td style="text-align: center">1.</td>
                                                    <td><?= $form->field($model, 'vii_c1_dasar',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Isi Angka', 'class'=>'form-control number'])->label('Modal Dasar') ?></td>
                                                    <td style="text-align: center">4.</td>
                                                    <td><?= $form->field($model, 'vii_c4_saham')->textInput(['placeholder' => 'Isi Angka', 'class'=>'form-control'])->label('Banyaknya Saham (lbr.)') ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center">2.</td>
                                                    <td><?= $form->field($model, 'vii_c2_ditempatkan',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Isi Angka', 'class'=>'form-control number'])->label('Modal Ditempatkan') ?></td>
                                                    <td style="text-align: center">5.</td>
                                                    <td><?= $form->field($model, 'vii_c5_nominal',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Isi Angka', 'class'=>'form-control number'])->label('Nilai Nominal /Saham') ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center">3.</td>
                                                    <td><?= $form->field($model, 'vii_c3_disetor',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Isi Angka', 'class'=>'form-control number'])->label('Modal Disetor') ?></td>
                                                    <td style="text-align: center"></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">												
												<?= $form->field($model, 'vii_d_totalaset',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Isi Angka', 'class'=>'form-control number'])->label('Total Asset <small>(setelah perusahaan beroperasi)</small>') ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'vii_e_wni',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Orang</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Isi Angka', 'class'=>'form-control number'])->label('Jumlah Karyawan WNI') ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'vii_e_wna',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Orang</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Isi Angka', 'class'=>'form-control number'])->label('Jumlah Karyawan WNA') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?=
                                                $form->field($model, 'vii_f_matarantai')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Matarantai::find()->orderBy('id')->all(), 'id', 'nama'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih...'), ['id' => 'matarantai','onchange'=>'getval(this)']],
                                                    'hideSearch' => false,
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])->label('Kedudukan Dalam Mata Rantai Kegiatan Usaha')
                                                ?>
                                            </div>
                                        </div>
                                        <div id="cpp_" style="display: none;">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Jika <strong>Produsen</strong>, untuk perusahaan yang menggunakan mesin, agar mengisi data:</div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'vii_fa_jumlah')->textInput(['placeholder' => 'Isi Angka'])->label('Kapasitas Terpasang') ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?=
                                                            $form->field($model, 'vii_fa_satuan')->widget(\kartik\widgets\Select2::classname(), [
                                                                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Satuan::find()->orderBy('nama')->all(), 'id', 'nama'),
                                                                'options' => ['placeholder' => Yii::t('app', 'Pilih...')],
                                                                'hideSearch' => false,
                                                                'pluginOptions' => [
                                                                    'allowClear' => true
                                                                ],
                                                            ])->label('Satuan')
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'vii_fb_jumlah')->textInput(['placeholder' => 'Isi Angka'])->label('Kapasitas Produksi /Tahun') ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?=
                                                            $form->field($model, 'vii_fb_satuan')->widget(\kartik\widgets\Select2::classname(), [
                                                                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Satuan::find()->orderBy('nama')->all(), 'id', 'nama'),
                                                                'options' => ['placeholder' => Yii::t('app', 'Pilih...')],
                                                                'hideSearch' => false,
                                                                'pluginOptions' => [
                                                                    'allowClear' => true
                                                                ],
                                                            ])->label('Satuan')
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'vii_fc_lokal')->textInput(['placeholder' => 'Isi Angka'])->label('Kandungan Komponen Lokal (%)') ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'vii_fc_impor')->textInput(['placeholder' => 'Isi Angka'])->label('Kandungan Komponen Impor (%)') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="cpp__" style="display: none;">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Jika <strong>Pengecer</strong>, sebutkan jenis usaha:</div>
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <?= $form->field($model, 'vii_f_pengecer')->dropDownList([ 'Swalayan /Supermarket' => 'Swalayan /Supermarket', 'Toserba /Dept. Store' => 'Toserba /Dept. Store', 'Toko /Kios' => 'Toko /Kios', 'Lainnya' => 'Lainnya',], ['prompt' => 'Pilih...']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_7">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Kategori Perusahaan <small>(Kantor Tunggal tidak perlu mengisi) <cite>Apabila pendaftaran ini dilakukan oleh Kantor Pusat/Induk, agar disebutkan setiap Kantor Cabang/Kantor Pembantu/Perwakilan</cite></small></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" id="add-izin-tdp-kantorcabang"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.tab-content -->
                        <ul class="pager wizard">
                            <li class="previous"><a href="#">Previous</a></li>
                            <li class="next"><a href="#">Next</a></li>
                            <li class="next finish" style="display:none;"><a href="#">Finish</a></li>
                        </ul>
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->

            </div>
            <div class="box-footer">
				<div style='text-align: center'>
					<?= Html::submitButton(Yii::t('app', '<i class="fa fa-pencil-square-o"></i> Pengecekan Selesai'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				</div>
				<br>
				<div class="alert alert-info alert-dismissible">
					Click button <strong>Pengecekan Selesai</strong> diatas sebagai tanda telah dilakukan pengecekan dan sekaligus agar button <strong>Kirim</strong> dibawah dapat berfungsi.
				</div>		
			</div>
			<?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script src="/js/script_addrow.js"></script>
<script src="/js/jquery.min.js"></script>
<script>

$(document).ready(function() {
    $("#field_cpp").change(function() {
        if (this.value == 'Kantor Cabang' || this.value == 'Kantor Pembantu' || this.value == 'Perwakilan') {
            $('#cpp').show();
        }else{
            $("#cpp").hide();
        }
    });
});

<?php if($model->iii_2_status_prsh=='Kantor Cabang' || $model->iii_2_status_prsh=='Kantor Pembantu' || $model->iii_2_status_prsh=='Perwakilan'){?>
    $('#cpp').show();
<?php } ?>

$(document).ready(function() {
    $("#izintdp-vii_f_matarantai").change(function() {
        if (this.value == '1') {
            $('#cpp_').show();
			$('#cpp__').hide();
        }else if(this.value == '6') {
            $('#cpp__').show();
			$("#cpp_").hide();
        }else{
            $("#cpp_").hide();
			 $('#cpp__').hide();
        }
    });
});

<?php if($model->vii_f_matarantai=='1'){?>
    $('#cpp_').show();
<?php } elseif($model->vii_f_matarantai=='6'){?>
    $('#cpp__').show();
<?php }else{?>
	$('#cpp_').hide();
	$('#cpp__').hide();
<?php } ?>
</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content alert alert-success" style='border-radius:10px;'>
	 <button type="button" class="close" data-dismiss="modal">&times;</button>
	
	<h4>	<i class="icon fa fa-bell"></i> Pengecekan Selesai</h4>
	
      <div class="modal-body">
        <p>Pengecekan selesai data berhasil di update</p>
      </div>
    </div>

  </div>
</div>

<script>

$(document).ready(function(){

$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(id){
    return $.getUrlVars()[id];
  }
});

//var allVars = $.getUrlVars();
var id = $.getUrlVar('alert');


	if (typeof id === 'undefined') {
		$('.btn-disabled').attr('disabled', true);
	}else{
		$('.btn-disabled').attr('disabled', false);
		$('#myModal').modal('show');
		
		setTimeout(function(){
			$("#myModal").modal('hide')
		}, 5000);
	}

});	
</script>

<script src="/js/wizard_tdp_fa.js"></script>
