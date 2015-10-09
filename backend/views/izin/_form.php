<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Izin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis')->dropDownList([ 'Perizinan' => 'Perizinan', 'Non Perizinan' => 'Non Perizinan', 'Lain-lain' => 'Lain-lain', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'bidang_id')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fno_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wewenang_id')->textInput() ?>

    <?= $form->field($model, 'cek_lapangan')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cek_sprtrw')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cek_obyek')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'durasi')->textInput() ?>

    <?= $form->field($model, 'durasi_satuan')->dropDownList([ 'Hari' => 'Hari', 'Jam' => 'Jam', 'Menit' => 'Menit', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cek_perusahaan')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'masa_berlaku')->textInput() ?>

    <?= $form->field($model, 'masa_berlaku_satuan')->dropDownList([ 'Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Hari' => 'Hari', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'latar_belakang')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'persyaratan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mekanisme')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pengaduan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dasar_hukum')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'definisi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'biaya')->textInput() ?>

    <?= $form->field($model, 'brosur')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arsip_id')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'SIUP' => 'SIUP', 'IMTA' => 'IMTA', 'TDP' => 'TDP', 'RPTKA' => 'RPTKA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'template_sk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'template_penolakan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'template_valid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'template_ba_lapangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'template_ba_teknis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
