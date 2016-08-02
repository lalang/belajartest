<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Laporan Detail';
$this->params['breadcrumbs'][] = ['label' => 'Laporan'];
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<i class="fa fa-print" aria-hidden="true"></i> Form Print Laporan
	</div>
	<div class="panel-body">
		<?php $form = ActiveForm::begin(); ?>
			<div class="row">
                <div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<?php
								echo $form->field($model, 'id_laporan')->dropDownList(['1' => 'Siup Online', '2' => 'TDP Online', '3' => 'TDG Online', '4' => 'PM1 SKCK','5' => 'PM1 SKTM','6' => 'SKDU','7' => 'Penelitian','8' => 'Kesehatan'],['prompt'=>'Pilih Izin'])->label('Jenis Izin');
							?>
						</div>
					</div>	
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-3">
							<?php 
							$n=1;
							while($n<=12){
								$listBln[$n]=bulan($n);
							$n++;		
							}
							?>
							<?= $form->field($model, 'bln_awal_laporan')->dropDownList($listBln,['prompt'=>'Pilih Bulan'])->label('Bulan Awal'); ?>
						</div>
						<div class="col-md-3">
							<?php 
							$dateThn = gmdate("Y", time()+60*60*7); 
							$n=2015;
							while($n<=$dateThn){
								$listThn[$n]=$n;
							$n++;		
							}
							?>
							<?= $form->field($model, 'thn_awal_laporan')->dropDownList($listThn,['prompt'=>'Pilih Tahun'])->label('Tahun Awal'); ?>
						</div>
						<div class="col-md-3">
							<?php 
							$n=1;
							while($n<=12){
								$listBlnAkr[$n]=bulan($n);
							$n++;		
							}
							?>
							<?= $form->field($model, 'bln_akhir_laporan')->dropDownList($listBlnAkr,['prompt'=>'Pilih Bulan'])->label('Bulan Akhir'); ?>
						</div>
						<div class="col-md-3">
							<?php 
							$dateThnAkr = gmdate("Y", time()+60*60*7); 
							$n=2015;
							while($n<=$dateThnAkr){
								$listThnAkr[$n]=$n;
							$n++;		
							}
							?>
							<?= $form->field($model, 'thn_akhir_laporan')->dropDownList($listThnAkr,['prompt'=>'Pilih Tahun'])->label('Tahun Akhir'); ?>
						</div>
					</div>		
				</div>
			</div>		
			<?php echo Html::submitButton(Yii::t('app', 'Print'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php ActiveForm::end(); ?>
	</div>	
</div>	

<?php
function bulan($bulan) {
	if($bulan==1){
		$bln = "Januari";
	}elseif($bulan==2){
		$bln = "Februari";
	}elseif($bulan==3){
		$bln = "Maret";
	}elseif($bulan==4){
		$bln = "April";
	}elseif($bulan==5){
		$bln = "Mei";
	}elseif($bulan==6){
		$bln = "Juni";
	}elseif($bulan==7){
		$bln = "Juli";
	}elseif($bulan==8){
		$bln = "Agustus";
	}elseif($bulan==9){
		$bln = "September";
	}elseif($bulan==10){
		$bln = "Oktober";
	}elseif($bulan==11){
		$bln = "November";
	}elseif($bulan==12){
		$bln = "Desember";
	}
	
	return $bln;
}
?>
<script src="<?=Yii::getAlias('@front')?>/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('form').on('submit', function() {
		if(!$('#perizinan-id_laporan').val()) {
			alert('Silakan pilih jenis izin');
			$('#perizinan-id_laporan').focus();
			return false;
		}
		
		if(!$('#perizinan-bln_awal_laporan').val()) {
			alert('Silakan pilih bulan awal laporan');
			$('#perizinan-bln_awal_laporan').focus();
			return false;
		}
		
		if(!$('#perizinan-thn_awal_laporan').val()) {
			alert('Silakan pilih tahun awal laporan');
			$('#perizinan-thn_awal_laporan').focus();
			return false;
		}
		
		if(!$('#perizinan-bln_akhir_laporan').val()) {
			alert('Silakan pilih bulan akhir laporan');
			$('#perizinan-bln_akhir_laporan').focus();
			return false;
		}
		
		if(!$('#perizinan-thn_akhir_laporan').val()) {
			alert('Silakan pilih tahun akhir laporan');
			$('#perizinan-thn_akhir_laporan').focus();
			return false;
		}
		
	});
});
</script>