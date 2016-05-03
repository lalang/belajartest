<?php

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\widgets\FileInput;

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
                if ($model->perizinan->izin->type == 'TDG') {
                    $izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewCompare', [
                        'model' => $izin_model
                    ]);
                }

                $gridColumn = [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id', 'hidden' => true],
                    'isi:ntext',
                    [
                        'class' => 'kartik\grid\CheckboxColumn',
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'header' => 'Memenuhi Persyaratan',
                        'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id, 'class' => 'cek_persyaratan', 'checked' => ($model->check != 0) ? 'checked' : ''];
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
                    //'pjax' => true,
                    'summary' => '',
                    //'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode($this->title) . ' </h3>',
                    ],
//                    'toolbar'=> [
//                        '{toggleData}',
//                    ],
                    // set a label for default menu
                    'export' => false,
                        // your toolbar can include the additional full export menu
                ]);
                ?>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <div class="panel-body">

                    <?php
                    $form = ActiveForm::begin([
                                'options' => [
                                    'enctype' => 'multipart/form-data',
                                ],
                    ]);
                    ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                    <?php
                    if ($model2->file_bapl) {

                        echo Html::a('<i class="fa fa-eye"></i> ' . Yii::t('app', 'View BAPL'), ['/images/documents/bapl/' . $model2->izin_id . '/' . $model2->file_bapl], [
                            'target' => '_blank',
                            'data-toggle' => 'tooltip',
                            'class' => 'btn btn-info',
                            'title' => Yii::t('app', 'Melihat Form BAPL Hasil Upload')
                                ]
                        );
                    }
                    ?>
                    <br/>
                    <?php
                    //modul Upload BAPL
                    if ($model2->statBAPL) {
                        ?>
                        <?=
                        Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak BAPL Form'), ['/' . $model2->izin->action . '/print-bapl', 'id' => $model2->referrer_id], [
                            'target' => '_blank',
                            'data-toggle' => 'tooltip',
                            'class' => 'btn btn-success',
                            'onclick' => "printDiv('printableArea')",
                            'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                                ]
                        );
                        ?>

                        <?=
                        $form->field($model2, 'fileBAPL')->widget(FileInput::classname(), [
                            'pluginOptions' => [
                                'showPreview' => true,
                                'showCaption' => true,
                                'showRemove' => true,
                                'showUpload' => false
//                            'previewFileType' => 'any', 
//                            'uploadUrl' => Url::to(['@frontend/web/uploads']),
                            ]
                        ]);
                        ?>

                    <?php } ?>

                    <?= $form->field($model, 'pengambil_nik')->textInput(['maxlength' => 16, 'label' => 'NIK', 'placeholder' => 'NIK pengambil', 'id' => 'pengambil_nik']); ?>
                    <?= $form->field($model, 'pengambil_nama')->textInput(['placeholder' => 'Nama pengambil', 'id' => 'pengambil_nama']); ?>
                    <?= $form->field($model, 'pengambil_telepon')->textInput(['maxlength' => 15, 'placeholder' => 'Telepon/HP pengambil', 'id' => 'pengambil_telepon']); ?>

                    <?php
                    $items = [ 'Selesai' => 'Selesai', 'Batal' => 'Batal',];
                    echo $form->field($model, 'status')->dropDownList($items, [])
                    ?>
                    <?= $form->field($model, 'alamat_valid')->dropDownList([ 'Ya' => 'Ya', 'Virtual Office' => 'Virtual Office'], ['prompt' => '', 'id' => 'alamat_valid']); ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>


                    <div id='append-cek'>
                        <?php
                        $perizinan_dokumen = \backend\models\PerizinanDokumen::findAll(['perizinan_id' => $model->perizinan_id, 'check' => 1]);

                        foreach ($perizinan_dokumen as $value) {
                            echo "<input type='hidden' class='verifikasi-berkas' name='selection[]' value='" . $value['id'] . "'>";
                        }
                        ?>
                    </div>


                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn_submit',
                            'data-confirm' => Yii::t('yii', 'Apakah verifikasi sudah selesai?'),])
                        ?>
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

<script src="<?= Yii::getAlias('@front') ?>/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        
        $('#pengambil_nik').on('input', function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#pengambil_telepon').on('input', function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        $("button").click(function() {

            if (!$('#pengambil_nik').val()) {
                alert('NIK Pengambil tidak boleh kosong');
                $('#pengambil_nik').focus();
                return false;
            }

            if (!$('#pengambil_nama').val()) {
                alert('Nama Pengambil tidak boleh kosong');
                $('#pengambil_nama').focus();
                return false;
            }

            if (!$('#pengambil_telepon').val()) {
                alert('Telepon Pengambil tidak boleh kosong');
                $('#pengambil_telepon').focus();
                return false;
            }

            if (!$('#alamat_valid').val()) {
                alert('Pilih status Alamat');
                $('#alamat_valid').focus();
                return false;
            }

        });
    });
</script>

