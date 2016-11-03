<div class="row">
	<div class="col-sm-3">
		<strong>Merk / Nama Usaha:</strong>
	</div>
	<div class="col-sm-9">
		<i><?= $model->merk_nama_usaha; ?></i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Latitude:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->latitude; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Longitude:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->longitude; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Nama Gedung Usaha:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_gedung_usaha; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Blok Usaha:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->blok_usaha; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-6">
		<strong>Alamat Usaha:</strong>
	</div>
	<div class="col-sm-6">
		<i><?= $model->alamat_usaha; ?></i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>RT:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->rt_usaha; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>RW:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->rw_usaha; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Kota / Kabupaten:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->wilayah_id_usaha); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kecamatan Usaha:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kecamatan_id_usaha); echo $dataProv['nama'];?>
		</i>
	</div>	
	<div class="col-sm-3">
		<strong>Kelurahan Usaha:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kelurahan_id_usaha); echo $dataProv['nama'];?>
		</i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Kodepos Usaha:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->kodepos_usaha; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Telepon Usaha:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->telpon_usaha; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Fax Usaha:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->fax_usaha; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Nomor Objek Pajak Usaha:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->nomor_objek_pajak_usaha; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Jumlah Karyawan:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->jumlah_karyawan; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>NPWPD:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->npwpd; ?></i>
	</div>
</div>

<!-- s:looping TEKNIS-->
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Izin Teknis</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">
	<?php $teknis = \backend\models\IzinPariwisataTeknis::findAll(['izin_pariwisata_id' => $model->id]); 
	foreach($teknis as $dataTeknis){?>
	<div class="row">
		<div class="col-sm-6">
			<div class="col-sm-3">
				<strong>Jenis izin:</strong>
			</div>
			<div class="col-sm-3">
			
			<?php $jenisIzinPariwisata = \backend\models\JenisIzinPariwisata::findAll(['id' => $dataTeknis->jenis_izin_pariwisata_id]); 
			foreach($jenisIzinPariwisata as $dataJenis){?>
				<i><?= $dataJenis->nama; ?></i>
			<?php } ?>	
			</div>
			<div class="col-sm-3">
				<strong>No Izin:</strong>
			</div>
			<div class="col-sm-3">
				<i><?= $dataTeknis->no_izin; ?></i>
			</div>
		</div>	
		<div class="col-sm-6">	
			<div class="col-sm-3">
				<strong>Tanggal Izin:</strong>
			</div>
			<div class="col-sm-3">
				<i><?= $dataTeknis->tanggal_izin; ?></i>
			</div>
			<div class="col-sm-3">
				<strong>Tanggal Masa Berlaku:</strong>
			</div>
			<div class="col-sm-3">
				<i><?= $dataTeknis->tanggal_masa_berlaku; ?></i>
			</div>
		</div>	
	</div>
	<?php } ?>
</div>
<!-- e:looping TEKNIS-->
	
<!-- s:looping KBLI-->
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Kegiatan Usaha</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">
	<?php $kbli = \backend\models\IzinPariwisataKbli::findAll(['izin_pariwisata_id' => $model->id]); 
	foreach($kbli as $dataKabli){?>
	<div class="row">
		<div class="col-sm-6">	
			<div class="col-sm-3">
				<strong>Kbli:</strong>
			</div>
			<div class="col-sm-9">
				<?php $kbliSub = \backend\models\Kbli::find()->leftjoin('kbli_izin','kbli.id = kbli_izin.kbli_id')  ->where('kbli_izin.izin_id = "'.$dataKabli->izin_pariwisata_id.'"')->all(); 
						
				foreach($kbliSub as $dataKabliSub){?>
					<i><?php echo $dataKabliSub->kode; ?> | <?php echo $dataKabliSub->nama; ?></i>
				<?php } ?>			
				
			</div>
		</div>
	</div>
	<?php } ?>
</div>	
<!-- e:looping KBLI-->					


