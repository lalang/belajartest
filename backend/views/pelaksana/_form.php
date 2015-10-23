<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelaksana */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'PerizinanProses',
        'relID' => 'perizinan-proses',
        'value' => \yii\helpers\Json::encode($model->perizinanProses),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'User',
        'relID' => 'user',
        'value' => \yii\helpers\Json::encode($model->users),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<?php //$this->registerJs('web\jscolor\jscolor.js'); ?>

<script src="/jscolor/jscolor.js"></script>

<div class="pelaksana-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?php // Usage with ActiveForm and model
    //echo $form->field($model, 'warna')->widget(ColorInput::classname(), [
        //'options' => ['placeholder' => 'Pilih Warna ...'],
    //]);?>
    
    <div class="form-group field-pelaksana-warna required">

        <label class="control-label" for="pelaksana-nama"> Warna </label>
        <?=
            Html::activeTextInput($model, 'warna', ['maxlength' => true, 'placeholder' => 'Pilih warna', 'class' => 'form-control color{hash:true,caps:false,adjust:false}'])
        ?>
        <p class="help-block help-block-error"></p>

    </div>
    
    
    
    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

   <!--  <div class="form-group" id="add-perizinan-proses"></div>

    <div class="form-group" id="add-user"></div> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  
