<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\DocUserMan */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="doc-user-man-form">

     <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->errorSummary($model); ?>
<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
 <?= $form->field($model, 'id_access')->dropDownList([ 'Pemohon' => 'Pemohon', 'Petugas' => 'Petugas', ], ['prompt' => '']) ?>
    
 <?= $form->field($model, 'aktivasi')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>
    
    
    
	<?= $form->field($model, 'file')->label('Upload')->widget(FileInput::classname(), [
	    'options' => ['multiple' => true],
		'name'=>'file'
	]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
