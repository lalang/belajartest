<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Arsip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-nav-main-form">
	
	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
	
	<?php $form = ActiveForm::begin([]); ?>

	<?= $form->errorSummary($model); ?>

	<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

	<?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

	<?= $form->field($model, 'kode')->textInput(['maxlength' => true, 'placeholder' => 'Kode']) ?>

	<?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N',]) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>