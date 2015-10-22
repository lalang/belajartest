<?php

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = $model->perizinan->izin->nama;
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cek Persyaratan'];
?>



<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Cek Formulir</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="callout callout-info">
                    <h4>Petunjuk SOP!</h4>
                    <p> <?= $model->sop->deskripsi_sop; ?></p>
                </div>
                <br>
                <?php
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
                            Html::button('<i class="glyphicon glyphicon-plus"></i> Cek Persyaratan', ['type'=>'button', 'title'=>'Cek Persyaratan', 'class'=>'btn btn-success', 'id'=>'cek'])
                        ],
                        '{toggleData}',
                    ],
                    // set a label for default menu
                    'export' => false,
                        // your toolbar can include the additional full export menu
                ]);
                ?>
            </div><!-- ./box-body -->
            <div class="box-footer">

                <div class="panel-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                    <?php
                    if ($model->urutan == 1) {
                        $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut'];
                    } else if ($model->urutan == $model->perizinan->jumlah_tahap) {
                        $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Selesai' => 'Selesai'];
                    } else {
                        $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut'];
                    }
                    echo $form->field($model, 'status')->dropDownList($items, ['prompt' => ''])
                    ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>
                    
                    <div id='append-cek'>
						<?php 
							$perizinan_dokumen = \backend\models\PerizinanDokumen::findAll(['perizinan_id' => $model->perizinan_id, 'check' => 1]);
							
							foreach ($perizinan_dokumen as $value){
								echo "<input type='hidden' class='verifikasi-berkas' name='selection[]' value='".$value['id']."'>";
							}
						?>
                    </div>

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
        $( document ).on('click', '.cek_persyaratan', function(e) {
			
            var input = $( this );
            if(input.prop( "checked" ) == true){
                $('#append-cek').append(
					"<input type='hidden' class='verifikasi-berkas' name='selection[]' value='"+e.target.value+"'>"
                );

            }else{
				console.log(input.context.defaultValue);
				//$('.verifikasi-berkas').val(input.context.defaultValue).remove();
				$(".verifikasi-berkas[value='"+input.context.defaultValue+"']").remove();
		    }


        });
JS;

$this->registerJs($js);
?>
