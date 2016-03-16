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
        <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id'=>'form-izin-pm1', 'action'=>['/izin-pm1/update-petugas','id'=>$model->id],]); ?>
        
        <?= $form->errorSummary($model); ?>
        
        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
        <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
        <!-- Start tabs heading -->
        <div class="panel-heading no-padding">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i><span>Identitas Pemilik</span></a></li>
                <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-file-text"></i><span>Data Permohonan</span></a></li>
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

                    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu' ],['disabled' => False]) ?>

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
                </div>
            </div>
        </div>
        <div class="form-group" style="text-align: center">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Daftar Permohonan Izin') : '<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>