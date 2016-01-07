<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPm1 */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-pm1-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'perizinan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Perizinan')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'izin_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Izin')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Status')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik']) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true, 'placeholder' => 'No Kk']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

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
                ]
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan']) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>

    <?= $form->field($model, 'wilayah_id')->textInput(['placeholder' => 'Wilayah']) ?>

    <?= $form->field($model, 'kecamatan_id')->textInput(['placeholder' => 'Kecamatan']) ?>

    <?= $form->field($model, 'kelurahan_id')->textInput(['placeholder' => 'Kelurahan']) ?>

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

    <?= $form->field($model, 'tujuan')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keperluan_administrasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lokasi_id')->textInput(['placeholder' => 'Lokasi']) ?>

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

    <?= $form->field($model, 'jenkel_orang_lain')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat_orang_lain')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kodepos_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Orang Lain']) ?>

    <?= $form->field($model, 'pekerjaan_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Orang Lain']) ?>

    <?= $form->field($model, 'telepon_orang_lain')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Orang Lain']) ?>

    <?= $form->field($model, 'wilayah_id_orang_lain')->textInput(['placeholder' => 'Wilayah Id Orang Lain']) ?>

    <?= $form->field($model, 'kecamatan_id_orang_lain')->textInput(['placeholder' => 'Kecamatan Id Orang Lain']) ?>

    <?= $form->field($model, 'kelurahan_id_orang_lain')->textInput(['placeholder' => 'Kelurahan Id Orang Lain']) ?>

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

    <?= $form->field($model, 'jenkel_saksi1')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat_saksi1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kodepos_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Saksi1']) ?>

    <?= $form->field($model, 'pekerjaan_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Saksi1']) ?>

    <?= $form->field($model, 'telepon_saksi1')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Saksi1']) ?>

    <?= $form->field($model, 'wilayah_id_saksi1')->textInput(['placeholder' => 'Wilayah Id Saksi1']) ?>

    <?= $form->field($model, 'kecamatan_id_saksi1')->textInput(['placeholder' => 'Kecamatan Id Saksi1']) ?>

    <?= $form->field($model, 'kelurahan_id_saksi1')->textInput(['placeholder' => 'Kelurahan Id Saksi1']) ?>

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

    <?= $form->field($model, 'jenkel_saksi2')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat_saksi2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kodepos_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Saksi2']) ?>

    <?= $form->field($model, 'pekerjaan_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Saksi2']) ?>

    <?= $form->field($model, 'telepon_saksi2')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Saksi2']) ?>

    <?= $form->field($model, 'wilayah_id_saksi2')->textInput(['placeholder' => 'Wilayah Id Saksi2']) ?>

    <?= $form->field($model, 'kecamatan_id_saksi2')->textInput(['placeholder' => 'Kecamatan Id Saksi2']) ?>

    <?= $form->field($model, 'kelurahan_id_saksi2')->textInput(['placeholder' => 'Kelurahan Id Saksi2']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
