<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinPenelitian */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AnggotaPenelitian', 
        'relID' => 'anggota-penelitian', 
        'value' => \yii\helpers\Json::encode($model->anggotaPenelitians),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinMetodePenelitian', 
        'relID' => 'izin-metode-penelitian', 
        'value' => \yii\helpers\Json::encode($model->izinMetodePenelitians),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'LokasiPenelitian', 
        'relID' => 'lokasi-penelitian', 
        'value' => \yii\helpers\Json::encode($model->lokasiPenelitians),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="izin-penelitian-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'perizinan_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Perizinan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'izin_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Izin'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Status'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'lokasi_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Lokasi'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Tanggal Lahir'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'alamat_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Pemohon']) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'Rt']) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'Rw']) ?>

    <?= $form->field($model, 'kelurahan_pemohon')->textInput(['placeholder' => 'Kelurahan Pemohon']) ?>

    <?= $form->field($model, 'kecamatan_pemohon')->textInput(['placeholder' => 'Kecamatan Pemohon']) ?>

    <?= $form->field($model, 'kabupaten_pemohon')->textInput(['placeholder' => 'Kabupaten Pemohon']) ?>

    <?= $form->field($model, 'provinsi_pemohon')->textInput(['placeholder' => 'Provinsi Pemohon']) ?>

    <?= $form->field($model, 'telepon_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Pemohon']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true, 'placeholder' => 'Kode Pos']) ?>

    <?= $form->field($model, 'pekerjaan_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Pekerjaan Pemohon']) ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true, 'placeholder' => 'Npwp']) ?>

    <?= $form->field($model, 'nama_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Nama Instansi']) ?>

    <?= $form->field($model, 'fakultas')->textInput(['maxlength' => true, 'placeholder' => 'Fakultas']) ?>

    <?= $form->field($model, 'alamat_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Instansi']) ?>

    <?= $form->field($model, 'kelurahan_instansi')->textInput(['placeholder' => 'Kelurahan Instansi']) ?>

    <?= $form->field($model, 'kecamatan_instansi')->textInput(['placeholder' => 'Kecamatan Instansi']) ?>

    <?= $form->field($model, 'kabupaten_instansi')->textInput(['placeholder' => 'Kabupaten Instansi']) ?>

    <?= $form->field($model, 'provinsi_instansi')->textInput(['placeholder' => 'Provinsi Instansi']) ?>

    <?= $form->field($model, 'email_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Email Instansi']) ?>

    <?= $form->field($model, 'kodepos_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Kodepos Instansi']) ?>

    <?= $form->field($model, 'telepon_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Telepon Instansi']) ?>

    <?= $form->field($model, 'fax_instansi')->textInput(['maxlength' => true, 'placeholder' => 'Fax Instansi']) ?>

    <?= $form->field($model, 'tema')->textInput(['maxlength' => true, 'placeholder' => 'Tema']) ?>

    <?= $form->field($model, 'kab_penelitian')->textInput(['placeholder' => 'Kab Penelitian']) ?>

    <?= $form->field($model, 'kec_penelitian')->textInput(['placeholder' => 'Kec Penelitian']) ?>

    <?= $form->field($model, 'kel_penelitian')->textInput(['placeholder' => 'Kel Penelitian']) ?>

    <?= $form->field($model, 'instansi_penelitian')->textInput(['maxlength' => true, 'placeholder' => 'Instansi Penelitian']) ?>

    <?= $form->field($model, 'alamat_penelitian')->textInput(['maxlength' => true, 'placeholder' => 'Alamat Penelitian']) ?>

    <?= $form->field($model, 'bidang_penelitian')->textInput(['maxlength' => true, 'placeholder' => 'Bidang Penelitian']) ?>

    <?= $form->field($model, 'tgl_mulai_penelitian')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Tgl Mulai Penelitian'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'tgl_akhir_penelitian')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Tgl Akhir Penelitian'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'anggota')->textInput(['placeholder' => 'Anggota']) ?>

    <div class="form-group" id="add-anggota-penelitian"></div>

    <div class="form-group" id="add-izin-metode-penelitian"></div>

    <div class="form-group" id="add-lokasi-penelitian"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
