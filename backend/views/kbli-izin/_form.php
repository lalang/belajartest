<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KbliIzin */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="kbli-izin-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'kbli_id')->label('Nama KBLI')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
        'options' => ['placeholder' => 'Pilih Kbli'],
        'pluginOptions' => [
            'allowClear' => true,
			
        ],
		'disabled' => true
    ]) ?>

    <?= $form->field($model, 'izin_id')->label('Nama Izin')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
        'options' => ['placeholder' => 'Pilih Izin'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
