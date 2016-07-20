<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Manage Izin';
$this->params['breadcrumbs'][] = ['label' => 'Manage Izin'];
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<i class="fa fa-print" aria-hidden="true"></i> Form Pencarian Izin
	</div>
	<div class="panel-body">
		<?php $form = ActiveForm::begin(); ?>
			<div class="row">
                <div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<?= $form->field($model, 'kode_registrasi')->textInput(['maxlength' => true, 'placeholder' => 'Masukan kode registrasi', 'style' => 'width:100%']) ?>
						</div>
					</div>	
				</div>
			</div>		
			<?php echo Html::submitButton(Yii::t('app', 'Cari'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php ActiveForm::end(); ?>
	</div>	
</div>	

<script src="<?=Yii::getAlias('@front')?>/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('form').on('submit', function() {
		if(!$('#perizinan-kode_registrasi').val()) {
			alert('Kode registrasi tidak boleh kosong');
			$('#perizinan-kode_registrasi').focus();
			return false;
		}
	});
});
</script>
<?php if($alert==1){?>
<!-- Modal -->
<script>
	alert('Maaf kode registrasi yang Anda masukan tidak terdaftar');
</script>
<?php } ?>
