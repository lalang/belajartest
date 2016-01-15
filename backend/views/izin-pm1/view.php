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
/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
?>

<div class="col-md-12">
    <div class="panel panel-tab rounded shadow">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-pm1', 'action'=>'/izin-pm1/update-petugas/'.$model->id]); ?>
        
        <?= $form->errorSummary($model); ?>
        
        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
        <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
        <!-- Start tabs heading -->
        <div class="panel-heading no-padding">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i><span>Identitas Pemilik</span></a></li>
                <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-file-text"></i><span>Data Permohonan</span></a></li>
                <?php
                    if($model->izin_id == 537){
                ?>
                    <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Saksi 1</span></a></li>
                    <li><a href="#tab1-4" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Saksi 2</span></a></li>
                <?php
                    } elseif ($model->izin_id == 525 && $model->pilihan == 2) {
                ?>
                    <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Orang Lain</span></a></li>
                <?php
                    }
                ?>
            </ul>
        </div><!-- /.panel-heading -->
        <!--/ End tabs heading -->
        
        <!-- Start tabs content -->
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1-1">
                    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik', 'readonly' => TRUE]) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true, 'placeholder' => 'No Kk', 'readonly' => TRUE]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama', 'readonly' => TRUE]) ?>
    
    <?= $form->field($model, 'agama')->textInput(['maxlength' => true, 'placeholder' => 'Agama']) ?>
    
    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir', 'readonly' => TRUE]) ?>

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
                'disabled' => TRUE
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan' ],['disabled' => TRUE]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
                    
    <?= $form->field($model, 'wilayah_id')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
    <?php echo Html::hiddenInput('kecamatan_id', $model->kecamatan_id, ['id'=>'model_id1']);?>
    <?=
    $form->field($model, 'kecamatan_id')->widget(\kartik\widgets\DepDrop::classname(), [
        'options' => ['id' => 'kec-id'],
        'pluginOptions' => [
            'depends' => ['kabkota-id'],
            'placeholder' => 'Pilih Kecamatan...',
            'url' => Url::to(['/izin-pm1/subcat']),
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
            'url' => Url::to(['/izin-pm1/prod']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id2']
        ]
    ]);
    ?>
                    
    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan']) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>
                    <?php //$this->render('_tab-pm1-pemilik', ['model' => $model]) ?>					
                </div>
                <div class="tab-pane fade" id="tab1-2">
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

    <?= $form->field($model, 'keperluan_administrasi')->textarea(['rows' => 6]) ?>
                    <?php // $this->render('_tab-pm1-datamohon', ['model' => $model]) ?>					
                </div>
                <?php
                    if($model->izin_id == 537){
                ?>
                    <div class="tab-pane fade" id="tab1-3">
                        <?= $form->field($model, 'nik_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Nik Saksi1']) ?>

    <?= $form->field($model, 'no_kk_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'No Kk Saksi1']) ?>

    <?= $form->field($model, 'nama_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Nama Saksi1']) ?>

    <?= $form->field($model, 'tempat_lahir_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Saksi1']) ?>

    <?=
        $form->field($model, 'tanggal_lahir_saksi1', [
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

    <?= $form->field($model, 'jenkel_saksi1')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan' ]) ?>
        
    <?= $form->field($model, 'alamat_saksi1')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'wilayah_id_saksi1')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id_saksi1', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
    <?php echo Html::hiddenInput('kecamatan_id_saksi1', $model->kecamatan_id, ['id'=>'model_id1_saksi1']);?>
    <?=
    $form->field($model, 'kecamatan_id_saksi1')->widget(\kartik\widgets\DepDrop::classname(), [
        'options' => ['id' => 'kec-id_saksi1'],
        'pluginOptions' => [
            'depends' => ['kabkota-id_saksi1'],
            'placeholder' => 'Pilih Kecamatan...',
            'url' => Url::to(['subcat']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id1_saksi1']
        ]
    ]);
    ?>

    <?php echo Html::hiddenInput('kelurahan_id_saksi1', $model->kelurahan_id, ['id'=>'model_id2_saksi1']);?>
    <?=
    $form->field($model, 'kelurahan_id_saksi1')->widget(\kartik\widgets\DepDrop::classname(), [
        'pluginOptions' => [
            'depends' => ['kabkota-id_saksi1', 'kec-id_saksi1'],
            'placeholder' => 'Pilih Kelurahan...',
            'url' => Url::to(['prod']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id2_saksi1']
        ]
    ]);
    ?>

    <?= $form->field($model, 'kodepos_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Saksi1']) ?>

    <?= $form->field($model, 'pekerjaan_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Saksi1']) ?>

    <?= $form->field($model, 'telepon_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Saksi1']) ?>
     
                        <?php //$this->render('_tab-pm1-saksi1', ['model' => $model]) ?>					
                    </div>
                    <div class="tab-pane fade" id="tab1-4">
                        <?= $form->field($model, 'nik_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Nik Saksi2']) ?>

    <?= $form->field($model, 'no_kk_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'No Kk Saksi2']) ?>

    <?= $form->field($model, 'nama_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Nama Saksi2']) ?>

    <?= $form->field($model, 'tempat_lahir_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Saksi2']) ?>

    <?=
        $form->field($model, 'tanggal_lahir_saksi2', [
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

    <?= $form->field($model, 'jenkel_saksi2')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan' ]) ?>
    
    <?= $form->field($model, 'alamat_saksi2')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'wilayah_id_saksi2')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id_saksi2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            
    <?php echo Html::hiddenInput('kecamatan_id_saksi2', $model->kecamatan_id, ['id'=>'model_id1_saksi2']);?>
    <?=
    $form->field($model, 'kecamatan_id_saksi2')->widget(\kartik\widgets\DepDrop::classname(), [
        'options' => ['id' => 'kec-id_saksi2'],
        'pluginOptions' => [
            'depends' => ['kabkota-id_saksi2'],
            'placeholder' => 'Pilih Kecamatan...',
            'url' => Url::to(['subcat']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id1_saksi2']
        ]
    ]);
    ?>

    <?php echo Html::hiddenInput('kelurahan_id_saksi2', $model->kelurahan_id, ['id'=>'model_id2_saksi2']);?>
    <?=
    $form->field($model, 'kelurahan_id_saksi2')->widget(\kartik\widgets\DepDrop::classname(), [
        'pluginOptions' => [
            'depends' => ['kabkota-id_saksi2', 'kec-id_saksi2'],
            'placeholder' => 'Pilih Kelurahan...',
            'url' => Url::to(['prod']),
            'loading'=>false,
            'initialize'=>true,
            'params'=>['model_id2_saksi2']
        ]
    ]);
    ?>

    <?= $form->field($model, 'kodepos_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Saksi2']) ?>

    <?= $form->field($model, 'pekerjaan_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Saksi2']) ?>

    <?= $form->field($model, 'telepon_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Saksi2']) ?>
    
                        <?php // $this->render('_tab-pm1-saksi2', ['model' => $model]) ?>					
                    </div>
                <?php
                    } elseif ($model->izin_id == 525 && $model->pilihan == 2) {
                ?>
                    <div class="tab-pane fade" id="tab1-3">
                        <?= $this->render('_tab-pm1-org-lain', ['model' => $model]) ?>					
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Daftar Permohonan Izin') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>