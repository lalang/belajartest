<?php

use backend\models\PerizinanBerkasSearch;
use backend\models\PerizinanProses;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\bootstrap\Modal;
use kartik\datecontrol\DateControl;
use yii\web\Session;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Zonasi;
//Kolom Khusus Izin-Izin
use backend\models\IzinSiup;
use backend\models\IzinTdp;
use backend\models\IzinPm1;
use backend\models\IzinTdg;
use backend\models\IzinSkdp;
use backend\models\IzinPenelitian;
use backend\models\IzinKesehatan;

/* @var $this View */
/* @var $model PerizinanProses */

$this->title = 'Approval Izin';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Approval SK'];

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
                <h3 class="box-title">Approval Surat Keputusan</h3>

            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>

                <?php
                $edit = 0;
                if ($model->perizinan->izin->action == 'izin-tdg') {
                    $izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
                    $izin_model[perizinan_proses_id] = $model->id;
                    $izin_model[kode_registrasi] = $model->perizinan->kode_registrasi;
                    $izin_model[url_back] = 'approval';

                    $get_gudang_luas = explode(".", $izin_model->gudang_luas);
                    $get_gudang_kapasitas = explode(".", $izin_model->gudang_kapasitas);
                    $get_gudang_nilai = explode(".", $izin_model->gudang_nilai);
                    $get_gudang_komposisi_nasional = explode(".", $izin_model->gudang_komposisi_nasional);
                    $get_gudang_komposisi_asing = explode(".", $izin_model->gudang_komposisi_asing);
                    $get_gudang_sarana_listrik = explode(".", $izin_model->gudang_sarana_listrik);
                    $get_gudang_sarana_pendingin = explode(".", $izin_model->gudang_sarana_pendingin);

                    $get_hs_luas = explode(".", $izin_model->hs_luas);
                    $get_hs_kapasitas = explode(".", $izin_model->hs_kapasitas);
                    $get_hs_nilai = explode(".", $izin_model->hs_nilai);
                    $get_hs_komposisi_nasional = explode(".", $izin_model->hs_komposisi_nasional);
                    $get_hs_komposisi_asing = explode(".", $izin_model->hs_komposisi_asing);
                    $get_hs_sarana_listrik = explode(".", $izin_model->hs_sarana_listrik);
                    $get_hs_sarana_pendingin = explode(".", $izin_model->hs_sarana_pendingin);

                    $izin_model->gudang_luas = $get_gudang_luas[0];
                    $izin_model->gudang_kapasitas = $get_gudang_kapasitas[0];
                    $izin_model->gudang_nilai = $get_gudang_nilai[0];
                    $izin_model->gudang_komposisi_nasional = $get_gudang_komposisi_nasional[0];
                    $izin_model->gudang_komposisi_asing = $get_gudang_komposisi_asing[0];
                    $izin_model->gudang_sarana_listrik = $get_gudang_sarana_listrik[0];
                    $izin_model->gudang_sarana_pendingin = $get_gudang_sarana_pendingin[0];

                    $izin_model->hs_luas = $get_hs_luas[0];
                    $izin_model->hs_kapasitas = $get_hs_kapasitas[0];
                    $izin_model->hs_nilai = $get_hs_nilai[0];
                    $izin_model->hs_komposisi_nasional = $get_hs_komposisi_nasional[0];
                    $izin_model->hs_komposisi_asing = $get_hs_komposisi_asing[0];
                    $izin_model->hs_sarana_listrik = $get_hs_sarana_listrik[0];
                    $izin_model->hs_sarana_pendingin = $get_hs_sarana_pendingin[0];
                    echo"<br>";
                    echo $this->render('/' . $model->perizinan->izin->action . '/viewCompare', [
                        'model' => $izin_model
                    ]);
                    echo $this->render('/' . $model->perizinan->izin->action . '/view', [
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
                    $izin_model[url_back] = 'approval';
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
                    $digital = 1;
                    $izin_model = IzinPenelitian::findOne($model->perizinan->referrer_id);
                    $izin_model['url_back'] = 'approval';
                    $izin_model['perizinan_proses_id'] = $model->id;
                    echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                        'model' => $izin_model
                    ]);
                } elseif ($model->perizinan->izin->action == 'izin-kesehatan') {
                    if ($model->perizinan->status_id == 4) {
                        $izin_model = \backend\models\IzinKesehatan::findOne($model->perizinan->referrer_id);
                        echo $this->render('/' . $model->perizinan->izin->action . '/viewFO', [
                            'model' => $izin_model
                        ]);
                    } else {
                        $izin_model = IzinKesehatan::findOne($model->perizinan->referrer_id);
                        echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                            'model' => $izin_model
                        ]);
                    }
                } elseif ($model->perizinan->izin->action == 'izin-pariwisata') {
					$izin_model = \backend\models\IzinPariwisata::findOne($model->perizinan->referrer_id);
					$izin = \backend\models\Izin::findOne($model->perizinan->izin_id);
					$izin_model->nama_izin= $izin->nama;
                    echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                        'model' => $izin_model
                    ]);	
                } else {
                    $izin_model = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
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
                    echo $this->render('/perizinan/_brankas', ['berkas_model' => $model_berkas, 'model' => $model]);
                }
                ?>
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if ($model->perizinan->izin->type != 'TDP' && $model->perizinan->izin->action != 'izin-skdp' && $model->perizinan->izin->action != 'izin-kesehatan') {
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

                            <?php $this->title = 'Approval Izin'; ?>
                        </div>
                    </div>
                </div>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th style="width: 10px"  class="text-center">No.</th>
                            <th style="width: 300px"  class="text-center">Petugas</th>
                            <th class="text-center">Catatan Petugas</th>
                        </tr>
                        <?php
                        $catatans = PerizinanProses::find()->where('urutan < ' . $model->urutan . ' and perizinan_id = ' . $model->perizinan_id)->all();
                        $i = 1;
                        foreach ($catatans as $catatan) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?>.</td>
                                <td><?= $catatan->pelaksana->nama; ?></td>
                                <td><?= $catatan->keterangan; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody></table>

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
                    if (!$model->zonasi_sesuai) {
                        $model->zonasi_sesuai = 'Y';
                    }
                    if ($model2->izin->zonasi == 'Y') {
                        echo $form->field($model, 'zonasi_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => ArrayHelper::map(Zonasi::find()->select(['id', 'concat(kode, " - ", replace(zonasi, "SUB ZONA ", "")) as kode_zonasi'])->asArray()->all(), 'id', 'kode_zonasi'),
                            'options' => ['placeholder' => Yii::t('app', '[N\A] - Tanpa zonasi')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);

                        echo $form->field($model, 'zonasi_sesuai')->radioList(['Y' => 'Sesuai', 'N' => 'Tidak Sesuai']);
                    }
                    ?>

                    <?php
//                    if ($model->status == 'Tolak') {
//                        $items = [ 'Tolak' => 'Tolak', 'Lanjut' => 'Lanjut'];
//                    }
////                    else if ($model->status == 'Revisi') {
////                        $items = [ 'Revisi' => 'Revisi','Tolak' => 'Tolak','Lanjut' => 'Lanjut'];
////                    } 
//                    else {
//                        $items = [ 'Lanjut' => 'Lanjut', 'Tolak' => 'Tolak'];
//                    }
                    $items = [ 'Lanjut' => 'Lanjut', 'Tolak' => 'Tolak'];
//                    $items = [ 'Lanjut' => 'Lanjut','Tolak' => 'Tolak', 'Revisi' => 'Revisi'];
                    echo $form->field($model, 'status')->dropDownList($items);
                    ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <!— Digital signature —>
                        <?php
                        /*
                        $perizinanDigital = (new \yii\db\Query())
                                ->select('id, perizinan_id, sign1, sign2, sign3, sign4, sign5')
                                ->from('perizinan_signature')
                                ->where('perizinan_id =' . $izin_model->perizinan_id)
                                ->one();

                        if ($digital == 1) {
                            if ($alert == 1) {
                                $class = 'btn btn-success';
                                $target = "#modal-status";
                            } else {
                                $target = '#';
                                $class = 'btn btn-primary btn-disabled';
                            }
                            ?>
                            <?=
                            Html::a('validasi', ['digival', 'id' => $model->perizinan_id], [
                                'data-toggle' => "modal",
                                'data-target' => $target,
                                'data-title' => "Validasi Tanda Tangan Digital",
                                'class' => $class,
                                'id' => 'validasiSignature',
                                'title' => Yii::t('yii', 'Validasi Tanda Tangan Digital'),
                            ])
                            ?> 
                            <?php
//                            if ($perizinanDigital['sign3'] == '1') {
                                echo Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-disabled',
                                    'data-confirm' => Yii::t('yii', 'Apakah Anda akan melanjutkan proses kirim ?'),]);
//                            } else {
//                                echo 'Belum tersign';
//                            }
                            ?>
                            <a class="btn btn-primary" type="button" href="<?= Yii::getAlias('@test') . '/perizinan/index'; ?>">Back</a>
                            <?php
                        } else {
                         * 
                         */
                            ?>  
                            <!— End —>
                            <?php
                            if ($model->isNewRecord) {
                                $class = 'btn btn-success';
                            } else {
                                if ($model->perizinan->no_izin == '') {
                                    $class = 'btn btn-primary btn-disabled';
                                } else {
                                    $class = 'btn btn-primary disabled';
                                }
                            }
                            echo Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $class,
                                'data-confirm' => Yii::t('yii', 'Apakah Anda akan melanjutkan proses kirim?'),])
                            ?>
                        <?php 
                        
