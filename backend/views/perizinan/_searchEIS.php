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
    <?= $form->field($model, 'pilih')->dropDownList(['NOREG','Nama','Npwp/Nik','E-mail'],
    ['options' => [$_POST['pilih'] => ['Selected'=>'selected']], 'prompt' => ' -- Select Category --']) ?>
    <?= $form->field($model, 'cari')->textInput(['style'=>'width: 550px;', 'placeholder' => 'user name, nama pemohon, email']) ?>
    <?= Html::submitButton(Yii::t('app', 'Cari <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']
          ) ?>
    <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>

    <?php ActiveForm::end(); ?>

    <?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?><br><br>
   
</div>
<!-- <div id="isi" style="display: none">-->