<?php

use backend\models\IzinSiup;
use backend\models\IzinTdg;
use backend\models\IzinSkdp;
use backend\models\PerizinanBerkasSearch;
use backend\models\PerizinanProses;
use backend\models\IzinPenelitian;
use backend\models\User;
use kartik\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\web\View;
use kartik\datecontrol\DateControl;
use yii\web\Session;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this View */
/* @var $model PerizinanProses */

$this->title = 'Registrasi';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Registrasi'];

$this->registerJs("
    $('#modal-status').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
?>

<?php
Modal::begin([
    'id' => 'modal-status',
    'header' => '<h4 class="modal-title">Status Pemrosesan Izin</h4>',
    'size' => Modal::SIZE_LARGE,
    'options' => ['height' => '600px'],
//    'headerOptions'=>['style'=>'background-color: whitesmoke;'],
//    'bodyOptions'=>['style'=>'background-color: whitesmoke;'],
        //'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class'=> 'btn btn-primary'],
]);

echo '...';

Modal::end();
?>
<div class="row">
    <div class="col-md-12">

        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Online</h3>

            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
                <?php
                $user = User::findOne($model->perizinan->pemohon_id);
                ?> 
                <?php
                $edit = 0;
                if ($model->perizinan->izin->action == 'izin-tdg') {
                    $izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewDetail', [
                        'model' => $izin_model
                    ]);
                } elseif ($model->perizinan->izin->action == 'izin-pm1') {
                    $izin_model = \backend\models\IzinPm1::findOne($model->perizinan->referrer_id);
                    $edit = 1;
                    if ($izin_model->izin_id == 537) {
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-skbmr', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 519) {
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-skck', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 525) {
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-sktm', [
                            'model' => $izin_model
                        ]);
                    }
                } elseif ($model->perizinan->izin->action == 'izin-tdp') {

                    $izin_model = \backend\models\IzinTdp::findOne($model->perizinan->referrer_id);
                    $edit = 1;
                    $izin_model[perizinan_proses_id] = $model->id;
                    $izin_model[kode_registrasi] = $model->perizinan->kode_registrasi;
                    $izin_model[url_back] = 'registrasi';
                    $session = Yii::$app->session;
                    $getPerizinanParent = backend\models\Perizinan::findOne($izin_model->perizinan_id)->parent_id;
                    $idParent = backend\models\Perizinan::findOne($getPerizinanParent)->referrer_id;
                    $izin_model->izin_siup_id = $idParent;
                    $session->set('izin_siup_id', $idParent);
                    if ($izin_model->izin_id == 601 || $izin_model->izin_id == 602 || $izin_model->izin_id == 603) {
                        //Koprasi
                        $session->set('pt', '');
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-kop', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 491 || $izin_model->izin_id == 598 || $izin_model->izin_id == 599) {
                        //PT
                        $session->set('pt', 1);
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-pt', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 604 || $izin_model->izin_id == 605 || $izin_model->izin_id == 606) {
                        //Bul
                        $session->set('pt', 1);
                        $izin_model->bentuk_perusahaan = 3;
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-bul', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 607 || $izin_model->izin_id == 608 || $izin_model->izin_id == 609) {
                        //CV
                        $session->set('pt', '');
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-cv', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 610 || $izin_model->izin_id == 611 || $izin_model->izin_id == 612) {
                        //Firma
                        $session->set('pt', '');
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-fa', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 613 || $izin_model->izin_id == 614 || $izin_model->izin_id == 615) {
                        //PO
                        $session->set('pt', '');
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-po', [
                            'model' => $izin_model
                        ]);
                    }
                } elseif ($model->perizinan->izin->action == 'izin-skdp') {
                    $izin_model = IzinSkdp::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                        'model' => $izin_model
                    ]);
                } elseif ($model->perizinan->izin->action == 'izin-penelitian') {
                    $ds=1;
                    $izin_model = IzinPenelitian::findOne($model->perizinan->referrer_id);
//                    $get_tgl_akhir = explode(".", $izin_model->tgl_akhir_penelitian);
                    $model->perizinan->tanggal_expired = $izin_model->tgl_akhir_penelitian;
                    $izin_model['url_back'] = 'registrasi';
                    $izin_model['perizinan_proses_id'] = $model->id;
//                                        die(print_r($model->perizinan->tanggal_expired));
                    echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                        'model' => $izin_model
                    ]);
                } elseif ($model->perizinan->izin->action == 'izin-kesehatan') {
                    if($model->perizinan->status_id == 4){
                        $izin_model = \backend\models\IzinKesehatan::findOne($model->perizinan->referrer_id);
                        echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                            'model' => $izin_model
                        ]);
                    } else {
                        $izin_model = backend\models\IzinKesehatan::findOne($model->perizinan->referrer_id);
                        $izin_model['url_back'] = 'registrasi';
                        $izin_model['perizinan_proses_id'] = $model->id;
                        echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                            'model' => $izin_model
                        ]);
                    }
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
					
					if($model->perizinan->status_id == 4){
                        echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                            'model' => $izin_model]);
                    } else {
						echo $this->render('/' . $model->perizinan->izin->action . '/view', [
							'model' => $izin_model]);
					}
                } else {
                    $izin_model = IzinSiup::findOne($model->perizinan->referrer_id);
                    echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                        'model' => $izin_model
                    ]);
                }

