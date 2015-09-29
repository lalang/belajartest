<?php

use backend\models\PerizinanSearch;
use backend\models\UserFile;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\View;


/* @var $this View */
/* @var $searchModel PerizinanSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Upload')];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <?php
        $form = ActiveForm::begin();
        foreach ($perizinan_berkas as $value){ 
    ?>
        <div class="row">
            <label class="control-label col-sm-2">Urutan:</label>
            <div class="col-sm-4"><?= $value->urutan ?></div>
        </div>
        <div class="row">
            <label class="control-label col-sm-2">Nama Berkas:</label>
            <div class="col-sm-4"><?= $value->berkasIzin->nama ?></div>
        </div>
        <div class="row">
            <label class="control-label col-sm-2">File:</label>
            <div class="col-sm-4">
                <?= Html::dropDownList('user_file[]', $value->user_file_id, ArrayHelper::map(UserFile::find()->all(), 'id', 'filename'), ['prompt' => '--Pilih--','class'=>'form-control']) ?>
            </div>
            <?= Html::a('Tambah/Ubah File', null, ['id'=>'upload_file', 'class'=>'btn btn-info']) ?>
        </div>
    <?php } ?>
    
    <?php
        echo Html::submitButton('Update', ['class' => 'btn btn-info']);
        ActiveForm::end();
    ?>
</div>
<?php
$js = <<< JS
    $('#upload_file').click(function(){
        $('#m_upload').html('');
        $('#m_upload').load('/user-file/create');
        $('#m_upload').modal('show'); 
    });
JS;

$this->registerJs($js);

Modal::begin([
    'id' => 'm_upload',
    'header' => '<h7>Upload Berkas</h7>'
]);
Modal::end();
?>
