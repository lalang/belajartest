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
/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPenelitian */
/* @var $form yii\widgets\ActiveForm */
$session = Yii::$app->session;
$session->set('izin_id', $model->izin_id);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AnggotaPenelitian', 
        'relID' => 'anggota-penelitian', 
        'value' => \yii\helpers\Json::encode($model->anggotaPenelitians),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPenelitianLokasi', 
        'relID' => 'izin-penelitian-lokasi', 
        'value' => \yii\helpers\Json::encode($model->izinPenelitianLokasis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPenelitianMetode', 
        'relID' => 'izin-penelitian-metode', 
        'value' => \yii\helpers\Json::encode($model->izinPenelitianMetodes),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

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

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Izin Penelitian</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin(['id' => 'form-izin-penelitian']); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                
                
                <div class="izin-penelitian-form">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemohon/Pengurus</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Identitas Lembaga</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Data Pelaksana Penelitian</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Disclaimer</a></li>
                            <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                        </ul>
                        <div id="result"></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Pemohon/Pengurus</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>
                                            </div>
                                            <div class="col-md-3">
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
                                                        ],
                                                    ],
                                                    'type' => DateControl::FORMAT_DATE,
                                                ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'alamat_pemohon')->textarea(['rows' => 5]) ?>
                                            </div>
                                        </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                    <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) ?>
                                                </div>
												<div class="col-md-4">
													<?= $form->field($model, 'provinsi_pemohon')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
												</div>
                                            </div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kabupaten_pemohon', $model->kabupaten_pemohon, ['id' => 'model_id']); ?>
                                                <?=
                                                $form->field($model, 'kabupaten_pemohon')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kabkota-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id'],
                                                        'placeholder' => 'Pilih Kota...',
                                                        'url' => Url::to(['subkot']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id']
                                                    ]
                                                ]);
                                                ?>
                                              </div>
												<div class="col-md-4">
													<?php echo Html::hiddenInput('kecamatan_pemohon', $model->kecamatan_pemohon, ['id' => 'model_id1']); ?>
													<?=
													$form->field($model, 'kecamatan_pemohon')->widget(\kartik\widgets\DepDrop::classname(), [
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
													<?php echo Html::hiddenInput('kelurahan_pemohon', $model->kelurahan_pemohon, ['id' => 'model_id2']); ?>
													<?=
													$form->field($model, 'kelurahan_pemohon')->widget(\kartik\widgets\DepDrop::classname(), [
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
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'telepon_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'pekerjaan_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'email@email.com']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                            </div>

                            <div class="tab-pane " id="tab_2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Lembaga</div>
                                    <div class="panel-body">
                                         <div class="row">
                                            <div class="col-md-4">
                                                <?php 
                                                    if($model->npwp){
                                                    echo $form->field($model, 'npwp')->textInput(['disabled' => true,'maxlength' => true, 'placeholder' => 'Npwp Perusahaan']);
                                                    }
                                                    else
                                                     echo $form->field($model, 'npwp')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan']);
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'nama_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) ?>
                                            </div>
											<div class="col-md-4">
                                                <?= $form->field($model, 'fakultas')->textInput(['maxlength' => true, 'placeholder' => 'Nama Fakultas(optional)']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
											<div class="col-md-12">
												<?= $form->field($model, 'alamat_instansi')->textarea(['rows' => 5]) ?>
											</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'provinsi_instansi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id_tab2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?php echo Html::hiddenInput('kabupaten_instansi', $model->kabupaten_instansi, ['id' => 'model_id1_tab2']); ?>
                                                <?=
                                                $form->field($model, 'kabupaten_instansi')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kabkota-id_tab2'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id_tab2'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subkot']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1_tab2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?php echo Html::hiddenInput('kecamatan_instansi', $model->kecamatan_instansi, ['id' => 'model_id1_tab2']); ?>
                                                <?=
                                                $form->field($model, 'kecamatan_instansi')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id_tab2'],
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id_tab2','kabkota-id_tab2'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subkec']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1_tab2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?php echo Html::hiddenInput('kelurahan_instansi', $model->kelurahan_instansi, ['id' => 'model_id2_tab2']); ?>
                                                <?=
                                                $form->field($model, 'kelurahan_instansi')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['prov-id_tab2','kabkota-id_tab2', 'kec-id_tab2'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['subkel']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2_tab2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
										</div>
                                        <div class="row">	
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'kodepos_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Instansi']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'email_instansi')->textInput(['maxlength' => true, 'placeholder' => 'email@email.com']) ?>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'telepon_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Instansi']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'fax_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Fax Instansi']) ?>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Data Pelaksanaan Penelitian</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'tema')->textarea(['placeholder' => '']) ?>
                                            </div>
											
										 </div>
                                        <div class="row">
											<div class="form-group" id="add-izin-penelitian-lokasi"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'instansi_penelitian')->textInput(['maxlength' => true, 'placeholder' => 'Nama Instansi']) ?>
                                            </div>
											<div class="col-md-6">
                                                <?= $form->field($model, 'bidang_penelitian')->textInput(['placeholder' => 'Bidang Penelitian']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
								
                                                <?= $form->field($model, 'alamat_penelitian')->textarea(['placeholder' => '']) ?>
                                            </div>
                                            
<!--                                            <div class="col-md-4">
                                                <?php // $form->field($model, 'nama_notaris_pengesahan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pengesahan']) ?>
                                            </div>-->
                                        </div>
                                        <div class="row">
                                           <div class="form-group" id="add-izin-penelitian-metode"></div>
                   
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4">
												<?=
												$form->field($model, 'tgl_mulai_penelitian', [
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
												<?=
												$form->field($model, 'tgl_akhir_penelitian', [
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
                                        
											   <?= $form->field($model, 'anggota')->textInput(['maxlength' => true, 'placeholder' => 'Jumlah anggota']) ?>
											</div>
                                        </div>
                                        
                                        <div class="row">
                                           <div class="form-group" id="add-anggota-penelitian"></div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="tab_4">
                                <div class="callout callout-warning">
                                    <font size="3px"> <?php echo Params::findOne("disclaimer")->value; ?></font>
                                </div>
                                <br/>
                                <input type="checkbox" id="check-dis" /> Saya Setuju
                                <div class="box text-center" style='padding:20px;'>
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
                <?php ActiveForm::end(); ?>

            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
<script src="/js/script_addrow.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/wizard_penelitian.js"></script>
