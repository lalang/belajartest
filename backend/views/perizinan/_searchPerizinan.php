<?php
//Samuel
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-search">

    <?php
    $form = ActiveForm::begin([
                'action' => [$varLink],
                'method' => 'get',
                'type' => ActiveForm::TYPE_INLINE,
                'fieldConfig' => ['autoPlaceholder' => false]
    ]);
    ?>
    <?= $form->field($model, 'cari')->textInput(['style'=>'width: 550px;', 'placeholder' => 'No. Registrasi, Nama Pemohon, No. SK']) ?>
    <?= Html::submitButton(Yii::t('app', 'Cari <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
<!-- <div id="isi" style="display: none">-->