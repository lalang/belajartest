<?php

use backend\models\PerizinanSearch;
use backend\models\UserFile;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\View;
use kartik\slider\Slider;

/* @var $this View */
/* @var $searchModel PerizinanSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Upload')];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
<?= $this->render('_step', ['value' => 3]) ?>
    </div>
    <div class="col-sm-1"></div>
</div>
<br><br><br><br><br>
<div class="row">
    <div class="col-md-12">
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Upload Berkas</h3>
            </div>
            <div class="box-body">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Mohon diperhatikan!</h4>
                    <p>Silahkan upload berkas persyaratan sesuai syarat berkas di bawah, semua yang anda upload akan otomatis masuk ke dalam brankas pribadi anda.</p>
                </div>
                <?php
                $form = ActiveForm::begin();
                foreach ($perizinan_berkas as $value) {
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
                            <?= Html::dropDownList('user_file[]', $value->user_file_id, ArrayHelper::map(UserFile::find()->where('user_id=' . Yii::$app->user->id)->all(), 'id', 'description'), ['prompt' => '--Pilih--', 'class' => 'form-control']) ?>
                        </div>
                        <?= Html::a('Tambah/Ubah File', null, ['id' => 'upload_file', 'class' => 'btn btn-info']) ?>
                    </div>
                <?php } ?>
            </div>
            <div class="box-footer">
                <?php
                echo Html::submitButton('Simpan', ['class' => 'btn btn-info']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
<?php
$js = <<< JS
    $('#upload_file').click(function(){
        $('#m_upload').html('');
        $('#m_upload').load('/user-file/create?id={$_GET['id']}&ref={$_GET['ref']}');
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
