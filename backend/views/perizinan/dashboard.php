
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
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                    
                                      <h3 class="box-title">List yang di kerjakan</h3>
                                    </div><!-- /.box-header -->
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getApproval($plh_id))>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>'),
                                                    ['approv', 'action' => 'approval', 'status' => 'Lanjut']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
                                        <?php
                                        }
                                        ?> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Untuk Di Setujui  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getApproval($plh_id); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                <div class="col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getTolak($plh_id))>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>'),
                                                    ['approv', 'action' => 'approval', 'status' => 'Tolak']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
                                        <?php
                                        }
                                        ?> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Untuk Di Tolak  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getTolak($plh_id); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                 
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">List Details <?    ?></h3>
                        </div><!-- /.box-header -->
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getInNew())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-green-gradient"><i class="fa fa-envelope-o"></i></span>'),
                                                    ['baru']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-green-gradient"><i class="fa fa-envelope-o"></i></span>
                                        <?php
                                        }
                                        ?>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Baru  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getInNew(); ?></h1></strong></span>
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
                                
<!--                                <div class="col-md-3 col-sm-6 col-xs-12">
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
                                            <span class="info-box-number"><strong><h1><?php // Perizinan::getTolakAll(); ?></h1></strong></span>
                                        </div> /.info-box-content 
                                    </div> /.info-box 
                                </div> /.col -->
                                
                                
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Details Laporan Selesai</h3>
                        </div><!-- /.box-header -->
                    </div>
                    
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
                                            <span class="info-box-text">Lanjut Selesai  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getFinish(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getFinishTolak())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>'),
                                                    ['tolak-selesai']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>
                                        <?php
                                        }
                                        ?>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Tolak Selesai  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getFinishTolak(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <?php
                                            if((Perizinan::getBatal())>0)
                                            {
                                                echo Html::a(Yii::t(
                                                    'app',
                                                    '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'),
                                                    ['batal']
                                                );
                                            } else {
                                        ?>
                                        <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                                        <?php
                                        }
                                        ?> 
                                        <div class="info-box-content">
                                            <span class="info-box-text">Batal  :</span>
                                            <span class="info-box-number"><strong><h1><?= Perizinan::getBatal(); ?></h1></strong></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                </div>
            </div>
			
			
			<?php 
                        $izins = Perizinan::getDataPerizinan();
                        foreach($izins as $value){
							$text = str_replace(' ', '', $value['nama']);
							$pecah = explode('-',$text);
							
							if($pecah[1]=="KECAMATAN"){
								$kec_nama[] = $value['nama'];
								$kec_baru[] = $value['baru'];
								$kec_proses[] = $value['proses'];
								$kec_revisi[] = $value['revisi'];
								$kec_selesai[] = $value['selesai'];
								$kec_jumlah[] = $value['baru']+$value['proses']+$value['revisi']+$value['selesai'];
								$kec_id[] = $value['id'];	
							}elseif($pecah[1]=="KELURAHAN"){
								$kel_nama[] = $value['nama'];
								$kel_baru[] = $value['baru'];
								$kel_proses[] = $value['proses'];
								$kel_revisi[] = $value['revisi'];
								$kel_selesai[] = $value['selesai'];
								$kel_jumlah[] = $value['baru']+$value['proses']+$value['revisi']+$value['selesai'];	
								$kel_id[] = $value['id'];	
							}elseif(strpos($text,'KOTA')!== false){
								$kab_nama[] = $value['nama'];
								$kab_baru[] = $value['baru'];
								$kab_proses[] = $value['proses'];
								$kab_revisi[] = $value['revisi'];
								$kab_selesai[] = $value['selesai'];
								$kab_jumlah[] = $value['baru']+$value['proses']+$value['revisi']+$value['selesai'];
								$kab_id[] = $value['id'];
							}else{
								$prov_nama[] = $value['nama'];
								$prov_baru[] = $value['baru'];
								$prov_proses[] = $value['proses'];
								$prov_revisi[] = $value['revisi'];
								$prov_selesai[] = $value['selesai'];
								$prov_jumlah[] = $value['baru']+$value['proses']+$value['revisi']+$value['selesai'];
								$prov_id[] = $value['id'];	
							}
						
						}

						?>
		
		
		
        <div class="box-body">
          <div class="row">                  
          <div class="col-md-8">   
<?php
$jml_prov = count($prov_nama);
if($jml_prov>10){$scrol = "height:500px;";}else{$scrol = "";}
if($jml_prov){ 
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
			
				<div style="<?php echo$scrol;?>overflow-y:scroll;">
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
						$n=0;
						$i=1;
						
						while($jml_prov > $n){
									?>
						  <tr>
			
						  <td><?= $i; ?>  </td>
							<td><?= $prov_nama[$n];?></td>
							<td style="text-align: right"><?= $prov_baru[$n];?></td>
							<td style="text-align: right"><?= $prov_proses[$n];?></td>
							<td style="text-align: right"><?= $prov_revisi[$n];?></td>
							<td style="text-align: right"><?= $prov_selesai[$n];?></td>
							<td style="text-align: right"><?= $prov_jumlah[$n] ?></td>
							<td style="text-align: center">
								<?=
									Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi'=>$prov_id[$n]], ['class' => 'btn btn-open'])
								?>
							</td>
						  </tr>
						<?php $i++; $n++; } ?>

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
if($jml_kab>10){$scrol = "height:500px;";}else{$scrol = "";}
if($jml_kab){
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
						$n=0;
						$i=1;
						while($jml_kab > $n){
									?>
						  <tr>
			
						  <td><?= $i; ?>  </td>
							<td><?= $kab_nama[$n];?></td>
							<td style="text-align: right"><?= $kab_baru[$n];?></td>
							<td style="text-align: right"><?= $kab_proses[$n];?></td>
							<td style="text-align: right"><?= $kab_revisi[$n];?></td>
							<td style="text-align: right"><?= $kab_selesai[$n];?></td>
							<td style="text-align: right"><?= $kab_jumlah[$n] ?></td>
							<td style="text-align: center">
								<?=
									Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi'=>$kab_id[$n]], ['class' => 'btn btn-open'])
								?>
							</td>
						  </tr>
						<?php $i++; $n++; } ?>

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
if($jml_kec>10){$scrol = "height:500px;";}else{$scrol = "";}
if($jml_kec){
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
						$n=0;
						$i=1;
						while($jml_kec > $n){
									?>
						  <tr>
			
						  <td><?= $i; ?>  </td>
							<td><?= $kec_nama[$n];?></td>
							<td style="text-align: right"><?= $kec_baru[$n];?></td>
							<td style="text-align: right"><?= $kec_proses[$n];?></td>
							<td style="text-align: right"><?= $kec_revisi[$n];?></td>
							<td style="text-align: right"><?= $kec_selesai[$n];?></td>
							<td style="text-align: right"><?= $kec_jumlah[$n] ?></td>
							<td style="text-align: center">
								<?=
									Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi'=>$kec_id[$n]], ['class' => 'btn btn-open'])
								?>
							</td>
						  </tr>
						<?php $i++; $n++; } ?>

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
if($jml_kel>10){$scrol = "height:500px;";}else{$scrol = "";}
if($jml_kel){
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
						$n=0;
						$i=1;
						
						while($jml_kel > $n){
									?>
						  <tr>
			
						  <td><?= $i; ?>  </td>
							<td><?= $kel_nama[$n];?></td>
							<td style="text-align: right"><?= $kel_baru[$n];?></td>
							<td style="text-align: right"><?= $kel_proses[$n];?></td>
							<td style="text-align: right"><?= $kel_revisi[$n];?></td>
							<td style="text-align: right"><?= $kel_selesai[$n];?></td>
							<td style="text-align: right"><?= $kel_jumlah[$n] ?></td>
							<td style="text-align: center">
								<?=
									Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi'=>$kel_id[$n]], ['class' => 'btn btn-open'])
								?>
							</td>
						  </tr>
						<?php $i++; $n++; } ?>

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
					  
					  
					  <!-- Info Boxes Style 2 -->
					  <div class="info-box bg-red">
						  <?php
							if((Perizinan::getEtaRed2())>0)
							{
								echo Html::a(Yii::t(
									'app',
									'<span class="info-box-icon"><i class="fa fa-warning"></i></span>'),
									['eta','status'=>'Red2']
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


