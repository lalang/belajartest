<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;
?>

<?= $form->field($user, 'username')->textInput(['maxlength' => 25, 'readonly' => true]) ?>
<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput() ?>

<?php
$user->kdprop = 31;
?>

<?= $form->field($user, 'kdwil')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>
<?php echo Html::hiddenInput('kdkec', $user->kdkec, ['id' => 'model_id1']); ?>
<?=
$form->field($user, 'kdkec')->widget(\kartik\widgets\DepDrop::classname(), [
    'options' => ['id' => 'kec-id'],
    'pluginOptions' => [
        'depends' => ['kabkota-id'],
        'placeholder' => 'Pilih Kecamatan...',
        'url' => Url::to(['subcat']),
        'loading' => false,
        'initialize' => true,
        'params' => ['model_id1']
    ]
]);
?>
<?php echo Html::hiddenInput('kdkel', $user->kdkel, ['id' => 'model_id2']); ?>
<?=
$form->field($user, 'kdkel')->widget(\kartik\widgets\DepDrop::classname(), [
    'pluginOptions' => [
        'depends' => ['kabkota-id', 'kec-id'],
        'placeholder' => 'Pilih Kelurahan...',
        'url' => Url::to(['prod']),
        'loading' => false,
        'initialize' => true,
        'params' => ['model_id2']
    ]
]);
?>

<!--</div>
</div>-->