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
	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
	<br><br>
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
    
    
    
    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>
	
	<?= $form->field($model, 'flag_ubah_tgl_exp')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ]) ?>
	
	<?= $form->field($model, 'cetak_ulang_sk')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ]) ?>
        <?= $form->field($model, 'cetak_batal')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ]) ?>
	
	<?= $form->field($model, 'cek_brankas')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ]) ?>
        
        <?= $form->field($model, 'view_history')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ]) ?>
        <?= $form->field($model, 'digital_signature')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ]) ?>

   <!--  <div class="form-group" id="add-perizinan-proses"></div>

    <div class="form-group" id="add-user"></div> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  
