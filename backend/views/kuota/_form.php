<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kuota */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="kuota-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'lokasi_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'sesi_1_kuota')->textInput(['placeholder' => 'Sesi 1 Kuota']) ?>

    <?= $form->field($model, 'sesi_1_mulai')->widget(\kartik\widgets\TimePicker::className()); ?>

    <?= $form->field($model, 'sesi_1_selesai')->widget(\kartik\widgets\TimePicker::className()); ?>

    <?= $form->field($model, 'sesi_2_kuota')->textInput(['placeholder' => 'Sesi 2 Kuota']) ?>

    <?= $form->field($model, 'sesi_2_mulai')->widget(\kartik\widgets\TimePicker::className()); ?>

    <?= $form->field($model, 'sesi_2_selesai')->widget(\kartik\widgets\TimePicker::className()); ?>

    <?= $form->field($model, 'sesi_3_kuota')->textInput(['placeholder' => 'Sesi 3 Kuota']) ?>

    <?= $form->field($model, 'sesi_3_mulai')->widget(\kartik\widgets\TimePicker::className()); ?>

    <?= $form->field($model, 'sesi_3_selesai')->widget(\kartik\widgets\TimePicker::className()); ?>

    <div class="box-footer text-center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
