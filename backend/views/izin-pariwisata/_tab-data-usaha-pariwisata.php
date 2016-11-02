<div class="row">
	<div class="col-sm-6">
		<strong>Merk / Nama Usaha:</strong>
	</div>
	<div class="col-sm-6">
		<i><?= $model->identitas_sama; ?></i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Latitude:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nik_penanggung_jawab; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Longitude:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_penanggung_jawab; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Nama Gedung Usaha:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nik_penanggung_jawab; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Blok Usaha:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_penanggung_jawab; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-6">
		<strong>Alamat Usaha:</strong>
	</div>
	<div class="col-sm-6">
		<i><?= $model->alamat_penanggung_jawab; ?></i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>RT:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nik_penanggung_jawab; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>RW:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_penanggung_jawab; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="col-sm-6">
			<strong>Kota / Kabupaten:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->tempat_lahir_penanggung_jawab; ?></i>
		</div>
	</div>	
	<div class="col-sm-3">	
		<div class="col-sm-6">
			<strong>Kecamatan Usaha:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->tanggal_lahir_penanggung_jawab; ?></i>
		</div>
	</div>	
	<div class="col-sm-3">	
		<div class="col-sm-6">
			<strong>Kelurahan Usaha:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->jenkel_penanggung_jawab; ?></i>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="col-sm-6">
			<strong>Kodepos Usaha:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->tempat_lahir_penanggung_jawab; ?></i>
		</div>
	</div>	
	<div class="col-sm-3">	
		<div class="col-sm-6">
			<strong>Telepon Usaha:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->tanggal_lahir_penanggung_jawab; ?></i>
		</div>
	</div>	
	<div class="col-sm-3">	
		<div class="col-sm-6">
			<strong>Fax Usaha:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->jenkel_penanggung_jawab; ?></i>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="col-sm-6">
			<strong>Nomor Objek Pajak Usaha:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->tempat_lahir_penanggung_jawab; ?></i>
		</div>
	</div>	
	<div class="col-sm-3">	
		<div class="col-sm-6">
			<strong>Jumlah Karyawan:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->tanggal_lahir_penanggung_jawab; ?></i>
		</div>
	</div>	
	<div class="col-sm-3">	
		<div class="col-sm-6">
			<strong>NPWPD:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->jenkel_penanggung_jawab; ?></i>
		</div>
	</div>
</div>

<!-- s:looping TEKNIS-->
<div class="row">
	<div class="col-sm-6">
		<div class="col-sm-3">
			<strong>Jenis izin:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $model->jenis_izin_pariwisata_id; ?></i>
		</div>
		<div class="col-sm-3">
			<strong>No Izin:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $model->no_izin; ?></i>
		</div>
	</div>	
	<div class="col-sm-6">	
		<div class="col-sm-3">
			<strong>Tanggal Izin:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $model->tanggal_izin; ?></i>
		</div>
		<div class="col-sm-3">
			<strong>Tanggal Masa Berlaku:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $model->tanggal_masa_berlaku; ?></i>
		</div>
	</div>	
</div>
<!-- e:looping TEKNIS-->

<!-- s:looping KBLI-->
<div class="row">
	<div class="col-sm-6">	
		<div class="col-sm-6">
			<strong>Kbli:</strong>
		</div>
		<div class="col-sm-6">
			<i><?= $model->kbli_id; ?></i>
		</div>
	</div>
</div>
<!-- e:looping KBLI-->

<?php if($model->kode=="JTW"){?>
<!-- s: Kapasitas Transport -->
<div class="row">
	<div class="col-sm-12">	
		<div class="col-sm-3">
			<strong>Jumlah Kapasitas (Orang):</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $model->jumlah_kapasitas; ?></i>
		</div>
		<div class="col-sm-3">
			<strong>Jumlah Unit:</strong>
		</div>
		<div class="col-sm-3">
			<i><?= $model->jumlah_unit; ?></i>
		</div>
	</div>
</div>
<!-- e: Kapasitas Yang Transport -->
<?php } ?>
<?php if($model->kode=="JPW"){?>
<!-- s: Tujuan Wisata -->
<div class="row">
	<div class="col-sm-6">
		<strong>Tujuan Wisata:</strong>
	</div>
	<div class="col-sm-6">
		<i><?= $model->keterangan; ?></i>
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

<?php } ?>