
<?php

use backend\models\Perizinan;
use yii\helpers\Url;

$this->title = "DASHBOARD | PTSP DKI";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
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
                                            <span class="info-box-text">Verifikasi Berkas :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getVerified(); ?></h1></strong></span>
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
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>

</div>


