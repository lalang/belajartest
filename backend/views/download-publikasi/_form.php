<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\DownloadPublikasi */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="download-publikasi-form">
	
	<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index','id'=>$_SESSION['id_induk']], ['class' => 'btn btn-warning']) ?>
	
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	
	<?php $data = \backend\models\Publikasi::find()->where(['id'=>$_SESSION['id_induk']])->orderBy('id')->asArray()->all(); ?>
	<?= $form->field($model, 'publikasi_id', ['template' => '{input}'])->textInput(['value'=>$data[0]['id'], 'style' => 'display:none']); ?>
	<?= $form->field($model, 'no_input')->textInput(['value'=>$data[0]['nama'], 'readonly' => 'true'])->label('Publikasi',['class'=>'label-class']) ?>
	
	<?php if($model->nama_file){?>
	<strong>File</strong><br>
	<?= Html::a(Yii::t('app', 'Hapus File Lama'), ['deletefile', 'id' => $model->id], [
		'class' => 'btn btn-xs btn-danger',
		'data' => [
			'confirm' => Yii::t('app', 'Apakah anda ingin menghapus file download?'),
		],
	])
	?><br><br>
	<?php } ?>
	
	<?= $form->field($model, 'file')->label('Upload File')->widget(FileInput::classname(), [
	    'options' => ['multiple' => true],
		'name'=>'file'
	]) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deskripsi_eng')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
