<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Download */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="download-form">

   <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	
	<?= $form->field($model, 'file')->FileInput() ?><i>(Pastikan file sudah di packing dalam zip atau rar)</i><br><br>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_eng')->textInput(['maxlength' => true]) ?>
	
	<?=
     $form->field($model, 'deskripsi')->widget(TinyMce::className(), [
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
     $form->field($model, 'deskripsi_eng')->widget(TinyMce::className(), [
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

    <?= $form->field($model, 'jenis_file')->dropDownList([ 'Dok' => 'Dok', 'SW' => 'SW', 'Drv' => 'Drv', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
