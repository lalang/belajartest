<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'page_title') ?>

    <?= $form->field($model, 'page_title_en') ?>

    <?= $form->field($model, 'page_description') ?>

    <?= $form->field($model, 'page_description_en') ?>

    <?php // echo $form->field($model, 'page_image') ?>

    <?php // echo $form->field($model, 'page_date') ?>

    <?php // echo $form->field($model, 'meta_title') ?>

    <?php // echo $form->field($model, 'meta_title_en') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'meta_description_en') ?>

    <?php // echo $form->field($model, 'meta_keyword') ?>

    <?php // echo $form->field($model, 'meta_keyword_en') ?>

    <?php // echo $form->field($model, 'page_urutan') ?>

    <div class="box-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'Search <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
