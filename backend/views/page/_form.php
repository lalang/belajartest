<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="page-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options'=>['enctype'=>'multipart/form-data']]); ?>
   
    <h1>Bahasa Indonesia: <?= Html::encode($model->page_title) ?></h1>
    <?= $form->errorSummary($model); ?>

    <?php if($model->page_image){?>
    <p align="center"><img src="<?= Yii::getAlias('@web') ?>/images/pages/<?= $model->page_image ?>" width="100"></p>
    <?= $form->field($model, 'page_image')->hiddenInput()->label(false) ?>
    <?php }
    ?>
    <?= $form->field($model, 'file')->FileInput() ?>

    <?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>
	
	<?=
	 $form->field($model, 'page_description')->widget(TinyMce::className(), [
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

	<?= $form->field($model, 'page_urutan')->textInput(['placeholder' => 'Nomor Urut']) ?>
	  
    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true, 'placeholder' => 'Meta Judul']) ?>   

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true, 'placeholder' => 'Meta Keyword']) ?>
	
	<h1>Bahasa English: <?= Html::encode($model->page_title_en) ?></h1>
	
	<?= $form->field($model, 'page_title_en')->textInput(['maxlength' => true, 'placeholder' => 'Page Title']) ?>
	
	<?=
	 $form->field($model, 'page_description_en')->widget(TinyMce::className(), [
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
	
	<?= $form->field($model, 'meta_title_en')->textInput(['maxlength' => true, 'placeholder' => 'Meta Title']) ?>
	 
	<?= $form->field($model, 'meta_description_en')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'meta_keyword_en')->textInput(['maxlength' => true, 'placeholder' => 'Meta Keyword']) ?>
	
	 <div class="box-footer text-center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
	
	
    <?php ActiveForm::end(); ?>

</div>
