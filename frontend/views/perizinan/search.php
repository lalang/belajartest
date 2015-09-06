<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use app\assets\admin\dashboard\DashboardAsset;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

DashboardAsset::register($this);


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$search = "$(document).ready(function(){
    
     $('#izin-id').change(function () {
     if ($('#izin-id').val() != '') {
         $('#siup').show();  
     } else {
         $('#siup').hide(); 
     }
     });
     
 $('#siup-id').change(function () {
     if ($('#siup-id').val() != '') {
         $('#status').show();  
     } else {
         $('#status').hide(); 
     }
     });
     
    $('#status-id').change(function () {
     if ($('#status-id').val() != '') {
         $('#daftar').show();  
     } else {
         $('#daftar').hide(); 
     }
     });
     
   
});";
$this->registerJs($search);
?>
<section id="page-content">

    <!-- Start page header -->
    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> Buat Permohonan Izin</h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('izin/index') ?>">Permohonan Izin</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Buat</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-md-12">
                <div class="panel rounded shadow">
                    <div class="panel-sub-heading">
                        <div class="callout callout-info">
                            <p>Silahkan cari perizinan yang anda butuhkan lalu klik tombol Daftar untuk membuat permohonan</p>
                        </div>
                    </div><!-- /.panel-sub-heading -->
                    <br>
                    <?php
                    $form = ActiveForm::begin([
                                'method' => 'post',
                                'layout' => 'horizontal',
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'izin')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                        'options' => [
                            'id' => 'izin-id',
                            'placeholder' => Yii::t('app', 'Ketik atau pilih nama izin atau bidang'),
                            'class' => 'col-md-6'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                    ?>

                    <div id="siup" style="display:none">
                        <?= $form->field($model, 'siup')->dropDownList([ 'Besar' => 'SIUP Besar [ Modal Bersih > 10 Miliar ]', 'Menengah' => 'SIUP Menengah [ 500 Juta < Modal Bersih ≤ 10 Miliar ]', 'Kecil' => 'SIUP Kecil [ 50 Juta < Modal Bersih ≤ 500 Juta ]', 'Mikro' => 'SIUP Mikro [ Modal Bersih ≤ 50 Juta ]'], ['prompt' => 'Pilih SIUP..', 'id' => 'siup-id']) ?>
                    </div>

                    <div id="status" style="display:none">
                        <?= $form->field($model, 'status')->dropDownList([ 'Perubahan' => 'Perubahan', 'Perpanjangan' => 'Perpanjangan', 'Baru' => 'Baru'], ['prompt' => 'Pilih Status..', 'id' => 'status-id']) ?>
                    </div>

                    <div id="daftar" style="display:none">
                        <div class="form-group text-center">
                            <?= Html::submitButton(Yii::t('app', 'Buat Permohonan'), ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div><!-- /.row -->

    </div><!-- /.body-content -->
    <!--/ End body content -->
</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
