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
        <?php
                echo Slider::widget([
                    'name' => 'current_no',
                    'value' => 3,
                    'sliderColor' => Slider::TYPE_INFO,
                    'handleColor' => Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'min' => 0,
                        'max' => 6,
                        'ticks' => [1,2,3,4,5,6],
                        'ticks_labels' => ['Cari Izin','Input Formulir','Unggah Berkas','Atur Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
                        'ticks_snap_bounds' => 50,
                        'tooltip' => 'always',
                        'formatter'=>new yii\web\JsExpression("function(val) { 
                                return 'Anda Disini';
                        }")
                    ],
                    'options' => ['disabled'=>true,'style' => 'width: 100%']
                ]);
            ?>
    </div>
    <div class="col-sm-1"></div>
</div>
<br><br><br><br><br>
<div class="row">
    <div class="col-md-12">
        <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Upload Berkas</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
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
                        <?= Html::dropDownList('user_file[]', $value->user_file_id, ArrayHelper::map(UserFile::find()->where('user_id='.Yii::$app->user->id)->all(), 'id', 'description'), ['prompt' => '--Pilih--','class'=>'form-control']) ?>
                    </div>
                    <?= Html::a('Tambah/Ubah File', null, ['id'=>'upload_file', 'class'=>'btn btn-info']) ?>
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
        $('#m_upload').load('/user-file/create?id="{$_GET('id')}&ref={$_GET('ref')}');
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