<?php if($model->kode=="JTW"){?>
<!-- s: Kapasitas Transport -->
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Kapasitas Yang Tersedia</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">
<?php $transport = \backend\models\IzinPariwisataKapasitasTransport::findAll(['izin_pariwisata_id' => $model->id]); 
foreach($transport as $dataTransport){?>
	<div class="row">
		<div class="col-sm-3">
			<strong>Jumlah Kapasitas (Orang):</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $dataTransport->jumlah_kapasitas; ?></i>
		</div>
		<div class="col-sm-3">
			<strong>Jumlah Unit:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $dataTransport->jumlah_unit; ?></i>
		</div>
	</div>
	<?php } ?>
</div>
<!-- e: Kapasitas Yang Transport -->
<?php } ?>
<?php if($model->kode=="JPW"){?>
<!-- s: Tujuan Wisata -->
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Tujuan Wisata</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">
	<div class="row">
	<?php $tujuanWisata = \backend\models\IzinPariwisataTujuanWisata::findAll(['izin_pariwisata_id' => $model->id]); foreach($tujuanWisata as $dataTujuanWisata){?>
		<div class="col-sm-3">
			<i><?= $TujuanWisata->keterangan; ?></i>
		</div>
	<?php } ?>		
	</div>
</div>
<!-- e: Tujuan Wisata -->
<div class="row">
	<div class="col-sm-6">
		<strong>Intensitas Perjalanan Wisata Tahunan:</strong>
	</div>
	<div class="col-sm-6">
		<i><?= $model->intensitas_jasa_perjalanan; ?></i>
	</div>
</div>
<?php } ?>
<?php if($model->kode=="PA"){?>
<div class="row">
	<div class="col-sm-6">
		<strong>Total Kapasitas:</strong>
	</div>
	<div class="col-sm-6">
		<i><?= $model->kapasitas_penyedia_akomodasi; ?> Orang</i>
	</div>
</div>
<!-- s: Kapasitas yang tersedia -->
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Kapasitas Yang Tersedia</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">
<?php $akomodasi = \backend\models\IzinPariwisataKapasitasAkomodasi::findAll(['izin_pariwisata_id' => $model->id]); foreach($akomodasi as $dataAkomodasi){?>
	<div class="row">
		<div class="col-sm-3">
			<strong>Tipe Kamar:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $dataAkomodasi->tipe_kamar_id; ?></i>
		</div>
		<div class="col-sm-3">
			<strong>Jumlah Kapasitas (Orang/ Kamar):</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $dataAkomodasi->jumlah_kapasitas; ?></i>
		</div>
		<div class="col-sm-3">
			<strong>Jumlah Unit:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $dataAkomodasi->jumlah_unit; ?></i>
		</div>
	</div>
<?php } ?>	
</div>
<!-- e: Kapasitas yang tersedia -->

<!-- s: Fasilitas yang dimiliki -->
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Fasilitas Yang Dimiliki</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">
	<?php $fasilitas = \backend\models\IzinPariwisataFasilitas::findAll(['izin_pariwisata_id' => $model->id]); foreach($fasilitas as $dataFasilitas){?>
	<div class="row">
		<div class="col-sm-3">
			<?php $kamar = \backend\models\FasilitasKamar::findAll(['id' => $model->fasilitas_kamar_id]); foreach($kamar as $dataKamar){?>
			<i><?= $dataKamar->keterangan; ?></i>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</div>
<!-- e: Fasilitas yang dimiliki -->
<?php } ?>

<?php if($model->kode=="JMM"){?>
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Kapasitas Yang Tersedia</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">

	<?php if($model->kode_sub=="JMM05"){?>
	<div class="row">
		<div class="col-sm-3">
			<strong>Jumlah Kapasitas Produk/ Pack:</strong>
		</div>
		<div class="col-sm-9">
			<i><?= $model->jum_pack_jasa_manum; ?> /bulan</i>
		</div>
	</div>
	<?php } elseif($model->kode_sub=="JMM03"){?>
	<div class="row">
		<div class="col-sm-3">
			<strong>Jumlah Stand:</strong>
		</div>
		<div class="col-sm-9">
			<i><?= $model->jum_stand_jasa_manum; ?> Buah</i>
		</div>
	</div>
	<?php }else{ ?>
	<div class="row">
		<div class="col-sm-3">
			<strong>Jumlah Kursi:</strong>
		</div>
		<div class="col-sm-9">
			<i><?= $model->jum_stand_jasa_manum; ?> Buah</i>
		</div>
	</div>
	<?php } ?>

</div>										
<?php } ?>														