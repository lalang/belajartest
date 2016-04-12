<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSkdpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-izin-skdp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

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

    <?php /* echo $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik']) */ ?>

    <?php /* echo $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) */ ?>

    <?php /* echo $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'jenkel')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'alamat')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) */ ?>

    <?php /* echo $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id')->textInput(['placeholder' => 'Wilayah']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id')->textInput(['placeholder' => 'Kecamatan']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id')->textInput(['placeholder' => 'Kelurahan']) */ ?>

    <?php /* echo $form->field($model, 'kodepos')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos']) */ ?>

    <?php /* echo $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon']) */ ?>

    <?php /* echo $form->field($model, 'passport')->textInput(['maxlength' => true, 'placeholder' => 'Passport']) */ ?>

    <?php /* echo $form->field($model, 'kewarganegaraan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'npwp_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Npwp Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true, 'placeholder' => 'Titik Koordinat']) */ ?>

    <?php /* echo $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) */ ?>

    <?php /* echo $form->field($model, 'longtitude')->textInput(['maxlength' => true, 'placeholder' => 'Longtitude']) */ ?>

    <?php /* echo $form->field($model, 'nama_gedung_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Gedung Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'blok_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Blok Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'alamat_perusahaan')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'rt_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Rt Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'rw_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Rw Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'wilayah_id_perusahaan')->textInput(['placeholder' => 'Wilayah Id Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'kecamatan_id_perusahaan')->textInput(['placeholder' => 'Kecamatan Id Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'kelurahan_id_perusahaan')->textInput(['placeholder' => 'Kelurahan Id Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'kodepos_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'telpon_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Telpon Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'fax_perusahaan')->textInput(['maxlength' => true, 'placeholder' => 'Fax Perusahaan']) */ ?>

    <?php /* echo $form->field($model, 'klarifikasi_usaha')->textInput(['maxlength' => true, 'placeholder' => 'Klarifikasi Usaha']) */ ?>

    <?php /* echo $form->field($model, 'status_kepemilikan')->dropDownList([ 'Milik Sendiri' => 'Milik Sendiri', 'Sewa' => 'Sewa', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'status_kantor')->dropDownList([ 'Virtual Office' => 'Virtual Office', 'Kantor Bersama' => 'Kantor Bersama', 'Kantor Mandiri' => 'Kantor Mandiri', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'jumlah_kariawan')->textInput(['placeholder' => 'Jumlah Kariawan']) */ ?>

    <?php /* echo $form->field($model, 'nomor_akta_pendirian')->textInput(['placeholder' => 'Nomor Akta Pendirian']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_pendirian')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pendirian')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nama_notaris_pendirian')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pendirian']) */ ?>

    <?php /* echo $form->field($model, 'nomor_sk_kemenkumham')->textInput(['placeholder' => 'Nomor Sk Kemenkumham']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_pengesahan')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pengesahan')],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'nama_notaris_pengesahan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Notaris Pengesahan']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
