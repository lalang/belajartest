<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="page-form">
	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
	<br><br>
	<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->errorSummary($model); ?>
	
	<?php if($model->gambar){?>
    <p align="center"><img src="<?= Yii::getAlias('@web') ?>/images/pages/<?= $model->gambar ?>" width="300"><br>
	<br>

	<?= Html::a(Yii::t('app', 'Hapus Gambar'), ['deleteimage', 'id' => $model->id], [
		'class' => 'btn btn-xs btn-danger',
		'data' => [
			'confirm' => Yii::t('app', 'Apakah anda ingin menghapus gambar?'),
		],
	])
	?>

	</p>
    <?= $form->field($model, 'gambar')->hiddenInput()->label(false) ?><br>
	
    <?php }
    ?>
	
	<?= $form->field($model, 'file')->label('Upload Gambar')->widget(FileInput::classname(), [
	    'options' => ['multiple' => true],
		'name'=>'file'
	]) ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_en')->textInput(['maxlength' => true]) ?>
	
	<?=
	 $form->field($model, 'description')->widget(TinyMce::className(), [
	 'options' => ['rows' => 12],
	 'language' => 'id',
	 'clientOptions' => [
	 'plugins' => [
	 "advlist autolink lists link charmap print preview anchor",
	 "searchreplace visualblocks code fullscreen",
	 "insertdatetime media table contextmenu paste"
	 ],
	 'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	 ]
	 ]);
	 ?>
	<?=
	 $form->field($model, 'description_en')->widget(TinyMce::className(), [
	 'options' => ['rows' => 12],
	 'language' => 'id',
	 'clientOptions' => [
	 'plugins' => [
	 "advlist autolink lists link charmap print preview anchor",
	 "searchreplace visualblocks code fullscreen",
	 "insertdatetime media table contextmenu paste"
	 ],
	 'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	 ]
	 ]);
	 ?>

    <?= $form->field($model, 'urutan')->textInput([]) ?>

    <?= $form->field($model, 'landing')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
