<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="slider-form">
	
	<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?php /*$form = ActiveForm::begin(); */?>
    
    <?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	
	<?php if($model->image){?>
    <p align="center"><img src="<?= Yii::getAlias('@web') ?>/images/slider/<?= $model->image ?>" width="200"></p>
    <?= $form->field($model, 'image')->hiddenInput()->label(false) ?>
    <?php }
    ?>
	
	<?= $form->field($model, 'file')->FileInput() ?>
	
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'conten')->widget(dosamigos\tinymce\TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
     ?>

    <?=
        $form->field($model, 'conten_en')->widget(dosamigos\tinymce\TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
     ?>

    <?= $form->field($model, 'urutan')->textInput([]) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group text-center">
        <?= Html::button(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'goBack()']) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
