<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kantor */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="kantor-form">
	
	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
	
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="form-group field-kantor-lokasi_id required has-success">

        <label class="control-label" for="kantor-nama">

            Lokasi

        </label>
        <input  class="form-control" type="text" readonly="" value="<?= $namaLoc; ?>"></input>

    </div>
    
    <?= Html::activeHiddenInput($model, 'lokasi_id', ['value' => $_SESSION['id_induk']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput([]) ?>

    <?= $form->field($model, 'longitude')->textInput([]) ?>

    <?= $form->field($model, 'email_jak_go_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_ptsp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
