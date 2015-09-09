<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeritaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'judul_seo') ?>

    <?= $form->field($model, 'headline') ?>

    <?php // echo $form->field($model, 'isi_berita') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <?php // echo $form->field($model, 'hari') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'jam') ?>

    <?php // echo $form->field($model, 'dibaca') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'judul_en') ?>

    <?php // echo $form->field($model, 'isi_berita_en') ?>

    <?php // echo $form->field($model, 'meta_title') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'meta_keyword') ?>

    <?php // echo $form->field($model, 'meta_title_en') ?>

    <?php // echo $form->field($model, 'meta_description_en') ?>

    <?php // echo $form->field($model, 'meta_keyword_en') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
