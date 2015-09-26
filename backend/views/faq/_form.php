<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <h1>Bahasa Indonesia</h1>
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'tanya')->textarea(['rows' => 6]) ?>

	<?=
     $form->field($model, 'jawab')->widget(TinyMce::className(), [
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
	<h1>Bahasa Inggris</h1>
    <?= $form->field($model, 'tanya_en')->textarea(['rows' => 6]) ?>
	
	<?=
     $form->field($model, 'jawab_en')->widget(TinyMce::className(), [
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

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="box-footer text-center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
