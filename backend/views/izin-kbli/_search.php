<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKbliSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-kbli-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index','id'=>$_SESSION['id_induk']],
        'method' => 'get',
    ]); ?>
	
	<?= $form->field($model, 'kode_kbli_id')->label('Nomor kode') ?>
	
    <?= $form->field($model, 'kbli_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
