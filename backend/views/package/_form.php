<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Package */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="package-form">

    <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index', 'id'=>$_SESSION['id_induk']], ['class' => 'btn btn-warning']) ?>
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['value'=>$_SESSION['id_induk'], 'style' => 'display:none']); ?>
    
    <?php
        
    if($model->paket_izin_id){
        $curIzin = \backend\models\Package::findOne($model->id)->paket_izin_id;
        $ActifRecord = backend\models\Package::find()
                ->where(['izin_id'=>$_SESSION['id_induk']])
                ->andWhere(['not in','paket_izin_id',$curIzin])
                ->select('paket_izin_id');
        
        $typeParent = backend\models\Izin::findOne($_SESSION['id_induk'])->tipe;
        $query = \backend\models\Izin::find()
                ->where(['tipe'=>$typeParent])
                ->andWhere(['not in','id',$ActifRecord])
                ->orderBy('id')->asArray()->all();
        
        echo $form->field($model, 'paket_izin_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map($query, 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Izin')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    } else {
        $ActifRecord = backend\models\Package::find()->where(['izin_id'=>$_SESSION['id_induk']])->select('paket_izin_id');
        $typeParent = backend\models\Izin::findOne($_SESSION['id_induk'])->tipe;
        $query = \backend\models\Izin::find()
                ->where(['tipe'=>$typeParent])
                ->andWhere(['not in','id',$ActifRecord])
                ->orderBy('id')->asArray()->all();
        
        echo $form->field($model, 'paket_izin_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map($query, 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Izin')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    }
         
    ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
