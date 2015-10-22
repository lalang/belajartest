<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="kontak-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_main')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'info_main_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'info_sub')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'info_sub_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alamat_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tlp')->textInput([]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
