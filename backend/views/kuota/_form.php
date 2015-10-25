<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kuota */
/* @var $form yii\widgets\ActiveForm */

?>



    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="form-group field-kuota-lokasi_id required has-success">

        <label class="control-label col-sm-3" for="kuota-lokasi_id">

            Lokasi ID

        </label>
        <div class="col-sm-6">
            <input  class="form-control" type="text" readonly="" value="<?= $namaLoc; ?>"></input>
            
        </div>

    </div>

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

    <div class="box-footer text-center">
        <?= Html::a(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['index', 'id' => $_SESSION['id_induk']], ['class' => 'btn btn-warning']) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

