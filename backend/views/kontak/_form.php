<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="kontak-form">
	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
	
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_en')->textInput(['maxlength' => true]) ?>

    
    <?=	 
        $form->field($model, 'info_main')->widget(TinyMce::className(), [
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
        $form->field($model, 'info_main_en')->widget(TinyMce::className(), [
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
        $form->field($model, 'info_sub')->widget(TinyMce::className(), [
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
        $form->field($model, 'info_sub_en')->widget(TinyMce::className(), [
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
        $form->field($model, 'alamat')->widget(TinyMce::className(), [
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
        $form->field($model, 'alamat_en')->widget(TinyMce::className(), [
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
    <?= $form->field($model, 'tlp')->textInput([]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'facebook')->textInput([]) ?>
	
	<?= $form->field($model, 'twitter')->textInput([]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
