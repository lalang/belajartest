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

    <?= $form->field($model, 'conten')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conten_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'urutan')->textInput([]) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
