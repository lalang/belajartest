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
$session->set('izin_id', $model->izin_id);

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpKantorcabang',
        'relID' => 'izin-tdp-kantorcabang',
        'value' => \yii\helpers\Json::encode($model->izinTdpKantorcabangs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpKegiatan',
        'relID' => 'izin-tdp-kegiatan',
        'value' => \yii\helpers\Json::encode($model->izinTdpKegiatans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpLegal',
        'relID' => 'izin-tdp-legal',
        'value' => \yii\helpers\Json::encode($model->izinTdpLegals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpPimpinan',
        'relID' => 'izin-tdp-pimpinan',
        'value' => \yii\helpers\Json::encode($model->izinTdpPimpinans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinTdpSaham',
        'relID' => 'izin-tdp-saham',
        'value' => \yii\helpers\Json::encode($model->izinTdpSahams),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);


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
                <?php $model->i_3_pemilik_propinsi = 11; ?>
                <?php $form = ActiveForm::begin(['id' => 'form-izin-tdp']); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'bentuk_perusahaan', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'perpanjangan_ke')->textInput(['placeholder' => 'Perpanjangan izin TDP ke']) ?>

                <div class="tdp-form-kop">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active" title="Identitas Pemilik/Pengurus/Penanggungjawab"><a href="#tab_1" data-toggle="tab">1</a></li>
                            <li title="Lokasi Perusahaan"><a href="#tab_2" data-toggle="tab">2</a></li>
                            <li title="Data Umum Perusahaan"><a href="#tab_3" data-toggle="tab">3</a></li>
                            <li title="Legalitas Perusahaan"><a href="#tab_4" data-toggle="tab">4</a></li>
                            <li title="Pimpinan Perusahaan"><a href="#tab_5" data-toggle="tab">5</a></li>
                            <li title="Kegiatan Perusahaan"><a href="#tab_6" data-toggle="tab">6</a></li>
                            <li title="Data Khusus Perusahaan"><a href="#tab_7" data-toggle="tab">7</a></li>
                            <li title="Disclaimer"><a href="#tab_8" data-toggle="tab">8</a></li>
                        </ul>
                        <div id="result"></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Identitas Pemilik/Pengurus/Penanggungjawab</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Lengkap']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_2_pemilik_tgl_lahir', [
                                                    'horizontalCssClasses' => [
                                                        'wrapper' => 'col-sm-3',
                                                    ]
                                                ])->widget(DateControl::classname(), [
                                                    'options' => [
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'endDate' => '0d',
                                                        ],
                                                        'disabled' => FALSE
                                                    ],
                                                    'type' => DateControl::FORMAT_DATE,
                                                ])->hint('<small>format : dd-mm-yyyy (cth. 27-04-1990)</small>');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'i_3_pemilik_alamat')->textArea(['maxlength' => true, 'placeholder' => 'Alamat Lengkap']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_3_pemilik_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_3_pemilik_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('i_3_pemilik_kecamatan', $model->i_3_pemilik_kecamatan, ['id' => 'model_id1']); ?>
                                                <?= $form->field($model, 'i_3_pemilik_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'options' => ['id' => 'kec-id'],
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id'],
                                                        'placeholder' => 'Pilih Kecamatan...',
                                                        'url' => Url::to(['subcat']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id1']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php echo Html::hiddenInput('i_3_pemilik_kelurahan', $model->i_3_pemilik_kelurahan, ['id' => 'model_id2']); ?>
                                                <?= $form->field($model, 'i_3_pemilik_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
                                                    'pluginOptions' => [
                                                        'depends' => ['kabkota-id', 'kec-id'],
                                                        'placeholder' => 'Pilih Kelurahan...',
                                                        'url' => Url::to(['prod']),
                                                        'loading' => false,
                                                        'initialize' => true,
                                                        'params' => ['model_id2']
                                                    ]
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_4_pemilik_telepon')->textInput(['maxlength' => true, 'placeholder' => 'I 4 Pemilik Telepon']) ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?= $form->field($model, 'i_5_pemilik_no_ktp')->textInput(['maxlength' => true, 'placeholder' => 'I 5 Pemilik No Ktp']) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= $form->field($model, 'i_6_pemilik_kewarganegaraan')->widget(\kartik\widgets\Select2::classname(), [
                                                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->all(), 'id', 'nama_negara'),
                                                'options' => ['placeholder' => Yii::t('app', 'Pilih kewarganegaraan')],
                                                'hideSearch' => true,
                                                'pluginOptions' => [
                                                  'allowClear' => true
                                                ],
                                              ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'ii_1_perusahaan_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'ii_2_perusahaan_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Perusahaan ']) 
                                                ->hint('Diisi Nama jalan, Nomor, Rt/Rw')
                                                ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'ii_2_perusahaan_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-id-tab2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Provinsi..']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'ii_2_perusahaan_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id-tab2', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?php echo Html::hiddenInput('ii_2_perusahaan_kecamatan', $model->ii_2_perusahaan_kecamatan, ['id'=>'model_id1-tab2']);?>
                                        <?=
                                        $form->field($model, 'ii_2_perusahaan_kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
                                            'options' => ['id' => 'kec-id-tab2'],
                                            'pluginOptions' => [
                                                'depends' => ['kabkota-id-tab2'],
                                                'placeholder' => 'Pilih Kecamatan...',
                                                'url' => Url::to(['subcat']),
                                                'loading'=>false,
                                                'initialize'=>true,
                                                'params'=>['model_id1-tab2']
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?php echo Html::hiddenInput('ii_2_perusahaan_kelurahan', $model->ii_2_perusahaan_kelurahan, ['id'=>'model_id2-tab2']);?>
                                        <?=
                                        $form->field($model, 'ii_2_perusahaan_kelurahan')->widget(\kartik\widgets\DepDrop::classname(), [
                                            'pluginOptions' => [
                                                'depends' => ['kabkota-id-tab2', 'kec-id-tab2'],
                                                'placeholder' => 'Pilih Kelurahan...',
                                                'url' => Url::to(['prod']),
                                                'loading'=>false,
                                                'initialize'=>true,
                                                'params'=>['model_id2-tab2']
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'ii_2_perusahaan_kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                       <?= $form->field($model, 'ii_2_perusahaan_no_telp')->textInput(['maxlength' => true, 'placeholder' => 'No Telp Perusahaan ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                       <?= $form->field($model, 'ii_2_perusahaan_no_fax')->textInput(['maxlength' => true, 'placeholder' => 'No Fax Perusahaan ']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'ii_2_perusahaan_email')->textInput(['maxlength' => true, 'placeholder' => 'Email Perusahaan ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_1_nama_kelompok')->textInput(['maxlength' => true, 'placeholder' => 'Kelompok/Group ']) ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="optional1">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Lokasi Unit Produksi (Apabila Ada)</div>
                                                <div class="panel-body">
                                                    <?= $form->field($model, 'iii_3_lokasi_unit_produksi')->textInput(['maxlength' => true, 'placeholder' => 'Lokasi']) ?>
                                                    <?= $form->field($model, 'iii_3_lokasi_unit_produksi_propinsi')->dropDownList(\backend\models\Lokasi::getProvOptions(), ['id' => 'prov-opt-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Propinsi...']) ?>
                                                    <?= $form->field($model, 'iii_3_lokasi_unit_produksi_kabupaten')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-opt-tab3', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota...']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                           
                                    <?= $form->field($model, 'iii_4_bank_utama_1')->widget(\kartik\widgets\Select2::classname(), [
                                        'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                                        'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
                                        'hideSearch' => true,
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_4_bank_utama_2')->widget(\kartik\widgets\Select2::classname(), [
                                        'data' => \yii\helpers\ArrayHelper::map(backend\models\Bank::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                                        'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
                                        'hideSearch' => true,
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_4_jumlah_bank')->textInput(['placeholder' => 'Jumlah Bank']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_5_npwp')->textInput(['maxlength' => true, 'placeholder' => 'Npwp']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_7a_tgl_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
                                            'options' => ['placeholder' => Yii::t('app', ' ')],
                                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-M-yyyy'
                                            ]
                                        ]); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_7b_tgl_mulai_kegiatan')->widget(\kartik\widgets\DatePicker::classname(), [
                                            'options' => ['placeholder' => Yii::t('app', ' ')],
                                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-M-yyyy'
                                            ]
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_8_bentuk_kerjasama_pihak3')->textInput(['placeholder' => 'Bentuk Kerjasama Pihak ke-3']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_9a_merek_dagang_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Merek Dagang ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_9a_merek_dagang_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Merek Dagang ']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_9b_hak_paten_nama')->textInput(['maxlength' => true, 'placeholder' => 'Hak Paten']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_9b_hak_paten_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Hak Paten ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_9c_hak_cipta_nama')->textInput(['maxlength' => true, 'placeholder' => ' Hak Cipta ']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iii_9c_hak_cipta_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Hak Cipta ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a1_nomor')->textInput(['maxlength' => true, 'placeholder' => ' Nomor']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a1_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
                                        'options' => ['placeholder' => Yii::t('app', '')],
                                        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-M-yyyy'
                                        ]
                                        ]); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a1_notaris_nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris ']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a1_notaris_alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Notaris ']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a1_telpon')->textInput(['maxlength' => true, 'placeholder' => 'No Telpon Notaris']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a2_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Tlp']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a2_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
                                            'options' => ['placeholder' => Yii::t('app', ' ')],
                                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-M-yyyy'
                                            ]
                                        ]); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a2_notaris')->textInput(['maxlength' => true, 'placeholder' => 'Notaris']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a3_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a3_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
                                            'options' => ['placeholder' => Yii::t('app', ' ')],
                                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-M-yyyy'
                                            ]
                                        ]); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a4_nomor')->textInput(['maxlength' => true, 'placeholder' => 'Nomor']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'iv_a4_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
                                            'options' => ['placeholder' => Yii::t('app', ' ')],
                                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-M-yyyy'
                                            ]
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="form-group" id="add-izin-tdp-legal"></div>         
                            </div>
                            <div class="tab-pane" id="tab_5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'v_jumlah_pengurus')->textInput(['placeholder' => 'Jumlah Pengurus']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'v_jumlah_pengawas')->textInput(['placeholder' => 'Jumlah Pengawas']) ?>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                                <div class="form-group" id="add-izin-tdp-pimpinan"></div>
                            </div>
                            <div class="tab-pane" id="tab_6">
                                <div class="form-group" id="add-izin-tdp-kegiatan"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_b_omset')->textInput(['placeholder' => 'Omset']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_b_terbilang')->textInput(['maxlength' => true, 'placeholder' => 'Terbilang']) ?>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Modal</p>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vi_c_modal_1a')->textInput(['placeholder' => 'Simpanan Pokok']) ?>
                                        <?= $form->field($model, 'vi_c_modal_1b')->textInput(['placeholder' => 'Simpanan Wajib']) ?>
                                        <?= $form->field($model, 'vi_c_modal_1c')->textInput(['placeholder' => 'Dana Cadangan']) ?>
                                        <?= $form->field($model, 'vi_c_modal_1d')->textInput(['placeholder' => 'Hibah']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vi_c_modal_2a')->textInput(['placeholder' => 'Anggota']) ?>
                                        <?= $form->field($model, 'vi_c_modal_2b')->textInput(['placeholder' => 'Koprasi lain']) ?>
                                        <?= $form->field($model, 'vi_c_modal_2c')->textInput(['placeholder' => 'Bank']) ?>
                                        <?= $form->field($model, 'vi_c_modal_2d')->textInput(['placeholder' => 'Lainnya']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_d_totalaset')->textInput(['placeholder' => 'Total Asset']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_e_wni')->textInput(['placeholder' => 'Jumlah Karyawan WNI']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_e_wna')->textInput(['placeholder' => 'Jumlah Karyawan WNA']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_f_matarantai')->dropDownList([ '1' => 'Produsen', 
                                        '2' => 'Sub distributor', '3' => 'Eksportir', '4' => 'Distributor /Wholesaler /Grosir',
                                        '5' => 'Importir', '6' => 'Pengecer','7' => 'Agen',],
                                         ['id'=>'matarnt','onchange'=>'getval(this)']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="optional3" >
                                            <?= $form->field($model, 'vii_fb_jumlah')->textInput(['placeholder' => 'Jumlah']) ?>
                                            <?= $form->field($model, 'vii_fb_satuan')->textInput(['placeholder' => 'Satuan']) ?>
                                            <?= $form->field($model, 'vii_fc_lokal')->textInput(['maxlength' => true, 'placeholder' => 'Lokal (%)']) ?>
                                            <?= $form->field($model, 'vii_fc_impor')->textInput(['maxlength' => true, 'placeholder' => ' Impor (%)']) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_f_pengecer')->dropDownList([ 'Swalayan /Supermarket' => 'Swalayan /Supermarket', 'Toserba /Dept. Store' => 'Toserba /Dept. Store', 'Toko /Kios' => 'Toko /Kios', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_1_koperasi_bentuk')->dropDownList([
                                            'Primer' => 'Primer', 'Sekunder' => 'Sekunder', ], ['prompt' => '']) 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_2_koperasi_jenis')->widget(\kartik\widgets\Select2::classname(), [
                                              'data' => \yii\helpers\ArrayHelper::map(\backend\models\JenisKoperasi::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                                              'options' => ['placeholder' => Yii::t('app', 'Jenis Koprasi')],
                                              'pluginOptions' => [
                                                  'allowClear' => true
                                              ],
                                          ],['id'=>'matarnt','onchange'=>'getval(this)'])
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'vii_3_koperasi_anggota')->textInput(['maxlength' => true, 'placeholder' => 'Orang/Koprasi']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_8">
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
                            <div class="tab-pane" id="tab_9">

                            </div>
                            <div class="tab-pane" id="tab_10">
                               
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
    $(document).ready(function () {
        $('.kekayaan-bersih').on('keyup', function () {
            $('.kekayaan-bersih2').val($('.kekayaan-bersih').val());
            $('.total_pasivaclass').val($('.kekayaan-bersih').val());
        });

        $('.kekayaan-bersih2').on('keyup', function () {
            $('.kekayaan-bersih').val($('.kekayaan-bersih2').val());
        });

    });


</script>
<script src="/js/wizard_bul_kop.js"></script> 
