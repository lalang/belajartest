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
                            
    <div class="tdp-form-pt">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                <li><a href="#tab_2" data-toggle="tab">Lokasi Perusahaan</a></li>
                <li><a href="#tab_3" data-toggle="tab">Data Umum Perusahaan</a></li>
                <li><a href="#tab_4" data-toggle="tab">Legalitas Perusahaan</a></li>
                <li><a href="#tab_5" data-toggle="tab">Data Pimpinan Perusahaan</a></li>
                <li><a href="#tab_6" data-toggle="tab">Pemegang Saham</a></li>
                <li><a href="#tab_7" data-toggle="tab">Data Kegiatan Perusahaan</a></li>
                <li><a href="#tab_8" data-toggle="tab">Data Khusus Perusahaan</a></li>
                <li><a href="#tab_9" data-toggle="tab">Kategori Perusahaan</a></li>
                <li><a href="#tab_10" data-toggle="tab">Disclaimer</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
        <div id="result"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

    <?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan Ke']) ?>

    <?= $form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'I 1 Pemilik Nama']) ?>

    <?= $form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'I 2 Pemilik Tpt Lahir']) ?>

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
            //    'disabled' => TRUE
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'i_3_pemilik_alamat')->textInput(['maxlength' => true, 'placeholder' => 'I 3 Pemilik Alamat']) ?>
    <?php
        $model->i_3_pemilik_propinsi = 11;
    ?>
    <?= $form->field($model, 'i_3_pemilik_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
                    
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
                    
    <?= $form->field($model, 'i_4_pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'I 4 Pemilik Telepon']) ?>

    <?= $form->field($model, 'i_5_pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'I 5 Pemilik No Ktp']) ?>

    <?= $form->field($model, 'i_6_pemilik_kewarganegaraan')->textInput(['placeholder' => 'I 6 Pemilik Kewarganegaraan']) ?>

    </div>
    <div class="tab-pane" id="tab_2">
	
       <?= $form->field($model, 'ii_1_perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Perusahaan']) ?>
	   
	   <?= $form->field($model, 'ii_2_perusahaan_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Alamat Perusahaan']) ?>
	   
	   <?= $form->field($model, 'ii_1_perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Perusahaan']) ?>
	   
	   <?= $form->field($model, 'ii_2_perusahaan_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Alamat Perusahaan']) ?>
	   
	   <?php
        $model->ii_2_perusahaan_propinsi = 11;
		?>
		<?= $form->field($model, 'ii_2_perusahaan_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
						
		<?= $form->field($model, 'ii_2_perusahaan_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
												
		<?php echo Html::hiddenInput('ii_2_perusahaan_kecamatan', $model->ii_2_perusahaan_kecamatan, ['id'=>'model_id1']);?>
						
		<?=
		$form->field($model, 'ii_2_perusahaan_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
			'options' => ['id' => 'kec-id2'],
			'pluginOptions' => [
				'depends' => ['kabkota-id2'],
				'placeholder' => 'Pilih Kecamatan...',
				'url' => Url::to(['subcat']),
				'loading'=>false,
				'initialize'=>true,
				'params'=>['model_id1']
			]
		]);
		?>

		<?php echo Html::hiddenInput('ii_2_perusahaan_kelurahan', $model->ii_2_perusahaan_kelurahan, ['id'=>'model_id2']);?>
		<?=
		$form->field($model, 'ii_2_perusahaan_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
			'pluginOptions' => [
				'depends' => ['kabkota-id', 'kec-id2'],
				'placeholder' => 'Pilih Kelurahan...',
				'url' => Url::to(['prod']),
				'loading'=>false,
				'initialize'=>true,
				'params'=>['model_id2']
			]
		]);
		?>
		
		<?= $form->field($model, 'ii_2_perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Kodepos']) ?>
		
		<?= $form->field($model, 'ii_2_perusahaan_no_telp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Telephone']) ?>
		
		<?= $form->field($model, 'ii_2_perusahaan_no_fax')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Handphone']) ?>
		
		<?= $form->field($model, 'ii_2_perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Email']) ?>
	   
    </div>
    <div class="tab-pane" id="tab_3">
	
		<?= $form->field($model, 'iii_1_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Kelompok Perusahaan/ Grup (bila ada)']) ?>

	   <?= $form->field($model, 'iii_2_status_prsh')->dropDownList([ 'Kantor Tunggal' => 'Kantor Tunggal', 'Kantor Pusat' => 'Kantor Pusat', 'Kantor Cabang' => 'Kantor Cabang', 'Kantor Pembantu' => 'Kantor Pembantu', 'Perwakilan' => 'Perwakilan']) ?>
	   
	   <?= $form->field($model, 'iii_2_induk_nama_prsh')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Perusahaan Indux']) ?>
	   
	   <?= $form->field($model, 'iii_2_induk_nomor_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nomor TDP']) ?>
	   
	   <?= $form->field($model, 'iii_2_induk_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Alamat Perusahaan']) ?>
	   
	   <?php
        $model->iii_2_induk_propinsi = 11;
		?>
		<?= $form->field($model, 'iii_2_induk_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
						
		<?= $form->field($model, 'iii_2_induk_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
												
		<?php echo Html::hiddenInput('iii_2_induk_kecamatan', $model->iii_2_induk_kecamatan, ['id'=>'model_id1']);?>
						
		<?=
		$form->field($model, 'iii_2_induk_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
			'options' => ['id' => 'kec-id3'],
			'pluginOptions' => [
				'depends' => ['kabkota-id3'],
				'placeholder' => 'Pilih Kecamatan...',
				'url' => Url::to(['subcat']),
				'loading'=>false,
				'initialize'=>true,
				'params'=>['model_id1']
			]
		]);
		?>

		<?php echo Html::hiddenInput('iii_2_induk_kelurahan', $model->iii_2_induk_kelurahan, ['id'=>'model_id2']);?>
		<?=
		$form->field($model, 'iii_2_induk_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
			'pluginOptions' => [
				'depends' => ['kabkota-id', 'kec-id3'],
				'placeholder' => 'Pilih Kelurahan...',
				'url' => Url::to(['prod']),
				'loading'=>false,
				'initialize'=>true,
				'params'=>['model_id2']
			]
		]);
		?>
		
		<?= $form->field($model, 'iii_3_lokasi_unit_produksi')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Lokasi Unit Produksi']) ?>
		
		<?php
        $model->iii_3_lokasi_unit_produksi_propinsi = 11;
		?>
		<?= $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
						
		<?= $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
		
		<?= $form->field($model, 'iii_4_bank_utama_1')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Bank']) ?>
		
		<?= $form->field($model, 'iii_4_bank_utama_2')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Bank']) ?>
		
		<?= $form->field($model, 'iii_4_jumlah_bank')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Jumlah Bank']) ?>
		
		<?= $form->field($model, 'iii_5_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan NPWP']) ?>
		
		<?= $form->field($model, 'iii_6_status_perusahaan_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\StatusPerusahaan::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
            'hideSearch' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
		
		<?=
			$form->field($model, 'iii_7a_tgl_pendirian', [
				'horizontalCssClasses' => [
					'wrapper' => 'col-sm-3',
				]
			])->widget(DateControl::classname(), [
				'options' => [
					'pluginOptions' => [
						'autoclose' => true,
						'endDate' => '0d',
					],
				//    'disabled' => TRUE
				],
				'type' => DateControl::FORMAT_DATE,
			])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
		?>
		
		<?=
			$form->field($model, 'iii_7b_tgl_mulai_kegiatan', [
				'horizontalCssClasses' => [
					'wrapper' => 'col-sm-3',
				]
			])->widget(DateControl::classname(), [
				'options' => [
					'pluginOptions' => [
						'autoclose' => true,
						'endDate' => '0d',
					],
				//    'disabled' => TRUE
				],
				'type' => DateControl::FORMAT_DATE,
			])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
		?>

        <?= $form->field($model, 'iii_8_bentuk_kerjasama_pihak3')->textInput(['placeholder' => 'Iii 8 Bentuk Kerjasama Pihak3']) ?>

        <?= $form->field($model, 'iii_9a_merek_dagang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9a Merek Dagang Nama']) ?>

        <?= $form->field($model, 'iii_9a_merek_dagang_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9a Merek Dagang Nomor']) ?>

        <?= $form->field($model, 'iii_9b_hak_paten_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9b Hak Paten Nama']) ?>

        <?= $form->field($model, 'iii_9b_hak_paten_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9b Hak Paten Nomor']) ?>

        <?= $form->field($model, 'iii_9c_hak_cipta_nama')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9c Hak Cipta Nama']) ?>

        <?= $form->field($model, 'iii_9c_hak_cipta_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Iii 9c Hak Cipta Nomor']) ?>
		
    </div>
    <div class="tab-pane" id="tab_4">
	
		<?= $form->field($model, 'iv_a1_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nomor']) ?>
		
		<?=
			$form->field($model, 'iv_a1_tanggal', [
				'horizontalCssClasses' => [
					'wrapper' => 'col-sm-3',
				]
			])->widget(DateControl::classname(), [
				'options' => [
					'pluginOptions' => [
						'autoclose' => true,
						'endDate' => '0d',
					],
				//    'disabled' => TRUE
				],
				'type' => DateControl::FORMAT_DATE,
			])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
		?>
        
		<?= $form->field($model, 'iv_a1_notaris_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Notaris']) ?>
		
		<?= $form->field($model, 'iv_a1_notaris_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Alamat']) ?>
		
		<?= $form->field($model, 'iv_a1_telpon')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Telephone']) ?>
		
    </div>
    <div class="tab-pane" id="tab_5">
        
    </div>
    <div class="tab-pane" id="tab_6">
        
    </div>
    <div class="tab-pane" id="tab_7">
        
    </div>
    <div class="tab-pane" id="tab_8">
        
    </div>
    <div class="tab-pane" id="tab_9">
        
    </div>
    <div class="tab-pane" id="tab_10">
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
    <?php ActiveForm::end(); ?>

            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>