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
/* @var $model backend\models\IzinPm1 */
/* @var $form yii\widgets\ActiveForm */

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
                <h3 class="box-title">Surat Keterangan Tidak Mampu (SKTM)</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

    <?php $form = ActiveForm::begin(['id'=>'form-izin-pm1']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <div class="pm1-form-sktm">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                <li><a href="#tab_2" data-toggle="tab">Formulir Permohonan</a></li>
                <li><a href="#tab_3" data-toggle="tab">Disclaimer</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
        <div id="result"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<div class="panel panel-primary">
						<div class="panel-heading">Identitas Pemilik/Pengurus</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik', 'readonly' => TRUE]) ?>
								</div>
								<div class="col-md-4">
									<?= $form->field($model, 'no_kk')->textInput(['maxlength' => true, 'placeholder' => 'No Kk', 'readonly' => TRUE]) ?>
								</div>
								<div class="col-md-4">
									<?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama', 'readonly' => TRUE]) ?>
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
								//                'disabled' => TRUE
											],
											'type' => DateControl::FORMAT_DATE,
										])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan' ],['disabled' => False]) ?>
								</div>
								<div class="col-md-6">
									<?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu' ],['disabled' => False]) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									 <?= $form->field($model, 'wilayah_id')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
								</div>
								<div class="col-md-4">
									<?php echo Html::hiddenInput('kecamatan_id', $model->kecamatan_id, ['id'=>'model_id1']);?>
									<?=
									$form->field($model, 'kecamatan_id')->widget(\kartik\widgets\DepDrop::classname(), [
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
								</div>
								<div class="col-md-4">
									<?php echo Html::hiddenInput('kelurahan_id', $model->kelurahan_id, ['id'=>'model_id2']);?>
									<?=
									$form->field($model, 'kelurahan_id')->widget(\kartik\widgets\DepDrop::classname(), [
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
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>
								</div>
								<div class="col-md-4">
									<?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan']) ?>
								</div>
								<div class="col-md-4">
									<?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>
								</div>
							</div>		
						</div>	
						
					</div>	
                
    <?php
//    $form->field($model, 'perizinan_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
//        'options' => ['placeholder' => Yii::t('app', 'Choose Perizinan')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]) 
            ?>

    <?php
//    $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
//        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]) 
            ?>

    <?php
//    $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
//        'options' => ['placeholder' => Yii::t('app', 'Choose Status')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]) 
            ?>
             

    </div>
                
    <div class="tab-pane" id="tab_2">
		<div class="panel panel-primary">
			<div class="panel-heading">Formulir Permohonan</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<?= $form->field($model, 'no_surat_pengantar')->textInput(['maxlength' => true, 'placeholder' => 'No Surat Pengantar']) ?>
					</div>
					<div class="col-md-6">
						<?=
							$form->field($model, 'tanggal_surat', [
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
						<?= $form->field($model, 'instansi_tujuan')->textInput(['maxlength' => true, 'placeholder' => 'Instansi Tujuan']) ?>
					</div>
					<div class="col-md-6">
						<?= $form->field($model, 'tujuan')->dropDownList([ 'Mengajukan/mengurus keringanan biaya pendidikan/memperoleh KJP/fasilitas pendidikan lainnya' => 'Mengajukan/mengurus keringanan biaya pendidikan/memperoleh KJP/fasilitas pendidikan lainnya', 'Mengajukan/mengurus BPJS/keringanan biaya kesehatan' => 'Mengajukan/mengurus BPJS/keringanan biaya kesehatan', 'Mengajukan/mengurus keringanan biaya sosial lainnya (non pendidikan dan kesehatan)' => 'Mengajukan/mengurus keringanan biaya sosial lainnya (non pendidikan dan kesehatan)' ]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							$hiden = '';
							if(!$model->pilihan){
								$model->pilihan = '1';
								$hiden = 'hidden="true"';
							} elseif ($model->pilihan == '1') {
								$hiden = 'hidden="true"';
							}
							echo $form->field($model, 'pilihan')->radioList([
								'1' => 'Untuk diri sendiri',
								'2' => 'Untuk orang lain',
							],
							[
								'class'=>'izinpm1-pilihan',
								'id' => 'izinpm1-pilihan'
							]);
						?>
					</div>
				</div>
			</div>
		
        <div id="SKTM_Orang_Lain" <?php echo $hiden; ?>>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<?= $form->field($model, 'nik_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Nik Orang Lain']) ?>
				</div>
				<div class="col-md-4">
					<?= $form->field($model, 'no_kk_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'No Kk Orang Lain']) ?>
				</div>
				<div class="col-md-4">
					<?= $form->field($model, 'nama_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Nama Orang Lain']) ?>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-4">
					<?= $form->field($model, 'tempat_lahir_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Orang Lain']) ?>
				</div>
				<div class="col-md-4">
					<?=
						$form->field($model, 'tanggal_lahir_orang_lain', [
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
					<?= $form->field($model, 'jenkel_orang_lain')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan', ]) ?>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-12">
					<?= $form->field($model, 'alamat_orang_lain')->textarea(['rows' => 6]) ?>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-4">
					<?= $form->field($model, 'wilayah_id_orang_lain')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id-org-lain', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..', 'disabled' => True]); ?>
				</div>
				<div class="col-md-4">
					<?= $form->field($model, 'kecamatan_id_orang_lain')->dropDownList(\backend\models\Lokasi::getAllKecamatanOptions(), ['id' => 'kec-id-org-lain', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kecamatan...', 'disabled' => True]); ?>
				</div>
				<div class="col-md-4">
					<?= $form->field($model, 'kelurahan_id_orang_lain')->dropDownList(\backend\models\Lokasi::getAllKelurahanOptions(), ['id' => 'kel-id-org-lain', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..', 'disabled' => True]); ?>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-4">
					<?= $form->field($model, 'kodepos_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Orang Lain']) ?>
				</div>
				<div class="col-md-4">
					<?= $form->field($model, 'pekerjaan_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Orang Lain']) ?>
				</div>
				<div class="col-md-4">
					<?= $form->field($model, 'telepon_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Orang Lain']) ?>
				</div>
			</div>
		</div>			
		</div>	
		</div>
    </div>
                
    <div class="tab-pane" id="tab_3">
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

<script>
$(document).ready(function(){
  
    $('input[type=radio]').change(function() {
        if (this.value == 2) {
            $('#SKTM_Orang_Lain').show();
            $('#kabkota-id-org-lain').val($('#kabkota-id').val());
            $('#kec-id-org-lain').val($('#kec-id').val());
            $('#kel-id-org-lain').val($('#izinpm1-kelurahan_id').val());
        }
        else if (this.value == 1) {
            $('#SKTM_Orang_Lain').hide();
        }
    });
    
});
</script>