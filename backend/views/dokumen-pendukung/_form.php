<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumenPendukung */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokumen-pendukung-form">

	<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
	
	<?php $data = \backend\models\Izin::find()->where(['id'=>$id_induk])->orderBy('id')->asArray()->all(); ?>
	
	<?= $form->errorSummary($model); ?>
	
	<?php if($model->file){ echo "<strong>File</strong><br>".$model->file;?>
	<br>
	<?= Html::a(Yii::t('app', 'Hapus File'), ['deletefile', 'id' => $model->id], [
		'class' => 'btn btn-xs btn-danger',
		'data' => [
			'confirm' => Yii::t('app', 'Apakah anda ingin menghapus file?'),
		],
	])
	?>
	<br><br>
    <?php } ?>
	<?= $form->field($model, 'nm_file')->label('Upload File')->widget(FileInput::classname(), [
	    'options' => ['multiple' => true],
		'name'=>'nm_file'
	]) ?>

	<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	
	<?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['value'=>$data[0]['id'], 'style' => 'display:none']); ?>
	
	<?= $form->field($model, 'no_input')->textInput(['value'=>$data[0]['nama'], 'readonly' => 'true'])->label('Izin',['class'=>'label-class']) ?>
	
	<?= $form->field($model, 'kategori')->dropDownList([ 'Persyaratan Izin' => 'Persyaratan Izin', 'Mekanisme Pelayanan' => 'Mekanisme Pelayanan', 'Dasarhukum Izin' => 'Dasarhukum Izin', 'Mekanisme Pengaduan' => 'Mekanisme Pengaduan', 'Definisi' => 'Definisi', 'Download brosur' => 'Download brosur', 'Biaya' => 'Biaya']) ?>

	
         <?=	 
        $form->field($model, 'isi')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality template textcolor paste fullpage textcolor colorpicker textpattern"
                ],
                'toolbar' => "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor | table | hr removeformat | subscript superscript | charmap | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
            ]
        ]);
    ?>
	
	<?= $form->field($model, 'urutan')->textInput([]) ?>
	
	<?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N']) ?>
	
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>