
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
                             case 5: //Kepala
                                ?>
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getApproval())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>'),
                                                    ['index', 'status' => 'approval']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
                                        <?php
                                        }
                                        ?> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Baru  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getApproval(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                 <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getInProses())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-aqua"><i class="fa fa-mail-forward"></i></span>'),
                                                    ['proses']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-aqua"><i class="fa fa-mail-forward"></i></span>
                                        <?php
                                        }
                                        ?>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Dalam Proses  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getInProses(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                 <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getRevisi())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-yellow"><i class="fa fa-mail-reply"></i></span>'),
                                                    ['revisi']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-yellow"><i class="fa fa-mail-reply"></i></span>
                                        <?php
                                        }
                                        ?> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Revisi  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getRevisi(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                 <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getFinish())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>'),
                                                    ['selesai']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>
                                        <?php
                                        }
                                        ?>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Selesai  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getFinish(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getTolakAll())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'),
                                                    ['tolak']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                                        <?php
                                        }
                                        ?> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Tolak  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getTolakAll(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                </div>
            </div>
        <div class="box-body">
          <div class="row">                  
          <div class="col-md-8">   
        
          <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Perizinan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div style="height:500px;overflow-y:scroll;">
                <div bgcolor="white" >
                  <div class="table-responsive">
                    <table class="table no-margin" bgcolor="white">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Daerah</th>
                          <th style="text-align: right">Baru</th>
                          <th style="text-align: right">Dalam Proses</th>
                          <th style="text-align: right">Revisi</th>
                          <th style="text-align: right">Selesai</th>
                          <th style="text-align: right">Jumlah</th>
                          <th></th>
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
                            <td style="text-align: right"><?= $value['baru'];?></td>
                            <td style="text-align: right"><?= $value['proses'];?></td>
                            <td style="text-align: right"><?= $value['revisi'];?></td>
                            <td style="text-align: right"><?= $value['selesai'];?></td>
                            <td style="text-align: right"><?= $value['baru']+$value['proses']+$value['revisi']+$value['selesai'] ?></td>
                            <td style="text-align: center">
                                <?=
                                    Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'id'=>$value['id']], ['class' => 'btn btn-open'])
                                ?>
                            </td>
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
                  <?php
                    if((Perizinan::getEtaRed())>0)
                    {
                        echo Html::a(Yii::t(
                            'app',
                            '<span class="info-box-icon"><i class="fa fa-warning"></i></span>'),
                            ['eta','status'=>'Red']
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
                    Permohonan yang melebihi ETA
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-yellow">
                  <?php
                    if((Perizinan::getEtaYellow())>0)
                    {
                        echo Html::a(Yii::t(
                            'app',
                            '<span class="info-box-icon"><i class="fa fa-bell"></i></span>'),
                            ['eta','status'=>'Yellow']
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
                  Permohonan yang mendekati ETA
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-green">
                <?php
                    if((Perizinan::getEtaGreen())>0)
                    {
                        echo Html::a(Yii::t(
                            'app',
                            '<span class="info-box-icon"><i class="fa fa-flag fa-2"></i></span>'),
                            ['eta','status'=>'Green']
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


