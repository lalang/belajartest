
<?php

use backend\models\Perizinan;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "Statistik | PTSP DKI";
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text"></i>
                        <h3 class="box-title">List Details</h3>
                    </div><!-- /.box-header -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        $x1 = Perizinan::getInNew();
                        if ($x1 > 0) {
                            echo Html::a(Yii::t(
                            'app', '<span class="info-box-icon bg-green-gradient"><i class="fa fa-envelope-o"></i></span>'), ['baru']
                            );
                        } else {
                            ?>
                            <span class="info-box-icon bg-green-gradient"><i class="fa fa-envelope-o"></i></span>
                            <?php
                        }
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Baru  :</span>
                            <span class="info-box-number"><?= Perizinan::getInNewPersen(); ?><small>%</small></span>
                            <span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= $x1; ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        $x2 = Perizinan::getInProses();
                        if ($x2 > 0) {
                            echo Html::a(Yii::t(
                            'app', '<span class="info-box-icon bg-aqua"><i class="fa fa-cogs"></i></span>'), ['proses']
                            );
                        } else {
                            ?>
                            <span class="info-box-icon bg-aqua"><i class="fa fa-cogs"></i></span>
                            <?php
                        }
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Dalam Proses  :</span>
                            <span class="info-box-number"><?= Perizinan::getInProsesPersen(); ?><small>%</small></span>
                            <span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= $x2; ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        $x3 = Perizinan::getRevisi();
                        if ($x3 > 0) {
                            echo Html::a(Yii::t(
                            'app', '<span class="info-box-icon bg-yellow"><i class="fa fa-eye"></i></span>'), ['revisi']
                            );
                        } else {
                            ?>
                            <span class="info-box-icon bg-yellow"><i class="fa fa-eye"></i></span>
                            <?php
                        }
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Revisi  :</span>
                            <span class="info-box-number"><?= Perizinan::getRevisiPersen(); ?><small>%</small></span>
                            <span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= $x3; ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-hand-paper-o" aria-hidden="true"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Selesai  :</span>
                            <span class="info-box-text" style='font: bold 40px Georgia, serif;'><?= Perizinan::getFinishTotal(); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <!--                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="info-box">
                <?php
                /*
                $x4 = Perizinan::getTolakAll();
                if ($x4 > 0) {
                    echo Html::a(Yii::t(
                    'app', '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'), ['tolak']
                    );
                } else {
                    ?>
                    <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                    <?php
                }
                */
                ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Tolak  :</span>
                            <span class="info-box-number"><strong><h1><?php // echo $x4;  ?></h1></strong></span>
                        </div> /.info-box-content
                    </div> /.info-box
                </div> /.col -->
            </div>
            <div class="box-body">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text"></i>
                        <h3 class="box-title">Details Laporan Selesai</h3>
                    </div><!-- /.box-header -->
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        $x5 = Perizinan::getFinish();
                        if ($x5 > 0) {
                            echo Html::a(Yii::t(
                            'app', '<span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>'), ['selesai']
                            );
                        } else {
                            ?>
                            <span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>
                            <?php
                        }
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Lanjut Selesai  :</span>
                            <span class="info-box-number"><?= Perizinan::getFinishPersen(); ?><small>%</small></span>
                            <span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= $x5; ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        $x6 = Perizinan::getFinishTolak();
                        if ($x6 > 0) {
                            echo Html::a(Yii::t(
                            'app', '<span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>'), ['tolak-selesai']
                            );
                        } else {
                            ?>
                            <span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>
                            <?php
                        }
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Tolak Selesai  :</span>
                            <span class="info-box-number"><?= Perizinan::getFinishTolakPersen(); ?><small>%</small></span>
                            <span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= $x6; ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        $x7 = Perizinan::getBatal();
                        if ($x7 > 0) {
                            echo Html::a(Yii::t(
                            'app', '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'), ['batal']
                            );
                        } else {
                            ?>
                            <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                            <?php
                        }
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Batal  :</span>
                            <span class="info-box-number"><?= Perizinan::getBatalPersen(); ?><small>%</small></span>
                            <span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= $x7; ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
            </div>

            <div class="row">
                <div class="box-body">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red ">
                            <?php
                            $x8 = Perizinan::getEtaRed();
                            if ($x8 > 0) {
                                echo Html::a(Yii::t(
                                'app', '<span class="info-box-icon"><i class="fa fa-warning"></i></span>'), ['eta', 'status' => 'Red']
                                );
                            } else {
                                ?>
                                <span class="info-box-icon"><i class="fa fa-warning"></i></span>
                                <?php
                            }
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text"></span>
                                <span class="info-box-number"><?= $x8; ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width:<?= $x8; ?>%"></div>
                                </div>
                                <span class="progress-description" style="word-wrap: break-word;">
                                    Proses yang melebihi ETA
                                </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                            <?php
                            $x9 = Perizinan::getEtaRed2();
                            if ($x9 > 0) {
                                echo Html::a(Yii::t(
                                'app', '<span class="info-box-icon"><i class="fa fa-warning"></i></span>'), ['eta', 'status' => 'Red2']
                                );
                            } else {
                                ?>
                                <span class="info-box-icon"><i class="fa fa-warning"></i></span>
                                <?php
                            }
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text"></span>
                                <span class="info-box-number"><?= $x9; ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width:<?= $x9; ?>%"></div>
                                </div>
                                <span class="progress-description">
                                    Pemohon yang melebihi ETA
                                </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <?php
                            $x10 = Perizinan::getEtaYellow();
                            if ($x10 > 0) {
                                echo Html::a(Yii::t(
                                'app', '<span class="info-box-icon"><i class="fa fa-bell"></i></span>'), ['eta', 'status' => 'Yellow']
                                );
                            } else {
                                ?>
                                <span class="info-box-icon"><i class="fa fa-bell"></i></span>
                                <?php
                            }
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text"></span>
                                <span class="info-box-number"><?= $x10; ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: <?= $x10; ?>%"></div>
                                </div>
                                <span class="progress-description">
                                    Proses yang mendekati ETA
                                </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                            <?php
                            $x11 = Perizinan::getEtaGreen();
                            if ($x11 > 0) {
                                echo Html::a(Yii::t(
                                'app', '<span class="info-box-icon"><i class="fa fa-flag fa-2"></i></span>'), ['eta', 'status' => 'Green']
                                );
                            } else {
                                ?>
                                <span class="info-box-icon"><i class="fa fa-flag fa-2"></i></span>
                                <?php
                            }
                            ?>

                            <div class="info-box-content">
                                <span class="info-box-text"></span>
                                <span class="info-box-number"><?= $x11; ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width:<?= $x11; ?>%"></div>
                                </div>
                                <span class="progress-description">
                                    Proses yang sesuai ETA
                                </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                </div>
            </div>

        </div><!-- /.box-header -->

        <?php
        $izins = Perizinan::getDataPerizinan();
        foreach ($izins as $value) {
            $text = str_replace(' ', '', $value['nama']);
            $pecah = explode('-', $text);

            if ($pecah[1] == "KECAMATAN") {
                $kec_nama[] = $value['nama'];
                $kec_baru[] = $value['baru'];
                $kec_proses[] = $value['proses'];
                $kec_revisi[] = $value['revisi'];
                $kec_selesai[] = $value['selesai'];
                $kec_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                $kec_id[] = $value['id'];
            } elseif ($pecah[1] == "KELURAHAN") {
                $kel_nama[] = $value['nama'];
                $kel_baru[] = $value['baru'];
                $kel_proses[] = $value['proses'];
                $kel_revisi[] = $value['revisi'];
                $kel_selesai[] = $value['selesai'];
                $kel_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                $kel_id[] = $value['id'];
            } elseif (strpos($text, 'KOTA') !== false) {
                $kab_nama[] = $value['nama'];
                $kab_baru[] = $value['baru'];
                $kab_proses[] = $value['proses'];
                $kab_revisi[] = $value['revisi'];
                $kab_selesai[] = $value['selesai'];
                $kab_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                $kab_id[] = $value['id'];
            } else {
                $prov_nama[] = $value['nama'];
                $prov_baru[] = $value['baru'];
                $prov_proses[] = $value['proses'];
                $prov_revisi[] = $value['revisi'];
                $prov_selesai[] = $value['selesai'];
                $prov_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                $prov_id[] = $value['id'];
            }
        }
        ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $jml_prov = count($prov_nama);
                    if ($jml_prov > 10) {
                        $scrol = "height:500px;";
                    } else {
                        $scrol = "";
                    }
                    if ($jml_prov) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Statistik Propinsi</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                        <div style="<?php echo $scrol; ?> overflow-y:scroll;">
                                            <div bgcolor="white" >
                                                <div class="table-responsive">
                                                    <table class="table no-margin" bgcolor="white">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Daerah</th>
                                                                <th style="text-align: center">Lihat Data</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $n = 0;
                                                            $i = 1;

                                                            while ($jml_prov > $n) {
                                                                ?>
                                                                <tr>

                                                                    <td><?= $i; ?>  </td>
                                                                    <td><?= $prov_nama[$n]; ?></td>
                                                                    <td style="text-align: right"><?= $prov_baru[$n]; ?></td>
                                                                    <td style="text-align: center">
                                                                        <?=
                                                                        Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $prov_id[$n]], ['class' => 'btn btn-open'])
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                $n++;
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.box-body -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $jml_kab = count($kab_nama);
                    if ($jml_kab > 10) {
                        $scrol = "height:500px;";
                    } else {
                        $scrol = "";
                    }
                    if ($jml_kab) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Statistik Kabupaten/ Kota</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                        <div style="<?php echo $scrol; ?> overflow-y:scroll;">
                                            <div bgcolor="white" >
                                                <div class="table-responsive">
                                                    <table class="table no-margin" bgcolor="white">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Daerah</th>
                                                                <th style="text-align: center">Lihat Data</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $n = 0;
                                                            $i = 1;
                                                            while ($jml_kab > $n) {
                                                                ?>
                                                                <tr>

                                                                    <td><?= $i; ?>  </td>
                                                                    <td><?= $kab_nama[$n]; ?></td>
                                                                    <td style="text-align: center">
                                                                        <?=
                                                                        Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $kab_id[$n]], ['class' => 'btn btn-open'])
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                $n++;
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.box-body -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $jml_kec = count($kec_nama);
                    if ($jml_kec > 10) {
                        $scrol = "height:430px;";
                    } else {
                        $scrol = "";
                    }
                    if ($jml_kec) {
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Statistik Kecamatan</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                        <div style="<?php echo $scrol; ?> overflow-y:scroll;">
                                            <div bgcolor="white" >
                                                <div class="table-responsive">
                                                    <table class="table no-margin" bgcolor="white">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Daerah</th>
                                                                <th style="text-align: center">Lihat Data</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $n = 0;
                                                            $i = 1;
                                                            while ($jml_kec > $n) {
                                                                ?>
                                                                <tr>

                                                                    <td><?= $i; ?>  </td>
                                                                    <td><?= $kec_nama[$n]; ?></td>
                                                                    <td style="text-align: center">
                                                                        <?=
                                                                        Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $kec_id[$n]], ['class' => 'btn btn-open'])
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                $n++;
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.box-body -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--</div>-->
                        <?php } ?>
                        <?php
                        $jml_kel = count($kel_nama);
                        if ($jml_kel > 10) {
                            $scrol = "height:445px;";
                        } else {
                            $scrol = "";
                        }
                        if ($jml_kel) {
                            ?>
                            <!--<div class="row">-->
                            <div class="col-md-6">
                                <div class="box">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Statistik Kelurahan</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                        <div style="<?php echo $scrol; ?> overflow-y:scroll;">
                                            <div bgcolor="white" >
                                                <div class="table-responsive">
                                                    <table class="table no-margin" bgcolor="white">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Daerah</th>
                                                                <th style="text-align: center">Lihat Data</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $n = 0;
                                                            $i = 1;

                                                            while ($jml_kel > $n) {
                                                                ?>
                                                                <tr>

                                                                    <td><?= $i; ?>  </td>
                                                                    <td><?= $kel_nama[$n]; ?></td>
                                                                    <td style="text-align: center">
                                                                        <?=
                                                                        Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $kel_id[$n]], ['class' => 'btn btn-open'])
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                $n++;
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.box-body -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div><!-- /.box -->
        </div>

    </div>
</div>


