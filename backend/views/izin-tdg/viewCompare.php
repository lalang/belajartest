<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;

$session = Yii::$app->session;
$session->set('izin_id',$model->izin_id);

//use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss('.form-horizontal .control-label{
  /* text-align:right; */
  text-align:left;
 
}');

?>
<style>
form .form-group .control-label {
    font-size: 14px;
    font-weight: 600;
    min-width: 200px;
    padding-top: 10px;
}
.nav>li>a:focus, .nav>li>a:hover {
    background:none;    
}
</style>

<script src="/js/jquery.min.js"></script>


					<?php						
						$koordinat_1 = $model->gudang_koordinat_1;
						$koordinat_2 = $model->gudang_koordinat_2;
					?>


					<div class="tdg-form" style='margin-top:-40px;'>
					
					
					<div class="clearfix">&nbsp;</div>
					
						<!-- Custom Tabs -->
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Identitas Pemilik/Pengurus</a></li>
								<li><a href="#tab_2" data-toggle="tab">Identitas Perusahaan</a></li>
								<li><a href="#tab_3" data-toggle="tab">Identitas Gudang</a></li>
								<li><a href="#tab_4" data-toggle="tab">Identitas Lain</a></li>
							</ul>
							<div id="result"></div>

							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<div class="panel panel-primary">
										<div class="panel-heading">Identitas Pemilik/Pengurus</div>

									
									<div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3">
												<b>Nik:</b> 
												<?= $model->pemilik_nik; ?>
											</div>
											<div class="col-md-3">	
												<b>Paspor:</b> 
												<?= $model->pemilik_paspor; ?>
											</div>
											<div class="col-md-3">	
												<b>Kitas:</b> 
												<?= $model->pemilik_kitas; ?>
											</div>
											<div class="col-md-3">	
												<b>Nama:</b> 
												<?= $model->pemilik_nama; ?>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-12">
												<b>Alamat:</b> 
												<?= $model->pemilik_alamat; ?>
											</div>
										</div>	
										<div class="row">
                                            <div class="col-md-6">
												<b>Propinsi:</b> 
												<?php 
												$dataProv = \backend\models\Lokasi::getLokasi($model->pemilik_propinsi);
												echo $dataProv['nama'];
												?>
											</div>
											<div class="col-md-6">
												<b>Propinsi:</b> 
												<?php 
												$dataProv = \backend\models\Lokasi::getLokasi($model->pemilik_kabupaten);
												echo $dataProv['nama'];
												?>
											</div>
										</div>	

										<div class="row">
                                            <div class="col-md-6">
												<b>Kecamatan:</b> 
												<?php 
												$dataProv = \backend\models\Lokasi::getLokasi($model->pemilik_kecamatan);
												echo $dataProv['nama'];
												?>
											</div>
											 <div class="col-md-6">
												<b>Kelurahan:</b> 
												<?php 
												$dataProv = \backend\models\Lokasi::getLokasi($model->pemilik_kelurahan);
												echo $dataProv['nama'];
												?>
											</div>
										</div>		

										<div class="row">
											<div class="col-md-3">
												<b>Kodepos:</b> 
												<?= $model->pemilik_kodepos; ?>
											</div>
											<div class="col-md-3">
												<b>Telepon:</b> 
												<?= $model->pemilik_telepon; ?>
											</div>
											<div class="col-md-3">
												<b>Fax:</b> 
												<?= $model->pemilik_fax; ?>
											</div>
											<div class="col-md-3">
												<b>Email:</b> 
												<?= $model->pemilik_email; ?>
											</div>	
										</div>
									</div>	
								</div>
								</div>
								<div class="tab-pane" id="tab_2">
									<div class="panel panel-primary">
										<div class="panel-heading">Identitas Perusahaan</div>
										<div class="panel-body">
											<div class="row">		
												<div class="col-sm-6">
													<div class="alert alert-warning">
													<h5>Data Asli Pemohon</h5>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="alert alert-success">
													<h5>Data Hasil Survei</h5>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>NPWP Perusahaan:</b> 
													<?= $model->perusahaan_npwp; ?>
												</div>
												<div class="col-md-6">
													
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Nama Perusahaan:</b> 
													<?= $model->perusahaan_nama; ?>
												</div>
												<div class="col-md-6">
													
												</div>
											</div>											
											<div class="row">		
												<div class="col-md-6">
													<b>Nama Gedung:</b> 
													<?= $model->perusahaan_namagedung; ?>
												</div>	
												<div class="col-md-6">
													<b>Nama Gedung:</b> 
													<?= $model->hs_per_namagedung; ?>
												</div>	
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Blok Lantai:</b> 
													<?= $model->perusahaan_blok_lantai; ?>
												</div>
												<div class="col-md-6">
													<b>Blok Lantai:</b> 
													<?= $model->hs_per_blok_lantai; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Nama Jalan:</b> 
													<?= $model->perusahaan_namajalan; ?>
												</div>
												<div class="col-md-6">
													<b>Nama Jalan:</b> 
													<?= $model->hs_per_namajalan; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Propinsi:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->perusahaan_propinsi);
													echo $dataProv['nama'];
													?>
												</div>
												<div class="col-md-6">
													<b>Propinsi:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->hs_per_propinsi);
													echo $dataProv['nama'];
													?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Kabupaten/ Kota:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->perusahaan_kabupaten);
													echo $dataProv['nama'];
													?>
												</div>
												<div class="col-md-6">
													<b>Kabupaten/ Kota:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->hs_per_kabupaten);
													echo $dataProv['nama'];
													?>
												</div>
											</div>	
											<div class="row">
												<div class="col-md-6">
													<b>Kecamatan:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->perusahaan_kecamatan);
													echo $dataProv['nama'];
													?>
												</div>
												<div class="col-md-6">
													<b>Kecamatan:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->hs_per_kecamatan);
													echo $dataProv['nama'];
													?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Kelurahan:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->perusahaan_kelurahan);
													echo $dataProv['nama'];
													?>
												</div>
												<div class="col-md-6">
													<b>Kelurahan:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->hs_per_kelurahan);
													echo $dataProv['nama'];
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Kodepos:</b> 
													<?= $model->perusahaan_kodepos; ?>
												</div>
												<div class="col-md-6">

												</div>
											</div>
											<div class="row">		
												<div class="col-md-3">
													<b>Telepon:</b> 
													<?= $model->perusahaan_telepon; ?>
												</div>
												<div class="col-md-3">

												</div>
											</div>
											<div class="row">	
												<div class="col-md-3">
													<b>Fax:</b> 
													<?= $model->perusahaan_fax; ?>
												</div>
												<div class="col-md-3">

												</div>
											</div>
											<div class="row">		
												<div class="col-md-3">
													<b>Email:</b> 
													<?= $model->perusahaan_email; ?>
												</div>	
												<div class="col-md-3">

												</div>
											</div>
										</div>
									</div>	
								</div>
								<div class="tab-pane" id="tab_3">
									<div class="panel panel-primary">
										<div class="panel-heading">Identitas Gudang</div>
										<div class="panel-body">
											<div class="row">		
												<div class="col-sm-6">
													<div class="alert alert-warning">
													<h5>Data Asli Pemohon</h5>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="alert alert-success">
													<h5>Data Hasil Survei</h5>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Koordinat:</b> 
													<?php
													echo DECtoDMS($model->gudang_koordinat_1, $model->gudang_koordinat_2);
													?>
												</div>
												<div class="col-md-6">
													<b>Koordinat:</b> 
													<?php
													echo DECtoDMS($model->hs_koordinat_1, $model->hs_koordinat_2);
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Nama Gedung/ Komplek:</b> 
													<?= $model->gudang_namagedung; ?>
												</div>
												<div class="col-md-6">
													<b>Nama Gedung/ Komplek:</b> 
													<?= $model->hs_namagedung; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Blok/ Lantai:</b> 
													<?= $model->gudang_blok_lantai; ?>
												</div>
												<div class="col-md-6">
													<b>Blok/ Lantai:</b> 
													<?= $model->hs_blok_lantai; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Nama Jalan:</b> 
													<?= $model->gudang_namajalan; ?>
												</div>
												<div class="col-md-6">
													<b>Nama Jalan:</b> 
													<?= $model->hs_namajalan; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>RT:</b> 
													<?= $model->gudang_rt; ?>
												</div>
												<div class="col-md-6">
													<b>RT:</b> 
													<?= $model->hs_rt; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>RW:</b> 
													<?= $model->gudang_rw; ?>
												</div>
												<div class="col-md-6">
													<b>RW:</b> 
													<?= $model->hs_rw; ?>
												</div>
											</div>
											<div class="row">		
												<div class="col-md-6">
													<b>Propinsi:</b> 
													<?= $model->gudang_propinsi; ?>
												</div>
												<div class="col-md-6">
													<b>Propinsi:</b> 
													<?= $model->hs_propinsi; ?>
												</div>
											</div>
											<div class="row">		
												<div class="col-md-6">	
													<b>Kabupaten/ Kota:</b> 
													<?= $model->gudang_kabupaten; ?>
												</div>
												<div class="col-md-6">	
													<b>Kabupaten/ Kota:</b> 
													<?= $model->hs_kabupaten; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Kecamatan:</b> 
													<?= $model->gudang_kecamatan; ?>
												</div>
												<div class="col-md-6">
													<b>Kecamatan:</b> 
													<?= $model->hs_kecamatan; ?>
												</div>
											</div>
											<div class="row">		
												<div class="col-md-6">
													<b>Kelurahan:</b> 
													<?= $model->gudang_kelurahan; ?>
												</div>
												<div class="col-md-6">
													<b>Kelurahan:</b> 
													<?= $model->hs_kelurahan; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Kodepos:</b> 
													<?= $model->gudang_kodepos; ?>
												</div>
												<div class="col-md-6">
													<b>Kodepos:</b> 
													<?= $model->hs_kodepos; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Telepon:</b> 
													<?= $model->gudang_telepon; ?>
												</div>
												<div class="col-md-6">
													<b>Telepon:</b> 
													<?= $model->hs_telepon; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Fax:</b> 
													<?= $model->gudang_fax; ?>
												</div>
												<div class="col-md-6">
													<b>Fax:</b> 
													<?= $model->hs_fax; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Email:</b> 
													<?= $model->gudang_email; ?>
												</div>
												<div class="col-md-6">
													<b>Email:</b> 
													<?= $model->hs_email; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Luas Gudang:</b> 
													<?php $gudang_luas = explode(".",$model->gudang_luas); 
													$gudang_luas=number_format($gudang_luas[0],0,',','.'); 
													echo $gudang_luas; ?> M<sup>2</sup>
												</div>
												<div class="col-md-6">
													<b>Luas Gudang:</b> 
													<?php $hs_luas = explode(".",$model->hs_luas); 
													$hs_luas=number_format($hs_luas[0],0,',','.'); 
													echo $hs_luas; ?> M<sup>2</sup>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Kapasitas Gudang:</b>
													<?php $gudang_kapasitas = explode(".",$model->gudang_kapasitas); 
													$gudang_kapasitas=number_format($gudang_kapasitas[0],0,',','.'); 
													echo $gudang_kapasitas; ?> <?= $model->gudang_kapasitas_satuan; ?>
												</div>
												<div class="col-md-6">
													<b>Kapasitas Gudang:</b>
													<?php $hs_kapasitas = explode(".",$model->hs_kapasitas); 
													$hs_kapasitas=number_format($hs_kapasitas[0],0,',','.'); 
													echo $hs_kapasitas; ?> <?= $model->hs_kapasitas_satuan; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Nilai Gudang:</b> 
													Rp.<?php $gudang_nilai = explode(".",$model->gudang_nilai); 
													$gudang_nilai=number_format($gudang_nilai[0],0,',','.'); 
													echo $gudang_nilai; ?>
												</div>
												<div class="col-md-6">
													<b>Nilai Gudang:</b> 
													Rp.<?php $hs_nilai = explode(".",$model->hs_nilai); 
													$hs_nilai=number_format($hs_nilai[0],0,',','.'); 
													echo $hs_nilai; ?>
												</div>
											</div>	
											<div class="row">
												<div class="col-md-6">
													<b>Komposisi Kepemilikan Nasional:</b> 
													<?= $model->gudang_komposisi_nasional; ?>%
												</div>
												<div class="col-md-6">
													<b>Komposisi Kepemilikan Nasional:</b> 
													<?= $model->hs_komposisi_nasional; ?>%
												</div>
											</div>	
											<div class="row">	
												<div class="col-md-6">
													<b>Komposisi Kepemilikan Asing:</b> 
													<?= $model->gudang_komposisi_asing; ?>%
												</div>
												<div class="col-md-6">
													<b>Komposisi Kepemilikan Asing:</b> 
													<?= $model->hs_komposisi_asing; ?>%
												</div>
											</div>	
											<div class="row">		
												<div class="col-md-6">
													<b>Kelengkapan Gudang:</b> 
													<?= $model->gudang_kelengkapan; ?>
												</div>
												<div class="col-md-6">
													<b>Kelengkapan Gudang:</b> 
													<?= $model->hs_kelengkapan; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Sarana Listrik Gudang:</b> 
													<?php $gudang_sarana_listrik = explode(".",$model->gudang_sarana_listrik); 
													$gudang_sarana_listrik=number_format($gudang_sarana_listrik[0],0,',','.'); 
													echo $gudang_sarana_listrik; ?> Kwh
												</div>
												<div class="col-md-6">
													<b>Sarana Listrik Gudang:</b> 
													<?php $hs_sarana_listrik = explode(".",$model->hs_sarana_listrik); 
													$hs_sarana_listrik=number_format($hs_sarana_listrik[0],0,',','.'); 
													echo $hs_sarana_listrik; ?> Kwh
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Sarana Air:</b> 
													<?= $model->gudang_sarana_air; ?>
												</div>
												<div class="col-md-6">
													<b>Sarana Air:</b> 
													<?= $model->hs_sarana_air; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Sarana Air:</b> 
													<?php $gudang_sarana_pendingin = explode(".",$model->gudang_sarana_pendingin); 
													$gudang_sarana_pendingin=number_format($gudang_sarana_pendingin[0],0,',','.'); 
													echo $gudang_sarana_pendingin; ?> <sup>o</sup>C													
												</div>
												<div class="col-md-6">
													<b>Sarana Air:</b> 
													<?php $hs_sarana_pendingin = explode(".",$model->hs_sarana_pendingin); 
													$hs_sarana_pendingin=number_format($hs_sarana_pendingin[0],0,',','.'); 
													echo $hs_sarana_pendingin; ?> <sup>o</sup>C													
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Forklif:</b> 
													<?php $gudang_sarana_forklif = explode(".",$model->gudang_sarana_forklif); 
													$gudang_sarana_forklif=number_format($gudang_sarana_forklif[0],0,',','.'); 
													echo $gudang_sarana_forklif; ?> Unit			
												</div>
												<div class="col-md-6">
													<b>Forklif:</b> 
													<?php $hs_sarana_forklif = explode(".",$model->hs_sarana_forklif); 
													$hs_sarana_forklif=number_format($hs_sarana_forklif[0],0,',','.'); 
													echo $hs_sarana_forklif; ?> Unit			
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Komputer:</b> 
													<?php $gudang_sarana_komputer = explode(".",$model->gudang_sarana_komputer); 
													$gudang_sarana_komputer=number_format($gudang_sarana_komputer[0],0,',','.'); 
													echo $gudang_sarana_komputer; ?> Unit	
												</div>
												<div class="col-md-6">
													<b>Komputer:</b> 
													<?php $hs_sarana_komputer = explode(".",$model->hs_sarana_komputer); 
													$hs_sarana_komputer=number_format($hs_sarana_komputer[0],0,',','.'); 
													echo $hs_sarana_komputer; ?> Unit	
												</div>
											</div>
											<div class="row">		
												<div class="col-md-6">
													<b>Jenis Gudang:</b> 
													<?= $model->gudang_jenis; ?>
												</div>
												<div class="col-md-6">
													<b>Jenis Gudang:</b> 
													<?= $model->hs_jenis; ?>
												</div>
											</div>	
										</div>
									</div>
								</div><!-- /.tab-pane -->
								<div class="tab-pane" id="tab_4">
									<div class="panel panel-primary">
										<div class="panel-heading">Identitas Lain</div>
										<div class="panel-body">
											<div class="row">		
												<div class="col-sm-6">
													<div class="alert alert-warning">
													<h5>Data Asli Pemohon</h5>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="alert alert-success">
													<h5>Data Hasil Survei</h5>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Gudang Kepemilikan:</b> 
													<?= $model->gudang_kepemilikan; ?>
												</div>
												<div class="col-md-6">
													<b>Gudang Kepemilikan:</b> 
													<?= $model->hs_kepemilikan; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Nomor IMB:</b> 
													<?= $model->gudang_imb_nomor; ?>
												</div>
												<div class="col-md-6">
													<b>Nomor IMB:</b> 
													<?= $model->hs_imb_nomor; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Tanggal SK IMB:</b> 
													<?= $model->gudang_imb_tanggal; ?>
												</div>
												<div class="col-md-6">
													<b>Tanggal SK IMB:</b> 
													<?= $model->hs_imb_tanggal; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Nomor UUG:</b> 
													<?= $model->gudang_uug_nomor; ?>
												</div>
												<div class="col-md-6">
													<b>Nomor UUG:</b> 
													<?= $model->hs_uug_nomor; ?>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<b>Tanggal SK UUG:</b> 
													<?php
													$tgl_sk_uug = explode("-",$model->gudang_uug_tanggal);	
													echo"$tgl_sk_uug[2]-$tgl_sk_uug[1]-$tgl_sk_uug[0]"; ?>
												</div>
												<div class="col-md-6">
													<b>Tanggal SK UUG:</b> 
													<?php
													$hs_uug_tanggal = explode("-",$model->hs_uug_tanggal);	
													echo"$hs_uug_tanggal[2]-$hs_uug_tanggal[1]-$hs_uug_tanggal[0]"; ?>
												</div>
											</div>
											<div class="row">		
												<div class="col-md-6">
													<b>Tanggal Masa Berlaku UUG:</b> 
													<?php
													$tgl_m_uug = explode("-",$model->gudang_uug_berlaku);	
													echo"$tgl_m_uug[2]-$tgl_m_uug[1]-$tgl_m_uug[0]"; ?>
												</div>
												<div class="col-md-6">
													<b>Tanggal Masa Berlaku UUG:</b> 
													<?php
													$hs_uug_berlaku = explode("-",$model->hs_uug_berlaku);	
													echo"$hs_uug_berlaku[2]-$hs_uug_berlaku[1]-$hs_uug_berlaku[0]"; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Macam dan jenis isi Gudang:</b> 
													<?= $model->gudang_isi; ?>
												</div>
												<div class="col-md-6">
													<b>Macam dan jenis isi Gudang:</b> 
													<?= $model->hs_isi; ?>
												</div>
											</div>
										</div>	
									</div>
								</div>
								
							</div><!-- /.tab-content -->
						</div><!-- nav-tabs-custom -->
					</div><!-- /.col -->    
<?php
function DECtoDMS($latitude, $longitude)
	{
		$latitudeDirection = $latitude < 0 ? 'S': 'N';
		$longitudeDirection = $longitude < 0 ? 'W': 'E';

		$latitudeNotation = $latitude < 0 ? '-': '';
		$longitudeNotation = $longitude < 0 ? '-': '';

		$latitudeInDegrees = floor(abs($latitude));
		$longitudeInDegrees = floor(abs($longitude));

		$latitudeDecimal = abs($latitude)-$latitudeInDegrees;
		$longitudeDecimal = abs($longitude)-$longitudeInDegrees;

		$_precision = 3;
		$latitudeMinutes = round($latitudeDecimal*60,$_precision);
		$longitudeMinutes = round($longitudeDecimal*60,$_precision);

		return sprintf('%s%s&deg; %s %s %s%s&deg; %s %s',
			$latitudeNotation,
			$latitudeInDegrees,
			$latitudeMinutes,
			$latitudeDirection,
			$longitudeNotation,
			$longitudeInDegrees,
			$longitudeMinutes,
			$longitudeDirection
		);

	}
?>


