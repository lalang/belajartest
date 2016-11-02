<?php
use backend\models\PerizinanBerkasSearch;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\Modal;
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = 'Cetak';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cetak SK'];
?>
<div class="row">
    <div class="col-md-12">
        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>

        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Cetak Surat Keputusan</h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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
                    $izin_model = \backend\models\IzinPenelitian::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                        'model' => $izin_model
                    ]);
                }
                elseif ($model->perizinan->izin->action == 'izin-kesehatan') {
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
                <br>
				
				<?php 
				if(Yii::$app->user->identity->pelaksana->cek_brankas=="Ya"){					 
					$model_b = new PerizinanBerkasSearch();
					$model_berkas = $model_b->searchBerkas($model->perizinan->id); 
					echo $this->render('/perizinan/_brankas', ['berkas_model' => $model_berkas,'model'=>$model]);
					}
				?>
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            Modal::begin([
                                'size' => 'modal-lg',
                                'header' => '<h5>Preview Surat Keputusan</h5>',
                                'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class' => 'btn btn-primary'],
                            ]);
                            ?>
                            <div id="printableArea">
                                <?= $this->render('_sk', ['model' => $model]) ?>
                            </div>                           
                            <?php
                            Modal::end();
                            ?>
                            <?=
                            Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak SK'), ['print', 'id' => $model->id], [
                                'target' => '_blank',
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-success',
                                'onclick' => "printDiv('printableArea')",
                                'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                                ]
                            );
                            
                           ?>
                            
                            <?php
                                if(Yii::$app->user->identity->pelaksana->view_history=="Ya"){
                                    echo Html::a('<i class="fa fa-eye"></i> ' . Yii::t('app', 'View History'), ['view-history', 'pemohonID' => $model->perizinan->pemohon_id], [
                                        'data-toggle' => 'tooltip',
                                        'class' => 'btn btn-warning',
                                        'title' => Yii::t('app', 'View All Guest History')
                                            ]
                                    );
                                }
                            ?>

                            <?php $this->title = 'Cetak Izin'; ?>
                        </div>
                    </div>
                </div>

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
                    if($model2->file_bapl){
                        
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
					<br>
                    <?php
                    //modul Upload BAPL
                    if($model2->statBAPL){
                    ?>
                    <?=
                    Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak BAPL Form'), ['/'.$model2->izin->action.'/print-bapl', 'id' => $model2->referrer_id], [
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
                    
                    <?php 
                        if(Yii::$app->user->identity->pelaksana->flag_ubah_tgl_exp=="Ya"){ 
                            $expired = explode(" ",$model2->tanggal_expired);
                            
                            $model2->tanggal_expired=$expired[0];
                            ?>
                            <?= $form->field($model2, 'tanggal_expired')->widget(DateControl::classname(), [
                                    'options' => [
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                        ]
                                    ],
                                    'type' => DateControl::FORMAT_DATE,
                                ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                            ?>

                    <?php 
                        } 
                    ?>
					
                    <?php
                    $items = [ 'Lanjut' => 'Lanjut'];
                    echo $form->field($model, 'status')->dropDownList($items);
                    ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
						'data-confirm' => Yii::t('yii', 'Sudahkan Anda melakukan cetak SK? jika sudah klik ok untuk melanjutkan'),]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
<script>
    function printDiv(divName) {
            
          
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;
        
        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
