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
                <h3 class="box-title">Surat Keterangan Pengantar Perbuatan (SKCK)</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

    <?php $form = ActiveForm::begin(['id'=>'form-izin-pm1']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <div class="pm1-form-skck">
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
													'wrapper' => 'col-sm-6',
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
											])->hint('format: dd-mm-yyyy (cth. 27-04-1990)');
										?>
									</div>
							
								</div>
								<div class="row">
									<div class="col-md-6">
										<?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan' ]) ?>
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
				</div>
				<div class="tab-pane" id="tab_2">
					<div class="panel panel-primary">
					<div class="panel-heading">Formulir Permohonan</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<?= $form->field($model, 'no_surat_pengantar')->textInput(['maxlength' => true, 'placeholder' => 'No Surat Pengantar']) ?>
								</div>
								<div class="col-md-4">
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
								<div class="col-md-4">
									<?= $form->field($model, 'instansi_tujuan')->textInput(['maxlength' => true, 'placeholder' => 'Instansi Tujuan']) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?= $form->field($model, 'keperluan_administrasi')->textarea(['rows' => 6]) ?>
								</div>
							</div>	
						</div>
					</div>	
	
		</div>
                
		<div class="tab-pane" id="tab_3">
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