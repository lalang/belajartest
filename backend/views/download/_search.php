<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DownloadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="download-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'regulasi_id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'judul_eng') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'deskripsi_eng') ?>

    <?php // echo $form->field($model, 'nama_file') ?>

    <?php // echo $form->field($model, 'jenis_file') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'diunduh') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
