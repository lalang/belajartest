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

<div class="row">
    <div class="col-md-12">
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Form Permohonan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <?php
                $min = \backend\models\Izin::findOne($model->izin_id)->min;
                $max = \backend\models\Izin::findOne($model->izin_id)->max;
                ?>

                <?php $form = ActiveForm::begin(['id' => 'form-izin-pariwisata']); ?>

                <?= $form->errorSummary($model); ?>

                <input type="hidden" value="<?php echo $min; ?>" class="LimitMin" />
                <input type="hidden" value="<?php echo $max; ?>" class="LimitMax" />

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'tipe', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'nama_izin', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>	

                <div class="pariwisata-form">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Identitas Perusahaan</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Legalitas Prusahaan</a></li>
							<li><a href="#tab_4" data-toggle="tab">Identitas Penanggung Jawab</a></li>
							<li><a href="#tab_5" data-toggle="tab">Data Usaha Pariwisata</a></li>
                            <li><a href="#tab_6" data-toggle="tab">Disclaimer</a></li>
                        </ul>
                        <div id="result"></div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Pemilik</div>
                                    <div class="panel-body">		
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'readonly' => $status_field, 'placeholder' => 'NIK', 'readonly' => $status_readonly, 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-6">	
                                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Lengkap', 'readonly' => $status_readonly, 'style' => 'width:100%']) ?>
                                            </div>
										</div>	
										<div class="row">
                                            <div class="col-md-4">	
                                                 <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir', 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
											<div class="col-md-4">	
                                                 <?=
                                                $form->field($model, 'tanggal_lahir', [
                                                    'horizontalCssClasses' => [
                                                        'wrapper' => 'col-sm-3',
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
                                                <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'Laki-Laki', 'P' => 'Perempuan']); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?=
                                                $form->field($model, 'alamat')->textarea(['rows' => 6])
                                                //->hint('Diisi Nama jalan, Nomor, Rt/Rw') 
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'RT', 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'RW', 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'propinsi_id')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('wilayah_id', $model->wilayah_id, ['id' => 'model_id']); ?>
                                                <?=
                                                $form->field($model, 'wilayah_id')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kabkota-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id'],
                                                        'placeholder' => 'Pilih Kota...',
                                                        'url' => Url::to(['subkot']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id']
                                                    ]
                                                ])->label('Kota / Kabupaten');
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kecamatan_id', $model->kecamatan_id, ['id' => 'model_id1']); ?>
                                                <?=
                                                $form->field($model, 'kecamatan_id')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id', 'kabkota-id'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subkec']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kelurahan_id', $model->kelurahan_id, ['id' => 'model_id2']); ?>
                                                <?=
                                                $form->field($model, 'kelurahan_id')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id', 'kabkota-id', 'kec-id'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['subkel']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
                                            </div>
                                        </div>	
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?=
                                                $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih Negara')],
                                                    'hideSearch' => false,
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])
                                                ?>
                                            </div>
                                            <div class="col-md-6" id='kitas'>
                                                <?= $form->field($model, 'kitas')->textInput(['maxlength' => true, 'placeholder' => 'Silakan Isi Kitas']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <div class="tab-pane" id="tab_2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Perusahaan</div>

                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <?= $form->field($model, 'nama_gedung_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Perusahaan']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'blok_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Blok Perusahaan']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                               <?= $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6]) ?>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-4">
                                               <?= $form->field($model, 'propinsi_id_perusahaan')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
                                            </div>
											<div class="col-md-4">
                                                <?php echo Html::hiddenInput('wilayah_id_perusahaan', $model->wilayah_id_perusahaan, ['id' => 'model_id']); ?>
                                                <?=
                                                $form->field($model, 'wilayah_id_perusahaan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kabkota-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id2'],
                                                        'placeholder' => 'Pilih Kota...',
                                                        'url' => Url::to(['subkot']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id']
                                                    ]
                                                ])->label('Kota / Kabupaten');
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kecamatan_id_perusahaan', $model->kecamatan_id_perusahaan, ['id' => 'model_id1']); ?>
                                                <?=
                                                $form->field($model, 'kecamatan_id_perusahaan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id2', 'kabkota-id'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subkec']),
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
												<?php echo Html::hiddenInput('kelurahan_id_perusahaan', $model->kelurahan_id_perusahaan, ['id' => 'model_id2']); ?>
                                                <?=
                                                $form->field($model, 'kelurahan_id_perusahaan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id2', 'kabkota-id', 'kec-id'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['subkel']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2']
                                                    ]
                                                ]);
                                                ?>
											</div>
											<div class="col-md-4">
												<?= $form->field($model, 'kodepos_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan']) ?>
											</div>
											<div class="col-md-4">
												 <?= $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) ?>
											</div>
										</div>	
									   <div class="row">
                                            <div class="col-md-6">
												<?= $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) ?>
											</div>
											<div class="col-md-6">
												<?= $form->field($model, 'email_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Email Perusahaan']) ?>
											</div>
										</div>	
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Legalitas Perusahaan</div>
                                    <div class="panel-body">

										<div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'nomor_akta_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Akta Pendirian']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'tanggal_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
													'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pendirian')],
													'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
													'pluginOptions' => [
														'autoclose' => true,
														'format' => 'dd-M-yyyy'
													]
												]); ?>
                                            </div>
											<div class="col-md-4">
                                                <?= $form->field($model, 'nama_notaris_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pendirian']) ?>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'nomor_sk_pengesahan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Sk Pengesahan']) ?>
                                            </div>
											<div class="col-md-4">
                                                <?= $form->field($model, 'tanggal_pengesahan')->widget(\kartik\widgets\DatePicker::classname(), [
													'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pengesahan')],
													'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
													'pluginOptions' => [
														'autoclose' => true,
														'format' => 'dd-M-yyyy'
													]
												]); ?>
                                            </div>
										</div>

										<?= Html::a(Yii::t('app', 'Tambah Akta Perubahan <i class="fa fa-plus"></i>'), '#', ['class' => 'btn btn-success akta-button']) ?>


                                        <div class="akta-form" style="display: none">

                                            <div class="form-group" id="add-izin-pariwisata-akta"></div>

                                        </div>

										
                                    </div>
                                </div>
                            </div>	
							<div class="tab-pane" id="tab_4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Penanggung Jawab</div>
                                    <div class="panel-body">
										
										<div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'identitas_sama')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
                                            </div>
										</div>	
										<div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nik_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Nik Penanggung Jawab']) ?>
                                            </div>
											<div class="col-md-6">
                                                <?= $form->field($model, 'nama_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Nama Penanggung Jawab']) ?>
                                            </div>
										</div>
										<div class="row">
                                            <div class="col-md-4">
												<?= $form->field($model, 'tempat_lahir_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Penanggung Jawab']) ?>
                                            </div>
											<div class="col-md-4">
												<?= $form->field($model, 'tanggal_lahir_penanggung_jawab')->widget(\kartik\widgets\DatePicker::classname(), [
													'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir Penanggung Jawab')],
													'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
													'pluginOptions' => [
														'autoclose' => true,
														'format' => 'dd-M-yyyy'
													]
												]); ?>
                                            </div>
											<div class="col-md-4">
												<?= $form->field($model, 'jenkel_penanggung_jawab')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>
                                            </div>
										</div>
										<div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'alamat_penanggung_jawab')->textarea(['rows' => 6]) ?>
                                            </div>
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'rt_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'RT', 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'rw_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'RW', 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'propinsi_id_penanggung_jawab')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('wilayah_id_penanggung_jawab', $model->wilayah_id_penanggung_jawab, ['id' => 'model_id']); ?>
                                                <?=
                                                $form->field($model, 'wilayah_id_penanggung_jawab')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kabkota-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id'],
                                                        'placeholder' => 'Pilih Kota...',
                                                        'url' => Url::to(['subkot']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id']
                                                    ]
                                                ])->label('Kota / Kabupaten');
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kecamatan_id_penanggung_jawab', $model->kecamatan_id_penanggung_jawab, ['id' => 'model_id1']); ?>
                                                <?=
                                                $form->field($model, 'kecamatan_id_penanggung_jawab')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id', 'kabkota-id'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subkec']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kelurahan_id_penanggung_jawab', $model->kelurahan_id_penanggung_jawab, ['id' => 'model_id2']); ?>
                                                <?=
                                                $form->field($model, 'kelurahan_id_penanggung_jawab')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id', 'kabkota-id', 'kec-id'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['subkel']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'kodepos_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'telepon_penanggung_jawab')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>
                                            </div>
                                        </div>	
										

                                    </div>
                                </div>
                            </div>
							<div class="tab-pane" id="tab_5">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Data Usaha Pariwisata</div>
                                    <div class="panel-body">
									
										
									
										<div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'no_tdup')->textInput(['maxlength' => true, 'placeholder' => 'No Tdup']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'tanggal_tdup')->widget(\kartik\widgets\DatePicker::classname(), [
													'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Tdup')],
													'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
													'pluginOptions' => [
														'autoclose' => true,
														'format' => 'dd-M-yyyy'
													]
												]); ?>
                                            </div>
                                        </div>	
										<div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'merk_nama_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Merk Nama Usaha']) ?>
                                            </div>
                                        </div>
								
										<!--s: map -->
										<div class="gllpLatlonPicker">  
                                            <div id="panel-map">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-info alert-dismissible">
                                                            <h4>	<i class="icon fa fa-check"></i> Panduan!</h4>
                                                            Panduan Dalam Menentukan Lokasi Usaha Sebagai Berikut :
                                                            <ul>
                                                                <li>
                                                                    Ketikkan alamat perusahaan, cth : Jl. Aipda KS Tubun, klik tombol <strong>Cari</strong>
                                                                </li>
                                                                <li>
                                                                    Klik Dua kali pada Peta dimana lokasi Perusahaan beroperasi
                                                                </li>
                                                                <li>
                                                                    Atau ketikan koordinat "Latitude" "Longitude", klik tombol <strong>Update Map</strong> untuk melihat lokasi pada peta
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class='input-group'><div class='input-group-addon'>Tentukan Wilayah Badan Usaha / Usaha</div>
                                                            <input type="text" class="gllpSearchField form-control">
                                                        </div>
                                                    </div>	
                                                    <div class="col-md-6">			
                                                        <input type="button" class="gllpSearchButton btn btn-primary" value="Cari">
                                                    </div>
                                                </div>

                                                <div class="row" style='margin-top:10px'>
                                                    <div class="col-md-12">
                                                        <div class="gllpMap">Google Maps</div>
                                                    </div>
                                                </div>

                                                <input type="hidden" class="gllpZoom form-control" value="18"/>

                                                <div class="row">
                                                    <div class="col-md-4">	
                                                        <?= $form->field($model, 'latitude', ['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Latitude</div>{input}</div>'])->label('')->textInput(['maxlength' => true, 'placeholder' => 'Masukan titik Lat', 'class' => 'gllpLatitude form-control', 'value' => $koordinat_1, 'id' => 'latitude', 'style' => 'width:200px;']) ?>
                                                    </div>
                                                    <div class="col-md-4">	
                                                        <?= $form->field($model, 'longtitude', ['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Longitude</div>{input}</div>'])->label('')->textInput(['maxlength' => true, 'placeholder' => 'Masukan titik Long', 'class' => 'gllpLongitude form-control', 'value' => $koordinat_2, 'style' => 'width:200px;']) ?>
                                                    </div>
                                                    <div class="col-md-4">	
                                                        <input type="button" style='margin-left:10px; margin-top:20px;' class="gllpUpdateButton btn btn-info" value="Update Map">	
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>	
										<!--e: map -->
								
										<div class="row">
                                            <div class="col-md-6">
                                                 <?= $form->field($model, 'nama_gedung_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Usaha']) ?>
                                            </div>
											<div class="col-md-6">
                                                <?= $form->field($model, 'blok_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Blok Usaha']) ?>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'alamat_usaha')->textarea(['rows' => 6]) ?>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'rt_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Rt Usaha']) ?>
                                            </div>
											<div class="col-md-4">
                                                <?= $form->field($model, 'rw_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Rw Usaha']) ?>
                                            </div>
											<div class="col-md-4">
                                                <?= $form->field($model, 'kelurahan_id_usaha')->textInput(['placeholder' => 'Kelurahan Id Usaha']) ?>

                                            </div>
										</div>
										<div class="row">	
											<div class="col-md-4">
                                                <?= $form->field($model, 'kecamatan_id_usaha')->textInput(['placeholder' => 'Kecamatan Id Usaha']) ?>
                                            </div>
											<div class="col-md-4">
                                                 <?= $form->field($model, 'wilayah_id_usaha')->textInput(['placeholder' => 'Wilayah Id Usaha']) ?>
                                            </div>
											<div class="col-md-4">
                                                <?= $form->field($model, 'kodepos_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Usaha']) ?>
                                            </div>
                                        </div>
										<div class="row">	
											<div class="col-md-6">
                                                <?= $form->field($model, 'telpon_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Usaha']) ?>
                                            </div>
											<div class="col-md-6">
                                                 <?= $form->field($model, 'fax_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Fax Usaha']) ?>
                                            </div>
                                        </div>
										<div class="row">	
											<div class="col-md-4">
                                                <?= $form->field($model, 'nomor_objek_pajak_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Objek Pajak Usaha']) ?>
                                            </div>
											<div class="col-md-4">
                                                 <?= $form->field($model, 'jumlah_karyawan')->textInput(['placeholder' => 'Jumlah Karyawan']) ?>
                                            </div>
											<div class="col-md-4">
                                                 <?= $form->field($model, 'npwpd')->textInput(['maxlength' => true, 'placeholder' => 'Npwpd']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="tab-pane" id="tab_6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Disclaimer</div>
                                    <div class="panel-body">
                                        <div class="callout callout-warning">
                                            <font size="3px"> <?= Params::findOne("disclaimer")->value; ?></font>
                                        </div>
                                        <br/>
                                        <input type="checkbox" id="check-dis" /> Saya Setuju
                                        <div class="box text-center" style='padding:20px;'>
                                            <br>
                                            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Daftar Permohonan Izin') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                                        </div>
                                        <br/>
                                    </div>
                                </div>
                            </div>	
                            <ul class="pager wizard">
                                <li class="previous"><a href="#">Previous</a></li>
                                <li class="next"><a href="#">Next</a></li>
                                <li class="next finish" style="display:none;"><a href="#">Finish</a></li>
                            </ul>
                        </div>	
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>	
<script src="/js/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="<?= Yii::getAlias('@front') ?>/google_map/jquery-gmaps-latlon-picker.js"></script></p>
<style>
    #panel-map{margin-bottom:20px}
    .gllpMap { width: 100%; height: 350px; margin: 0; padding: 0; }
    .gllpLatlonPicker { border: none; margin: 0; padding: 0; }
    .gllpLatlonPicker input { width: auto; }
    .gllpLatlonPicker P { margin: 0; padding: 0; }
    .code { margin: 20px 0; font-size: 0.9em; width: 100%; font-family: "Monofur", courier; background-color: #555; padding: 15px; box-shadow: #f6f6f6 1px 1px 3px; color: #999; }
</style>
<script src="/js/wizard_pariwisata.js"></script>
