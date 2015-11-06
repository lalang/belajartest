<?php

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserFile */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PerizinanBerkas', 
        'relID' => 'perizinan-berkas', 
        'value' => \yii\helpers\Json::encode($model->perizinanBerkas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

//$search = "$(document).ready(function(){
// 
//$('#descForm').keyup(
//    function () {
//        $('#submitBtn').css('visibility', 'visible');
//    }
//);
//";
//$this->registerJs($search);

?>



<div class="modal-content" style="width: 780px;margin: 30px auto;">    
    <div class="modal-header">
        Upload Berkas
        <a class="close" data-dismiss="modal" style="color: black">&times;</a>
    </div>

    <div class="modal-body">

        <?php $form = ActiveForm::begin([
            'enableClientValidation' => false,
            'options' => [
                'id' => 'uploadForm',
                'enctype' => 'multipart/form-data',
            ],
        ]); ?>


<script type="text/javascript">

inputFile = document.getElementById("fileForm");
inputDesc = document.getElementById("descForm"); 
inputSubmit = document.getElementById("submitBtn"); 

function submitChange()
{
 if(inputDesc.value == "" || inputFile.value == "" )
 {
 inputSubmit.style.display = "none";
 }
 else
 {
 inputSubmit.style.display = "block";
 }
}

</script>
        <div class="form-group">
            <p>
                <strong>*Filename</strong> dan <strong>Description</strong> harus terisi agar tombol <strong>Upload</strong> muncul!
            </p>
        </div>

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

        <?= $form->field($model, 'filename')->fileInput(['id'=>'fileForm', 'maxlength' => true, 'placeholder' => 'Filename', 'onchange'=>'submitChange()']) ?>

        <?= $form->field($model, 'description')->textInput(['id'=>'descForm','maxlength' => true, 'placeholder' => 'Description', 'onkeyup'=>'submitChange()']) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'submitBtn', 'style'=>'display: none']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
