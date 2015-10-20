<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumenPendukungSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokumen-pendukung-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kategori') ?>

    <?= $form->field($model, 'izin_id') ?>

    <?= $form->field($model, 'isi') ?>

    <?= $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'urutan') ?>

    <?php // echo $form->field($model, 'tipe') ?>

    <div class="box-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'Search <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
