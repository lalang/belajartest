
<?php

use app\assets\admin\dashboard\DashboardAsset;
use backend\models\Perizinan;

DashboardAsset::register($this);

$this->title = "DASHBOARD | PTSP DKI";
?>
<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-home"></i>Dashboard 
            <span>
                <?php //echo Yii::$app->user->identity->wewenang->nama . ' ' . Yii::$app->user->identity->lokasi->nama; 
                ?>
            </span>
        </h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div><!-- /.header-content -->
    <!--/ End page header -->

    <!-- Start body content -->
    <div class="body-content animated fadeIn">
        <div class="row">
                        
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-success">
                    <h3 class="text-center text-thin"><?= Perizinan::getTotal(); ?></h3>
                    <p class="text-center">
                        <span class="overview-icon bg-success"><i class="fa fa-envelope fg-envelope"></i></span>
                    </p>
                    <p class="text-center">
                        <b>Total permohonan</b>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-primary">
                    <h3 class="text-center text-thin"><?= Perizinan::getFinish(); ?></h3>
                    <p class="text-center">
                        <span class="overview-icon bg-primary"><i class="fa fa-check fg-check"></i></span>
                    </p>
                    <p class="text-center">
                        <b>Permohonan Selesai</b>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-lilac">
                    <h3 class="text-center text-thin"><?= Perizinan::getNew(); ?></h3>
                    <p class="text-center">
                        <span class="overview-icon bg-lilac"><i class="fa fa-plus fg-plus"></i></span>
                    </p>

                    <p class="text-center">
                        <b>Permohonan Baru</b>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-danger">
                    <h3 class="text-center text-thin"><?= Perizinan::getRejected(); ?></h3>
                    <p class="text-center">
                        <span class="overview-icon bg-danger"><i class="fa fa-times fg-times"></i></span>
                    </p>

                    <p class="text-center">
                        <b>Permohonan Ditolak</b>
                    </p>
                </div>
            </div>
        </div>

</div>

</section><!-- /#page-content -->