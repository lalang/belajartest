<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuNavSub */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="menu-nav-sub-form">
	
	<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
	
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_menu_nav')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\MenuNavMain::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Menu nav main')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target')->dropDownList([ '_self' => ' self', '_blank' => ' blank', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'urutan')->textInput([]) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
