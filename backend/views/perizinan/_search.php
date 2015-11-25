<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-search">

    <?php
    
        if($status == 'Lanjut' || $status == 'Tolak'){
            $form = ActiveForm::begin([
                'action' => [$varLink, 'action'=>$action, 'status'=>$status],
                'method' => 'get',
                'type' => ActiveForm::TYPE_INLINE,
                'fieldConfig' => ['autoPlaceholder' => false]
            ]);
        } elseif($status == 'statistik'){
            $form = ActiveForm::begin([
                'action' => [$varLink,'lokasi'=>$lokasi],
                'method' => 'get',
                'type' => ActiveForm::TYPE_INLINE,
                'fieldConfig' => ['autoPlaceholder' => false]
            ]);
        } elseif($status == 'view-history'){
            $form = ActiveForm::begin([
                'action' => [$status,'pemohonID'=>$pemohonID],
                'method' => 'get',
                'type' => ActiveForm::TYPE_INLINE,
                'fieldConfig' => ['autoPlaceholder' => false]
            ]);
        } else {
            $form = ActiveForm::begin([
                'action' => [$varLink,'status'=>$status],
                'method' => 'get',
                'type' => ActiveForm::TYPE_INLINE,
                'fieldConfig' => ['autoPlaceholder' => false]
            ]);
        }
        
    
    ?>
    <?= $form->field($model, 'cari')->textInput(['style'=>'width: 300px;', 'placeholder' => 'Kode registrasi, nama pemohon']) ?>
    <?= Html::submitButton(Yii::t('app', 'Cari <i class="fa fa-search"></i>'), ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton(Yii::t('app', 'Reset <i class="fa fa-refresh"></i>'), ['class' => 'btn btn-default']) ?>

    <?php ActiveForm::end(); ?>

    
    <?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?>
</div>
