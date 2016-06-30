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
/* @var $model backend\models\IzinKesehatan */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinKesehatanJadwal',
        'relID' => 'izin-kesehatan-jadwal',
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinKesehatanJadwalDua',
        'relID' => 'izin-kesehatan-jadwal-dua',
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwalDuas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinKesehatanJadwalSatu',
        'relID' => 'izin-kesehatan-jadwal-satu',
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwalSatus),
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

                if ($model->tipe == "Perorangan") {
                    $status_readonly = true;
                    $status_readonly2 = false;
                } else {
                    $status_readonly = false;
                    $status_readonly2 = true;
                }
                ?>

                <?php $form = ActiveForm::begin(['id' => 'form-izin-kesehatan']); ?>

                <?= $form->errorSummary($model); ?>

                <input type="hidden" value="<?php echo $min; ?>" class="LimitMin" />
                <input type="hidden" value="<?php echo $max; ?>" class="LimitMax" />

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'tipe', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'nama_izin', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>	


                <div class="kesehatan-form">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemohon</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Identitas Tempat Praktek</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Data Tempat Praktek Lainnya</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Disclaimer</a></li>
                        </ul>
                        <div id="result"></div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Pemohon</div>
                                    <div class="panel-body">		
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'readonly' => $status_field, 'placeholder' => 'NIK', 'readonly' => $status_readonly, 'class' => 'form-control required', 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-4">	
                                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Lengkap', 'readonly' => $status_readonly, 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-4">	
                                                <?= $form->field($model, 'nama_gelar')->textInput(['maxlength' => true, 'placeholder' => 'Nama lengkap & gelar', 'style' => 'width:100%']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'Laki-Laki', 'P' => 'Perempuan']); ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir', 'class' => 'form-control required', 'style' => 'width:100%']) ?>
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
                                                <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu']); ?>
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
                            <?php
                            if ($model->id_izin_parent) {
                                $readonlyLainnya = true;
                            } else {
                                $readonlyLainnya = false;
                            }
                            ?>
                            <div class="tab-pane" id="tab_2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Tempat Praktek</div>

                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nomor_str')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'Masukan nomor STR', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Nomor Surat Tanda Registrasi (STR)') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?=
                                                $form->field($model, 'tanggal_berlaku_str', [
                                                    'horizontalCssClasses' => [
                                                        'wrapper' => 'col-sm-3',
                                                    ]
                                                ])->widget(DateControl::classname(), [
                                                    'options' => [
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'startDate' => '0d',
                                                        ],
                                                        'disabled' => $readonlyLainnya,
                                                    ],
                                                    'type' => DateControl::FORMAT_DATE,
                                                ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)')->label('Masa Berlaku STR');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'perguruan_tinggi')->textInput(['maxlength' => true, 'placeholder' => 'Perguruan tinggi', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Perguruan Tinggi') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?=
                                                $form->field($model, 'tanggal_lulus', [
                                                    'horizontalCssClasses' => [
                                                        'wrapper' => 'col-sm-3',
                                                    ]
                                                ])->widget(DateControl::classname(), [
                                                    'options' => [
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                        ]
                                                    ],
                                                    'type' => DateControl::FORMAT_DATE,
                                                ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)')->label('Tanggal Lulus');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nomor_rekomendasi')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Rekomendasi', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Nomor Rekomendasi Organisasi Profesi') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?=
                                                $form->field($model, 'kepegawaian_id')->widget(\kartik\widgets\Select2::classname(), [
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kepegawaian::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                                                    'options' => ['placeholder' => Yii::t('app', 'Pilih Kepagawaian')],
                                                    'hideSearch' => false,
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])
                                                ?>
                                            </div>
                                        </div>
                                        <?php if ($find = strpos(strtoupper($model->nama_izin), strtoupper("Fasilitas Kesehatan"))) { ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">Surat Keterangan dari Fasilitas Kesehatan</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <?= $form->field($model, 'nomor_fasilitas_kesehatan')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor surat', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Nomor Surat') ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <?=
                                                                    $form->field($model, 'tanggal_fasilitas_kesehatan', [
                                                                        'horizontalCssClasses' => [
                                                                            'wrapper' => 'col-sm-3',
                                                                        ]
                                                                    ])->widget(DateControl::classname(), [
                                                                        'options' => [
                                                                            'pluginOptions' => [
                                                                                'autoclose' => true,'endDate' =>'+0d',
                                                                                
                                                                            ]
                                                                        ],
                                                                        'type' => DateControl::FORMAT_DATE,
                                                                    ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)')->label('Tanggal Surat');
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                </div>
                                            </div>	
                                        <?php } ?>
                                        <div class="row" id='surat_pimpinanan'>
                                            <div class="col-md-12">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">Surat Keterangan dari Pimpinan</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?= $form->field($model, 'nomor_pimpinan')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor surat', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Nomor Surat') ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?=
                                                                $form->field($model, 'tanggal_pimpinan', [
                                                                    'horizontalCssClasses' => [
                                                                        'wrapper' => 'col-sm-3',
                                                                    ]
                                                                ])->widget(DateControl::classname(), [
                                                                    'options' => [
                                                                        'pluginOptions' => [
                                                                            'autoclose' => true, 'endDate' => '+0d',
                                                                            
                                                                        ]
                                                                    ],
                                                                    'type' => DateControl::FORMAT_DATE,
                                                                ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)')->label('Tanggal Surat');
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                        <div class="form-group" id="add-izin-kesehatan-jadwal"></div>
                                        <?php
                                        if ($find = strpos(strtoupper($model->nama_izin), strtoupper("Fasilitas Kesehatan"))) {
                                            $readonlyGelar = false;
                                        } else {
                                            $readonlyGelar = true;
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'npwp_tempat_praktik')->textInput(['maxlength' => true, 'readonly' => $status_readonly2, 'placeholder' => 'Masukan NPWP tempat praktik', 'disabled' => $status_disabled, 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nama_tempat_praktik')->textInput(['maxlength' => true, 'readonly' => $readonlyGelar, 'placeholder' => 'Masukan nama tempat praktik', 'disabled' => $status_disabled, 'style' => 'width:100%']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">	
                                                <div id="map" style="width: 1000px; height: 400px;"></div>
                                            </div>
                                        </div>



                                        <?php
                                        if ($model->latitude == "" and $model->longitude == "") {
                                            $koordinat_1 = "-689451.45591935";
                                            $koordinat_2 = "11892087.127055";
                                        } else {
                                            $koordinat_1 = $model->latitude;
                                            $koordinat_2 = $model->longitude;
                                        }
                                        ?>
                                        <div class="row">

                                            <div class="col-md-3">	
                                                <?= $form->field($model, 'latitude', ['inputTemplate' => '<div class="input-group"><div class="input-group-addon"> Latitude </div>{input}</div>'])->label('')->textInput(['maxlength' => true, 'placeholder' => 'Masukan titik Lat', 'class' => 'gllpLatitude form-control', 'value' => $koordinat_1, 'id' => 'latitude', 'style' => 'width:200px;']) ?>
                                            </div>											  <div class="col-md-3">	
                                                <?= $form->field($model, 'longitude', ['inputTemplate' => '<div class="input-group"><div class="input-group-addon"> Longitude </div>{input}</div>'])->label('')->textInput(['maxlength' => true, 'placeholder' => 'Masukan titik Long', 'class' => 'gllpLongitude form-control', 'value' => $koordinat_2, 'style' => 'width:200px;']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="button" style='margin-left:20px; margin-top:20px;' class="gllpUpdateButton btn btn-info" value="Update Map">	
                                            </div>	

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'nama_gedung_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung', 'disabled' => $status_disabled, 'style' => 'width:100%']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'blok_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Blok / Lantai', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Blok/ Lantai') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?=
                                                $form->field($model, 'alamat_tempat_praktik')->textarea(['rows' => 6])->label('Nama Jalan')
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'rt_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'RT', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('RT') ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'rw_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'RW', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('RW') ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'wilayah_id_tempat_praktik')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..'])->label('Kota / Kabupaten'); ?>


                                            </div>
                                            <div class="col-md-3">
                                                <?php echo Html::hiddenInput('kecamatan_id_tempat_praktik', $model->kecamatan_id_tempat_praktik, ['id' => 'model_id1_tab2']); ?>
                                                <?=
                                                $form->field($model, 'kecamatan_id_tempat_praktik')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id2'],
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id2'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['/izin-kesehatan/subcat']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1_tab2']
                                                    ]
                                                ])->label('Kecamatan');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('kelurahan_id_tempat_praktik', $model->kelurahan_id_tempat_praktik, ['id' => 'model_id2_tab2']); ?>
                                                <?=
                                                $form->field($model, 'kelurahan_id_tempat_praktik')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id2', 'kec-id2'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['/izin-kesehatan/prod']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2_tab2']
                                                    ]
                                                ])->label('Kelurahan');
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'kodepos_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Kodepos') ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'telpon_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Telepon', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Telepon') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'fax_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Fax', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Fax') ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'email_tempat_praktik')->textInput(['maxlength' => true, 'placeholder' => 'Email', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Email') ?>
                                            </div>
                                            <?php if ($find = strpos(strtoupper($model->nama_izin), strtoupper("Fasilitas Kesehatan"))) { ?>
                                                <div class="col-md-4">
                                                    <?= $form->field($model, 'nomor_izin_kesehatan')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Izin Kesehatan', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Nomor Izin Kesehatan / Operational Fasilitas Kesehatan') ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <?= $form->field($model, 'status_sip_offline')->dropDownList([ 'Y' => 'Ada', 'N' => 'Tidak'], ['disabled' => $readonlyLainnya]); ?>
                                            </div>
                                            <div class="col-md-6" id='jumlah_sip_offline'>
                                                <?= $form->field($model, 'jumlah_sip_offline')->dropDownList([ '1' => '1', '2' => '2'], ['disabled' => $readonlyLainnya]); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Data Tempat Praktek Lainnya</div>
                                    <div class="panel-body" id='side_tab_3'>

                                        <div class="panel panel-info" id='tempat_praktek1'>
                                            <div class="panel-heading">Tempat Praktek I</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?= $form->field($model, 'jenis_praktik_i')->dropDownList([ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan'], ['disabled' => $readonlyLainnya])->label('Jenis Praktek'); ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?= $form->field($model, 'nama_tempat_praktik_i')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktek/ Fasilitas Kesehatan', 'disabled' => $status_disabled, 'style' => 'width:100%', 'readonly' => $readonlyLainnya])->label('Nama Tempat Praktek/ Fasilitas Kesehatan') ?>
                                                    </div>
                                                </div>	
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?= $form->field($model, 'nomor_sip_i')->textInput(['maxlength' => true, 'placeholder' => 'Nomor SIP', 'disabled' => $status_disabled, 'style' => 'width:100%', 'readonly' => $readonlyLainnya])->label('Nomor SIP') ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?=
                                                        $form->field($model, 'tanggal_berlaku_sip_i', [
                                                            'horizontalCssClasses' => [
                                                                'wrapper' => 'col-sm-3',
                                                            ]
                                                        ])->widget(DateControl::classname(), [
                                                            'options' => [
                                                                'pluginOptions' => [
                                                                    'autoclose' => true,
                                                                    'startDate' => '0d',
                                                                ],
                                                                'disabled' => $readonlyLainnya,
                                                            ],
                                                            'type' => DateControl::FORMAT_DATE,
                                                        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)')->label('Masa Berlaku SIP');
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?= $form->field($model, 'nama_gedung_praktik_i')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'Nama Gedung', 'disabled' => $status_disabled, 'style' => 'width:100%']) ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?= $form->field($model, 'blok_tempat_praktik_i')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'Blok / Lantai', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Blok/ Lantai') ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?=
                                                        $form->field($model, 'alamat_tempat_praktik_i')->textarea(['readonly' => $readonlyLainnya, 'rows' => 6])->label('Nama Jalan')
                                                        ?>
                                                    </div>
                                                </div>	
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'rt_tempat_praktik_i')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'RT', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('RT') ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'rw_tempat_praktik_i')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'RW', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('RW') ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <?= $form->field($model, 'telpon_tempat_praktik_i')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'Telepon', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Telepon') ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">	
                                                        <?= $form->field($model, 'propinsi_id_tempat_praktik_i')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['disabled' => $readonlyLainnya, 'id' => 'prov-id3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?php echo Html::hiddenInput('wilayah_id_tempat_praktik_i', $model->wilayah_id_tempat_praktik_i, ['id' => 'model_id_tab3']); ?>
                                                        <?=
                                                        $form->field($model, 'wilayah_id_tempat_praktik_i')->widget(\kartik\widgets\DepDrop::classname(), [
                                                            'options' => ['id' => 'kabkota-id3', 'readonly' => $readonlyLainnya],
                                                            'pluginOptions' => [
                                                                'depends' => ['prov-id3'],
                                                                'placeholder' => 'Pilih Kota...',
                                                                'url' => Url::to(['/izin-kesehatan/subkot']),
                                                                'loading' => false,
                                                                'initialize' => true,
                                                                'params' => ['model_id_tab3'],
                                                            ]
                                                        ])->label('Kota / Kabupaten');
                                                        ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?php echo Html::hiddenInput('kecamatan_id_tempat_praktik_i', $model->kecamatan_id_tempat_praktik_i, ['id' => 'model_id1_tab3']); ?>
                                                        <?=
                                                        $form->field($model, 'kecamatan_id_tempat_praktik_i')->widget(\kartik\widgets\DepDrop::classname(), [
                                                            'options' => ['id' => 'kec-id3', 'readonly' => $readonlyLainnya],
                                                            'pluginOptions' => [
                                                                'depends' => ['prov-id3', 'kabkota-id3'],
                                                                'placeholder' => 'Pilih Kecamatan...',
                                                                'url' => Url::to(['/izin-kesehatan/subkec']),
                                                                'loading' => false,
                                                                'initialize' => true,
                                                                'params' => ['model_id1_tab3']
                                                            ]
                                                        ]);
                                                        ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?php echo Html::hiddenInput('kelurahan_id_tempat_praktik_i', $model->kelurahan_id_tempat_praktik_i, ['id' => 'model_id2_tab3']); ?>
                                                        <?=
                                                        $form->field($model, 'kelurahan_id_tempat_praktik_i')->widget(\kartik\widgets\DepDrop::classname(), [
                                                            'options' => ['readonly' => $readonlyLainnya],
                                                            'pluginOptions' => [
                                                                'depends' => ['prov-id3', 'kabkota-id3', 'kec-id3'],
                                                                'placeholder' => 'Pilih Kelurahan...',
                                                                'url' => Url::to(['/izin-kesehatan/subkel']),
                                                                'loading' => false,
                                                                'initialize' => true,
                                                                'params' => ['model_id2_tab3']
                                                            ]
                                                        ]);
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($model->isNewRecord) {
                                                    if ($model->id_izin_parent) {
                                                        $jadwalSatu = \backend\models\IzinKesehatanJadwal::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
                                                        ?>
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading">Jadwal Praktik I</div>
                                                            <div class="panel-body">
                                                                <div class="row" style="border-width: 2px; border-bottom-color: rgba(221, 221, 221, 0.5); border-bottom-style: solid; margin-bottom: 5px; padding-bottom: 10px">
                                                                    <strong>
                                                                        <div class="col-md-1">
                                                                            #
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            Hari Praktik
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            Jam Praktik
                                                                        </div>
                                                                    </strong>
                                                                </div>
                                                                <?php
                                                                $i = 1;
                                                                foreach ($jadwalSatu as $data) {
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <?= $i ?>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <?= $data->hari_praktik ?>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <?= $data->jam_praktik ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="form-group" id="add-izin-kesehatan-jadwal-satu"></div>
                                                        <?php
                                                    }
                                                } else {
                                                    if ($model->id_izin_parent) {
                                                        $jadwalSatu = \backend\models\IzinKesehatanJadwal::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
                                                        ?>
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading">Jadwal Praktik I</div>
                                                            <div class="panel-body">
                                                                <div class="row" style="border-width: 2px; border-bottom-color: rgba(221, 221, 221, 0.5); border-bottom-style: solid; margin-bottom: 5px; padding-bottom: 10px">
                                                                    <strong>
                                                                        <div class="col-md-1">
                                                                            #
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            Hari Praktik
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            Jam Praktik
                                                                        </div>
                                                                    </strong>
                                                                </div>
                                                                <?php
                                                                $i = 1;
                                                                foreach ($jadwalSatu as $data) {
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <?= $i ?>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <?= $data->hari_praktik ?>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <?= $data->jam_praktik ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div style="display: none">

                                                                <div class="form-group" id="add-izin-kesehatan-jadwal-satu"></div>

                                                            </div>

                                                        </div>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="form-group" id="add-izin-kesehatan-jadwal-satu"></div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <?php if ($model->izin_id != "80") { ?>
                                            <div class="panel panel-info" id='tempat_praktek2'>
                                                <div class="panel-heading">Tempat Praktek II</div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'jenis_praktik_ii')->dropDownList([ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan'], ['readonly' => $readonlyLainnya])->label('Jenis Praktek'); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'nama_tempat_praktik_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nama Tempat Praktek/ Fasilitas Kesehatan', 'disabled' => $status_disabled, 'style' => 'width:100%', 'readonly' => $readonlyLainnya])->label('Nama Tempat Praktek/ Fasilitas Kesehatan') ?>
                                                        </div>
                                                    </div>	
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'nomor_sip_ii')->textInput(['maxlength' => true, 'placeholder' => 'Nomor SIP', 'disabled' => $status_disabled, 'style' => 'width:100%', 'readonly' => $readonlyLainnya])->label('Nomor SIP') ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?=
                                                            $form->field($model, 'tanggal_berlaku_sip_ii', [
                                                                'horizontalCssClasses' => [
                                                                    'wrapper' => 'col-sm-3',
                                                                ]
                                                            ])->widget(DateControl::classname(), [
                                                                'options' => [
                                                                    'pluginOptions' => [
                                                                        'autoclose' => true,
                                                                        'startDate' => '0d',
                                                                    ],
                                                                    'disabled' => $readonlyLainnya,
                                                                ],
                                                                'type' => DateControl::FORMAT_DATE,
                                                            ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)')->label('Masa Berlaku SIP');
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'nama_gedung_praktik_ii')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'Nama Gedung', 'disabled' => $status_disabled, 'style' => 'width:100%']) ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= $form->field($model, 'blok_tempat_praktik_ii')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'Blok / Lantai', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Blok/ Lantai') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?=
                                                            $form->field($model, 'alamat_tempat_praktik_ii')->textarea(['readonly' => $readonlyLainnya, 'rows' => 6])->label('Nama Jalan')
                                                            ?>
                                                        </div>
                                                    </div>	
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?= $form->field($model, 'rt_tempat_praktik_ii')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'RT', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('RT') ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <?= $form->field($model, 'rw_tempat_praktik_ii')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'RW', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('RW') ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <?= $form->field($model, 'telpon_tempat_praktik_ii')->textInput(['readonly' => $readonlyLainnya, 'maxlength' => true, 'placeholder' => 'Telepon', 'disabled' => $status_disabled, 'style' => 'width:100%'])->label('Telepon') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">	
                                                            <?= $form->field($model, 'propinsi_id_tempat_praktik_ii')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['readonly' => $readonlyLainnya, 'id' => 'prov-id4', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?php echo Html::hiddenInput('wilayah_id_tempat_praktik_ii', $model->wilayah_id_tempat_praktik_ii, ['id' => 'model_id4_tab3']); ?>
                                                            <?=
                                                            $form->field($model, 'wilayah_id_tempat_praktik_ii')->widget(\kartik\widgets\DepDrop::classname(), [
                                                                'options' => ['id' => 'kabkota-id4', 'readonly' => $readonlyLainnya],
                                                                'pluginOptions' => [
                                                                    'depends' => ['prov-id4'],
                                                                    'placeholder' => 'Pilih Kota...',
                                                                    'url' => Url::to(['/izin-kesehatan/subkot']),
                                                                    'loading' => false,
                                                                    'initialize' => true,
                                                                    'params' => ['model_id4_tab3']
                                                                ]
                                                            ])->label('Kota / Kabupaten');
                                                            ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?php echo Html::hiddenInput('kecamatan_id_tempat_praktik_ii', $model->kecamatan_id_tempat_praktik_ii, ['id' => 'model_id5_tab3']); ?>
                                                            <?=
                                                            $form->field($model, 'kecamatan_id_tempat_praktik_ii')->widget(\kartik\widgets\DepDrop::classname(), [
                                                                'options' => ['id' => 'kec-id4', 'readonly' => $readonlyLainnya],
                                                                'pluginOptions' => [
                                                                    'depends' => ['prov-id4', 'kabkota-id4'],
                                                                    'placeholder' => 'Pilih Kecamatan...',
                                                                    'url' => Url::to(['/izin-kesehatan/subkec']),
                                                                    'loading' => false,
                                                                    'initialize' => true,
                                                                    'params' => ['model_id5_tab3']
                                                                ]
                                                            ]);
                                                            ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?php echo Html::hiddenInput('kelurahan_id_tempat_praktik_ii', $model->kelurahan_id_tempat_praktik_ii, ['id' => 'model_id6_tab3']); ?>
                                                            <?=
                                                            $form->field($model, 'kelurahan_id_tempat_praktik_ii')->widget(\kartik\widgets\DepDrop::classname(), [
                                                                'options' => ['readonly' => $readonlyLainnya],
                                                                'pluginOptions' => [
                                                                    'depends' => ['prov-id4', 'kabkota-id4', 'kec-id4'],
                                                                    'placeholder' => 'Pilih Kelurahan...',
                                                                    'url' => Url::to(['/izin-kesehatan/subkel']),
                                                                    'loading' => false,
                                                                    'initialize' => true,
                                                                    'params' => ['model_id6_tab3']
                                                                ]
                                                            ]);
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($model->isNewRecord) {
                                                        if ($model->id_izin_parent && $model->nama_tempat_praktik_ii) {
                                                            $jadwalDua = \backend\models\IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
                                                            ?>
                                                            <div class="panel panel-info">
                                                                <div class="panel-heading">Jadwal Praktik II</div>
                                                                <div class="panel-body">
                                                                    <div class="row" style="border-width: 2px; border-bottom-color: rgba(221, 221, 221, 0.5); border-bottom-style: solid; margin-bottom: 5px; padding-bottom: 10px">
                                                                        <strong>
                                                                            <div class="col-md-1">
                                                                                #
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                Hari Praktik
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                Jam Praktik
                                                                            </div>
                                                                        </strong>
                                                                    </div>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($jadwalDua as $data) {
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-1">
                                                                                <?= $i ?>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <?= $data->hari_praktik ?>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <?= $data->jam_praktik ?>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        $i++;
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="form-group" id="add-izin-kesehatan-jadwal-dua"></div>
                                                            <?php
                                                        }
                                                    } else {
                                                        if ($model->id_izin_parent && $model->nama_tempat_praktik_ii) {
                                                            $jadwalDua = \backend\models\IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
                                                            ?>
                                                            <div class="panel panel-info">
                                                                <div class="panel-heading">Jadwal Praktik II</div>
                                                                <div class="panel-body">
                                                                    <div class="row" style="border-width: 2px; border-bottom-color: rgba(221, 221, 221, 0.5); border-bottom-style: solid; margin-bottom: 5px; padding-bottom: 10px">
                                                                        <strong>
                                                                            <div class="col-md-1">
                                                                                #
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                Hari Praktik
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                Jam Praktik
                                                                            </div>
                                                                        </strong>
                                                                    </div>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($jadwalDua as $data) {
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-1">
                                                                                <?= $i ?>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <?= $data->hari_praktik ?>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <?= $data->jam_praktik ?>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        $i++;
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div style="display: none">

                                                                    <div class="form-group" id="add-izin-kesehatan-jadwal-dua"></div>

                                                                </div>

                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="form-group" id="add-izin-kesehatan-jadwal-dua"></div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <div class="panel-body" id='sub2_tab_3'>
                                        <div class="alert alert-info alert-dismissible">
                                            <h4><i class="icon fa fa-warning"></i> Mohon diperhatikan!</h4>
                                            <p>Dikarenakan tidak memiliki tempat praktek lainnya silakan lanjut dengan meng-click tombol <strong>Next</strong> disamping kanan bawah.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>		
                            <div class="tab-pane" id="tab_4">
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
<script type="text/javascript" src="/js/openlayers-2.12/OpenLayers.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var dms = false;
        var map;

        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());

        var Lon = parseFloat($("#izinkesehatan-longitude").val());
        var Lat = parseFloat($("#latitude").val());
        var lonLat = new OpenLayers.LonLat(Lon, Lat);
        var zoom = 15;
        var markers = new OpenLayers.Layer.Markers("Markers");

        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(lonLat));
        map.setCenter(lonLat, zoom);
        if (!map.getCenter())
            map.zoomToMaxExtent();
        map.events.register('click', map, handleMapClick);

        function handleMapClick(evt) {
            var mc = map.getLonLatFromViewPortPx(new OpenLayers.Pixel(evt.xy.x, evt.xy.y));

            var lon = getFormattedCoordLon(mc);
            var lat = getFormattedCoordLat(mc);

            $("#izinkesehatan-longitude").val(lon);
            $("#latitude").val(lat);
            addMarker(mc);
        }
        function getFormattedCoordLat(latlng) {
            latlng = latlng.transform(map.projection, map.displayProjection);
            var lat = latlng.lat;

            if (dms) {
                lat = getDMS(lat);
            }
            return lat;
        }
        function getFormattedCoordLon(latlng) {
            latlng = latlng.transform(map.projection, map.displayProjection);
            var lon = latlng.lon;

            if (dms) {
                lon = getDMS(lon);
            }
            return lon;
        }
        function getDMS(dd) {
            var absDD = Math.abs(dd);
            var deg = Math.floor(absDD);
            var min = Math.floor((absDD - deg) * 60);
            var sec = (Math.round((((absDD - deg) - (min / 60)) * 60 * 60) * 100) / 100);
            if (dd < 0)
                deg = -deg;
            //return {"deg":deg, "min":min, "sec":sec}; 
            return deg + " " + min + "' " + sec + "''";
        }
        function addMarker(latlng) {
            markers.clearMarkers();
            latlng = latlng.transform(map.displayProjection, map.projection);
            var lat = latlng.lat;
            var lon = latlng.lon;
            var size = new OpenLayers.Size(21, 25);
            var icon = new OpenLayers.Icon('/images/marker.png', size);
            markers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(lon, lat), icon));
            map.addLayer(markers);
        }
    };

    $(".gllpUpdateButton").click(function() {
        $(".koorLatitude").html($("#latitude").val());
        $(".koorLongitude").html($("#izinkesehatan-longitude").val());
    });
</script>


<script>

    $(function() {
        $('#tempat_praktek1').show();
        if ($('#izinkesehatan-jumlah_sip_offline').val() == 1) {
            $('#tempat_praktek2').hide();
        } else {
            $('#tempat_praktek2').show();
        }
		
			if ($('#izinkesehatan-jumlah_sip_offline option:selected').text() == '2') {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').show();
            } else {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').hide();
            }
		
        $('#izinkesehatan-jumlah_sip_offline').change(function() {
            if ($('#izinkesehatan-jumlah_sip_offline option:selected').text() == '2') {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').show();
            } else {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').hide();
            }
        });
    });

    $(function() {
		
		if ($('#izinkesehatan-status_sip_offline option:selected').text() == 'Ada') {
			$('#jumlah_sip_offline').show();
			$('#side_tab_3').show();
			$('#sub2_tab_3').hide();
		} else {
			$('#jumlah_sip_offline').hide();
			$('#side_tab_3').hide();
			$('#sub2_tab_3').show();
		}
		
        $('#izinkesehatan-status_sip_offline').change(function() {
            if ($('#izinkesehatan-status_sip_offline option:selected').text() == 'Ada') {
                $('#jumlah_sip_offline').show();
                $('#side_tab_3').show();
                $('#sub2_tab_3').hide();
            } else {
                $('#jumlah_sip_offline').hide();
                $('#side_tab_3').hide();
                $('#sub2_tab_3').show();
            }
        });
    });

    $(function() {
		if ($('#izinkesehatan-kewarganegaraan_id option:selected').text() != 'INDONESIA') {
			$('#kitas').show();
		} else {
			$('#kitas').hide();
		}
        $('#izinkesehatan-kewarganegaraan_id').change(function() {
            if ($('#izinkesehatan-kewarganegaraan_id option:selected').text() != 'INDONESIA') {
                $('#kitas').show();
            } else {
                $('#kitas').hide();
            }
        });
    });

    $(function() {
		if ($('#izinkesehatan-kepegawaian_id').val() == '1' || $('#izinkesehatan-kepegawaian_id').val() == '4') {
			$('#surat_pimpinanan').show();
		} else {
			$('#surat_pimpinanan').hide();
		}
        $('#izinkesehatan-kepegawaian_id').change(function() {
            if ($('#izinkesehatan-kepegawaian_id').val() == '1' || $('#izinkesehatan-kepegawaian_id').val() == '4') {
                $('#surat_pimpinanan').show();
            } else {
                $('#surat_pimpinanan').hide();
            }
        });
    });
</script>

<script>


    $(document).ready(function() {
        var nama_izin = $('#izinkesehatan-nama_izin').val();
        var key = 'Praktik Perorangan';
        key = key.toUpperCase();
        nama_izin = nama_izin.toUpperCase();
        if (nama_izin.indexOf(key) > 0) {
            $('#izinkesehatan-nama_gelar').on('keyup', function() {
                $('#izinkesehatan-nama_tempat_praktik').val($('#izinkesehatan-nama_gelar').val());
                //$('#izinkesehatan-nama_tempat_praktik').prop('readonly', true);
            });
        }



    });


</script>

<script src="/js/wizard_kesehatan.js"></script>
