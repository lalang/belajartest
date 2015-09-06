<?php

use app\assets\admin\CoreAsset;

CoreAsset::register($this);

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;

//use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinSiupAkta',
        'relID' => 'izin-siup-akta',
        'value' => \yii\helpers\Json::encode($model->izinSiupAktas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinSiupKbli',
        'relID' => 'izin-siup-kbli',
        'value' => \yii\helpers\Json::encode($model->izinSiupKblis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

$search = "$(document).ready(function(){
    
     $('#bid-id').change(function () {
     if ($('#bid-id').val() != '') {
         $('#izin-select').show();  
         
     } else {
         $('#izin-select').hide(); 
         $('.siup-form').hide(); 
     }
     });
     
    $('.search-button').click(function () {
     if ($('#izin-id').val() != '') {
         $('.siup-form').show();  
     } else {
         $('.siup-form').hide(); 
     }
     });
     $('.btnNext').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
      });

    $('.btnPrevious').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
   
});";
$this->registerJs($search);
?>
<section id="page-content">
    <div class="panel">
        <div class="header-content">
            <h2><i class="fa fa-envelope"></i><?= Yii::t('app', 'Izin Siup') . ' ' . Html::encode($this->title) ?></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/index') ?>">Buat</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Permohonan Baru</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ol>
            </div><!-- /.breadcrumb-wrapper -->
        </div><!-- /.header-content -->
        <!--/ End page header -->

        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

        <?php // $form->field($model, 'izin_id')->dropDownList(\backend\models\Bidang::getBidangOptions(), ['id' => 'bid-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Bidang..'])->label('Nama Bidang');  ?>



        <div class="siup-form">


            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">IDENTITAS PEMILIK/PENGURUS</a></li>
                    <li><a href="#tab_2" data-toggle="tab">IDENTITAS PERUSAHAAN</a></li>
                    <li><a href="#tab_3" data-toggle="tab">LEGALITAS PERUSAHAAN</a></li>
                    <li><a href="#tab_4" data-toggle="tab">MODAL & SAHAM</a></li>
                    <li><a href="#tab_5" data-toggle="tab">KEGIATAN USAHA</a></li>
                    <li><a href="#tab_6" data-toggle="tab">NERACA PERUSAHAAN</a></li>
                    <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">



                        <?= $form->field($model, 'ktp')->textInput(['maxlength' => true, 'placeholder' => 'Ktp']) ?>

                        <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

                        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

                        <?=
                        $form->field($model, 'tanggal_lahir')->widget(DateControl::classname(), [
                            'autoWidget' => false,
                            'widgetClass' => 'yii\widgets\MaskedInput',
                            'options' => [
                                'mask' => '99-99-9999',
                            ],
                            'type' => DateControl::FORMAT_DATE,
                        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                        ?>

                        <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>

                        <?= $form->field($model, 'fax')->textInput(['maxlength' => true, 'placeholder' => 'Fax']) ?>

                        <?= $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) ?>

                        <?= $form->field($model, 'kewarganegaraan')->textInput(['maxlength' => true, 'placeholder' => 'Kewarganegaraan']) ?>

                        <?= $form->field($model, 'jabatan_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Jabatan Perusahaan']) ?>
                        <a class="btn btn-primary btnNext" >Next</a>
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_2">

                        <?= $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan']) ?>

                        <?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) ?>

                        <?= $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) ?>

                        <?= $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) ?>

                        <?= $form->field($model, 'kabupaten_kota')->dropDownList(\backend\models\Lokasi::getKabKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>

                        <?=
                        $form->field($model, 'kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
                            'options' => ['id' => 'kec-id'],
                            'pluginOptions' => [
                                'depends' => ['kabkota-id'],
                                'placeholder' => 'Pilih Kecamatan...',
                                'url' => Url::to(['subcat'])
                            ]
                        ]);
                        ?>

                        <?=
                        $form->field($model, 'kelurahan_id')->widget(\kartik\widgets\DepDrop::classname(), [
                            'pluginOptions' => [
                                'depends' => ['kabkota-id', 'kec-id'],
                                'placeholder' => 'Pilih Kelurahan...',
                                'url' => Url::to(['prod'])
                            ]
                        ]);
                        ?>

                        <?= $form->field($model, 'status_perusahaan')->dropDownList([ 'PMA' => 'PMA', 'PMDN' => 'PMDN', 'Lain-lain' => 'Lain-lain',], ['prompt' => '']) ?>

                        <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true, 'placeholder' => 'Kode Pos']) ?>

                        <?= $form->field($model, 'bentuk_perusahaan')->dropDownList([ 'PT' => 'PT', 'Koperasi' => 'Koperasi', 'CV' => 'CV', 'FA' => 'FA', 'Bul' => 'Bul', 'PO' => 'PO',], ['prompt' => '']) ?>
                        <a class="btn btn-primary btnPrevious" >Previous</a>
                        <a class="btn btn-primary btnNext" >Next</a>

                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_3">
                        <?= $form->field($model, 'akta_pendirian_no')->textInput(['maxlength' => true, 'placeholder' => 'Akta Pendirian No']) ?>

                        <?=
                        $form->field($model, 'akta_pendirian_tanggal')->widget(DateControl::classname(), [
                            'autoWidget' => false,
                            'widgetClass' => 'yii\widgets\MaskedInput',
                            'options' => [
                                'mask' => '99-99-9999',
                            ],
                            'type' => DateControl::FORMAT_DATE,
                        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                        ?>

                        <?= $form->field($model, 'akta_pengesahan_no')->textInput(['maxlength' => true, 'placeholder' => 'Akta Pengesahan No']) ?>

                        <?=
                        $form->field($model, 'akta_pengesahan_tanggal')->widget(DateControl::classname(), [
                            'autoWidget' => false,
                            'widgetClass' => 'yii\widgets\MaskedInput',
                            'options' => [
                                'mask' => '99-99-9999',
                            ],
                            'type' => DateControl::FORMAT_DATE,
                        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                        ?>

                        <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true, 'placeholder' => 'No Sk']) ?>

                        <?= $form->field($model, 'no_daftar')->textInput(['maxlength' => true, 'placeholder' => 'No Daftar']) ?>

                        <?=
                        $form->field($model, 'tanggal_pengesahan')->widget(DateControl::classname(), [
                            'autoWidget' => false,
                            'widgetClass' => 'yii\widgets\MaskedInput',
                            'options' => [
                                'mask' => '99-99-9999',
                            ],
                            'type' => DateControl::FORMAT_DATE,
                        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                        ?>

                        <div class="form-group" id="add-izin-siup-akta"></div>
                        <a class="btn btn-primary btnPrevious" >Previous</a>
                        <a class="btn btn-primary btnNext" >Next</a>
                        
                    </div>  

                    <div class="tab-pane" id="tab_4">
                        <?= $form->field($model, 'modal', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>
                         <?= $form->field($model, 'modal', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',]); ?>

                        <?= $form->field($model, 'nilai_saham_pma', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'saham_nasional', ['inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">%</span></div>']) ?>

                        <?= $form->field($model, 'saham_asing', ['inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">%</span></div>']) ?>
                        <a class="btn btn-primary btnPrevious" >Previous</a>
                        <a class="btn btn-primary btnNext" >Next</a>
                        
                    </div>  

                    <div class="tab-pane" id="tab_5">

                        <?= $form->field($model, 'barang_jasa_dagangan')->textInput(['maxlength' => true, 'placeholder' => 'Barang Jasa Dagangan']) ?>

                        <div class="form-group" id="add-izin-siup-kbli"></div>
                        
                        <a class="btn btn-primary btnPrevious" >Previous</a>
                        <a class="btn btn-primary btnNext" >Next</a>
                    </div>  

                    <div class="tab-pane" id="tab_6">
                        <?=
                        $form->field($model, 'tanggal_neraca')->widget(DateControl::classname(), [
                            'autoWidget' => false,
                            'widgetClass' => 'yii\widgets\MaskedInput',
                            'options' => [
                                'mask' => '99-99-9999',
                            ],
                            'type' => DateControl::FORMAT_DATE,
                        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                        ?>

                        <?= $form->field($model, 'aktiva_lancar_kas', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'aktiva_lancar_bank', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'aktiva_lancar_piutang', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'aktiva_lancar_barang', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'aktiva_lancar_pekerjaan', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'aktiva_tetap_peralatan', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'aktiva_tetap_investasi', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'aktiva_lainnya', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'pasiva_hutang_dagang', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'pasiva_hutang_pajak', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'pasiva_hutang_lainnya', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'hutang_jangka_panjang', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>

                        <?= $form->field($model, 'kekayaan_bersih', ['inputTemplate' => '<div class="input-group"><span class="input-group-addon">Rp. </span>{input}</div>']) ?>
                        
                        <a class="btn btn-primary btnPrevious" >Previous</a>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
             

        </div><!-- /.col -->    
    </div>

   
    <div class="box text-center">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Buat Permohonan Izin') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <!-- END CUSTOM TABS -->
</div>
</section>
