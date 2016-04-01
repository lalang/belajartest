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

//use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
/* @var $form yii\widgets\ActiveForm */

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

<script src="/js/jquery.min.js"></script>
<?php $form = ActiveForm::begin(['id'=>'form-izin-tdg']); ?>
<?php $model->gudang_propinsi = 11; ?>
<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
<?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
<div class="gllpLatlonPicker">  


<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
                <h3 class="box-title">Formulir TDG</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
      
			<div id="panel-map"> 
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class='input-group'><div class='input-group-addon'>Tentukan Wilayah</div>
								<input type="text" class="gllpSearchField form-control">
							</div>
						</div>	
						<div class="col-md-2">			
							<input type="button" class="gllpSearchButton btn btn-primary" value="Cari">
						</div>
					</div>
				</div>
				<div class="row" style='margin-top:10px'>
					<div class="col-md-12">
						<div class="gllpMap">Google Maps</div>
					</div>
				</div>
				
				<input type="hidden" class="gllpZoom form-control" value="18"/>
				<?php
				if($model->gudang_koordinat_1=="" and $model->gudang_koordinat_2==""){
					$koordinat_1 = "-6.181483";
					$koordinat_2 = "106.828568";
				}else{
					$koordinat_1 = $model->gudang_koordinat_1;
					$koordinat_2 = $model->gudang_koordinat_2;
				}
				?>
				<div class="row">
					<div class="box-body">
						<div class="col-md-3">	
							<?= $form->field($model, 'gudang_koordinat_1',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Latitude</div>{input}</div>'])->label('')->textInput(['maxlength' => true, 'placeholder' => 'Masukan titik Lat', 'class'=>'gllpLatitude form-control', 'value'=>$koordinat_1, 'id'=>'latitude','style'=>'width:200px;']) ?>
						</div>
						<div class="col-md-3">	
							<?= $form->field($model, 'gudang_koordinat_2',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Longitude</div>{input}</div>'])->label('')->textInput(['maxlength' => true, 'placeholder' => 'Masukan titik Long', 'class'=>'gllpLongitude form-control', 'value'=>$koordinat_2,'style'=>'width:200px;']) ?>
						</div>
						<div class="col-md-3">	
							<input type="button" style='margin-left:10px; margin-top:20px;' class="gllpUpdateButton btn btn-info" value="Update Map">	
						</div>	
					</div>	
				</div>  
			</div>

				<div class="box-body">
					<?php
						$min = \backend\models\Izin::findOne($model->izin_id)->min;
						$max = \backend\models\Izin::findOne($model->izin_id)->max;
					?>
					<?= $form->errorSummary($model); ?>
					
					<input type="hidden" value="<?php echo $min; ?>" class="LimitMin" />
					<input type="hidden" value="<?php echo $max; ?>" class="LimitMax" />
					<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
					<?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
					<?= $form->field($model, 'user_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
					<?= $form->field($model, 'status_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
					<?= $form->field($model, 'tipe', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

					<div class="tdg-form" style='margin-top:-80px;'>
					
					
					<div class="clearfix">&nbsp;</div>
					
						<!-- Custom Tabs -->
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
								<li><a href="#tab_2" data-toggle="tab">Identitas Perusahaan</a></li>
								<li><a href="#tab_3" data-toggle="tab">Identitas Gudang</a></li>
								<li><a href="#tab_4" data-toggle="tab">Identitas Lain</a></li>
								<li><a href="#tab_5" data-toggle="tab">Disclaimer</a></li>
								<!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
							</ul>
							<div id="result"></div>

							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<div class="panel panel-primary">
										<div class="panel-heading">Identitas Pemilik/Pengurus</div>
										<?php 
											//Cek apa perusahaan atau perorangan	
											if($model->tipe=="Perusahaan"){
													$status_disabled = true;
													$status_disabled2 = false;
													$status_disabled3 = false;
													$status_disabled4 = true;
											}else{
													$status_disabled = false;
													$status_disabled2 = true;
													$status_disabled3 = true;
													$status_disabled4 = false;
											}	
										?>
									
									<div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3">
												<?= $form->field($model, 'pemilik_nik')->textInput(['maxlength' => true, 'placeholder' => 'NIK','disabled' => $status_disabled2,'style'=>'width:100%']) ?>
											</div>
											<div class="col-md-3">	
												<?= $form->field($model, 'pemilik_paspor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan paspor jika ada','style'=>'width:100%']) ?>
											</div>
											<div class="col-md-3">	
												<?= $form->field($model, 'pemilik_kitas')->textInput(['maxlength' => true, 'placeholder' => 'Masukan KITAS jika ada','style'=>'width:100%']) ?>
											</div>
											<div class="col-md-3">	
												<?= $form->field($model, 'pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama','disabled' => $status_disabled2,'style'=>'width:100%','style'=>'width:100%']) ?>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-12">
												 <?= $form->field($model, 'pemilik_alamat')->textArea(['placeholder' => 'Alamat Lengkap']) ?>
											</div>
										</div>	
										<div class="row">
                                    <!--        <div class="col-md-4">
												<?= $form->field($model, 'pemilik_rt')->textInput(['maxlength' => true, 'placeholder' => 'Masukan RT','style'=>'width:100%']) ?>
											</div>
											<div class="col-md-4">
												<?= $form->field($model, 'pemilik_rw')->textInput(['maxlength' => true, 'placeholder' => 'Masukan RW','style'=>'width:100%']) ?>
											</div>-->
											
										</div>

										<div class="row">
                                            <div class="col-md-6">
												<?= $form->field($model, 'pemilik_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
											</div>
											<div class="col-md-6">
												<?php echo Html::hiddenInput('pemilik_kabupaten', $model->pemilik_kabupaten, ['id' => 'model_id']); ?>
                                                <?=
                                                $form->field($model, 'pemilik_kabupaten')->widget(\kartik\widgets\DepDrop::classname(), [
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
										</div>	

										<div class="row">
                                            <div class="col-md-6">
												<?php echo Html::hiddenInput('pemilik_kecamatan', $model->pemilik_kecamatan, ['id' => 'model_id1']); ?>
                                                <?=
                                                $form->field($model, 'pemilik_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
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
												<?php echo Html::hiddenInput('pemilik_kelurahan', $model->pemilik_kelurahan, ['id' => 'model_id2']); ?>
                                                <?=
                                                $form->field($model, 'pemilik_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
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
												<?= $form->field($model, 'pemilik_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Kodepos','style'=>'width:100%']) ?>
											</div>
											<div class="col-md-3">
												<?= $form->field($model, 'pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'Masukan telepon','style'=>'width:100%']) ?>
											</div>
											<div class="col-md-3">
												<?= $form->field($model, 'pemilik_fax')->textInput(['maxlength' => true, 'placeholder' => 'Masukan fax','style'=>'width:100%']) ?>
											</div>
											<div class="col-md-3">
												<?= $form->field($model, 'pemilik_email')->textInput(['maxlength' => true, 'placeholder' => 'Masukan email','style'=>'width:100%','disabled' => $status_disabled3]) ?>
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
												<div class="col-md-4">
													<?= $form->field($model, 'perusahaan_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan NPWP prusahaan', 'disabled' => $status_disabled,'style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama perusahaan','disabled' => $status_disabled ,'style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'perusahaan_namagedung')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama gedung','style'=>'width:100%']) ?>
												</div>	
											</div>
											<div class="row">
												<div class="col-md-6">
													<?= $form->field($model, 'perusahaan_blok_lantai')->textInput(['maxlength' => true, 'placeholder' => 'Masukan blok/ lantai','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-6">
													<?= $form->field($model, 'perusahaan_namajalan')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama jalan','style'=>'width:100%']) ?>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<?= $form->field($model, 'perusahaan_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov2-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi..']); ?>
												</div>
												<div class="col-md-6">
													<?php echo Html::hiddenInput('perusahaan_kabupaten', $model->perusahaan_kabupaten, ['id' => 'model_id']); ?>
													<?=
													$form->field($model, 'perusahaan_kabupaten')->widget(\kartik\widgets\DepDrop::classname(), [
														'options' => ['id' => 'kabkota2-id'],
														'pluginOptions' => [
															'depends' => ['prov2-id'],
															'placeholder' => 'Pilih Kota...',
															'url' => Url::to(['subkot']),
															'loading' => false,
															'initialize' => true,
															'params' => ['model_id']
														]
													]);
													?>
												</div>
											</div>	
											
											<div class="row">
												<div class="col-md-6">
													<?php echo Html::hiddenInput('perusahaan_kecamatan', $model->perusahaan_kecamatan, ['id' => 'model_id1']); ?>
													<?=
													$form->field($model, 'perusahaan_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
														'options' => ['id' => 'kec2-id'],
														'pluginOptions' => [
															'depends' => ['prov2-id', 'kabkota2-id'],
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
													<?php echo Html::hiddenInput('perusahaan_kelurahan', $model->perusahaan_kelurahan, ['id' => 'model_id2']); ?>
													<?=
													$form->field($model, 'perusahaan_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
														'pluginOptions' => [
															'depends' => ['prov2-id', 'kabkota2-id', 'kec-id'],
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
													<?= $form->field($model, 'perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kodepos','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-3">
													<?= $form->field($model, 'perusahaan_telepon')->textInput(['maxlength' => true, 'placeholder' => 'Masukan telepon','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-3">
													<?= $form->field($model, 'perusahaan_fax')->textInput(['maxlength' => true, 'placeholder' => 'Masukan fax','style'=>'width:100%']) ?>

												</div>
												<div class="col-md-3">
													<?= $form->field($model, 'perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Masukan email','style'=>'width:100%','disabled' => $status_disabled4]) ?>
												</div>	
											</div>
										</div>
									</div>	
								</div>
								<div class="tab-pane" id="tab_3">
									<div class="panel panel-primary">
										<div class="panel-heading">Identitas Gudang</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-6">
													<strong>Koordinat</strong><br><i>Note: Tentukan koordinat letak Gudang dengan meng-klik peta diatas sebanyak 2 kali atau dengan cara mengeser balon (klik kanan dan tekan pada balon lalu geser).</i>
												</div>
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-5">
															<div class='koorLatitude' style='border:1px solid #c0c0c0; margin:5px; padding:5px; width:100%'><?php echo $model->gudang_koordinat_1; ?>&nbsp;</div>			
														</div>
														<div class="col-md-5">
															<div class='koorLongitude' style='border:1px solid #c0c0c0; margin:5px; padding:5px; width:100%'>&nbsp;<?php echo $model->gudang_koordinat_2; ?></div>
														</div>
													</div>	
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_namagedung')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama gedung','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_blok_lantai')->textInput(['maxlength' => true, 'placeholder' => 'Masukan blok lantai','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_namajalan')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama jalan','style'=>'width:100%']) ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-2">
													<?= $form->field($model, 'gudang_rt')->textInput(['maxlength' => true, 'placeholder' => 'Masukan RT','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-2">
													<?= $form->field($model, 'gudang_rw')->textInput(['maxlength' => true, 'placeholder' => 'Masukan RW','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov3-id', 'class' => 'input-large form-control', 'disabled' => true, 'prompt' => 'Pilih Propinsi..']); ?>
												</div>
												<div class="col-md-4">	
													<?php echo Html::hiddenInput('gudang_kabupaten', $model->gudang_kabupaten, ['id' => 'model_id']); ?>
													<?=
													$form->field($model, 'gudang_kabupaten')->widget(\kartik\widgets\DepDrop::classname(), [
														'options' => ['id' => 'kabkota3-id'],
														'pluginOptions' => [
															'depends' => ['prov3-id'],
															'placeholder' => 'Pilih Kota...',
															'url' => Url::to(['subkot']),
															'loading' => false,
															'initialize' => true,
															'params' => ['model_id']
														]
													]);
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
												
													<?php echo Html::hiddenInput('gudang_kecamatan', $model->gudang_kecamatan, ['id' => 'model_id1']); ?>
													<?=
													$form->field($model, 'gudang_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
														'options' => ['id' => 'kec3-id'],
														'pluginOptions' => [
															'depends' => ['prov3-id', 'kabkota3-id'],
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
													<?php echo Html::hiddenInput('gudang_kelurahan', $model->gudang_kelurahan, ['id' => 'model_id2']); ?>
													<?=
													$form->field($model, 'gudang_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
														'pluginOptions' => [
															'depends' => ['prov3-id', 'kabkota3-id', 'kec-id'],
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
													<?= $form->field($model, 'gudang_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kodepos','style'=>'width:100%']) ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_telepon')->textInput(['maxlength' => true, 'placeholder' => 'Masukan telepon','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_fax')->textInput(['maxlength' => true, 'placeholder' => 'Masukan fax','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_email')->textInput(['maxlength' => true, 'placeholder' => 'Masukan email','style'=>'width:100%']) ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_luas',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">M<sup>2</sup></div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan luas gudang', 'class'=>'form-control number']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_kapasitas')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kapasitas','style'=>'width:100%','class'=>'form-control number']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_kapasitas_satuan')->dropDownList([ 'M3' => 'M3', 'TON' => 'TON']); ?>
												</div>
											</div>	
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_nilai',['inputTemplate' => '<div class="input-group"><div class="input-group-addon">Rp</div>{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan nilai gudang', 'class'=>'form-control number']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_komposisi_nasional',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan komposisi nasional',]) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_komposisi_asing',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">%</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan komposisi asing']) ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_kelengkapan')->dropDownList([ 'Berpendingin' => 'Berpendingin', 'Tidak berpendingin' => 'Tidak berpendingin', 'Keduanya' => 'Keduanya']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_sarana_listrik',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Kwh</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan Kwh listrik', 'class'=>'form-control number']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_sarana_air')->dropDownList([ 'PAM' => 'PAM', 'Sumur bor' => 'Sumur bor']) ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_sarana_pendingin',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon"><sup>o</sup>C</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan fasilitas pendingin','class'=>'form-control number']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_sarana_forklif',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Unit</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan jumlah forklif','class'=>'form-control number']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_sarana_komputer',['inputTemplate' => '<div class="input-group">{input}<div class="input-group-addon">Unit</div></div>'])->textInput(['maxlength' => true, 'placeholder' => 'Masukan jumlah komputer','class'=>'form-control number']) ?>
												</div>
											</div>	
										</div>
									</div>
								</div><!-- /.tab-pane -->
								<div class="tab-pane" id="tab_4">
									<div class="panel panel-primary">
										<div class="panel-heading">Identitas Lain</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_kepemilikan')->dropDownList([ 'Milik sendiri' => 'Milik sendiri', 'Sewa' => 'Sewa']) ?>
												</div>
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_imb_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor IMB','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
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
														'type' => DateControl::FORMAT_DATE,
													])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?= $form->field($model, 'gudang_uug_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor UUG','style'=>'width:100%']) ?>
												</div>
												<div class="col-md-4">
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
														'type' => DateControl::FORMAT_DATE,
													])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
													?>
												</div>
												<div class="col-md-4">
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
														'type' => DateControl::FORMAT_DATE,
													])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<?= $form->field($model, 'gudang_isi')->textarea(['rows' => 6]) ?>
												</div>
											</div>
										</div>	
									</div>
								</div>
								<div class="tab-pane" id="tab_5">
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

</div>	

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="<?=Yii::getAlias('@front')?>/google_map/jquery-gmaps-latlon-picker.js"></script></p>
<style>
#panel-map{margin-bottom:20px}
.gllpMap { width: 100%; height: 350px; margin: 0; padding: 0; }
.gllpLatlonPicker { border: none; margin: 0; padding: 0; }
.gllpLatlonPicker input { width: auto; }
.gllpLatlonPicker P { margin: 0; padding: 0; }
.code { margin: 20px 0; font-size: 0.9em; width: 100%; font-family: "Monofur", courier; background-color: #555; padding: 15px; box-shadow: #f6f6f6 1px 1px 3px; color: #999; }
</style>

<script src="/js/wizard_tdg.js"></script>        
        


