<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MetodePenelitian */
/* @var $form yii\widgets\ActiveForm */

//\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
//    'viewParams' => [
//        'class' => 'IzinPenelitianMetode', 
//        'relID' => 'izin-penelitian-metode', 
//        'value' => \yii\helpers\Json::encode($model->izinPenelitianMetodes),
//        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
//    ]
//]);
?>

<div class="metode-penelitian-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'metode')->textInput(['maxlength' => true, 'placeholder' => 'Metode']) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
