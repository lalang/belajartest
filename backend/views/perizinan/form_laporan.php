<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Laporan '.$nm_title;
$this->params['breadcrumbs'][] = ['label' => 'Laporan'];
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<i class="fa fa-print" aria-hidden="true"></i> Form Print Laporan
	</div>
	<div class="panel-body">
		<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'id_laporan', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
			<div class="row">
                <div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<?php 
							$n=1;
							while($n<=12){
								$listBln[$n]=$n;
							$n++;		
							}
							?>
							<?= $form->field($model, 'bln_awal_laporan')->dropDownList($listBln,['prompt'=>'Pilih Bulan'])->label('Bulan Awal'); ?>
						</div>
						<div class="col-md-6">
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
					</div>	
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<?php 
							$n=1;
							while($n<=12){
								$listBlnAkr[$n]=$n;
							$n++;		
							}
							?>
							<?= $form->field($model, 'bln_akhir_laporan')->dropDownList($listBlnAkr,['prompt'=>'Pilih Bulan'])->label('Bulan Akhir'); ?>
						</div>
						<div class="col-md-6">
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


