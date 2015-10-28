<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bidang */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Izin',
        'relID' => 'izin',
        'value' => \yii\helpers\Json::encode($model->izins),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> <?= Html::encode($this->title) ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('bidang/index') ?>"><?= Html::encode($this->title) ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Input</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">
        <div class="bidang-form">

            <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

            <div class="form-group" id="add-izin"></div>

            <div class="form-group text-center">
                <?= Html::button(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'goBack()']) ?>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>
