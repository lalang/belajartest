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
   

    if($('#searchizin-tipe').val() == 'Perorangan'){
        $('#izin-id').change(function () {
        
        if (($('#izin-id option:selected').text()).match(/.*TDP.*/)) {
            $('#izinSiup').show();
            //alert($('#izin-id ').text());
        } else {
            $('#izinSiup').hide(); 
        }
        });
        $('#izinSiup').hide();
    } else {
        $('#izinSiup').hide();
    }

 $('#status-id').change(
    function () {
        if ($('#status-id').val() != '') {
            $('#select2-izin-id-container').empty();
            $('#searchizin-bidang_izin').val('');
            $('#izin').show();
            $('#daftar').hide();
        } else {
            $('#izin').hide(); 
        }
    }
);
     
    $('#izin-id').change(function () {
     if ($('#izin-id').val() != '') {
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
        <?= $this->render('_step', ['value' => 1]) ?>
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
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Mohon diperhatikan!</h4>
                    <p>Silahkan cari perizinan yang anda butuhkan lalu klik tombol Daftar untuk membuat permohonan</p>
                </div>

                <br>
                <?php
                $form = ActiveForm::begin([
                            'method' => 'post',
                            'layout' => 'horizontal',
                ]);
                ?>
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

                <?=
                $form->field($model, 'status_id')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('kode')->all(), 'id', 'nama'), ['id' => 'status-id', 'prompt' => 'Pilih',
                    'onchange' => '
                        $.post( "' . Yii::$app->urlManager->createUrl('perizinan/izin-list?status=') . '"+$(this).val(), function( data ) {
                            $( "#izin-id" ).html( data );
                        });
                    '])->label('Status')
                ?>
                <div id="izin" style="display:none">
                    <?=
                    $form->field($model, 'izin')->widget(Select2::classname(), [
                        'options' => [
                            'id' => 'izin-id',
                            'placeholder' => Yii::t('app', 'Ketik atau pilih nama izin atau bidang'),
                            'class' => 'col-md-6',
                            'onchange' => '
                                $.ajax({
                                    url: "' . Url::to(["izin-label"]) . '",
                                    type: "GET",
                                    data:{izin:$("#izin-id").val() },
                                    dataType: "html",
                                    async: false,
                                    success: function(data, textStatus, jqXHR)
                                    {
                                       $("#searchizin-bidang_izin").val(data);
                                       
                                    }
                                });
                                $.post( "' . Yii::$app->urlManager->createUrl('perizinan/siup-list?idizin=') . '"+$(this).val(), function( data ) {
                                    $( "#izin-id-test" ).html( data );
                                });
                            '
                        ],
                        'pluginOptions' => [
                            'allowClear' => false,
                            'minimumInputLength' => 3,
                            'ajax' => [
                                'url' => Url::to(['izin-search']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {search:params.term, status:$("#status-id").val()}; }'),
                                'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                            ],
                        ],
                    ]);
                    ?>

                    <?= $form->field($model, 'bidang_izin')->textInput(['readonly' => true]) ?>
                    
                    <div id="izinSiup" style="display:none">
                    <?=
                    $form->field($model, 'id_izin_siup')->widget(Select2::classname(), [
                        'options' => [
                            'id' => 'izin-id-test',
                            'placeholder' => Yii::t('app', 'Pilih Nama Perusahaan'),
                            'class' => 'col-md-6',
                            'onchange' => '
                                
                            ',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ],
                    ]);
                    ?>
                    </div>
                    <div id="ket-lb"></div>
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

