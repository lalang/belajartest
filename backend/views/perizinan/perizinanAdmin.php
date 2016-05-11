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

            </div>
        </div>
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
                    <a href="print-laporan" target='_blank' class="small-box-footer">TDP Reguler Dan SIUP - TDP Simultan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- e: small box -->
			</div>	
			
		</div>	

        <div class="row">		
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text"></i>
                        <h3 class="box-title">List Details</h3>
                    </div><!-- /.box-header -->
                </div>
                <div class="box-body">
                    <div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <?php
                                if ((Perizinan::getInDaftar()) > 0) {
                                    echo Html::a(Yii::t(
                                                    'app', '<span class="info-box-icon bg-green-gradient"><i class="fa fa-paper-plane" aria-hidden="true"></i>
</span>'), ['baruadmin']
                                    );
                                } else {
                                    ?>
                                    <span class="info-box-icon bg-green-gradient"><i class="fa fa-paper-plane" aria-hidden="true"></i>
</span>
                                    <?php
                                }
                                ?>
								<div class="info-box-content">
                                    <span class="info-box-text">Daftar  :</span>
									<span class="info-box-text" style='font: bold 40px Georgia, serif;'><?= Perizinan::getInDaftar(); ?></span>
                                </div><!-- /.info-box-content -->
								
								
								
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
						
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <?php
                                if ((Perizinan::getInNew()) > 0) {
                                    echo Html::a(Yii::t(
                                                    'app', '<span class="info-box-icon bg-green-gradient"><i class="fa fa-envelope-o"></i></span>'), ['baruadmin']
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
									<span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= Perizinan::getInNew(); ?></span>
                                </div><!-- /.info-box-content -->
								
								
								
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <?php
                                if ((Perizinan::getInProses()) > 0) {
                                    echo Html::a(Yii::t(
                                                    'app', '<span class="info-box-icon bg-aqua"><i class="fa fa-mail-forward"></i></span>'), ['prosesadmin']
                                    );
                                } else {
                                    ?>
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-mail-forward"></i></span>
                                    <?php
                                }
                                ?>
                                <div class="info-box-content">
                                    <span class="info-box-text">Proses  :</span>
									<span class="info-box-number"><?= Perizinan::getInProsesPersen(); ?><small>%</small></span>
									<span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= Perizinan::getInProses(); ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <?php
                                if ((Perizinan::getRevisi()) > 0) {
                                    echo Html::a(Yii::t(
                                                    'app', '<span class="info-box-icon bg-yellow"><i class="fa fa-mail-reply"></i></span>'), ['revisiadmin']
                                    );
                                } else {
                                    ?>
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-mail-reply"></i></span>
                                    <?php
                                }
                                ?> 
                                <div class="info-box-content">
                                    <span class="info-box-text">Revisi  :</span>
									<span class="info-box-number"><?= Perizinan::getRevisiPersen(); ?><small>%</small></span>
									<span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= Perizinan::getRevisi(); ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
						
						
						<div class="col-sm-4 col-sm-6 col-xs-12">	
							 <!-- s: small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3><?= Perizinan::getFinishTotal(); ?></h3>
									<span class="info-box-number">TOTAL SELESAI</span>
								</div>
								<div class="icon">
									<i class="fa fa-hand-paper-o" aria-hidden="true"></i>
								</div>												
								<span class="small-box-footer"></span>
							</div>
							<!-- e: small box -->
						</div>
                        <!--                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                                                <div class="info-box">
                        <?php
                        if ((Perizinan::getTolakAll()) > 0) {
                            echo Html::a(Yii::t(
                                            'app', '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'), ['tolak']
                            );
                        } else {
                            ?>
                                                                                                                    <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                            <?php
                        }
                        ?> 
                                                                                                        <div class="info-box-content">
                                                                                                                <span class="info-box-text">Tolak  :</span>
                                                                                                                <span class="info-box-number"><strong><h1><?php // Perizinan::getTolakAll();   ?></h1></strong></span>
                                                                                                        </div> /.info-box-content 
                                                                                                </div> /.info-box 
                                                                                        </div> /.col -->


                    </div>
                </div>

            </div>
             
        </div>

        <div class="box-body">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text"></i>
                        <h3 class="box-title">Details Laporan Selesai</h3>
                    </div><!-- /.box-header -->
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        if ((Perizinan::getFinish()) > 0) {
                            echo Html::a(Yii::t(
                                            'app', '<span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>'), ['selesaiadmin']
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
							<span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= Perizinan::getFinish(); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        if ((Perizinan::getFinishTolak()) > 0) {
                            echo Html::a(Yii::t(
                                            'app', '<span class="info-box-icon bg-red"><i class="fa fa-ban" aria-hidden="true"></i></span>'), ['tolak-selesaiadmin']
                            );
                        } else {
                            ?>
                            <span class="info-box-icon bg-red"><i class="fa fa-ban" aria-hidden="true"></i></span>
                            <?php
                        }
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Tolak Selesai  :</span>
							<span class="info-box-number"><?= Perizinan::getFinishTolakPersen(); ?><small>%</small></span>
							<span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= Perizinan::getFinishTolak(); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <?php
                        if ((Perizinan::getBatal()) > 0) {
                            echo Html::a(Yii::t(
                                            'app', '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'), ['bataladmin']
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
							<span class="info-box-text" style='font: bold 30px Georgia, serif;'><?= Perizinan::getBatal(); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

            </div>
        </div>
        
        <?php
        $izins = Perizinan::getDataPerizinanAdmin();

        foreach ($izins as $value) {
            $text = str_replace(' ', '', $value['nama']);
            $pecah = explode('-', $text);

                            if ($pecah[1] == "KECAMATAN") {
                               $kec_nama[] = $value['nama'];
                                $kec_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $kec_id[] = $value['id'];
                            } elseif ($pecah[1] == "KELURAHAN") {
                                $kel_nama[] = $value['nama'];
                                $kel_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $kel_id[] = $value['id'];
                        } elseif (strpos($text, 'KOTA') !==FALSE || strpos($text, 'KABUPATEN') !==FALSE) {
                                $kab_nama[] = $value['nama'];
                                $kab_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $kab_id[] = $value['id'];
                            } else {
                                $prov_nama[] = $value['nama'];
                                $prov_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $prov_id[] = $value['id'];
                            }
                        }
                        ?>



        <div class="box-body">
            <div class="row">                  
                <div class="col-md-8">   
        <?php
        $jml_prov = count($prov_nama);
        
        if ($jml_prov > 10) {
            $scrol = "height:500px;";
        } else {
            $scrol = "";
        }
//        if ($jml_prov) {
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

                                        <div style="<?php echo$scrol; ?>overflow-y:scroll;">
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
                                                                <?php // } ?>
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

                                        <div style="<?php echo$scrol; ?>overflow-y:scroll;">
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
                        $scrol = "height:500px;";
                    } else {
                        $scrol = "";
                    }
                    if ($jml_kec) {
                        ?>		
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Statistik Kecamatan</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                        <div style="<?php echo$scrol; ?>overflow-y:scroll;">
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
                        </div>		
                    <?php } ?>		
                    <?php
                    $jml_kel = count($kel_nama);
                    if ($jml_kel > 10) {
                        $scrol = "height:500px;";
                    } else {
                        $scrol = "";
                    }
                    if ($jml_kel) {
                        ?>		
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Statistik Kelurahan</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                        <div style="<?php echo$scrol; ?>overflow-y:scroll;">
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
                <div class="col-md-4">

                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-red">
                        <?php
                        if ((Perizinan::getEtaRed()) > 0) {
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
                            <span class="info-box-number"><?= Perizinan::getEtaRed(); ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width:<?= Perizinan::getEtaRed(); ?>%"></div>
                            </div>
                            <span class="progress-description">
                                Proses yang melebihi ETA
                            </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    <div class="info-box bg-red">
                        <?php
                        if ((Perizinan::getEtaRed2()) > 0) {
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
                            <span class="info-box-number"><?= Perizinan::getEtaRed2(); ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width:<?= Perizinan::getEtaRed2(); ?>%"></div>
                            </div>
                            <span class="progress-description">
                                Pemohon yang melebihi ETA
                            </span>
                        </div><!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-yellow">
                        <?php
                        if ((Perizinan::getEtaYellow()) > 0) {
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
                            <span class="info-box-number"><?= Perizinan::getEtaYellow(); ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?= Perizinan::getEtaYellow(); ?>%"></div>
                            </div>
                            <span class="progress-description">
                                Proses yang mendekati ETA
                            </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    <div class="info-box bg-green">
                        <?php
                        if ((Perizinan::getEtaGreen()) > 0) {
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
                            <span class="info-box-number"><?= Perizinan::getEtaGreen(); ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width:<?= Perizinan::getEtaGreen(); ?>%"></div>
                            </div>
                            <span class="progress-description">
                                Proses yang sesuai ETA
                            </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->

                </div><!-- /.box-body -->


            </div><!-- /.box -->
        </div>

    </div>
</div>
</div>
</div>

</div>


