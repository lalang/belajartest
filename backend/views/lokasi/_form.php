<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Lokasi */
/* @var $form yii\widgets\ActiveForm */
?>
        <div class="lokasi-form">
			<?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'kode')->textInput(['maxlength' => true, 'placeholder' => 'Kode']) ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

           
            <?=	 
                $form->field($model, 'keterangan')->widget(TinyMce::className(), [
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

            <?= $form->field($model, 'latitude')->textInput(['placeholder' => 'Latitude']) ?>

            <?= $form->field($model, 'longtitude')->textInput(['placeholder' => 'Longtitude']) ?>

            <?= $form->field($model, 'propinsi')->textInput(['placeholder' => 'Propinsi']) ?>

            <?= $form->field($model, 'kabupaten_kota')->textInput(['maxlength' => true, 'placeholder' => 'Kabupaten Kota']) ?>

            <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Kecamatan']) ?>

            <?= $form->field($model, 'kelurahan')->textInput(['maxlength' => true, 'placeholder' => 'Kelurahan']) ?>

            <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N',], ['prompt' => '']) ?>

            <div class="form-group">
                 <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-info', 'onclick' => 'javascript:history.go(-1);']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    