//                var_dump($izin_model);exit();
//                echo $this->render('/' . $model->perizinan->izin->action . '/view', ['id' => $model->perizinan->referrer_id]);
                ?>
                <br>

                <?php
                if (Yii::$app->user->identity->pelaksana->cek_brankas == "Ya") {

                    echo $this->render('/perizinan/_brankas', ['model' => $model]);
                }
                ?>

                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
							//Note tambahkan model action saat membuat Preview SK
                            if ($model->perizinan->izin->type != 'TDP' && $model->perizinan->izin->action != 'izin-skdp' && $model->perizinan->izin->action != 'izin-kesehatan'
                                    && $model->perizinan->izin->action != 'izin-pariwisata') {

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
                            } else {
                                ?>
                                <?php
                                echo Html::a('<i class="icon fa fa-search"></i> Preview SK', ['sk', 'id' => $model->id], [
                                    'data-toggle' => "modal",
                                    'data-target' => "#modal-status",
                                    'data-title' => "Preview Surat Keputusan",
                                    'class' => 'btn btn-primary',
                                    'title' => Yii::t('yii', 'Preview Surat Keputusan'),
                                ]);
                            }
                            ?>
                            <?php
                            if (Yii::$app->user->identity->pelaksana->view_history == "Ya") {
                                echo Html::a('<i class="fa fa-eye"></i> ' . Yii::t('app', 'View History'), ['view-history', 'pemohonID' => $model->perizinan->pemohon_id], [
                                    'data-toggle' => 'tooltip',
                                    'class' => 'btn btn-warning',
                                    'title' => Yii::t('app', 'View All Guest History')
                                        ]
                                );
                            }
                            ?>
                            <?php $this->title = 'Preview SK'; ?>
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

                    <?php
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
                        <br/>
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

                    <?php if (Yii::$app->user->identity->pelaksana->flag_ubah_tgl_exp == "Ya") { ?>

                        <?php
                        $expired = explode(" ", $model2->tanggal_expired);
                        ?>

                        <?php
                        $model2->tanggal_expired = $expired[0];
                        ?>
                        <?=
                        $form->field($model2, 'tanggal_expired')->widget(DateControl::classname(), [
                            //'displayFormat' => 'dd/MM/yyyy',
                            'options' => [
                                'pluginOptions' => [
                                    'autoclose' => true,
                                ]
                            ],
                            'type' => DateControl::FORMAT_DATE,
                        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
                        ?>

                    <?php } ?>

                    <?php
                    $items = [ 'Lanjut' => 'Lanjut'];
                    echo $form->field($model, 'status')->dropDownList($items);
                    ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6, ['placeholder' => 'Catatan FO ke petugas selanjutnya']]) ?>

                    <div class="form-group">
                        
<?=
Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-disabled',
    'data-confirm' => Yii::t('yii', 'Apakah Anda akan melanjutkan proses kirim?'),])
?>
                    </div>

<?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->

        </div>
    </div>
</div>

