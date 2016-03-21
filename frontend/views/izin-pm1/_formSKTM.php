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
/* @var $model backend\models\IzinPm1 */
/* @var $form yii\widgets\ActiveForm */

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
                <h3 class="box-title">Surat Keterangan Tidak Mampu (SKTM)</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-pm1']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <div class="pm1-form-sktm">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
                <li><a href="#tab_2" data-toggle="tab">Formulir Permohonan</a></li>
                <li><a href="#tab_3" data-toggle="tab">Disclaimer</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
        <div id="result"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                
    <?php
//    $form->field($model, 'perizinan_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
//        'options' => ['placeholder' => Yii::t('app', 'Choose Perizinan')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]) 
            ?>

    <?php
//    $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
//        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]) 
            ?>

    <?php
//    $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
//        'options' => ['placeholder' => Yii::t('app', 'Choose Status')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]) 
            ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik', 'readonly' => TRUE]) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true, 'placeholder' => 'No Kk', 'readonly' => TRUE]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama', 'readonly' => TRUE]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

    <?=
        $form->field($model, 'tanggal_lahir', [
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-3',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'endDate' => '0d',
                ],
//                'disabled' => TRUE
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan' ],['disabled' => False]) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu' ],['disabled' => False]) ?>
                    
    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
                    
    <?= $form->field($model, 'wilayah_id')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
    <?php echo Html::hiddenInput('kecamatan_id', $model->kecamatan_id, ['id'=>'model_id1']);?>
    <?=
    $form->field($model, 'kecamatan_id')->widget(\kartik\widgets\DepDrop::classname(), [
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

    <?php echo Html::hiddenInput('kelurahan_id', $model->kelurahan_id, ['id'=>'model_id2']);?>
    <?=
    $form->field($model, 'kelurahan_id')->widget(\kartik\widgets\DepDrop::classname(), [
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
                    
    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan']) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>

    </div>
                
    <div class="tab-pane" id="tab_2">
                    
    <?= $form->field($model, 'no_surat_pengantar')->textInput(['maxlength' => true, 'placeholder' => 'No Surat Pengantar']) ?>

    <?=
        $form->field($model, 'tanggal_surat', [
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-3',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'endDate' => '0d',
                ]
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'instansi_tujuan')->textInput(['maxlength' => true, 'placeholder' => 'Instansi Tujuan']) ?>

    <?= $form->field($model, 'tujuan')->dropDownList([ 'Mengajukan/mengurus keringanan biaya pendidikan/memperoleh KJP/fasilitas pendidikan lainnya' => 'Mengajukan/mengurus keringanan biaya pendidikan/memperoleh KJP/fasilitas pendidikan lainnya', 'Mengajukan/mengurus BPJS/keringanan biaya kesehatan' => 'Mengajukan/mengurus BPJS/keringanan biaya kesehatan', 'Mengajukan/mengurus keringanan biaya sosial lainnya (non pendidikan dan kesehatan)' => 'Mengajukan/mengurus keringanan biaya sosial lainnya (non pendidikan dan kesehatan)' ]) ?>
        
    <?php
        $hiden = '';
        if(!$model->pilihan){
            $model->pilihan = '1';
            $hiden = 'hidden="true"';
        } elseif ($model->pilihan == '1') {
            $hiden = 'hidden="true"';
        }
        echo $form->field($model, 'pilihan')->radioList([
            '1' => 'Untuk diri sendiri',
            '2' => 'Untuk orang lain',
        ],
        [
            'class'=>'izinpm1-pilihan',
            'id' => 'izinpm1-pilihan'
        ]);
    ?>
        
        <div id="SKTM_Orang_Lain" <?php echo $hiden; ?>>

    <?= $form->field($model, 'nik_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Nik Orang Lain']) ?>

    <?= $form->field($model, 'no_kk_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'No Kk Orang Lain']) ?>

    <?= $form->field($model, 'nama_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Nama Orang Lain']) ?>

    <?= $form->field($model, 'tempat_lahir_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Orang Lain']) ?>

    <?=
        $form->field($model, 'tanggal_lahir_orang_lain', [
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-3',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'endDate' => '0d',
                ]
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'jenkel_orang_lain')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan', ]) ?>

    <?= $form->field($model, 'alamat_orang_lain')->textarea(['rows' => 6]) ?>
            
    <?= $form->field($model, 'wilayah_id_orang_lain')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id-org-lain', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
    <?php echo Html::hiddenInput('kecamatan_id_orang_lain', $model->kecamatan_id_orang_lain, ['id'=>'model_id1-org-lain']);?>
    <?=
    $form->field($model, 'kecamatan_id_orang_lain')->widget(\kartik\widgets\DepDrop::classname(), [
        'options' => ['id' => 'kec-id-org-lain'],
        'pluginOptions' => [
            'depends' => ['kabkota-id-org-lain'],
            'placeholder' => 'Pilih Kecamatan...',
            'url' => Url::to(['subcat']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id1-org-lain']
        ]
    ]);
    ?>

    <?php echo Html::hiddenInput('kelurahan_id_orang_lain', $model->kelurahan_id_orang_lain, ['id'=>'model_id2-org-lain']);?>
    <?=
    $form->field($model, 'kelurahan_id_orang_lain')->widget(\kartik\widgets\DepDrop::classname(), [
        'pluginOptions' => [
            'depends' => ['kabkota-id-org-lain', 'kec-id-org-lain'],
            'placeholder' => 'Pilih Kelurahan...',
            'url' => Url::to(['prod']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id2-org-lain']
        ]
    ]);
    ?>

    <?= $form->field($model, 'kodepos_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Orang Lain']) ?>

    <?= $form->field($model, 'pekerjaan_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Orang Lain']) ?>

    <?= $form->field($model, 'telepon_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Orang Lain']) ?>

    
    </div>
    </div>
                
    <div class="tab-pane" id="tab_3">
        <div class="callout callout-warning">
            <font size="3px"> <?php echo Params::findOne("disclaimer")->value; ?></font>
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

<script src="/js/jquery.min.js"></script>

<script>
$(document).ready(function(){
  
    $('input[type=radio]').change(function() {
        if (this.value == 2) {
            $('#SKTM_Orang_Lain').show();
        }
        else if (this.value == 1) {
            $('#SKTM_Orang_Lain').hide();
        }
    });
    
});
</script>