<?php

use yii\helpers\Html;
use kartik\slider\Slider;
use yii\web\Session;
/* @var $this yii\web\View */
/* @var $model backend\models\IzinPm1 */

$this->title = Yii::t('app', 'Buat Permohonan TDP');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin PM1'), 'url' => ['index']];
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
                'value' => 2,
                'sliderColor' => Slider::TYPE_GREY,
                'handleColor' => Slider::TYPE_DANGER,
                'pluginOptions' => [
        //            'min' => 1,
        //            'max' => $model->jumlah_tahap,
                    'ticks' => [1,2,3,4,5,6],
                    'ticks_labels' => ['Cari Izin','Input Formulir','Preview SK','Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
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

    <?php
		$session = Yii::$app->session;
        if($model->izin_id == 491 || $model->izin_id == 598 || $model->izin_id == 599){
            //Render Form PT
			$session->set('pt',1);
            $model->bentuk_perusahaan = 1;
//            echo $this->render('_formPercepatan', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,]);
            echo $this->render('_formTdp_PT', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,]);
        } elseif($model->izin_id == 601 || $model->izin_id == 602 || $model->izin_id == 603){
            //Render Form Koperasi
			$session->set('pt','');
              $model->bentuk_perusahaan = 2;
            echo $this->render('_formTDP_KOP', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,]);
           
        } elseif ($model->izin_id == 604 || $model->izin_id == 605 || $model->izin_id == 606 || $model->izin_id == 647 || $model->izin_id == 648 || $model->izin_id == 649) {
            //Render Form Bull
			$session->set('pt','');
            $model->bentuk_perusahaan = 3;
            echo $this->render('_formTDP_Bull', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,]);
             
        } elseif ($model->izin_id == 607 || $model->izin_id == 608 || $model->izin_id == 609) { 
			//Render From CV
			$session->set('pt','');
            $model->bentuk_perusahaan = 4;
            echo $this->render('_formTdp_CV', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp]);
        } elseif ($model->izin_id == 610 || $model->izin_id == 611 || $model->izin_id == 612) {
			//Render Form FA
			$session->set('pt','');
            $model->bentuk_perusahaan = 5;
			echo $this->render('_formTdp_Fa', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp]);
        } elseif ($model->izin_id == 613 || $model->izin_id == 614 || $model->izin_id == 615) {
            //Render Form PO
			$session->set('pt','');
            $model->bentuk_perusahaan = 6;
            echo $this->render('_formTdp_PO', ['model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,]);
        }
        
    ?>

<!--<script src="/js/wizard_pm1.js"></script>-->
