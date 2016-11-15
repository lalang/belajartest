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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
                <div>
                <?php
                $edit = 0;
                if ($model->perizinan->izin->action == 'izin-tdg') {
                    $izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewCompare', [
                        'model' => $izin_model
                    ]);
                } elseif ($model->perizinan->izin->action == 'izin-skdp') {
                    $izin_model = \backend\models\IzinSkdp::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                        'model' => $izin_model
                    ]);
                } elseif ($model->perizinan->izin->action == 'izin-penelitian') {
                    $digital=1;
                    $izin_model = \backend\models\IzinPenelitian::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                        'model' => $izin_model
                    ]);
                } elseif ($model->perizinan->izin->action == 'izin-kesehatan') {
                    $izin_model = \backend\models\IzinKesehatan::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                        'model' => $izin_model
                    ]);
				} elseif ($model->perizinan->izin->action == 'izin-pariwisata') {
					$izin_model = \backend\models\IzinPariwisata::findOne($model->perizinan->referrer_id); 
					$izin = \backend\models\Izin::findOne($model->perizinan->izin_id);
					$izin_model->nama_izin= $izin->nama;
					
					$BidangIzinUsaha = \backend\models\BidangIzinUsaha::findOne($izin->bidang_izin_id);
					$izin_model->kode = $BidangIzinUsaha->kode;
					$JenisUsaha = \backend\models\JenisUsaha::findOne($izin->jenis_usaha_id);
					$izin_model->kode_sub = $JenisUsaha->kode;
					
					if($izin_model->identitas_sama=="Y"){
						$izin_model->nik_penanggung_jawab = $izin_model->nik;
						$izin_model->nama_penanggung_jawab = $izin_model->nama;
						$izin_model->tempat_lahir_penanggung_jawab = $izin_model->tempat_lahir;
						$izin_model->tanggal_lahir_penanggung_jawab = $izin_model->tanggal_lahir;
						$izin_model->jenkel_penanggung_jawab = $izin_model->jenkel;
						$izin_model->alamat_penanggung_jawab = $izin_model->alamat;
						$izin_model->rt_penanggung_jawab = $izin_model->rt;
						$izin_model->rw_penanggung_jawab = $izin_model->rw;			
						$izin_model->kodepos_penanggung_jawab = $izin_model->kodepos;
						$izin_model->telepon_penanggung_jawab = $izin_model->telepon;
						$izin_model->kewarganegaraan_id_penanggung_jawab = $izin_model->kewarganegaraan_id;
						$izin_model->passport_penanggung_jawab = $izin_model->passport;
						$izin_model->kitas_penanggung_jawab = $izin_model->kitas;
					}
					
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                        'model' => $izin_model
                    ]);
                }
                ?>
                </div>
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
                            return ['value' => $model->id, 'class' => 'cek_persyaratan', 'checked' => ($model->check != 0) ? 'checked' : ''];
                        }
                    ],

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
                <br>
                <?php
                if (Yii::$app->user->identity->pelaksana->cek_brankas == "Ya") {

                    echo $this->render('/perizinan/_brankas', ['model' => $model]);
                }
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
                    if($model->perizinan->status_id == 4){
                        $items = [ 'Selesai' => 'Selesai'];
                    } else {
                        $items = [ 'Selesai' => 'Selesai', 'Batal' => 'Batal',];
                    }
                    
                    echo $form->field($model, 'status')->dropDownList($items, []);
                    $model->alamat_valid='Ya';
					if($model->perizinan->izin->action != 'izin-kesehatan' || $model->perizinan->izin->action != 'izin-pariwisata'){   
                    ?>
                  
                    <?= $form->field($model, 'alamat_valid')->dropDownList([ 'Ya' => 'Ya', 'Virtual Office' => 'Virtual Office'], ['id' => 'alamat_valid']); ?>
                    <?php }?>
                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>


                    <div id='append-cek'>
                        <?php
                        $perizinan_dokumen = \backend\models\PerizinanDokumen::findAll(['perizinan_id' => $model->perizinan_id, 'check' => 1]);

                        foreach ($perizinan_dokumen as $value) {
                            echo "<input type='hidden' class='verifikasi-berkas' name='selection[]' value='" . $value['id'] . "'>";
                        }
                        ?>
                    </div>

            <?php 
            /*if($digital == 1 && Yii::$app->user->identity->pelaksana->digital_signature == "Ya")
                    {
              ?>
                    <div class="form-group">
                         <?php 
                         
                         echo
 Html::a('validasi',['berkas-digital','id'=>$model->id],[
                                        'data-toggle'=>"modal",
                                        'data-target'=>"#modal-status",
                                        'data-title'=>"Validasi Tanda Tangan Digital",
                                        'data-confirm' => 'test email',
                                        'title' => Yii::t('yii', 'Validasi Tanda Tangan Digital'),
                                ])
?>   
                      
<?php   }*/?>
                    
                        <?=
                        Html::submitButton(Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn_submit',
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
/*
            if (!$('#alamat_valid').val()) {
                alert('Pilih status Alamat');
                $('#alamat_valid').focus();
                return false;
            } */

        });
    });
</script>

