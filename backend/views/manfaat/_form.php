<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Manfaat */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="manfaat-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'info')->widget(dosamigos\tinymce\TinyMce::className(), [
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
        $form->field($model, 'info_en')->widget(dosamigos\tinymce\TinyMce::className(), [
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

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target')->dropDownList([ '_Self' => ' Self', '_Blank' => ' Blank', ]) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <div class="form-group">
        <?= Html::button(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'goBack()']) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
