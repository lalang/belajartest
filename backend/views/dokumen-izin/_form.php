<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumenIzin */
/* @var $form yii\widgets\ActiveForm */

?>

        <div class="dokumen-izin-form">

            <?php $form = ActiveForm::begin([]); ?>
			<?php $data = \backend\models\Izin::find()->where(['id'=>$id_induk])->orderBy('id')->asArray()->all(); ?>
            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['value'=>$data[0]['id'], 'style' => 'display:none']); ?>
	
			<?= $form->field($model, 'no_input')->textInput(['value'=>$data[0]['nama'], 'readonly' => 'true'])->label('Izin',['class'=>'label-class']) ?>

            <?= $form->field($model, 'judul')->textInput(['maxlength' => true, 'placeholder' => 'Judul']) ?>

            <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'file')->textInput(['maxlength' => true, 'placeholder' => 'File']) ?>

            <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N',], ['prompt' => '']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

