<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KantorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kantor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lokasi_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'kepala') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'kodepos') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'email_jak_go_id') ?>

    <?php // echo $form->field($model, 'email_kelurahan') ?>

    <?php // echo $form->field($model, 'email_ptsp') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
