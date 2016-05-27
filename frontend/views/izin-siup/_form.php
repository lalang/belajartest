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

//use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinSiupAkta',
        'relID' => 'izin-siup-akta',
        'value' => \yii\helpers\Json::encode($model->izinSiupAktas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'izin_id' => $model->izin_id,
        'class' => 'IzinSiupKbli',
        'relID' => 'izin-siup-kbli',
        'value' => \yii\helpers\Json::encode($model->izinSiupKblis),
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
                <h3 class="box-title">Buat Permohonan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php
                $min = \backend\models\Izin::findOne($model->izin_id)->min;
                $max = \backend\models\Izin::findOne($model->izin_id)->max;
                ?>

                <?php $form = ActiveForm::begin(['id' => 'form-izin-siup']); ?>

                <?= $form->errorSummary($model); ?>

                <input type="hidden" value="<?php echo $min; ?>" class="LimitMin" />
                <input type="hidden" value="<?php echo $max; ?>" class="LimitMax" />

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'tipe', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>	
                <?php // $form->field($model, 'izin_id')->dropDownList(\backend\models\Bidang::getBidangOptions(), ['id' => 'bid-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Bidang..'])->label('Nama Bidang');  ?>


                <div class="siup-form">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Identitas Perusahaan</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Legalitas Perusahaan</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Modal dan Saham</a></li>
                            <li><a href="#tab_5" data-toggle="tab">Kegiatan Usaha</a></li>
                            <li><a href="#tab_6" data-toggle="tab">Neraca Perusahaan</a></li>
                            <li><a href="#tab_7" data-toggle="tab">Disclaimer</a></li>
                            <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                        </ul>
                        <div id="result"></div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Pemilik/Pengurus</div>
                                    <div class="panel-body">

                                        <?php
                                        //Cek apa perusahaan atau perorangan
                                        //Erwin Aja
                                        if ($model->tipe == "Perorangan") {
                                            $status_readonly = true;
                                        } else {
                                            $status_readonly = false;
                                        }
                                        ?>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'ktp')->textInput(['maxlength' => true, 'placeholder' => 'Ktp', /* Erwin Aja */ 'readonly' => $status_readonly /* Erwin Aja */, 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-6">	
                                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama', /* Erwin Aja */ 'readonly' => $status_readonly /* Erwin Aja */, 'style' => 'width:100%']) ?>
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
                                                        ]
                                                    ],
                                                    'type' => DateControl::FORMAT_DATE,
                                                ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                                                ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Contoh : 02112345678']) ?>	
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'fax')->textInput(['maxlength' => true, 'placeholder' => 'Fax']) ?>	
                                            </div>
                                        </div>	
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Paspor']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?=
                                                $form->field($model, 'kewarganegaraan')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('nama_negara')->asArray()->all(), 'nama_negara', 'nama_negara'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
                                                    'hideSearch' => false,
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'jabatan_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Jabatan Perusahaan']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Perusahaan</div>

                                    <?php
                                    //Cek apa perusahaan atau perorangan
                                    if ($model->tipe == "Perusahaan") {
                                        $status_readonly = true;
                                    } else {
                                        $status_readonly = false;
                                    }
                                    ?>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'NPWP Perusahaan', 'readonly' => $status_readonly])->hint('Diisi hanya angka (tanpa . atau -). Untuk Perorangan masukkan NPWP Perorangan') ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?=
                                                $form->field($model, 'bentuk_perusahaan')->dropDownList($data_bp, ['prompt' => 'Pilih Bentuk Perusahaan..'], ['label' => '']
                                                )
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6])->hint('Diisi Nama jalan, Nomor, Rt/Rw')
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'wilayah_id')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kecamatan_id', $model->kecamatan_id, ['id' => 'model_id1']); ?>
                                                <?=
                                                $form->field($model, 'kecamatan_id')->widget(\kartik\widgets\DepDrop::classname(), [
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
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kelurahan_id', $model->kelurahan_id, ['id' => 'model_id2']); ?>
                                                <?=
                                                $form->field($model, 'kelurahan_id')->widget(\kartik\widgets\DepDrop::classname(), [
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true, 'placeholder' => 'Kode Pos']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Contoh : 02112345678']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'status_perusahaan')->dropDownList($data_sp) ?>
                                            </div>
                                        </div>		
                                    </div>
                                </div>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Legalitas Perusahaan</div>
                                    <div class="panel-body">	
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Akta Pendirian</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <?= $form->field($model, 'akta_pendirian_no')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Akta Pendirian'])->label('Nomor Akta Pendirian') ?>
                                                    </div>

                                                    <div class="col-md-7">
                                                        <?=
                                                        $form->field($model, 'akta_pendirian_tanggal', [
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
                                                    <div class="col-md-5">
                                                        <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true, 'placeholder' => 'No Sk kemenkumham'])->label('Nomor SK Kemenkumham') ?>
                                                    </div>

                                                    <div class="col-md-7">

                                                        <?=
                                                        $form->field($model, 'tanggal_pengesahan', [
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


                                        <hr>


                                        <!--<div class="panel col-md-12 text-center">-->

                                        <?= Html::a(Yii::t('app', 'Tambah Akta Perubahan <i class="fa fa-plus"></i>'), '#', ['class' => 'btn btn-success akta-button']) ?>


                                        <!--</div>-->


                                        <div class="akta-form" style="display: none">

                                            <div class="form-group" id="add-izin-siup-akta"></div>

                                        </div>

                                    </div>
                                </div>
                            </div>  
                            <div class="tab-pane" id="tab_4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Modal Dan Saham</div>
                                    <div class="panel-body">	
                                        <div class="panel panel-info">
                                            <div class="panel-heading">1. Modal dan nilai kekayaan bersih perusahaan (Tidak Termasuk Tanah dan Bangunan Tempat Usaha)</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?=
                                                        $form->field($model, 'modal', [
                                                            'inputTemplate' => '<div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                Rp
                                                                            </div>
                                                                            {input}
                                                                        </div><div>Sesuai dengan AKTA Perubahan terakhir pada Pasal 4 ayat 2 (MODAL ditempatkan / disetor)
                                                                        ditambah Laba/Rugi Usaha</div>'])->textInput(['class' => 'form-control number kekayaan-bersih'])
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                        <div class="panel panel-info">
                                            <div class="panel-heading">2. Saham (Khusus untuk penanam modal asing)</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?=
                                                        $form->field($model, 'nilai_saham_pma', [
                                                            'inputTemplate' => '<div class="input-group">
																				<div class="input-group-addon">
																					Rp
																				</div>
																				{input}
																			</div>'])->textInput(['class' => 'form-control number'])
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?=
                                                        $form->field($model, 'saham_nasional', [
                                                            'horizontalCssClasses' => [
                                                                'wrapper' => 'col-sm-3',
                                                            ],
                                                            'inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->label('Komposisi Kepemilikan Saham Nasional')
                                                        ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?=
                                                        $form->field($model, 'saham_asing', [
                                                            'horizontalCssClasses' => [
                                                                'wrapper' => 'col-sm-3',
                                                            ],
                                                            'inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->label('Komposisi Kepemilikan Saham Asing')
                                                        ?>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>	

                                    </div>
                                </div>	

                            </div>  
                            <div class="tab-pane" id="tab_5">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Kegiatan Usaha</div>
                                    <div class="panel-body">	
                                        <div class="row">
                                            <div class="col-md-12">

                                                <?=
                                                $form->field($model, 'matarantai_id')->dropDownList($data_lembaga, ['prompt' => 'Pilih Bentuk Kelembagaan..'], ['label' => '']
                                                )->label('Kelembagaan');
                                                ?>

                                                <?php // $form->field($model, 'kelembagaan')->textInput(['readOnly' => true])  ?>
                                            </div>
                                        </div>
                                        <div class="form-group" id="add-izin-siup-kbli"></div>
                                    </div>	
                                </div> 
                            </div>	
                            <div class="tab-pane" id="tab_6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Neraca Perusahaan</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?=
                                                $form->field($model, 'tanggal_neraca', [
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
                                        </div>	
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h2>AKTIVA :</h2>
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">1. Aktiva Lancar</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_lancar_kas', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control aktiva_lancar aktiva number'])->label('Kas')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_lancar_bank', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control aktiva_lancar aktiva number'])->label('Bank')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_lancar_piutang', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control aktiva_lancar aktiva number'])->label('Piutang')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_lancar_barang', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control aktiva_lancar aktiva number'])->label('Persediaan Barang')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_lancar_pekerjaan', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control aktiva_lancar aktiva number'])->label('Pekerjaan dalam proses')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <b>Jumlah</b>
                                                                <br>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Rp</div>
                                                                        <input type="text" class="form-control jumlah number" id="total_aktiva_lancar" readonly="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="panel panel-info">
                                                    <div class="panel-heading">2. Aktiva Tetap</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_tetap_peralatan', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control aktiva_tetap aktiva number'])->label('Peralatan dlm mesin')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_tetap_investasi', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div><div>Termasuk nilai gedung, tanah, atau sewa gedung</div>'])->textInput(['class' => 'form-control aktiva_tetap aktiva number'])->label('Investasi')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <b>Jumlah</b>
                                                                <br>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Rp</div>
                                                                        <input type="text" class="form-control jumlah number" id="total_aktiva_tetap" readonly="true">
                                                                    </div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="panel panel-info">
                                                    <div class="panel-heading">3. Aktiva Lainnya</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'aktiva_lainnya', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-11', 'offset' => ''
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control aktiva_lainnya aktiva number'])->label(false)
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <h2>PASIVA :</h2>
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">4. Hutang Jangka Pendek</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'pasiva_hutang_dagang', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control pasiva_jangka_pendek aktiva number'])->label('Hutang dagang')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'pasiva_hutang_pajak', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control pasiva_jangka_pendek aktiva number'])->label('Hutang pajak')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'pasiva_hutang_lainnya', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-5', 'offset' => '', 'label' => 'col-sm-2'
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control pasiva_jangka_pendek aktiva number'])->label('Hutang lainnya')
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <b>Jumlah</b>
                                                                <br>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Rp</div>
                                                                        <input type="text" class="form-control jumlah_pasiva number" id="total_pasiva_hutang_pendek" readonly="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	


                                                <div class="panel panel-info">
                                                    <div class="panel-heading">5. Hutang Jangka Panjang</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'hutang_jangka_panjang', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-11', 'offset' => '',
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control pasiva_jangka_panjang aktiva number'])->label(false)
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="panel panel-info">
                                                    <div class="panel-heading">6. Kekayaan Bersih</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?=
                                                                $form->field($model, 'kekayaan_bersih', ['horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-11', 'offset' => '',
                                                                    ], 'inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['class' => 'form-control pasiva_jangka_panjang aktiva number kekayaan-bersih2', 'readonly' => true])->label(false)
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	

                                            </div>
                                        </div>	
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b>JUMLAH</b>
                                                <br>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Rp</div>
                                                        <input type="text" class="form-control number" id="total_aktiva" readonly="true">
                                                    </div></div>



                                            </div>
                                            <div class="col-md-6">
                                                <b>JUMLAH</b>
                                                <br>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Rp</div>
                                                        <input type="text" class="form-control number total_pasivaclass" id="total_pasiva" readonly="true">
                                                    </div></div>



                                            </div>
                                        </div>	




                                    </div>
                                </div>	


                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_7">
                                <div class="callout callout-warning">
                                    <font size="3px"> <?= Params::findOne("disclaimer")->value; ?></font>
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

<script src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.kekayaan-bersih').on('keyup', function() {
            $('.kekayaan-bersih2').val($('.kekayaan-bersih').val());
            $('.total_pasivaclass').val($('.kekayaan-bersih').val());
        });

        $('.kekayaan-bersih2').on('keyup', function() {
            $('.kekayaan-bersih').val($('.kekayaan-bersih2').val());
        });

    });


</script>
<script src="/js/wizard.js"></script>  
