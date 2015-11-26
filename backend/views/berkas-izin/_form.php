<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BerkasIzin */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PerizinanBerkas', 
        'relID' => 'perizinan-berkas', 
        'value' => \yii\helpers\Json::encode($model->perizinanBerkas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="berkas-izin-form">
	<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index', 'id'=>$id_induk], ['class' => 'btn btn-warning']) ?>
    <?php $form = ActiveForm::begin(); ?>
    <?php $data = \backend\models\Izin::find()->where(['id'=>$id_induk])->orderBy('id')->asArray()->all(); ?>
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['value'=>$data[0]['id'], 'style' => 'display:none']); ?>
	
	<?= $form->field($model, 'no_input')->textInput(['value'=>$data[0]['nama'], 'readonly' => 'true'])->label('Izin',['class'=>'label-class']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'extension')->textInput(['maxlength' => true, 'placeholder' => 'Extension']) ?>

    <?= $form->field($model, 'wajib')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <?= $form->field($model, 'urutan')->textInput(['placeholder' => 'Urutan']) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a(Yii::t('app', 'Cancel'), ['index', 'id'=>$id_induk], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
