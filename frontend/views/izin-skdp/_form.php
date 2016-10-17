<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;

$session = Yii::$app->session;
$session->set('izin_id', $model->izin_id);

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSkdp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinSkdpAkta',
        'relID' => 'izin-skdp-akta',
        'value' => \yii\helpers\Json::encode($model->izinSkdpAktas),
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
                <h3 class="box-title">Surat Keterangan Domisili Badan Usaha (SKDP)</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin(['id' => 'form-izin-skdp']); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'tipe', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>	

                <div class="skdp-form">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Identitas Perusahaan</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Legalitas Perusahaan</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Disclaimer</a></li>
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
                                                <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik', /* Erwin Aja */ 'readonly' => $status_readonly /* Erwin Aja */]) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama', /* Erwin Aja */ 'readonly' => $status_readonly /* Erwin Aja */]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan'], ['disabled' => False]) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu'], ['disabled' => False]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'alamat')->textarea(['rows' => 5]) ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'propinsi_id')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
                                            </div>
                                            <div class="col-md-6">
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
                                                ]);
                                                ?>
                                                <?php //  $form->field($model, 'i_3_pemilik_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?=
                                                $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
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

                            <div class="tab-pane " id="tab_2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Perusahaan</div>
                                    <div class="panel-body">
                                        <?php
                                        //Cek apa perusahaan atau perorangan
                                        if ($model->tipe == "Perusahaan") {
                                            $status_readonly = true;
                                        } else {
                                            $status_readonly = false;
                                        }
                                        ?>
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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan', 'readonly' => $status_readonly]) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan', 'readonly' => $status_readonly]) ?>
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
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'rt_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Rt Perusahaan']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'rw_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Rw Perusahaan']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'wilayah_id_perusahaan')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id_tab2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kecamatan_id_perusahaan', $model->kecamatan_id_perusahaan, ['id' => 'model_id1_tab2']); ?>
                                                <?=
                                                $form->field($model, 'kecamatan_id_perusahaan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id_tab2'],
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id_tab2'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subcat']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1_tab2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kelurahan_id_perusahaan', $model->kelurahan_id_perusahaan, ['id' => 'model_id2_tab2']); ?>
                                                <?=
                                                $form->field($model, 'kelurahan_id_perusahaan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id_tab2', 'kec-id_tab2'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['prod']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2_tab2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'kodepos_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'klarifikasi_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Klarifikasi Usaha']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'jumlah_karyawan')->textInput(['placeholder' => 'Jumlah Karyawan']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php
                                                if ($model->isNewRecord) {
                                                    $model->status_kantor = 'Virtual Office';
                                                    $model->status_kepemilikan = 'Milik Sendiri';
                                                }
                                                ?>
                                                <?=
                                                $form->field($model, 'status_kantor')->radioList([
                                                    'Virtual Office' => 'Virtual Office',
                                                    'Kantor Bersama' => 'Kantor Bersama',
                                                    'Kantor Mandiri' => 'Kantor Mandiri',
                                                ])
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?=
                                                $form->field($model, 'status_kepemilikan')->radioList([
                                                    'Milik Sendiri' => 'Milik Sendiri',
                                                    'Sewa' => 'Sewa',
													'Pinjam Pakai' => 'Pinjam Pakai',
                                                ])
                                                ?>
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
                                                <?= $form->field($model, 'nomor_akta_pendirian')->textInput(['placeholder' => 'Nomor Akta Pendirian']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?=
                                                $form->field($model, 'tanggal_pendirian', [
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
                                                <?= $form->field($model, 'nama_notaris_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pendirian']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'nomor_sk_kemenkumham')->textInput(['placeholder' => 'Nomor Sk Kemenkumham']) ?>
                                            </div>
                                            <div class="col-md-4">
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
                                            <!--                                            <div class="col-md-4">
                                            <?php // $form->field($model, 'nama_notaris_pengesahan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pengesahan']) ?>
                                                                                        </div>-->
                                        </div>
                                        <hr>
                                        <?= Html::a(Yii::t('app', 'Tambah Akta Perubahan <i class="fa fa-plus"></i>'), '#', ['class' => 'btn btn-success akta-button']) ?>

                                        <div class="akta-form" style="display: none">

                                            <div class="form-group" id="add-izin-skdp-akta"></div>

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