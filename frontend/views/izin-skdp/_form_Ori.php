<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSkdp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinSkdpAkta', 
        'relID' => 'izin-skdp-akta', 
        'value' => \yii\helpers\Json::encode($model->izinSkdpAktas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="izin-skdp-form">

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

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'jenkel')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) ?>

    <?= $form->field($model, 'wilayah_id')->textInput(['placeholder' => 'Wilayah']) ?>

    <?= $form->field($model, 'kecamatan_id')->textInput(['placeholder' => 'Kecamatan']) ?>

    <?= $form->field($model, 'kelurahan_id')->textInput(['placeholder' => 'Kelurahan']) ?>

    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) ?>

    <?= $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) ?>

    <?= $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan']) ?>

    <?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) ?>

    <?= $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true, 'placeholder' => 'Titik Koordinat']) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) ?>

    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => true, 'placeholder' => 'Longtitude']) ?>

    <?= $form->field($model, 'nama_gedung_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Perusahaan']) ?>

    <?= $form->field($model, 'blok_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Blok Perusahaan']) ?>

    <?= $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Rt Perusahaan']) ?>

    <?= $form->field($model, 'rw_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Rw Perusahaan']) ?>

    <?= $form->field($model, 'wilayah_id_perusahaan')->textInput(['placeholder' => 'Wilayah Id Perusahaan']) ?>

    <?= $form->field($model, 'kecamatan_id_perusahaan')->textInput(['placeholder' => 'Kecamatan Id Perusahaan']) ?>

    <?= $form->field($model, 'kelurahan_id_perusahaan')->textInput(['placeholder' => 'Kelurahan Id Perusahaan']) ?>

    <?= $form->field($model, 'kodepos_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan']) ?>

    <?= $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) ?>

    <?= $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) ?>

    <?= $form->field($model, 'klarifikasi_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Klarifikasi Usaha']) ?>

    <?= $form->field($model, 'status_kepemilikan')->dropDownList([ 'Milik Sendiri' => 'Milik Sendiri', 'Sewa' => 'Sewa', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_kantor')->dropDownList([ 'Virtual Office' => 'Virtual Office', 'Kantor Bersama' => 'Kantor Bersama', 'Kantor Mandiri' => 'Kantor Mandiri', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jumlah_kariawan')->textInput(['placeholder' => 'Jumlah Kariawan']) ?>

    <?= $form->field($model, 'nomor_akta_pendirian')->textInput(['placeholder' => 'Nomor Akta Pendirian']) ?>

    <?= $form->field($model, 'tanggal_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pendirian')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nama_notaris_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pendirian']) ?>

    <?= $form->field($model, 'nomor_sk_kemenkumham')->textInput(['placeholder' => 'Nomor Sk Kemenkumham']) ?>

    <?= $form->field($model, 'tanggal_pengesahan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pengesahan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'nama_notaris_pengesahan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pengesahan']) ?>

    <div class="form-group" id="add-izin-skdp-akta"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
