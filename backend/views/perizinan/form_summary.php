<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Summary';
    $this->params['breadcrumbs'][] = ['label' => 'Laporan'];
?>

<div class="panel panel-primary">
	<div class="panel-heading">
            <i class="fa fa-print" aria-hidden="true"></i> Form Print Summary
	</div>
	<div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-6">	
					<?php
						echo $form->field($model, 'params')->dropDownList(['0' => 'Badan', '1' => 'Kantor', '2' => 'Kecamatan', '3' => 'Kelurahan'],['prompt'=>'Pilih Kewenangan'])->label('Pilih Kewenangan');
					?>
                </div>
            </div>
            <?php echo Html::submitButton(Yii::t('app', 'Print'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>
        </div>