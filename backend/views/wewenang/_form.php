<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Wewenang */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Wewenang',
        'relID' => 'wewenang',
        'value' => \yii\helpers\Json::encode($model->wewenangs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
        ]
        ]);
        ?>

<div class="menu-nav-main-form">

	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>

	<?php $form = ActiveForm::begin([]); ?>

	<?= $form->errorSummary($model); ?>

	<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

	<?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

	<?= $form->field($model, 'aktif')->dropDownList(['Y' => 'Y', 'N' => 'N',]) ?>

	<?=
	$form->field($model, 'parent_id')->widget(\kartik\widgets\Select2::classname(), [
	'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wewenang::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
	'options' => ['placeholder' => Yii::t('app', 'Choose Wewenang')],
	'pluginOptions' => [
	'allowClear' => true
	],
	])
	?>

	<?= $form->field($model, 'kode')->textInput(['maxlength' => true, 'placeholder' => 'Kode']) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord  ? Yii::t('app', 'Create')  : Yii::t('app', 'Update'), [                'class' => $model->isNewRecord  ? 'btn btn-success'   : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
	</div>

	<?php ActiveForm::end(); ?>  

</div>
