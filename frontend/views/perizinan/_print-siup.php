<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-home"></i>Dashboard <span><?php echo Yii::$app->user->identity->wewenang->nama . ' ' . Yii::$app->user->identity->lokasi->nama; ?></span></h2>
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
	
	
	
	

<center><h1>FORM PENDAFTARAN SIUP</h1></center></br></br>
<h2>I. Identitas Pemilik/ Pengurus/ Penanggung Jawab</h2>
<div class="row">
	<div class="col-sm-3">
		NIK
	</div>
	<div class="col-sm-9">
		<i><?= $model->ktp; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nama
	</div>
	<div class="col-sm-9">
		<i><?= $model->nama; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Alamat
	</div>
	<div class="col-sm-9">
		<i><?= $model->alamat; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Tempat/ Tanggal Lahir
	</div>
	<div class="col-sm-9">
		<i><?= $model->tempat_lahir; ?>, <?= $model->tanggal_lahir; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nomor Telp/ Fax
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-1">
				Telp:
			</div>
			<div class="col-sm-3">
				<i><?= $model->telepon; ?></i>
			</div>
			<div class="col-sm-2">
				Fax:
			</div>
			<div class="col-sm-6">
				<i><?= $model->fax; ?></i>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nomor KTP/ Paspor
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-1">
				KTP:
			</div>
			<div class="col-sm-3">
				<i><?= $model->ktp; ?></i>
			</div>
			<div class="col-sm-2">
				Paspor:
			</div>
			<div class="col-sm-6">
				<i><?= $model->passport; ?></i>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Kewarganegaraan
	</div>
	<div class="col-sm-6">
		<i><?= $model->kewarganegaraan; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Jabatan Dalam Perusahaan
	</div>
	<div class="col-sm-6">
		<i><?= $model->jabatan_perusahaan; ?></i>
	</div>
</div>
<br>
<h2>II. Identitas Perusahaan</h2>
<div class="row">
	<div class="col-sm-3">
		NPWP
	</div>
	<div class="col-sm-9">
		<i><?= $model->npwp_perusahaan; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nama Perusahaan
	</div>
	<div class="col-sm-9">
		<i><?= $model->nama_perusahaan; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Bentuk Perusahaan
	</div>
	<div class="col-sm-9">
		<i><?= $model->bentuk_perusahaan; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Alamat Perusahaan
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-3">
				Propinsi:
			</div>
			<div class="col-sm-9">
				<i><?= $model->propinsi; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Kabupaten/ Kota/ Kotamadya
			</div>
			<div class="col-sm-9">
				<i><?= $model->nama_kabkota; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Kecamatan
			</div>
			<div class="col-sm-9">
				<i><?= $model->nama_kecamatan; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Kelurahan
			</div>
			<div class="col-sm-9">
				<i><?= $model->nama_kelurahan; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Kodepos
			</div>
			<div class="col-sm-9">
				<i><?= $model->kode_pos; ?></i>
			</div>
		</div>		
	</div>
</div>	

<div class="row">
	<div class="col-sm-3">
		Nomor Telp/ Fax
	</div>
	<div class="col-sm-9">	
		<div class="row">
			<div class="col-sm-1">
				Telp:
			</div>
			<div class="col-sm-3">
				<i><?= $model->telpon_perusahaan; ?></i>
			</div>
			<div class="col-sm-2">
				Fax:
			</div>
			<div class="col-sm-6">
				<i><?= $model->fax_perusahaan; ?></i>
			</div>
		</div>
	</div>
</div>	
<div class="row">
	<div class="col-sm-3">
		Status
	</div>
	<div class="col-sm-9">
		<i><?= $model->status_perusahaan; ?></i>
	</div>
</div>	
<br>	

