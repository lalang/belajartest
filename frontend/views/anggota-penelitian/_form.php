<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnggotaPenelitian */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="anggota-penelitian-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'penelitian_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\IzinPenelitian::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Izin penelitian'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nik_peneliti')->textInput(['placeholder' => 'Nik Peneliti']) ?>

    <?= $form->field($model, 'nama_peneliti')->textInput(['placeholder' => 'Nama Peneliti']) ?>

    <?= $form->field($model, 'bidang')->textInput(['maxlength' => true, 'placeholder' => 'Bidang']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
