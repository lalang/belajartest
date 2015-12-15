<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinTdp */
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

<div class="izin-tdp-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-siup']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

	
	
	<div class="tdp-form">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Data Pemilik</a></li>
				<li><a href="#tab_2" data-toggle="tab">Lokasi Perusahaan</a></li>
				<li><a href="#tab_3" data-toggle="tab">Data Umum Perusahaan</a></li>
				<li><a href="#tab_4" data-toggle="tab">Pemegang Saham</a></li>
				<li><a href="#tab_5" data-toggle="tab">Data Kegiatan Perusahaan</a></li>
				<li><a href="#tab_6" data-toggle="tab">Disclaimer</a></li>
				<!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
			</ul>
		<div id="result"></div>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1">
				<?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama']) ?>
				
				<?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Masukan tempat lahir']) ?>
				
				<?=	$form->field($model, 'tanggal_lahir', [
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
				
				<?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan alamat']) ?>
				
				<?= $form->field($model, 'wilayah_id')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
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
            <div class="tab-pane" id="tab_2">
				
				<?= $form->field($model, 'iii_1_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama kelompok perusahaan/ Group bila ada']) ?>
				
				<?= $form->field($model, 'iii_2_status_prsh')->dropDownList(['Kantor Tunggal' => 'Kantor Tunggal', 'Kantor Pusat' => 'Kantor Pusat','Kantor Cabang' => 'Kantor Cabang','Kantor Pembantu' => 'Kantor Pembantu','Perwakilan' => 'Perwakilan' ],['id'=>'field_cpp','onchange'=>'getval(this)']) ?>
				
				<div class="row" id="cpp" style="display: none">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-6">
				
						<?= $form->field($model, 'iii_2_induk_nama_prsh')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nama perusahaan induk']) ?>
						
						<?= $form->field($model, 'iii_2_induk_nomor_tdp')->textInput(['maxlength' => true, 'placeholder' => 'Masukan nomor TDP']) ?>
						
						<?= $form->field($model, 'iii_2_induk_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukan alamat perusahaan']) ?>
						
						<?= $form->field($model, 'iii_2_induk_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Masukan propinsi']) ?>
						
						<?= $form->field($model, 'iii_2_induk_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kabupaten']) ?>
						
						<?= $form->field($model, 'iii_2_induk_kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kecamatan']) ?>
						
						<?= $form->field($model, 'iii_2_induk_kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kelurahan']) ?>
						
						
					</div>	
				</div>
				
				<?= $form->field($model, 'cek_unit_produksi')->dropDownList(['Tidak' => 'Tidak Ada', 'Ada' => 'Ada'],['id'=>'field_up','onchange'=>'getval(this)']) ?>
				<div class="row" id="up" style="display: none">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-6">
					<?= $form->field($model, 'iii_3_lokasi_unit_produksi')->textInput(['maxlength' => true, 'placeholder' => 'Masukan lokasi unit produksi apa bila ada']) ?>
					
					<?= $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi')->textInput(['maxlength' => true, 'placeholder' => 'Masukan propinsi']) ?>
					
					<?= $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kabupaten']) ?>
					
					</div>
				</div>	
				
				
				
			</div>
		</div>	
	</div>	
	
	
	<ul class="pager wizard">
		<li class="previous"><a href="#">Previous</a></li>
		<li class="next"><a href="#">Next</a></li>
		<li class="next finish" style="display:none;"><a href="#">Finish</a></li>
	</ul>
				
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<head>
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


$(document).ready(function() {
    $("#field_up").change(function() {
	   if (this.value == 'Ada') {
             $('#up').show();
         }else{
			$("#up").hide();
		}
    });
});
</script>


</head>



<script>
	$('#field_lupk').bind('keyup change',function(){
		if(this.value.length > 0){
		  $('#lupk').show();
	}
	else {
		$('#lupk').hide();
	}

</script>

<!--

<style>
  #number { display: none; height: 100px; border: solid 1px #ddd; }
</style>

Type here:<input type="text" id="gname">



<script>
$('#gname').bind('keyup change',function(){
    if(this.value.length > 0){
      $('#number').show();
}
else {
    $('#number').hide();
}
});
</script>
-->