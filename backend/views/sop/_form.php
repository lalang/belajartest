<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sop */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PerizinanProses', 
        'relID' => 'perizinan-proses', 
        'value' => \yii\helpers\Json::encode($model->perizinanProses),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PerizinanSop', 
        'relID' => 'perizinan-sop', 
        'value' => \yii\helpers\Json::encode($model->perizinanSops),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sop-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'izin_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Izin')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nama_sop')->textInput(['maxlength' => true, 'placeholder' => 'Nama Sop']) ?>

    <?= $form->field($model, 'deskripsi_sop')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelaksana_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pelaksana::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Pelaksana')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'durasi')->textInput(['placeholder' => 'Durasi']) ?>

    <?= $form->field($model, 'durasi_satuan')->dropDownList([ 'Hari' => 'Hari', 'Jam' => 'Jam', 'Menit' => 'Menit', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'urutan')->textInput(['placeholder' => 'Urutan']) ?>

    <?= $form->field($model, 'action')->dropDownList([ 'registrasi' => 'Registrasi', 'cek-form' => 'Cek-form', 'approval-sk' => 'Approval-sk', 'cetak-sk' => 'Cetak-sk', 'berkas-siap' => 'Berkas-siap', 'cek-persyaratan' => 'Cek-persyaratan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group" id="add-perizinan-proses"></div>

    <div class="form-group" id="add-perizinan-sop"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
