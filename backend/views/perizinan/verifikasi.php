<?php

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = 'Verifikasi';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi'];
?>



<div class="row">
    <div class="col-md-12">
        
        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>
        
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Verifikasi Berkas</h3>
                
            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
                <?php
                $formCekSyarat = ActiveForm::begin([
                    'id' => 'cek_syarat',
                    'action' => \yii\helpers\Url::toRoute('verifikasi?id='.$model->id)
                ]);
                echo "<div id='append-cek'></div>";
                $gridColumn = [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id', 'hidden' => true],
                    'isi:ntext',
                    [
                        'class' => 'kartik\grid\CheckboxColumn',
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'header' => 'Memenuhi Persyaratan',
                        'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id, 'class' => 'cek_persyaratan', 'checked' => ($model->check != 0) ? 'checked':'' ];
                        }
                    ],
//                    [
//                        'class' => 'kartik\grid\BooleanColumn',
//                        'attribute' => 'check',
//                        'vAlign' => 'middle'
//                    ],
//                    [
//                        'class' => 'yii\grid\ActionColumn',
//                        'template' => '{check} {uncheck}',
//                        'buttons' => [
//                            'check' => function ($url, $model) {
//                                return Html::a('<i class="fa fa-check"></i>', ['check', 'id' => $model->id], [
//                                            'data' => [
//                                                'method' => 'post',
//                                            ],
//                                ]);
//                            },
//                                    'uncheck' => function ($url, $model) {
//                                return Html::a('<i class="fa fa-remove"></i>', ['uncheck', 'id' => $model->id], [
//                                            'data' => [
//                                                'method' => 'post',
//                                            ],
//                                ]);
//                            }
//                                ]
//                            ],
                ];

                echo \kartik\grid\GridView::widget([
                    'dataProvider' => $providerPerizinanDokumen,
                    'columns' => $gridColumn,
                    'pjax' => true,
                    'summary' => '',
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode($this->title) . ' </h3>',
                    ],
                    'toolbar'=> [
                        ['content'=>
                            Html::button('<i class="glyphicon glyphicon-plus"></i> Verifikasi Berkas', ['type'=>'button', 'title'=>'Verifikasi Berkas', 'class'=>'btn btn-success', 'id'=>'cek'])
                        ],
                        '{toggleData}',
                    ],
                    // set a label for default menu
                    'export' => false,
                        // your toolbar can include the additional full export menu
                ]);
                ?>
            <?php ActiveForm::end(); ?>
            </div><!-- ./box-body -->
            <div class="box-footer">

                <div class="panel-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    
                    <?= $form->field($model, 'pengambil_nik')->textInput(['label'=>'NIK', 'placeholder'=>'NIK pengambil']); ?>
                    <?= $form->field($model, 'pengambil_nama')->textInput(['placeholder'=>'Nama pengambil']); ?>
                    <?= $form->field($model, 'pengambil_telepon')->textInput(['placeholder'=>'Telepon/HP pengambil']); ?>

                    <?php
                        $items = [ 'Batal' => 'Batal', 'Selesai' => 'Selesai'];
                    echo $form->field($model, 'status')->dropDownList($items, ['prompt' => ''])
                    ?>
                    <?= $form->field($model, 'alamat_valid')->dropDownList([ 'Ya' => 'Ya', 'Virtual Office' => 'Virtual Office'], ['prompt' => '']); ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
<?php
$js = <<< JS
        $('#cek').click(function(){
            $('#cek_syarat').submit();
        });
//        $( document ).on('click', '.cek_persyaratan', function(e) {
//
//            var input = $( this );
//            if(input.prop( "checked" ) == true){
//                
//                $('#divHapus').append(
//                    "<input type='hidden' id='hapus' name='hapusIndex[]' value='"+e.target.value+"'>"
//                );
//                $(".btnHapusCheckboxIndex").click(function(){
//                    if(input.prop( "checked" ) == true){
//                        bootbox.dialog({
//                            message: "Apakah anda ingin menghapus data ini?",
//                            buttons:{
//                                ya : {
//                                    label: "Ya",
//                                    className: "btn-warning",
//                                    callback: function(){
//                                        $('#hapus-index').submit();
//                                        $(".btnHapusCheckboxIndex").off("click");
//                                    }
//                                },
//                                tidak : {
//                                    label: "Tidak",
//                                    className: "btn-warning",
//                                    callback: function(result){
//                                        $(".btnHapusCheckboxIndex").off("click");
//                                    }
//                                },
//                            },
//                        });
//                    }else if(input.prop( "checked" ) == false){
//                        $(".btnHapusCheckboxIndex").off("click");
//                    }
//                });
//
//            }
//
//
//        });
JS;

$this->registerJs($js);
?>