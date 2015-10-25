<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="berita-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->errorSummary($model); ?>

    <?php if($model->gambar){?>
    <p align="center"><img src="<?= Yii::getAlias('@web') ?>/images/news/<?= $model->gambar ?>" width="200"></p>
    <?= $form->field($model, 'gambar')->hiddenInput()->label(false) ?>
    <?php }
    ?>
    <?= $form->field($model, 'file')->FileInput() ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'username')->hiddenInput(['value' => Yii::$app->user->identity->username])->label(false) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'judul_en')->textInput(['maxlength' => true])->label('Judul English') ?>

    <?=
        $form->field($model, 'isi_berita')->widget(TinyMce::className(), [
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
     $form->field($model, 'isi_berita_en')->label('Isi Berita English')->widget(TinyMce::className(), [
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

    <?= $form->field($model, 'headline')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'publish')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="box-footer text-center">
        <?= Html::button(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'goBack()']) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
