<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');

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
                    $form->field($model, 'izin')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                        'options' => [
                            'id' => 'izin-id',
                            'placeholder' => Yii::t('app', 'Ketik atau pilih nama izin atau bidang'),
                            'class' => 'col-md-6',
                            'onchange'=>"
                                $.ajax({
                                    url: '".\yii\helpers\Url::to(['izin-label'])."',
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
                                'url' => \yii\helpers\Url::to(['izin-search']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {search:params.term}; }'),
                                'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                            ],
                        ],
                    ]);
                    ?>

                    <?= $form->field($model, 'bidang_izin')->textInput(['readonly' => true])  ?>
                    <div id="ket-lb"></div>
                    <div id="tipe" style="display:none">
                        <?= $form->field($model, 'tipe')->textInput(['value' => Yii::$app->user->identity->profile->tipe, 'readonly' => true]) ?>
                        <div class="col-sm-3">&nbsp</div>
                        <div class="col-sm-9">* Jika anda ingin melakukan permohonan izin sebagai perusahaan silahkan login sebagai Perusahaan</div>
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

    