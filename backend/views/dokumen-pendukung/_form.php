<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumenPendukung */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokumen-pendukung-form">
	<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index', 'id'=>$id_induk], ['class' => 'btn btn-warning']) ?><br>
	<?php $form = ActiveForm::begin([]); ?>
	<?php $data = \backend\models\Izin::find()->where(['id'=>$id_induk])->orderBy('id')->asArray()->all(); ?>
	<?= $form->errorSummary($model); ?>

	<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	
	<?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['value'=>$data[0]['id'], 'style' => 'display:none']); ?>
	
	<?= $form->field($model, 'no_input')->textInput(['value'=>$data[0]['nama'], 'readonly' => 'true'])->label('Izin',['class'=>'label-class']) ?>
	
	<?= $form->field($model, 'kategori')->dropDownList([ 'Persyaratan Izin' => 'Persyaratan Izin', 'Mekanisme Pelayanan' => 'Mekanisme Pelayanan', 'Dasarhukum Izin' => 'Dasarhukum Izin', 'Mekanisme Pengaduan' => 'Mekanisme Pengaduan', 'Definisi' => 'Definisi', 'Download brosur' => 'Download brosur',], ['prompt' => '']) ?>

        <?=
            $form->field($model, 'isi')->widget(dosamigos\tinymce\TinyMce::className(), [
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

	<?= $form->field($model, 'file')->textInput(['maxlength' => true, 'placeholder' => 'File']) ?>

	<?= $form->field($model, 'urutan')->textInput(['placeholder' => 'Urutan']) ?>

	<?= $form->field($model, 'tipe')->textInput(['maxlength' => true, 'placeholder' => 'Tipe']) ?>

	<div class="form-group">
         <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a(Yii::t('app', 'Cancel'), ['index', 'id'=>$id_induk], ['class' => 'btn btn-info']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>