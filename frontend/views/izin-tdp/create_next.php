<?php

use yii\helpers\Html;
use kartik\slider\Slider;
use backend\models\IzinSiup;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */

$this->title = Yii::t('app', 'Perizinan TDP');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin TDP'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br>
<div style="text-align: center">
    <?=
    Slider::widget([
        'name' => 'current_no',
        'value' => 3,
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
                <h3 class="box-title">Pemohon</h3>

                    <div class="pull-right box-tools">
                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                    </div>

            </div>
            <div class="box-body">
			<?php 
                $izin_model = IzinSiup::findOne($model->perizinan->referrer_id); 
                echo $this->render('/izin-tdp/view', [
                    'model' => $izin_model
                ]);

                ?>
			</div>
			
		</div>	
	
	</div>
</div>	

<div class="row">
    <div class="col-md-12">
		<div class="box">
            <div class="box-body">
                
			<?=
			$this->render('_form', [
				'model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,
			])
			?>
			</div>
		</div>
	</div>
</div>	