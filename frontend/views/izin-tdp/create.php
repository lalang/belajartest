<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\izinSiup;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model frontend\models\IzinTdp */

$this->title = 'Perizinan TDP';
?>

<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br>
<div style="text-align: center">
    <?=
    Slider::widget([
        'name' => 'current_no',
        'value' => 2,
        'sliderColor' => Slider::TYPE_GREY,
        'handleColor' => Slider::TYPE_DANGER,
        'pluginOptions' => [
//            'min' => 1,
//            'max' => $model->jumlah_tahap,
            'ticks' => [1,2,3,4],
            'ticks_labels' => ['Cari Izin','Pilih Perusahaan','Input Formulir','Selesai'],
            'ticks_snap_bounds' => 50,
            'tooltip' => 'always',
            'formatter'=>new yii\web\JsExpression("function(val) {
               return 'Anda Disini';
            }")
        ],
        'options' => ['disabled' => true, 'style' => 'width: 80%']
    ]);
    ?>
</div>
<br>
    </div>
    <div class="col-sm-1"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
			<div class="box-header with-border">
               
				<div class="box-body">
					<div class="alert alert-success alert-dismissible">
						<h4>	<i class="icon fa fa-bell"></i> Pilih Perusahaan!</h4>
						<p>Untuk mengajukan TDP pilihlah salah satu Perusahaan dibawah ini.</p>
					</div>
					
					<?php
					$form = ActiveForm::begin([
								'method' => 'post',
								'layout' => 'horizontal',
					]);
					?>


					<?= $form->field($model, 'perizinan_id')->label('Perusahaan:')->widget(\kartik\widgets\Select2::classname(), [
						'data' => \yii\helpers\ArrayHelper::map(izinSiup::find()->joinWith(['perizinan'])->where(['perizinan.pemohon_id'=>Yii::$app->user->identity->id])->orderBy('id')->asArray()->all(), 'perizinan.id', 'nama_perusahaan'),
						'options' => ['placeholder' => Yii::t('app', 'Pilih Perusahaan')],
						'pluginOptions' => [
							'allowClear' => true
						],
					]) ?>
					
						<div class="form-group text-center">
							<?= Html::submitButton(Yii::t('app', 'Pilih'), ['class' => 'btn btn-primary']) ?>
						</div>

					<?php ActiveForm::end(); ?>
				</div> 
            </div>
		</div>
	</div>
</div>	

   


