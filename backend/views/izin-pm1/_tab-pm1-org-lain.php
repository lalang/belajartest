<div class="row">
	<div class="col-sm-3">
		NIK:
	</div>
	<div class="col-sm-9">
		<i><?= $model->nik_orang_lain; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		No. KK:
	</div>
	<div class="col-sm-9">
		<i><?= $model->no_kk_orang_lain; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nama:
	</div>
	<div class="col-sm-9">
		<i><?= $model->nama_orang_lain; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Alamat:
	</div>
	<div class="col-sm-9">
		<i><?= $model->alamat_orang_lain; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Kodepos:
	</div>
	<div class="col-sm-6">
		<i><?= $model->kodepos_orang_lain; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Tempat/ Tanggal Lahir:
	</div>
	<div class="col-sm-9">
		<i><?= $model->tempat_lahir_orang_lain; ?>, <?= $model->tanggal_lahir_saksi2; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nomor Telp
	</div>
	<div class="col-sm-9">
		<i><?= $model->telepon_orang_lain; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Jenis Kelamin:
	</div>
	<div class="col-sm-6">
		<i><?= ($model->jenkel_orang_lain == 'L'? 'Laki-laki' : 'Perempuan') ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Pekerjaan:
	</div>
	<div class="col-sm-6">
		<i><?= $model->pekerjaan_orang_lain; ?></i>
	</div>
</div>
