<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kuota */
/* @var $form yii\widgets\ActiveForm */

?>

	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>

    <?php $form = ActiveForm::begin([]); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

	<strong>Lokasi ID</strong><br>
	<input  class="form-control" type="text" readonly="" value="<?= $namaLoc; ?>"></input><br>
            
    <?= Html::activeHiddenInput($model, 'lokasi_id', ['value' => $_SESSION['id_induk']]); ?>

    <?= $form->field($model, 'sesi_1_kuota')->textInput(['placeholder' => 'Sesi 1 Kuota']) ?>

    <?= $form->field($model, 'sesi_1_mulai')->textInput(['placeholder' => 'Format Jam hh:mm 24jam']) ?>
    
    <?= $form->field($model, 'sesi_1_selesai')->textInput(['placeholder' => 'Format Jam hh:mm 24jam']) ?>

    <?= $form->field($model, 'sesi_2_kuota')->textInput(['placeholder' => 'Sesi 2 Kuota']) ?>

    <?= $form->field($model, 'sesi_2_mulai')->textInput(['placeholder' => 'Format Jam hh:mm 24jam']) ?>
    
    <?= $form->field($model, 'sesi_2_selesai')->textInput(['placeholder' => 'Format Jam hh:mm 24jam']) ?>
    
    <?= $form->field($model, 'sesi_3_kuota')->textInput(['placeholder' => 'Sesi 3 Kuota']) ?>

    <?= $form->field($model, 'sesi_3_mulai')->textInput(['placeholder' => 'Format Jam hh:mm 24jam']) ?>
    
    <?= $form->field($model, 'sesi_3_selesai')->textInput(['placeholder' => 'Format Jam hh:mm 24jam']) ?>

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

