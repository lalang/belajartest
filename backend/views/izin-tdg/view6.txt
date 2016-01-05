<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;

use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;

$session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdg */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//$data_lok = \backend\models\Lokasi::find()->where(['id' => $model->gudang_kabupaten])->one(); 
$data_kec = \backend\models\Lokasi::find()->where(['id' => $model->gudang_kecamatan])->one(); 
$data_kel = \backend\models\Lokasi::find()->where(['id' => $model->gudang_kelurahan])->one(); 

$data_per_kec = \backend\models\Lokasi::find()->where(['id' => $model->perusahaan_kecamatan])->one(); 
$data_per_kel = \backend\models\Lokasi::find()->where(['id' => $model->perusahaan_kelurahan])->one(); 

?>
<script src="<?=Yii::getAlias('@front')?>/js/jquery.min.js"></script>
<div class="izin-tdg-view">
<fieldset class="gllpLatlonPicker">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_1" data-toggle="tab"><h4>Identitas Gudang</h4></a></li>
		<li><a href="#tab_2" data-toggle="tab"><h4>Identitas Perusahaan</h4></a></li>
	</ul>
	<div id="result"></div>

	<div class="tab-content">
		<div class="tab-pane active" id="tab_1">
		
			<div class="row">		
				<div class="col-sm-6">
					<div class="alert alert-warning">
					<h5>Data Asli</h5>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="alert alert-success">
					<h5>Data Edit</h5>
					</div>
				</div>
			</div>
			<?php  $form = ActiveForm::begin(
				[	
					'options'=>['enctype'=>'multipart/form-data'],
					'action' => '/izin-tdg/revisi',
				//	'options' => [
					//	'class' => 'userform'
					// ]
				]
			); ?>

			<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
			<?= $form->field($model, 'kode_registrasi', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
			<?= $form->field($model, 'url_back', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
			<?= $form->field($model, 'perizinan_proses_id', ['template' => '{input}'])->textInput(['style' => 'display:none']) ?>

			<div class="row">		
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_luas',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">M<sup>2</sup></div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_luas',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">M<sup>2</sup></div></div>'])->label('&nbsp;')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>	
			<div class="row">	
				<div class="col-sm-6">
					<?php if($model->gudang_kapasitas_satuan=="M3"){
						$satuan="M<sup>3</sup>";
					}else{
						$satuan="TON";
					}?>
					<?= $form->field($model, 'gudang_kapasitas',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">'.$satuan.'</div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<div class="row">	
					<div class="col-sm-6">
					<?= $form->field($model, 'hs_kapasitas')->label('&nbsp;')->textInput(['maxlength' => true]) ?>
					</div>
					<div class="col-sm-6">
					<?= $form->field($model, 'hs_kapasitas_satuan')->label('Satuan')->dropDownList(['' => '', 'M3' => 'M3', 'TON' => 'TON']); ?>
					</div>
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_nilai',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_nilai',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->label('&nbsp;')->textInput(['maxlength' => true,'class'=>'form-control number']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_komposisi_nasional',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_komposisi_nasional',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->label('&nbsp;')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_komposisi_asing',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_komposisi_asing',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->label('&nbsp;')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_kelengkapan')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_kelengkapan')->label('&nbsp;')->dropDownList([ '' => '', 'Berpendingin' => 'Berpendingin', 'Tidak berpendingin' => 'Tidak berpendingin', 'Keduanya' => 'Keduanya', ], ['prompt' => '']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_sarana_listrik',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Kwh</div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_sarana_listrik',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Kwh</div></div>'])->label('&nbsp;')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_sarana_air')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_sarana_air')->label('&nbsp;')->dropDownList([ '' => '', 'PAM' => 'PAM', 'Sumur bor' => 'Sumur bor' ], ['prompt' => '']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_sarana_pendingin',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon"><sup>o</sup>C</div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_sarana_pendingin',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon"><sup>o</sup>C</div></div>'])->label('&nbsp;')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_sarana_forklif',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Unit</div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_sarana_forklif',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Unit</div></div>'])->label('&nbsp;')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_sarana_komputer',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Unit</div></div>'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_sarana_komputer',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Unit</div></div>'])->label('&nbsp;')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
			
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_koordinat_1')->label('Koordinat Latitude')->textInput(['maxlength' => true, 'readonly' => true, 'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_koordinat_1')->label('&nbsp;')->textInput(['maxlength' => true, 'class'=>'gllpLatitude form-control', 'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_koordinat_2')->label('Koordinat Longitude')->textInput(['maxlength' => true, 'readonly' => true, 'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_koordinat_2')->label('&nbsp;')->textInput(['maxlength' => true, 'class'=>'gllpLongitude form-control', 'style'=>'width:100%']) ?>
				</div>
			</div>
			 
			<div class="row">	
				<div class="col-sm-12">
					<div class="gllpMap">Google Maps</div>
				</div>
			</div>	
			<input type="hidden" class="gllpZoom form-control" value="18"/>
			Note: Balon pada peta mengikuti Latitude dan Longitude pada kolom edit.
		

			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_namagedung')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_namagedung')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_blok_lantai')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_blok_lantai')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>	
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_namajalan')->textarea(['rows' => 4, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_namajalan')->label('')->textarea(['rows' => 4]) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_rt')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_rt')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_rw')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_rw')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<b>Kota</b>
					<input type='text' value='<?php $lokasi = \backend\models\Lokasi::getKotaOptions(); 
					echo $lokasi[$model->gudang_kabupaten]; ?>' class="form-control" style='width:100%' readonly>			
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_kabupaten')->label('&nbsp;')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => '']); ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<b>Kecamatan</b>
					<input type='text' value='<?php echo $data_kec['nama']; ?>' style='width:100%' class="form-control" readonly>
				</div>
				<div class="col-sm-6">
					<?php echo Html::hiddenInput('hs_kecamatan', $model->hs_kecamatan, ['id'=>'model_id1']);?>

					<?=
					$form->field($model, 'hs_kecamatan')->label('')->widget(\kartik\widgets\DepDrop::classname(), [
						'options' => ['id' => 'kec-id'],
						'pluginOptions' => [
							'depends' => ['kabkota-id'],
							'placeholder' => '',
							'url' => Url::to(['subcat']),
							'loading'=>false,
							'initialize'=>true,
							'params'=>['model_id1']
						]
					]);
					?>
							
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<b>Kelurahaan</b>
					<input type='text' value='<?php echo $data_kel['nama']; ?>' style='width:100%' class="form-control" readonly>
				</div>
				<div class="col-sm-6">			
					<?php echo Html::hiddenInput('hs_kelurahan', $model->hs_kelurahan, ['id'=>'model_id2']);?>
					<?=
					$form->field($model, 'hs_kelurahan')->label('')->widget(\kartik\widgets\DepDrop::classname(), [
						'pluginOptions' => [
							'depends' => ['kabkota-id', 'kec-id'],
							'placeholder' => '',
							'url' => Url::to(['prod']),
							'loading'=>false,
							'initialize'=>true,
							'params'=>['model_id2']
						]
					]);
					?>
															
				</div>
			</div>
			
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_kodepos')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_kodepos')->label('&nbsp')->textInput(['maxlength' => true, 'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_telepon')->textInput(['maxlength' => true, 'readonly' => true, 'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_telepon')->label('&nbsp')->textInput(['maxlength' => true, 'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_fax')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_fax')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_email')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_email')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_kepemilikan')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_kepemilikan')->label('&nbsp;')->dropDownList([ '' => '', 'Milik sendiri' => 'Milik sendiri', 'Sewa' => 'Sewa' ], ['prompt' => '']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_imb_nomor')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_imb_nomor')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?=
						$form->field($model, 'gudang_imb_tanggal', [
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
							'disabled' => true,
							'type' => DateControl::FORMAT_DATE,
						]);
						?>
				</div>
				<div class="col-sm-6">
					<?=
						$form->field($model, 'hs_imb_tanggal', [
							'horizontalCssClasses' => [
								'wrapper' => 'col-sm-3',
							]
						])->label('')->widget(DateControl::classname(), [
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
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_uug_nomor')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_uug_nomor')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?=
						$form->field($model, 'gudang_uug_tanggal', [
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
							'disabled' => true,
							'type' => DateControl::FORMAT_DATE,
						]);
						?>
				</div>
				<div class="col-sm-6">
					<?=
						$form->field($model, 'hs_uug_tanggal', [
							'horizontalCssClasses' => [
								'wrapper' => 'col-sm-3',
							]
						])->label('')->widget(DateControl::classname(), [
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
				<div class="col-sm-6">
					<?=
						$form->field($model, 'gudang_uug_berlaku', [
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
							'disabled' => true,
							'type' => DateControl::FORMAT_DATE,
						]);
						?>
				</div>
				<div class="col-sm-6">
					<?=
						$form->field($model, 'hs_uug_berlaku', [
							'horizontalCssClasses' => [
								'wrapper' => 'col-sm-3',
							]
						])->label('')->widget(DateControl::classname(), [
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
				<div class="col-sm-6">
					<?= $form->field($model, 'gudang_isi')->textarea(['rows' => 4, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_isi')->label('')->textarea(['rows' => 4]) ?>
				</div>
			</div>

			<?php if(Yii::$app->user->identity->pelaksana_id=='4' || Yii::$app->user->identity->pelaksana_id=='17'){ ?>
			
			 <?php if($model->bapl_file){?>
			 <div style='padding:5px; background:#eff1f1; border:1px solid #c0c0c0; border-radius:5px;'>
			 Dibawah ini adalah hasil upload BAPL:<br>
			 <?php echo $model->bapl_file; ?>
			<br>
			<?= Html::a(Yii::t('app', '<i class="fa fa-trash-o"></i> Hapus'), ['/izin-tdg/deletebapl', 'id' => $model->id,'url'=>'cek-form','proses_id'=>$model->perizinan_proses_id], [
				'class' => 'btn btn-sm btn-danger',
				'data' => [
					'confirm' => Yii::t('app', 'Apakah anda ingin menghapus BAPL?'),
				],
			])
			?>
			</div>
			<?= $form->field($model, 'bapl_file')->hiddenInput()->label(false) ?>
			<?php }
			?>
			
			<div class="row">	
				<div class="col-sm-12">
					<?= $form->field($model, 'file')->label('Upload BAPL')->widget(FileInput::classname(), [
						'options' => ['multiple' => true],
						'name'=>'file'
					]) ?>
				</div>
			</div>	
			<div class="row">	
				<div class="col-sm-12" style>
					<?= $form->field($model, 'catatan_tambahan')->textarea(['rows' => 4]) ?>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="tab-pane" id="tab_2">
			<div class="row">		
				<div class="col-sm-6">
					<div class="alert alert-warning">
					<h5>Data Asli</h5>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="alert alert-success">
					<h5>Data Edit</h5>
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'perusahaan_namagedung')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_per_namagedung')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
						<?= $form->field($model, 'perusahaan_blok_lantai')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_per_blok_lantai')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<?= $form->field($model, 'perusahaan_namajalan')->textarea(['rows' => 4, 'readonly' => true]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_per_namajalan')->label('')->textarea(['rows' => 4]) ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<b>Kota</b>
					<input type='text' value='<?php $lokasi = \backend\models\Lokasi::getKotaOptions(); 
					echo $lokasi[$model->perusahaan_kabupaten]; ?>' style='width:100%' class="form-control" readonly>			
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_per_kabupaten')->label('&nbsp;')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id2', 'class' => 'input-large form-control', 'prompt' => '']); ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<b>Kecamatan</b>
					<input type='text' value='<?php echo $data_kec_per['nama']; ?>' style='width:100%' class="form-control" readonly>
				</div>
				<div class="col-sm-6">
					<?php echo Html::hiddenInput('hs_per_kecamatan', $model->hs_per_kecamatan, ['id'=>'model_id1a']);?>

					<?=
					$form->field($model, 'hs_per_kecamatan')->label('')->widget(\kartik\widgets\DepDrop::classname(), [
						'options' => ['id' => 'kec-id2'],
						'pluginOptions' => [
							'depends' => ['kabkota-id2'],
							'placeholder' => '',
							'url' => Url::to(['subcat']),
							'loading'=>false,
							'initialize'=>true,
							'params'=>['model_id1a']
						]
					]);
					?>
							
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
					<b>Kelurahaan</b>
					<input type='text' value='<?php echo $data_kel_per['nama']; ?>' style='width:100%' class="form-control" readonly>
				</div>
				<div class="col-sm-6">			
					<?php echo Html::hiddenInput('perusahaan_kelurahan', $model->perusahaan_kelurahan, ['id'=>'model_id2a']);?>
					<?=
					$form->field($model, 'perusahaan_kelurahan')->label('')->widget(\kartik\widgets\DepDrop::classname(), [
						'pluginOptions' => [
							'depends' => ['kabkota-id2', 'kec-id2'],
							'placeholder' => '',
							'url' => Url::to(['prod']),
							'loading'=>false,
							'initialize'=>true,
							'params'=>['model_id2a']
						]
					]);
					?>
															
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-6">
						<?= $form->field($model, 'perusahaan_kodepos')->textInput(['maxlength' => true, 'readonly' => true,'style'=>'width:100%']) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model, 'hs_per_kodepos')->label('&nbsp')->textInput(['maxlength' => true,'style'=>'width:100%']) ?>
				</div>
			</div>
	
		</div>
		
	</div>	
								
</div>

	
	<br>
	<div style='text-align: center'>
		<?= Html::submitButton(Yii::t('app', '<i class="fa fa-pencil-square-o"></i> Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
	
	</fieldset>
	
</div>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="<?=Yii::getAlias('@front')?>/google_map/jquery-gmaps-latlon-picker.js"></script>
<style>
#panel-map{margin-bottom:20px}
.gllpMap { width: 100%; height: 250px; margin: 0; padding: 0; }
.gllpLatlonPicker { border: none; margin: 0; padding: 0; }
.gllpLatlonPicker input { width: auto; }
.gllpLatlonPicker P { margin: 0; padding: 0; }
.code { margin: 20px 0; font-size: 0.9em; width: 100%; font-family: "Monofur", courier; background-color: #555; padding: 15px; box-shadow: #f6f6f6 1px 1px 3px; color: #999; }
</style>

<?php
if(isset($_GET['alert'])){?>
	<script>
	alert('Identitas gudang berhasil di update');
	</script>
	<?php
}
?>

