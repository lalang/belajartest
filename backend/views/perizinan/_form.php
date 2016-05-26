<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-form">

<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'no_izin')->textInput(['maxlength' => true, 'placeholder' => 'No Izin', 'readonly' => true]) ?>

    <?php
        $tgl_exp_old= date('d-m-Y',strtotime( $model->tanggal_expired ));
    ?>
    <div class="form-group field-perizinan-tanggal_expired has-success">
        <label class="control-label col-sm-3">Tanggal Expired</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?= $tgl_exp_old ?>" readonly="" maxlength="100">
            <div class="help-block help-block-error "></div>
        </div>

    </div>

    <?=
    $form->field($model, 'tanggal_expired', [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-3',
        ]
    ])->widget(DateControl::classname(), [
        'options' => [
            'pluginOptions' => [
                'autoclose' => true,
                'startDate' => '0d',
            ],
        ],
        'type' => DateControl::FORMAT_DATE,
    ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)')->label('Tanggal Expired Baru');
    ?>

    <div class="box-footer text-center">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
