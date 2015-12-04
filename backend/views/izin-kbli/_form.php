<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKbli */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="izin-kbli-form">
	<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index', 'id'=>$_SESSION['id_induk']], ['class' => 'btn btn-warning']) ?>
	<?php $data = \backend\models\Izin::find()->where(['id'=>$_SESSION['id_induk']])->orderBy('id')->asArray()->all(); 

	?>
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
	<?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['value'=>$data[0]['id'], 'style' => 'display:none']); ?>
	<?= $form->field($model, 'no_input')->textInput(['value'=>$data[0]['nama'], 'readonly' => 'true'])->label('Nama Izin',['class'=>'label-class']) ?>
	
    <?= $form->field($model, 'kbli_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()->orderBy('id')->all(), 'id', 'KodeNama'),
        'options' => ['placeholder' => 'Choose Kbli'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
