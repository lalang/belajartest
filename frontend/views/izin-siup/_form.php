<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;

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
    
    $('.akta-button').click(function(){
	$('.akta-form').toggle(1000);
	return false;
    });
    
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
                            <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-siup']); ?>

                            <?= $form->errorSummary($model); ?>

                            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                            <?php // $form->field($model, 'izin_id')->dropDownList(\backend\models\Bidang::getBidangOptions(), ['id' => 'bid-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Bidang..'])->label('Nama Bidang');  ?>


                            <div class="siup-form">
                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                                        <li><a href="#tab_2" data-toggle="tab">Identitas Perusahaan</a></li>
                                        <li><a href="#tab_3" data-toggle="tab">Legalitas Perusahaan</a></li>
                                        <li><a href="#tab_4" data-toggle="tab">Modal dan Saham</a></li>
                                        <li><a href="#tab_5" data-toggle="tab">Kegiatan Usaha</a></li>
                                        <li><a href="#tab_6" data-toggle="tab">Neraca Perusahaan</a></li>
                                        <li><a href="#tab_7" data-toggle="tab">Disclaimer</a></li>
                                        <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                                    </ul>
                                <div id="result"></div>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">

                                            <?= $form->field($model, 'ktp')->textInput(['maxlength' => true, 'placeholder' => 'Ktp', 'class'=>'form-control required']) ?>

                                            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

                                            <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

                                            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

                                            <?=
                                            $form->field($model, 'tanggal_lahir')->widget(DateControl::classname(), [
                                                'pluginOptions' => [
                                                    'autoclose' => true,
                                                ],
                                                'type' => DateControl::FORMAT_DATE,
                                            ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)',['style' => 'margin-left:-250px;font-size:13px;']);
                                            ?>

                                            <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>

                                            <?= $form->field($model, 'fax')->textInput(['maxlength' => true, 'placeholder' => 'Fax']) ?>

                                            <?= $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) ?>

                                            <?= $form->field($model, 'kewarganegaraan')->textInput(['maxlength' => true, 'placeholder' => 'Kewarganegaraan']) ?>

                                            <?= $form->field($model, 'jabatan_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Jabatan Perusahaan']) ?>


                                            <!--<div class="panel panel-primary">
                                                <div class="col-md-8"></div>
                                                <a class="btn btn-primary btnNext" >Next <i class="fa fa-angle-right"></i></a>
                                                <div class="col-md-4"></div>

                                            </div>--><!-- /.tab-pane -->
                                        </div>

                                        <div class="tab-pane" id="tab_2">

                                            <?= $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan'])->hint('Diisi hanya angka (tanpa . atau -)') ?>

                                            <?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) ?>

                                            <?= $form->field($model, 'bentuk_perusahaan')->dropDownList([ 'PT' => 'PT', 'Koperasi' => 'Koperasi', 'CV' => 'CV', 'FA' => 'FA', 'Bul' => 'Bul', 'PO' => 'PO',], ['prompt' => '']) ?>

                                            <?= $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6]) ?>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3" for="">Jakarta</label>
                                                <div class="col-sm-6"> <?= $form->field($model, 'kabupaten_kota')->dropDownList(\backend\models\Lokasi::getKabKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?></div>
                                            </div>

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

                                            <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true, 'placeholder' => 'Kode Pos']) ?>

                                            <?= $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) ?>

                                            <?= $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) ?>

                                            <?= $form->field($model, 'status_perusahaan')->dropDownList([ 'PMA' => 'PMA', 'PMDN' => 'PMDN', 'Lain-lain' => 'Lain-lain',], ['prompt' => '']) ?>  

                                            <!--<div class="panel panel-primary">
                                                <div class="col-md-8"></div>
                                                <a class="btn btn-primary btnPrevious" ><i class="fa fa-angle-left"></i> Previous</a>
                                                <a class="btn btn-primary btnNext" >Next <i class="fa fa-angle-right"></i></a>
                                                <div class="col-md-4"></div>

                                            </div>-->


                                        </div><!-- /.tab-pane -->

                                        <div class="tab-pane" id="tab_3">
                                            <h2>Akta Pendirian</h2>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="col-md-5">
                                                    <?= $form->field($model, 'akta_pendirian_no')->textInput(['maxlength' => true, 'placeholder' => 'Akta Pendirian No']) ?>
                                                </div>

                                                <div class="col-md-7">
                                                    <?=
                                                    $form->field($model, 'akta_pendirian_tanggal')->widget(DateControl::classname(), [
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                        ],
                                                        'type' => DateControl::FORMAT_DATE,
                                                    ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)',['style' => 'margin:40px 0 0 -300px;font-size:13px;']);
                                                    ?>
                                                </div>
                                                <div class="col-md-5">
                                                    <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true, 'placeholder' => 'No Sk kemenkumham'])->label('Nomor SK Kemenkumham') ?>
                                                </div>

                                                <div class="col-md-7">

                                                    <?=
                                                    $form->field($model, 'tanggal_pengesahan')->widget(DateControl::classname(), [
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                        ],
                                                        'type' => DateControl::FORMAT_DATE,
                                                    ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)',['style' => 'margin:40px 0 0 -300px;font-size:13px;']);
                                                    ?>
                                                </div>
                                            </div>

                                            <!--<div class="panel col-md-12 text-center">-->

                                                <?= Html::a(Yii::t('app', 'Tambah Akta Perubahan <i class="fa fa-plus"></i>'), '#', ['class' => 'btn btn-success akta-button']) ?>


                                            <!--</div>-->


                                            <div class="akta-form" style="display: none">

                                                <div class="form-group" id="add-izin-siup-akta"></div>

                                            </div>

                                            <!--<h2>Pengesahan Badan Hukum Kemenkumham RI</h2>-->

                                            <?php //$form->field($model, 'no_sk')->textInput(['maxlength' => true, 'placeholder' => 'No Sk']) ?>

                                            <?php //$form->field($model, 'no_daftar')->textInput(['maxlength' => true, 'placeholder' => 'No Daftar']) ?>

                                            <?php
                                            /*$form->field($model, 'tanggal_pengesahan')->widget(DateControl::classname(), [
                                                'pluginOptions' => [
                                                    'autoclose' => true,
                                                ],
                                                'type' => DateControl::FORMAT_DATE,
                                            ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)',['style' => 'margin-left:-250px;font-size:13px;']);*/
                                            ?>


                                            <!--<div class="panel panel-primary">
                                                <div class="col-md-8"></div>
                                                 <a class="btn btn-primary btnPrevious" ><i class="fa fa-angle-left"></i> Previous</a>
                                                <a class="btn btn-primary btnNext" >Next <i class="fa fa-angle-right"></i></a>
                                                <div class="col-md-4"></div>

                                            </div>-->

                                        </div>  

                                        <div class="tab-pane" id="tab_4">
                                            <h2>1. Modal dan nilai kekayaan bersih perusahaan </h2>
                                            <hr>
                                            <?= $form->field($model, 'modal', ['inputTemplate' => '<div class="input-group">{input}</div>']) ?>

                                            <h2>2. Saham (Khusus untuk penanam modal asing)</h2>
                                            <hr>
                                            <?= $form->field($model, 'nilai_saham_pma', ['inputTemplate' => '<div class="input-group">{input}</div>']) ?>

                                            <label class="control-label col-sm-3" for="">Komposisi kepemilikan sahan</label>
                                            <div class="col-md-offset-5"><?= $form->field($model, 'saham_nasional', ['inputTemplate' => '<div class="input-group">{input}</div>']) ?></div>

                                            <div class="col-md-offset-5"><?= $form->field($model, 'saham_asing', ['inputTemplate' => '<div class="input-group">{input}</div>']) ?></div>

                                            <!--<div class="">
                                                <div class="col-md-8"></div>
                                                 <a class="btn btn-primary btnPrevious" ><i class="fa fa-angle-left"></i> Previous</a>
                                                <a class="btn btn-primary btnNext" >Next <i class="fa fa-angle-right"></i></a>
                                                <div class="col-md-4"></div>

                                            </div>-->

                                        </div>  

                                        <div class="tab-pane" id="tab_5">

                                            <?= $form->field($model, 'kelembagaan')->textInput(['readOnly' => true]) ?>

                                            <div class="form-group" id="add-izin-siup-kbli"></div>                        

                                            <!--<div class="">
                                                <div class="col-md-8"></div>
                                                <a class="btn btn-primary btnPrevious" > Previous</a>
                                                <a class="btn btn-primary btnNext" >Next</a>
                                                <div class="col-md-4"></div>

                                            </div>-->
                                        </div>  

                                        <div class="tab-pane" id="tab_6">

                                            <div class="col-md-12">

                                                <?=
                                                $form->field($model, 'tanggal_neraca')->widget(DateControl::classname(), [
                                                    'pluginOptions' => [
                                                        'autoclose' => true,
                                                    ],
                                                    'type' => DateControl::FORMAT_DATE,
                                                ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)',['style' => 'margin-left:-250px;font-size:13px;']);
                                                ?>
                                            </div>    
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <h2>AKTIVA :</h2>
                                                    <hr>
                                                    <h3>1. Aktiva Lancar</h3>
                                                    <hr>
                                                    <?= $form->field($model, 'aktiva_lancar_kas', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_lancar aktiva'])->label('Kas') ?>

                                                    <?= $form->field($model, 'aktiva_lancar_bank', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_lancar aktiva'])->label('Bank') ?>

                                                    <?= $form->field($model, 'aktiva_lancar_piutang', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_lancar aktiva'])->label('Piutang') ?>

                                                    <?= $form->field($model, 'aktiva_lancar_barang', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_lancar aktiva'])->label('Persediaan Barang') ?>

                                                    <?= $form->field($model, 'aktiva_lancar_pekerjaan', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_lancar aktiva'])->label('Pekerjaan dalam proses') ?>
                                                    <div class="col-sm-10">Jumlah (a)</div><div class="col-sm-2"><input type="text" class="form-control jumlah" id="total_aktiva_lancar" readonly="true"> </div>
                                                    <hr>
                                                    <h3>2. Aktiva Tetap</h3>
                                                    <hr>
                                                    <?= $form->field($model, 'aktiva_tetap_peralatan', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_tetap aktiva'])->label('Peralatan dlm mesin') ?>

                                                    <?= $form->field($model, 'aktiva_tetap_investasi', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_tetap aktiva'])->label('Investasi') ?>
                                                    <div class="col-sm-10">Jumlah (b)</div><div class="col-sm-2"><input type="text" class="form-control jumlah" id="total_aktiva_tetap" readonly="true"> </div>
                                                    <hr>
                                                    <div class="col-sm-10"><h3>3. Aktiva Lainnya (c)</h3></div><div class="col-sm-2"> <?= $form->field($model, 'aktiva_lainnya', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control aktiva_lainnya aktiva'])->label(false) ?></div>
                                                    <hr>
                                                    <div class="col-sm-8"></div><div class="col-sm-2">Jumlah</div><div class="col-sm-2"><input type="text" class="form-control" id="total_aktiva" readonly="true"></div>

                                                </div>

                                                <div class="col-md-6">
                                                    <h2>PASIVA :</h2>
                                                    <hr>
                                                    <h3>4. Hutang Jangka Pendek</h3>
                                                    <hr>
                                                    <?= $form->field($model, 'pasiva_hutang_dagang', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control pasiva_jangka_pendek aktiva'])->label('Hutang dagang') ?>

                                                    <?= $form->field($model, 'pasiva_hutang_pajak', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control pasiva_jangka_pendek aktiva'])->label('Hutang pajak') ?>

                                                    <?= $form->field($model, 'pasiva_hutang_lainnya', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control pasiva_jangka_pendek aktiva'])->label('Hutang lainnya') ?>
                                                    <div class="col-sm-10">Jumlah (d)</div><div class="col-sm-2"><input type="text" class="form-control jumlah_pasiva" id="total_pasiva_hutang_pendek" readonly="true"> </div>
                                                    <hr>
                                                    <div class="col-sm-10"><h3>5. Hutang jangka panjang</h3></div><div class="col-sm-2"> <?= $form->field($model, 'hutang_jangka_panjang', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control pasiva_jangka_panjang aktiva'])->label(false) ?></div>
                                                    <hr>
                                                    <div class="col-sm-10"><h3>6. Kekayaan Bersih</h3></div><div class="col-sm-2"> <?= $form->field($model, 'kekayaan_bersih', ['inputTemplate' => '<div class="input-group">{input}</div>'])->textInput(['class'=>'form-control pasiva_kekayaan_bersih aktiva'])->label(false) ?></div>
                                                    <hr>
                                                    <div class="col-sm-8"></div><div class="col-sm-2">Jumlah</div><div class="col-sm-2"><input type="text" class="form-control" id="total_pasiva" readonly="true"></div>
                                                </div>
                                            </div>

                                            <!--<div class=" col-md-12 panel panel-primary">
                                                <div class="col-md-8"></div>
                                                 <a class="btn btn-primary btnPrevious" ><i class="fa fa-angle-left"></i> Previous</a>
                                                <a class="btn btn-primary btnNext" >Next <i class="fa fa-angle-right"></i></a>
                                                <div class="col-md-4"></div>

                                            </div>-->

                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_7">
                                            <div class="callout callout-warning">
                                                <?= Params::findOne("disclaimer")->value; ?>
                                            </div>
                                            <br/>
                                            <input type="checkbox" id="check-dis" /> Saya Setuju
                                            <div class="box text-center">
                                                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Daftar Permohonan Izin') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>
                                            <br/>

                                            <!--<div class="panel panel-primary">
                                                <div class="col-md-8"></div>
                                                 <a class="btn btn-primary btnPrevious" ><i class="fa fa-angle-left"></i> Previous</a>
                                                <div class="col-md-4"></div>

                                            </div>-->
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
    