<h3>III. Legalitas Perusahaan</h3>
<div class="row">
	<div class="col-sm-3">
		Akta Pendirian
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-1">
				Nomor:
			</div>
			<div class="col-sm-3">
				<i><?= $model->akta_pendirian_no; ?></i>
			</div>
			<div class="col-sm-2">
				Tgl Akta:
			</div>
			<div class="col-sm-6">
				<i><?= $model->akta_pendirian_tanggal; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1">
				Nomor:
			</div>
			<div class="col-sm-3">
				<i><?= $model->akta_pengesahan_no; ?></i>
			</div>
			<div class="col-sm-2">
				Tgl Pengesahan:
			</div>
			<div class="col-sm-6">
				<i><?= $model->akta_pengesahan_tanggal; ?></i>
			</div>
		</div>		
	</div>
	<div class="col-sm-3">
		Akta Perubahan
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-1">
				Nomor:
			</div>
			<div class="col-sm-3">
				<i><?= $model->akta_perubahan_no; ?></i>
			</div>
			<div class="col-sm-2">
				Tgl Akta:
			</div>
			<div class="col-sm-6">
				<i><?= $model->akta_perubahan_tanggal; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1">
				Nomor:
			</div>
			<div class="col-sm-3">
				<i><?= $model->akta_pengesahan_no; ?></i>
			</div>
			<div class="col-sm-2">
				Tgl Pengesahan:
			</div>
			<div class="col-sm-6">
				<i><?= $model->akta_pengesahan_tanggal; ?></i>
			</div>
		</div>		
	</div>
	<div class="col-sm-4">
		Pengesahan Badan Hukum Kemenkumham RI
	</div>
	<div class="col-sm-7">
		<div class="row">
			<div class="col-sm-3">
				Nomor SK:
			</div>
			<div class="col-sm-3">
				<i>007</i>
			</div>
			<div class="col-sm-3">
				Nomor Daftar:
			</div>
			<div class="col-sm-3">
				<i><?= $model->no_daftar; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Tgl Pengesahaan:
			</div>
			<div class="col-sm-3">
				<i><?= $model->tanggal_pengesahan; ?></i>
			</div>
		</div>		
	</div>
</div>
<br>
<h3>IV. Modal Dan Saham</h3>
<div class="row">
	<div class="col-sm-3">
		Modal Dan Nilai Kekayaan Bersih Perusahaan:
	</div>
	<div class="col-sm-9">
		<i><?= $model->modal; ?></i>
	</div>
</div>		
<div class="row">
	<div class="col-sm-3">
		Saham (Khusus untuk penanam modal asing)
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-3">
				Total Nilai Saham:
			</div>
			<div class="col-sm-3">
				<i><?= $model->nilai_saham_pma; ?></i>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-12">
				Komposisi Pemilik Saham
			</div>
		</div>
		<div class="row">	
			<div class="col-sm-3">
				Saham Nasional:
			</div>
			<div class="col-sm-9">
				<i><?= $model->saham_nasional; ?></i>
			</div>
		</div>
		<div class="row">	
			<div class="col-sm-3">
				Saham Asing:
			</div>
			<div class="col-sm-9">
				<i><?= $model->saham_asing; ?></i>
			</div>
		</div>		
	</div>
</div>	
<br>
<h3>V. Kegiatan Usaha</h3>
<div class="row">
	<div class="col-sm-3">
		Kelembagaan:
	</div>
	<div class="col-sm-9">
		<i>Perdagangan Besar</i>
	</div>
</div>	
<div class="row">
	<div class="col-sm-3">
		Kegiatan Usaha KBLI:
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-2">
				Kode KBLI
			</div>
			<div class="col-sm-4">
				Nama KBLI
			</div>
			<div class="col-sm-4">
				Keterangan
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<i>927892</i>
			</div>
			<div class="col-sm-4">
				<i>Sinar Mas</i>
			</div>
			<div class="col-sm-4">
				<i>Baru mengajukan</i>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		Barang/ Jasa Dagang Utama:
	</div>
	<div class="col-sm-9">
		<i>Barang Apalah</i>
	</div>
</div>	

<hr size="1" color="blue">
<p>
Demikin surat permohonan SIUP ini, kami buat dengan sebenarnya dan apabila dikemudian hari ternyata data atau informasi dan keterangan tersebut tidak benar, maka kami menyatakan bersedia untuk dibatalkan SIUP yang telah kami miliki dan dituntut sesuai dengan peraturan perundang - undangan.
</p><br>
<div class="row">
	<div class="col-sm-9">
	
	</div>
	<div class="col-sm-3" style="text-align: center">
		<p>Jakarta, 3 Agustus 2015</p>
		<p>
		Tanda Tangan***)<br>
		Materai 6.000
		</p>
		<p>Marzuki Abdulah Suseno</p>
	</div>
</div>	




</div>

</section><!-- /#page-content -->
