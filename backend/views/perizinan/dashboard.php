
<?php

use backend\models\Perizinan;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "DASHBOARD | PTSP DKI";
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- fix for small devices only -->

        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <?php
                if (Yii::$app->user->can('Petugas')) {
                    switch (Yii::$app->user->identity->pelaksana_id) {
                        case 7: //FO
                            ?>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'registrasi']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-search"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Permohonan Baru :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getNew(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'verifikasi']) ?>"><span class="info-box-icon bg-red"><i class="fa fa-check"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Verifikasi Berkas  :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getVerified(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'verifikasi-tolak']) ?>"><span class="info-box-icon bg-red"><i class="fa fa-times"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Verifikasi Berkas Tolak  :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getVerifiedTolak(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->
                            <?php
                            break;
                        case 3: //Tim TU
                            ?>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'cetak']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-check"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Cetak Izin :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getApproved(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'tolak']) ?>"><span class="info-box-icon bg-red"><i class="fa fa-close"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Cetak Penolakan :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getDeclined(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->
                            <?php
                            break;
                        case 15:
                        case 4: //Tim Teknis
                            ?>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'cek-form']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Permohonan Teknis :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getTechnical(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->


                            <?php
                            break;
                        case 17: //Koordinator Tim Teknis
                            ?>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'cek-form']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Permohonan Teknis :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getTechnical(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->


                            <?php
                            break;
                        case 19: //New koor
                            ?>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <a href="<?= Url::to(['perizinan/index', 'status' => 'cek-form']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span></a> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Permohonan Teknis :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getTechnical(); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->


                            <?php
                            break;
                        case 5: //Kepala
                            ?>
                            <div class="row">	
                                <div class="col-sm-4">	
                                    <!-- s: small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3><?= Perizinan::getTotalPermohonan(); ?></h3>
                                            <span class="info-box-number">TOTAL PERMOHONAN</span>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-file-archive-o" aria-hidden="true"></i>
                                        </div>												
                                        <span class="small-box-footer"></span>
                                    </div>
                                    <!-- e: small box -->
                                </div>
                                <div class="col-sm-4">
                                    <!-- s: small box -->
                                    <div class="small-box bg-blue">
                                        <div class="inner">
                                            <h3>LAPORAN</h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-print"></i>
                                        </div>				

                                        <?php
                                        echo Html::a(Yii::t(
                                                        'app', 'TDP Reguler Dan SIUP - TDP Simultan <i class="fa fa-arrow-circle-right"></i>'), ['print-laporan-wilayah', 'id' => Yii::$app->user->identity->lokasi_id], ['class' => 'small-box-footer', 'target' => '_blank']
                                        );
                                        ?>

                                    </div>
                                    <!-- e: small box -->
                                </div>	

                            </div>	
                            <div class="row">		
                                <div class="col-sm-12">

                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <i class="fa fa-file-text"></i>
                                            <h3 class="box-title">List yang di kerjakan</h3>
                                        </div><!-- /.box-header -->
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <?php
                                            if ((Perizinan::getApproval($plh_id)) > 0) {
                                                echo Html::a(Yii::t(
                                                                'app', '<span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>'), ['approv', 'action' => 'approval', 'status' => 'Lanjut']
                                                );
                                            } else {
                                                ?>
                                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                                <?php
                                            }
                                            ?> 
                                            <div class="info-box-content">
                                                <span class="info-box-text">Untuk Di Setujui  :</span>
                                                <span class="info-box-text" style='font: bold 40px Georgia, serif;'><?= Perizinan::getApproval($plh_id); ?></span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                    </div><!-- /.col -->

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <?php
                                            if ((Perizinan::getTolak($plh_id)) > 0) {
                                                echo Html::a(Yii::t(
                                                                'app', '<span class="info-box-icon bg-green"><i class="fa fa-ban"></i></span>'), ['approv', 'action' => 'approval', 'status' => 'Tolak']
                                                );
                                            } else {
                                                ?>
                                                <span class="info-box-icon bg-green"><i class="fa fa-ban"></i></span>
                                                <?php
                                            }
                                            ?> 
                                            <div class="info-box-content">
                                                <span class="info-box-text">Untuk Di Tolak  :</span>
                                                <span class="info-box-text" style='font: bold 40px Georgia, serif;'><?= Perizinan::getTolak($plh_id); ?></span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                    </div><!-- /.col -->

                                </div>

                            </div>	

                        </div>
                    </div>

                    </div><!-- /.box-body -->
                    <?php
                    break;
            }
        }
        ?>




    </div><!-- /.box -->
</div>

</div>
</div>
</div>
</div>

</div>


