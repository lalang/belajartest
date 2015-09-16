<div class="row">
	<div class="col-sm-3">
		NPWP:
	</div>
	<div class="col-sm-9">
		<i><?= $model->npwp_perusahaan; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nama Perusahaan:
	</div>
	<div class="col-sm-9">
		<i><?= $model->nama_perusahaan; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Bentuk Perusahaan:
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
			<div class="col-sm-4">
				Propinsi:
			</div>
			<div class="col-sm-8">
				<i><?= $model->propinsi; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				Kabupaten/ Kota/ Kotamadya:
			</div>
			<div class="col-sm-8">
				<i><?= $model->kabupaten_kota; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				Kecamatan:
			</div>
			<div class="col-sm-8">
				<i><?= $model->kecamatan; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				Kelurahan:
			</div>
			<div class="col-sm-8">
				<i><?= $model->kelurahan; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				Kodepos:
			</div>
			<div class="col-sm-8">
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
		Status:
	</div>
	<div class="col-sm-9">
		<i><?= $model->status_perusahaan; ?></i>
	</div>
</div>	
	