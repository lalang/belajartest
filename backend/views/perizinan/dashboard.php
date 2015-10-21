
<?php

use backend\models\Perizinan;
use yii\helpers\Url;

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
                            case 4: //Tim Teknis
                                ?>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="<?= Url::to(['perizinan/index']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span></a> 
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
                                        <a href="<?= Url::to(['perizinan/index']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span></a> 
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
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="<?= Url::to(['perizinan/index']) ?>"><span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span></a> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Baru  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getApproval(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                 <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="<?= Url::to(['perizinan/index']) ?>"><span class="info-box-icon bg-aqua"><i class="fa fa-mail-forward"></i></span></a> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Dalam Proses  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getInProses(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                 <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="<?= Url::to(['perizinan/index']) ?>"><span class="info-box-icon bg-yellow"><i class="fa fa-mail-reply"></i></span></a> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Revisi  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getRevisi(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                 <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="<?= Url::to(['perizinan/index']) ?>"><span class="info-box-icon bg-red"><i class="fa fa-check"></i></span></a> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Selesai  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getFinish(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                        
                                
          <div class="col-md-8">   
        
          <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Perizinan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div style="height:200px;overflow-y:scroll;">
                <div bgcolor="white" >
                  <div class="table-responsive">
                    <table class="table no-margin" bgcolor="white">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Daerah</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        $izins = Perizinan::getDataPerizinan();
                                foreach($izins as $value){
                                    ?>
                          <tr>
                          <td><?= $i++; ?>  </td>
                          <td><?= $value['nama'];?></td>
                          <td><?= $value['jumlah'];?></td>
                        </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                </div>
              </div>
              </div>
                 <div class="col-md-4">
             
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-warning"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="info-box-number"><?= Perizinan::getEtaRed(); ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width:<?= Perizinan::getEtaRed(); ?>%"></div>
                  </div>
                  <span class="progress-description">
                    Permohonan yang melebihi ETA
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-bell"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="info-box-number"><?= Perizinan::getEtaYellow(); ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?= Perizinan::getEtaYellow(); ?>%"></div>
                  </div>
                  <span class="progress-description">
                  Permohonan yang mendekati ETA
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-flag fa-2"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="info-box-number"><?= Perizinan::getEtaGreen(); ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width:<?= Perizinan::getEtaGreen(); ?>%"></div>
                  </div>
                  <span class="progress-description">
                    Permohonan yang masih sesuai ETA
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
         
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


