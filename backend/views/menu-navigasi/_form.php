<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MenuNavigasi;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuNavigasi */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="menu-navigasi-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	
	<?php $dataList=ArrayHelper::map(MenuNavigasi::find()->where(['parent_id' => '0'])->asArray()->all(), 'id', 'nama'); ?>
	<?=
	$form->field($model, 'parent_id')
		 ->dropDownList(
				$dataList, 
				['prompt' => '_Main']
				)
	?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target')->dropDownList([ '_Self' => ' Self', '_Blank' => ' Blank', ]) ?>

    <?= $form->field($model, 'urutan')->textInput([]) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
