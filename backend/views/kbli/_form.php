<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kbli */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinSiupKbli',
        'relID' => 'izin-siup-kbli',
        'value' => \yii\helpers\Json::encode($model->izinSiupKblis),
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
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('kbli/index') ?>"><?= Html::encode($this->title) ?></a>
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

        <div class="kbli-form">

            <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'kode')->textInput(['maxlength' => true, 'placeholder' => 'Kode']) ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

            <div class="form-group" id="add-izin-siup-kbli"></div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>
