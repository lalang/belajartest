<?php

use backend\models\Izin;
use backend\models\PerizinanSearch;
use kartik\slider\Slider;
use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;

/* @var $this View */
/* @var $searchModel PerizinanSearch */
/* @var $dataProvider ActiveDataProvider */


$this->title = 'Perizinan';

$search = "$(document).ready(function(){
    
     $('#izin-id').change(function () {
     if ($('#izin-id').val() != '') {
         $('#tipe').show();  
     } else {
         $('#tipe').hide(); 
     }
     });
     
 $('#tipe-id').change(function () {
     if ($('#tipe-id').val() != '') {
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
<br>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?php
        echo Slider::widget([
            'name' => 'current_no',
            'value' => 1,
            'sliderColor' => Slider::TYPE_INFO,
            'handleColor' => Slider::TYPE_DANGER,
            'pluginOptions' => [
                'min' => 0,
                'max' => 6,
                'ticks' => [1, 2, 3, 4, 5, 6],
                'ticks_labels' => ['Cari Izin', 'Input Formulir', 'Unggah Berkas', 'Atur Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
                'ticks_snap_bounds' => 50,
                'tooltip' => 'always',
                'formatter' => new yii\web\JsExpression("function(val) { 
                                return 'Anda Disini';
                        }")
            ],
            'options' => ['disabled' => true, 'style' => 'width: 100%']
        ]);
        ?>
    </div>
    <div class="col-sm-1"></div>
</div>
<br><br><br><br><br>
<div class="row">

    <div class="col-md-12">

        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Perizinan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

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
                $form->field($model, 'izin')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Izin::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                    'options' => [
                        'id' => 'izin-id',
                        'placeholder' => Yii::t('app', 'Ketik atau pilih nama izin atau bidang'),
                        'class' => 'col-md-6',
                        'onchange' => "
                                $.ajax({
                                    url: '" . Url::to(['izin-label']) . "',
                                    type: 'GET',
                                    data:{izin:$('#izin-id').val() },
                                    dataType: 'html',
                                    async: false,
                                    success: function(data, textStatus, jqXHR)
                                    {
                                       $('#searchizin-bidang_izin').val(data)
                                    }
                                });
                            "
                    ],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'minimumInputLength' => 3,
                        'ajax' => [
                            'url' => Url::to(['izin-search']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {search:params.term}; }'),
                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                        ],
                    ],
                ]);
                ?>

                <?= $form->field($model, 'bidang_izin')->textInput(['readonly' => true]) ?>
                <div id="ket-lb"></div>
                <div id="tipe" style="display:none">
                    <?= $form->field($model, 'tipe')->textInput(['value' => Yii::$app->user->identity->profile->tipe, 'readonly' => true]) ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3"></label>
                        <div class="col-sm-6">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
                                <?php
                                if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
                                    echo 'Jika anda ingin melakukan permohonan izin sebagai perusahaan silahkan login sebagai akun perusahaan';
                                } else {
                                    echo 'Jika anda ingin melakukan permohonan izin sebagai perorangan silahkan login sebagai akun perorangan';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
<?= $form->field($model, 'status')->dropDownList([ 'Perubahan' => 'Perubahan', 'Perpanjangan' => 'Perpanjangan', 'Baru' => 'Baru'], ['prompt' => 'Pilih Status..', 'id' => 'status-id']) ?>
                </div>
                <div id="daftar" style="display:none">
                    <div class="form-group text-center">
<?= Html::submitButton(Yii::t('app', 'Buat Permohonan'), ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>


<?php ActiveForm::end(); ?>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div><!-- /.row -->

