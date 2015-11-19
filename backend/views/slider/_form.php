<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="slider-form">
	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
	<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?php /*$form = ActiveForm::begin(); */?>
    
    <?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	
	<?php if($model->image){?>
    <p align="center"><img src="<?= Yii::getAlias('@web') ?>/images/slider/<?= $model->image ?>" width="200"></p>
    <?= $form->field($model, 'image')->hiddenInput()->label(false) ?>
    <?php }
    ?>
	
	<?= $form->field($model, 'file')->label('Upload Gambar')->widget(FileInput::classname(), [
	    'options' => ['multiple' => true],
		'name'=>'file'
	]) ?>
	
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    
    <?=	 
        $form->field($model, 'conten')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality template textcolor paste fullpage textcolor colorpicker textpattern"
                ],
                'toolbar' => "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor | table | hr removeformat | subscript superscript | charmap | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
            ]
        ]);
    ?>

  
    <?=	 
        $form->field($model, 'conten_en')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality template textcolor paste fullpage textcolor colorpicker textpattern"
                ],
                'toolbar' => "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor | table | hr removeformat | subscript superscript | charmap | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
            ]
        ]);
    ?>

    <?= $form->field($model, 'urutan')->textInput([]) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
