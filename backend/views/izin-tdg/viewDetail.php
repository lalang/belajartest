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
												<b>Kabupaten/ Kota:</b> 
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
												<div class="col-md-4">
													<b>NPWP Perusahaan:</b> 
													<?= $model->perusahaan_npwp; ?>
												</div>
												<div class="col-md-4">
													<b>Nama Perusahaan:</b> 
													<?= $model->perusahaan_nama; ?>
												</div>
												<div class="col-md-4">
													<b>Nama Gedung:</b> 
													<?= $model->perusahaan_namagedung; ?>
												</div>	
											</div>
											<div class="row">
												<div class="col-md-6">
													<b>Blok Lantai:</b> 
													<?= $model->perusahaan_blok_lantai; ?>
												</div>
												<div class="col-md-6">
													<b>Nama Jalan:</b> 
													<?= $model->perusahaan_namajalan; ?>
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
													<b>Kabupaten/ Kota:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->perusahaan_kabupaten);
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
													<b>Kelurahan:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->perusahaan_kelurahan);
													echo $dataProv['nama'];
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<b>Kodepos:</b> 
													<?= $model->perusahaan_kodepos; ?>
												</div>
												<div class="col-md-3">
													<b>Telepon:</b> 
													<?= $model->perusahaan_telepon; ?>
												</div>
												<div class="col-md-3">
													<b>Fax:</b> 
													<?= $model->perusahaan_fax; ?>
												</div>
												<div class="col-md-3">
													<b>Email:</b> 
													<?= $model->perusahaan_email; ?>
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
												<div class="col-md-12">
													<b>Koordinat:</b> 
													<?php
													$koor = DECtoDMS($model->gudang_koordinat_1, $model->gudang_koordinat_2);
													echo str_replace('-', '', $koor);
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<b>Nama Gedung/ Komplek:</b> 
													<?= $model->gudang_namagedung; ?>
												</div>
												<div class="col-md-4">
													<b>Blok/ Lantai:</b> 
													<?= $model->gudang_blok_lantai; ?>
												</div>
												<div class="col-md-4">
													<b>Nama Jalan:</b> 
													<?= $model->gudang_namajalan; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-2">
													<b>RT:</b> 
													<?= $model->gudang_rt; ?>
												</div>
												<div class="col-md-2">
													<b>RW:</b> 
													<?= $model->gudang_rw; ?>
												</div>
												<div class="col-md-4">
													<b>Propinsi:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->gudang_propinsi);
													echo $dataProv['nama'];
													?>
												</div>
												<div class="col-md-4">	
													<b>Kabupaten/ Kota:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->gudang_kabupaten);
													echo $dataProv['nama'];
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<b>Kecamatan:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->gudang_kecamatan);
													echo $dataProv['nama'];
													?>
												</div>
												<div class="col-md-4">
													<b>Kelurahan:</b> 
													<?php 
													$dataProv = \backend\models\Lokasi::getLokasi($model->gudang_kelurahan);
													echo $dataProv['nama'];
													?>
												</div>
												<div class="col-md-4">
													<b>Kodepos:</b> 
													<?= $model->gudang_kodepos; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<b>Telepon:</b> 
													<?= $model->gudang_telepon; ?>
												</div>
												<div class="col-md-4">
													<b>Fax:</b> 
													<?= $model->gudang_fax; ?>
												</div>
												<div class="col-md-4">
													<b>Email:</b> 
													<?= $model->gudang_email; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<b>Luas Gudang:</b> 
													<?php $gudang_luas = explode(".",$model->gudang_luas); 
													$gudang_luas=number_format($gudang_luas[0],0,',','.'); 
													echo $gudang_luas; ?> M<sup>2</sup>
												</div>
												<div class="col-md-4">
													<b>Kapasitas Gudang:</b>
													<?php $gudang_kapasitas = explode(".",$model->gudang_kapasitas); 
													$gudang_kapasitas=number_format($gudang_kapasitas[0],0,',','.'); 
													echo $gudang_kapasitas; ?> <?= $model->gudang_kapasitas_satuan; ?>
												</div>
												<div class="col-md-4">
													<b>Nilai Gudang:</b> 
													Rp.<?php $gudang_nilai = explode(".",$model->gudang_nilai); 
													$gudang_nilai=number_format($gudang_nilai[0],0,',','.'); 
													echo $gudang_nilai; ?>
												</div>
											</div>	
											<div class="row">
												<div class="col-md-4">
													<b>Komposisi Kepemilikan Nasional:</b> 
													<?= $model->gudang_komposisi_nasional; ?>%
												</div>
												<div class="col-md-4">
													<b>Komposisi Kepemilikan Asing:</b> 
													<?= $model->gudang_komposisi_asing; ?>%
												</div>
												<div class="col-md-4">
													<b>Kelengkapan Gudang:</b> 
													<?= $model->gudang_kelengkapan; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<b>Sarana Listrik Gudang:</b> 
													<?php $gudang_sarana_listrik = explode(".",$model->gudang_sarana_listrik); 
													$gudang_sarana_listrik=number_format($gudang_sarana_listrik[0],0,',','.'); 
													echo $gudang_sarana_listrik; ?> Kwh
												</div>
												<div class="col-md-4">
													<b>Sarana Air:</b> 
													<?= $model->gudang_sarana_air; ?>
												</div>
												<div class="col-md-4">
													<b>Sarana Air:</b> 
													<?php $gudang_sarana_pendingin = explode(".",$model->gudang_sarana_pendingin); 
													$gudang_sarana_pendingin=number_format($gudang_sarana_pendingin[0],0,',','.'); 
													echo $gudang_sarana_pendingin; ?> <sup>o</sup>C													
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<b>Forklif:</b> 
													<?php $gudang_sarana_forklif = explode(".",$model->gudang_sarana_forklif); 
													$gudang_sarana_forklif=number_format($gudang_sarana_forklif[0],0,',','.'); 
													echo $gudang_sarana_forklif; ?> Unit			
												</div>
												<div class="col-md-4">
													<b>Komputer:</b> 
													<?php $gudang_sarana_komputer = explode(".",$model->gudang_sarana_komputer); 
													$gudang_sarana_komputer=number_format($gudang_sarana_komputer[0],0,',','.'); 
													echo $gudang_sarana_komputer; ?> Unit	
												</div>
												<div class="col-md-4">
													<b>Jenis Gudang:</b> 
													<?= $model->gudang_jenis; ?>
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
												<div class="col-md-4">
													<b>Gudang Kepemilikan:</b> 
													<?= $model->gudang_kepemilikan; ?>
												</div>
												<div class="col-md-4">
													<b>Nomor IMB:</b> 
													<?= $model->gudang_imb_nomor; ?>
												</div>
												<div class="col-md-4">
													<b>Tanggal SK IMB:</b> 
													<?= $model->gudang_imb_tanggal; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<b>Nomor UUG:</b> 
													<?= $model->gudang_uug_nomor; ?>
												</div>
												<div class="col-md-4">
													<b>Tanggal SK UUG:</b> 
													<?php
													$tgl_sk_uug = explode("-",$model->gudang_uug_tanggal);	
													echo"$tgl_sk_uug[2]-$tgl_sk_uug[1]-$tgl_sk_uug[0]"; ?>
												</div>
												<div class="col-md-4">
													<b>Tanggal Masa Berlaku UUG:</b> 
													<?php
													$tgl_m_uug = explode("-",$model->gudang_uug_berlaku);	
													echo"$tgl_m_uug[2]-$tgl_m_uug[1]-$tgl_m_uug[0]"; ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<b>Macam dan jenis isi Gudang:</b> 
													<?= $model->gudang_isi; ?>
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


