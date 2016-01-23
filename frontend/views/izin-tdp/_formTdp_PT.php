<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;

$session = Yii::$app->session;
$session->set('izin_id',$model->izin_id);

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpKantorcabang', 
        'relID' => 'izin-tdp-kantorcabang', 
        'value' => \yii\helpers\Json::encode($model->izinTdpKantorcabangs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpKegiatan', 
        'relID' => 'izin-tdp-kegiatan', 
        'value' => \yii\helpers\Json::encode($model->izinTdpKegiatans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpLegal', 
        'relID' => 'izin-tdp-legal', 
        'value' => \yii\helpers\Json::encode($model->izinTdpLegals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpPimpinan', 
        'relID' => 'izin-tdp-pimpinan', 
        'value' => \yii\helpers\Json::encode($model->izinTdpPimpinans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinTdpSaham', 
        'relID' => 'izin-tdp-saham', 
        'value' => \yii\helpers\Json::encode($model->izinTdpSahams),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

$this->registerCss('.form-horizontal .control-label{
  /* text-align:right; */
  text-align:left;
 
}');

$search = "$(document).ready(function(){
    
     $('.btnNext').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
      });

    $('.btnPrevious').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
    $('#btnsub').attr('disabled', 'disabled');
   $('#check-dis').change(function(){
        if($(this).is(':checked')){
            $('#btnsub').removeAttr('disabled');
        }else{
            $('#btnsub').attr('disabled', 'disabled');
        }
    });



});";
$this->registerJs($search);
?>

<style>
form .form-group .control-label {
    font-size: 14px;
    font-weight: 600;
    min-width: 200px;
    padding-top: 10px;
}
.nav>li>a:focus, .nav>li>a:hover {
    background:none;    
}
</style>

<div class="row">
            <div class="col-md-12">
                <div class="box">
                    
                        <div class="box-header with-border">
                            <h3 class="box-title">Buat Permohonan</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">


    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-tdp']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>            
    <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <?= $form->field($model, 'bentuk_perusahaan', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                            
    <div class="tdp-form-pt">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                <li><a href="#tab_2" data-toggle="tab">Lokasi Perusahaan</a></li>
                <li><a href="#tab_3" data-toggle="tab">Data Umum Perusahaan</a></li>
                <li><a href="#tab_4" data-toggle="tab">Legalitas Perusahaan</a></li>
                <li><a href="#tab_5" data-toggle="tab">Data Pimpinan Perusahaan</a></li>
                <li><a href="#tab_6" data-toggle="tab">Pemegang Saham</a></li>
                <li><a href="#tab_7" data-toggle="tab">Data Kegiatan Perusahaan</a></li>
                <li><a href="#tab_8" data-toggle="tab">Data Khusus Perusahaan</a></li>
                <li><a href="#tab_9" data-toggle="tab">Kategori Perusahaan</a></li>
                <li><a href="#tab_10" data-toggle="tab">Disclaimer</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
        <div id="result"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

    <?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan Ke']) ?>

    <?= $form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'I 1 Pemilik Nama']) ?>

    <?= $form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'I 2 Pemilik Tpt Lahir']) ?>

    <?=
        $form->field($model, 'i_2_pemilik_tgl_lahir', [
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-3',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'endDate' => '0d',
                ],
                'disabled' => TRUE
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'i_3_pemilik_alamat')->textInput(['maxlength' => true, 'placeholder' => 'I 3 Pemilik Alamat']) ?>
    <?php
        $model->i_3_pemilik_propinsi = 11;
    ?>
    <?= $form->field($model, 'i_3_pemilik_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
                    
    <?= $form->field($model, 'i_3_pemilik_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
    <?php echo Html::hiddenInput('i_3_pemilik_kecamatan', $model->i_3_pemilik_kecamatan, ['id'=>'model_id1']);?>
                    
    <?=
    $form->field($model, 'i_3_pemilik_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
        'options' => ['id' => 'kec-id'],
        'pluginOptions' => [
            'depends' => ['kabkota-id'],
            'placeholder' => 'Pilih Kecamatan...',
            'url' => Url::to(['subcat']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id1']
        ]
    ]);
    ?>

    <?php echo Html::hiddenInput('i_3_pemilik_kelurahan', $model->i_3_pemilik_kelurahan, ['id'=>'model_id2']);?>
    <?=
    $form->field($model, 'i_3_pemilik_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
        'pluginOptions' => [
            'depends' => ['kabkota-id', 'kec-id'],
            'placeholder' => 'Pilih Kelurahan...',
            'url' => Url::to(['prod']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id2']
        ]
    ]);
    ?>
                    
    <?= $form->field($model, 'i_4_pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'I 4 Pemilik Telepon']) ?>

    <?= $form->field($model, 'i_5_pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'I 5 Pemilik No Ktp']) ?>

    <?= $form->field($model, 'i_6_pemilik_kewarganegaraan')->textInput(['placeholder' => 'I 6 Pemilik Kewarganegaraan']) ?>

    </div>
    <div class="tab-pane" id="tab_2">
        
    </div>
    <div class="tab-pane" id="tab_3">
        
    </div>
    <div class="tab-pane" id="tab_4">
        
    </div>
    <div class="tab-pane" id="tab_5">
        
    </div>
    <div class="tab-pane" id="tab_6">
        
    </div>
    <div class="tab-pane" id="tab_7">
        
    </div>
    <div class="tab-pane" id="tab_8">
        
    </div>
    <div class="tab-pane" id="tab_9">
        
    </div>
    <div class="tab-pane" id="tab_10">
        <div class="callout callout-warning">
            <font size="3px"> <?= Params::findOne("disclaimer")->value; ?></font>
        </div>
        <br/>
        <input type="checkbox" id="check-dis" /> Saya Setuju
        <div class="box text-center">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Daftar Permohonan Izin') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <br/>
    </div>
        <ul class="pager wizard">
            <li class="previous"><a href="#">Previous</a></li>
            <li class="next"><a href="#">Next</a></li>
            <li class="next finish" style="display:none;"><a href="#">Finish</a></li>
        </ul>
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
</div><!-- /.col --> 
    <?php ActiveForm::end(); ?>

            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>