//                                } 
                        ?>
                    </div>

<?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script>
    /*
    $("#perizinanproses-status").change(function() {
        //alert('test-'+$('#perizinanproses-status').val());
        var status = $(this).val();
        var url = "<?= Yii::getAlias('@test'); ?>/perizinan/set-session";
        $.post(url, {stat: status, idpp: <?php echo $model->id; ?>, idp: <?php echo $model->perizinan_id; ?>}, function(data) {
            //alert('haii');
            //alert(data);
        })
    });

 $("#perizinanproses-keterangan").change(function() {
//        alert('test-'+$('#perizinanproses-keterangan').val());
        var keterangan = $(this).val();
        var url = "<?= Yii::getAlias('@test'); ?>/perizinan/set-session";
        $.post(url, {ket: keterangan, idpp: <?php echo $model->id; ?>, idp: <?php echo $model->perizinan_id; ?>}, function(data) {
            //alert('haii');
            //alert(data);
        })
    });
    
     $("#perizinan-tanggal_expiredp").change(function() {
//       alert('test-'+$('#perizinan-tanggal_expired').val());
        var tgl_exp = $(this).val();
        var url = "<?= Yii::getAlias('@test'); ?>/perizinan/set-session";
        $.post(url, {exp: tgl_exp, idpp: <?php echo $model->id; ?>, idp: <?php echo $model->perizinan_id; ?>}, function(data) {
           
        })
    });
    */
    $(document).ready(function() {
        $(".disabled").prop('disabled', true);
        var id = $.getUrlVar('alert');

        $('#myModal').modal('show');

        setTimeout(function() {
            $("#myModal").modal('hide')
        }, 5000);
    });
</script>
