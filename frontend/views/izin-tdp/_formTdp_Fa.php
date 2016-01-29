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


<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-tdp']); ?>

<?= $form->errorSummary($model); ?>

<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>            
<?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
<?= $form->field($model, 'bentuk_perusahaan', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<i class="fa fa-check-square-o"></i>
				<h3 class="box-title">Buat Permohonan</h3>
				<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
					<div class="btn-group" data-toggle="btn-toggle" >
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
			</div>
			<div class="box-body">

                            
    <div class="tdp-form">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" style='background: #dcf0fc;'>
                <li class="active" title="Identitas Pemilik/Pengurus/Penanggungjawab"><a href="#tab_1" data-toggle="tab">1</a></li>
                <li title="Lokasi Perusahaan"><a href="#tab_2" data-toggle="tab">2</a></li>
				<li title="Data Umum Perusahaan"><a href="#tab_3" data-toggle="tab">3</a></li>
				<li title="Legalitas Perusahaan"><a href="#tab_4" data-toggle="tab">4</a></li>
				<li title="Data Pimpinan Perusahaan"><a href="#tab_5" data-toggle="tab">5</a></li>
				<li title="Data Kegiatan Perusahaan"><a href="#tab_6" data-toggle="tab">6</a></li>
				<li title="Kategori Perusahaan"><a href="#tab_7" data-toggle="tab">7</a></li>
				<li title="Disclaimer"><a href="#tab_8" data-toggle="tab">8</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
        <div id="result"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					
					<div class="panel panel-primary">
						<div class="panel-heading">Identitas Pemilik/Pengurus/Penanggungjawab</div>
						<div class="panel-body">
	
							<?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan ke']) ?>
							
							<?= $form->field($model, 'no_pembukuan')->textInput(['placeholder' => 'Nomor Pembukuan']) ?>

							<?= $form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama pemilik']) ?>

							<?= $form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Masukan tempat lahir']) ?>

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

							<?= $form->field($model, 'i_3_pemilik_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan alamat']) ?>
							
							<?= $form->field($model, 'i_3_pemilik_propinsi')->dropDownList([ '11' => 'DKI Jakarta']) ?>
											
							<?= $form->field($model, 'i_3_pemilik_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih kota..']); ?>
																	
							<?php echo Html::hiddenInput('i_3_pemilik_kecamatan', $model->i_3_pemilik_kecamatan, ['id'=>'model_id1']);?>
											
							<?=
							$form->field($model, 'i_3_pemilik_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
								'options' => ['id' => 'kec-id'],
								'pluginOptions' => [
									'depends' => ['kabkota-id'],
									'placeholder' => 'Pilih kecamatan...',
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
									'placeholder' => 'Pilih kelurahan...',
									'url' => Url::to(['prod']),
									'loading'=>false,
									'initialize'=>true,
									'params'=>['model_id2']
								]
							]);
							?>
											
							<?= $form->field($model, 'i_4_pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'Masukan telepon']) ?>

							<?= $form->field($model, 'i_5_pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan no KTP']) ?>

							<?= $form->field($model, 'i_6_pemilik_kewarganegaraan')->widget(\kartik\widgets\Select2::classname(), [
								'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->all(), 'id', 'nama_negara'),
								'options' => ['placeholder' => Yii::t('app', 'Pilih kewarganegaraan')],
								'hideSearch' => false,
								'pluginOptions' => [
									'allowClear' => true
								],
							]) ?>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="tab_2">
					<div class="panel panel-primary">
						<div class="panel-heading">Lokasi Perusahaan</div>
						<div class="panel-body">
						   
						   <?= $form->field($model, 'ii_1_perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama Perusahaan']) ?>
						   
						   <?= $form->field($model, 'ii_2_perusahaan_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan alamat Perusahaan']) ?>
						   
						   <?= $form->field($model, 'ii_2_perusahaan_propinsi')->dropDownList([ '11' => 'DKI Jakarta']) ?>
											
							<?= $form->field($model, 'ii_2_perusahaan_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id2', 'class' => 'input-large form-control', 'prompt' => 'Pilih kota..']); ?>
																	
							<?php echo Html::hiddenInput('ii_2_perusahaan_kecamatan', $model->ii_2_perusahaan_kecamatan, ['id'=>'model_id1']);?>
											
							<?=
							$form->field($model, 'ii_2_perusahaan_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
								'options' => ['id' => 'kec-id2'],
								'pluginOptions' => [
									'depends' => ['kabkota-id2'],
									'placeholder' => 'Pilih kecamatan...',
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
									'placeholder' => 'Pilih kelurahan...',
									'url' => Url::to(['prod']),
									'loading'=>false,
									'initialize'=>true,
									'params'=>['model_id2']
								]
							]);
							?>
							
							<?= $form->field($model, 'ii_2_perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kodepos']) ?>
							
							<?= $form->field($model, 'ii_2_perusahaan_no_telp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan telephone']) ?>
							
							<?= $form->field($model, 'ii_2_perusahaan_no_fax')->textInput(['maxlength' => true, 'placeholder' => 'Masukan handphone']) ?>
							
							<?= $form->field($model, 'ii_2_perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Masukan email']) ?>
						</div>
				   </div>
				</div>
				<div class="tab-pane" id="tab_3">
					
					<div class="panel panel-primary">
						<div class="panel-heading">Data Umum Perusahaan</div>
						<div class="panel-body">
						
							<?= $form->field($model, 'iii_1_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama kelompok perusahaan/ grup (bila ada)']) ?>

							<?= $form->field($model, 'iii_2_status_prsh')->dropDownList([ 'Kantor Tunggal' => 'Kantor Tunggal', 'Kantor Pusat' => 'Kantor Pusat', 'Kantor Cabang' => 'Kantor Cabang', 'Kantor Pembantu' => 'Kantor pembantu', 'Perwakilan' => 'Perwakilan'],['id'=>'field_cpp','onchange'=>'getval(this)']) ?>
							
						   <div id="cpp" style="display: none;">
							   <div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Data Pelengkap</h3>
								</div>
						   <div class="box-body" style="background: #dddddd;">	
			   
							   <?= $form->field($model, 'iii_2_induk_nama_prsh')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama Perusahaan indux']) ?>
							   
							   <?= $form->field($model, 'iii_2_induk_nomor_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor TDP']) ?>
							   
							   <?= $form->field($model, 'iii_2_induk_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan alamat Perusahaan']) ?>
								
								<?= $form->field($model, 'iii_2_induk_propinsi')->dropDownList([ '11' => 'DKI Jakarta']) ?>
												
								<?= $form->field($model, 'iii_2_induk_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id3', 'class' => 'input-large form-control', 'prompt' => 'Pilih kota..']); ?>
																		
								<?php echo Html::hiddenInput('iii_2_induk_kecamatan', $model->iii_2_induk_kecamatan, ['id'=>'model_id1']);?>
											
								<?=
								$form->field($model, 'iii_2_induk_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
									'options' => ['id' => 'kec-id3'],
									'pluginOptions' => [
										'depends' => ['kabkota-id3'],
										'placeholder' => 'Pilih kecamatan...',
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
										'placeholder' => 'Pilih kelurahan...',
										'url' => Url::to(['prod']),
										'loading'=>false,
										'initialize'=>true,
										'params'=>['model_id2']
									]
								]);
								?>
							</div>	
							</div>
								<?= $form->field($model, 'iii_3_lokasi_unit_produksi')->textInput(['maxlength' => true, 'placeholder' => 'Masukan lokasi unit produksi']) ?>
								
								<?= $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi')->dropDownList([ '11' => 'DKI Jakarta']) ?>
												
								<?= $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id3', 'class' => 'input-large form-control', 'prompt' => 'Pilih kota..']); ?>
								
								<?= $form->field($model, 'iii_4_bank_utama_1')->widget(\kartik\widgets\Select2::classname(), [
									'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
									'options' => ['placeholder' => Yii::t('app', 'Pilih Bank')],
									'hideSearch' => true,
									'pluginOptions' => [
										'allowClear' => true
									],
								]) ?>
								
								<?= $form->field($model, 'iii_4_bank_utama_2')->widget(\kartik\widgets\Select2::classname(), [
									'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
									'options' => ['placeholder' => Yii::t('app', 'Pilih Bank')],
									'hideSearch' => true,
									'pluginOptions' => [
										'allowClear' => true
									],
								]) ?>
								
								<?= $form->field($model, 'iii_4_jumlah_bank')->textInput(['maxlength' => true, 'placeholder' => 'Masukan jumlah Bank']) ?>
								
								<?= $form->field($model, 'iii_5_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan NPWP']) ?>
								
								<?= $form->field($model, 'no_sk_siup')->textInput(['maxlength' => true, 'placeholder' => 'Masukan No. SK SIUP']) ?>
								
								<?= $form->field($model, 'iii_6_status_perusahaan_id')->widget(\kartik\widgets\Select2::classname(), [
									'data' => \yii\helpers\ArrayHelper::map(\backend\models\StatusPerusahaan::find()->orderBy('id')->all(), 'id', 'nama'),
									'options' => ['placeholder' => Yii::t('app', 'Pilih status perusahaan')],
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

							   <?= $form->field($model, 'iii_8_bentuk_kerjasama_pihak3')->widget(\kartik\widgets\Select2::classname(), [
									'data' => \yii\helpers\ArrayHelper::map(\backend\models\BentukKerjasama::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
									'options' => ['placeholder' => Yii::t('app', 'Pilih bentuk kerjasama')],
									'hideSearch' => true,
									'pluginOptions' => [
										'allowClear' => true
									],
								]) ?>
								
								<?= $form->field($model, 'iii_9a_merek_dagang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama merek dagang']) ?>

								 <?= $form->field($model, 'iii_9a_merek_dagang_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama merek dagang']) ?>

								<?= $form->field($model, 'iii_9b_hak_paten_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama hak paten']) ?>

								<?= $form->field($model, 'iii_9b_hak_paten_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor hak paten']) ?>

								<?= $form->field($model, 'iii_9c_hak_cipta_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama hak cipta']) ?>

								<?= $form->field($model, 'iii_9c_hak_cipta_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor hak cipta']) ?>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab_4">
						<div class="panel panel-primary">
							<div class="panel-heading">Legalitas Perusahaan</div>
							<div class="panel-body">
						
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Pendirian Dan Pengesahaan</h3>
								</div>
								<div class="box-body">
									<div class="box-header">
										<label>1. AKTA PENDIRIAN (apa bila ada) </label>
									</div>
									<div class="box-body">
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
										
										<?= $form->field($model, 'iv_a1_notaris_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama notaris']) ?>
										
										<?= $form->field($model, 'iv_a1_notaris_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan alamat']) ?>
										
										<?= $form->field($model, 'iv_a1_telpon')->textInput(['maxlength' => true, 'placeholder' => 'Masukan telephone']) ?>
									</div>	
									<div class="box-header">
										<label>2. AKTA PERUBAHAN TERAKHIR</label>
									</div>
									<div class="box-body">
										<?= $form->field($model, 'iv_a2_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nomor']) ?>
										
										<?=
											$form->field($model, 'iv_a2_tanggal', [
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
										
										<?= $form->field($model, 'iv_a2_notaris')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama notaris']) ?>

									</div>
									<div class="box-header">
										<label>3. PENGESAHAAN</label>
									</div>
									<div class="box-body">
										<?= $form->field($model, 'iv_a3_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nomor']) ?>
										
										<?=
											$form->field($model, 'iv_a3_tanggal', [
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
									</div>		
								</div>
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Izin-Izin Dan Legalitas Lainnya Yang Dimiliki(SIUP, SII, SIUJK, HO, SITU,..dst) </h3>
								</div>
								<div class="box-body">
									<div class="form-group" id="add-izin-tdp-legal"></div>
								</div>
							</div>
						</div>	
					</div>
					<div class="tab-pane" id="tab_5">
						<div class="panel panel-primary">
							<div class="panel-heading">Data Pimpinan Perusahaan</div>
							<div class="panel-body">
							
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Jumlah Pemimpin Perusahaan </h3>
								</div>
								<div class="box-body">
									<?= $form->field($model, 'v_jumlah_pengurus')->textInput(['maxlength' => true, 'placeholder' => 'Masukan jumlah']) ?>
									
									<?= $form->field($model, 'v_jumlah_sekutu_aktif')->textInput(['maxlength' => true, 'placeholder' => 'Masukan jumlah']) ?>

									<div class="form-group" id="add-izin-tdp-pimpinan"></div>
								</div>
							</div>
						</div>	
					</div>		
					<div class="tab-pane" id="tab_6">
						<div class="panel panel-primary">
							<div class="panel-heading">Data Kegiatan Perusahaan</div>
							<div class="panel-body">
							
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Jenis Kegiatan Usaha</h3>
								</div>
								<div class="box-body">
									 <div class="form-group" id="add-izin-tdp-kegiatan"></div>
								</div>
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Omset Perusahaan Ini Pertahun (Setelah perusahaan beroprasi)</h3>
								</div>
								<div class="box-body">			
									<?= $form->field($model, 'vii_b_omset',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan nilai omset', 'class'=>'form-control number']) ?>

									<?= $form->field($model, 'vii_b_terbilang')->textInput(['maxlength' => true, 'placeholder' => 'Masukan omset terbilang']) ?>
								</div>	
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Modal & saham</h3>
								</div>
								<div class="box-body">	
									
									<?= $form->field($model, 'vii_c1_dasar',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan modal dasar', 'class'=>'form-control number']) ?>
									
									<?= $form->field($model, 'vii_c2_ditempatkan',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan modal ditempatkan', 'class'=>'form-control number']) ?>

									<?= $form->field($model, 'vii_c3_disetor',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan modal disetor', 'class'=>'form-control number']) ?>

									<?= $form->field($model, 'vii_c4_saham')->textInput(['placeholder' => 'Masukan banyak saham (lembar)']) ?>
									
									<?= $form->field($model, 'vii_c5_nominal',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Nilai nominal per Saham', 'class'=>'form-control number']) ?>
									
									<?= $form->field($model, 'vii_c6_aktif')->textInput(['placeholder' => 'Masukan modal distor sekutu aktif']) ?>
									
									<?= $form->field($model, 'vii_c7_pasif')->textInput(['placeholder' => 'Masukan modal distor sekutu pasif']) ?>
									
								</div>	
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Total Asset (Setelah perusahaan beroprasi)</h3>
								</div>
								<div class="box-body">
									<?= $form->field($model, 'vii_d_totalaset',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan total asset', 'class'=>'form-control number']) ?>
								</div>	 
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Jumlah Karyawan</h3>
								</div>
								<div class="box-body">
								
									<?= $form->field($model, 'vii_e_wni',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Orang</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan jumlah WNI', 'class'=>'form-control number']) ?>
	
									<?= $form->field($model, 'vii_e_wna',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Orang</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan jumlah WNA', 'class'=>'form-control number']) ?>

								</div>	
								<div class="box-header">
									<i class="fa fa-check-circle"></i>
									<h3 class="box-title">Kedudukan dalam mata rantai kegiatan usaha</h3>
								</div>
								<div class="box-body">	
										
									<?= $form->field($model, 'vii_f_matarantai')->dropDownList([ '1' => 'Produsen', '2' => 'Sub distributor', '3' => 'Eksportir', '4' => 'Distributor /Wholesaler /Grosir',	'5' => 'Importir', '6' => 'Pengecer','7' => 'Agen',],['prompt' => ' '],['id'=>'matarnt','onchange'=>'getval(this)']) ?>	
										
									<div class="option3">
									
									<?= $form->field($model, 'vii_fa_jumlah')->textInput(['placeholder' => 'Masukan Jumlah']) ?>
									
									<?= $form->field($model, 'vii_fa_satuan')->widget(\kartik\widgets\Select2::classname(), [
										'data' => \yii\helpers\ArrayHelper::map(\backend\models\Satuan::find()->orderBy('id')->asArray()->all(), 'id', 'kode'),
										'options' => ['placeholder' => Yii::t('app', 'Masukan satuan')],
										'pluginOptions' => [
											'allowClear' => true
										],
									]) ?>
							
									<?= $form->field($model, 'vii_fb_jumlah')->textInput(['placeholder' => 'Masukan Jumlah']) ?>
									
									<?= $form->field($model, 'vii_fb_satuan')->widget(\kartik\widgets\Select2::classname(), [
										'data' => \yii\helpers\ArrayHelper::map(\backend\models\Satuan::find()->orderBy('id')->asArray()->all(), 'id', 'kode'),
										'options' => ['placeholder' => Yii::t('app', 'Masukan satuan')],
										'pluginOptions' => [
											'allowClear' => true
										],
									]) ?>
									
									<?= $form->field($model, 'vii_fc_lokal',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan nilai persen lokal', 'class'=>'form-control number']) ?>
									
									<?= $form->field($model, 'vii_fc_impor',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan nilai persen impor', 'class'=>'form-control number']) ?>
									</div>

									<?= $form->field($model, 'vii_f_pengecer')->dropDownList([ 'Swalayan /Supermarket' => 'Swalayan /Supermarket', 'Toserba /Dept. Store' => 'Toserba /Dept. Store', 'Toko /Kios' => 'Toko /Kios', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>
								</div>
							</div>
						</div>	
					</div>
					<div class="tab-pane" id="tab_7">
						<div class="panel panel-primary">
						<div class="panel-heading">Kategori Perusahaan</div>
							<div class="panel-body">						
								<div class="form-group" id="add-izin-tdp-kantorcabang"></div>
							</div>
						</div>	
					</div>
					<div class="tab-pane" id="tab_8">
						<div class="panel panel-primary">
							<div class="panel-heading">Disclaimer</div>
							<div class="panel-body">
									
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
						</div>	
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

<?php
if($model->iii_2_status_prsh=='Kantor Cabang' || $model->iii_2_status_prsh=='Kantor Pembantu' || $model->iii_2_status_prsh=='Perwakilan'){?>
	$('#cpp').show();
<?php } ?>
</script>

<script src="/js/wizard_tdp_fa.js"></script>  