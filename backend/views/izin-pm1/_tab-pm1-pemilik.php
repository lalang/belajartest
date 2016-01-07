<div class="row">
	<div class="col-sm-3">
		NIK:
	</div>
	<div class="col-sm-9">
		<i><?= $model->nik; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		No. KK:
	</div>
	<div class="col-sm-9">
		<i><?= $model->no_kk; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nama:
	</div>
	<div class="col-sm-9">
		<i><?= $model->nama; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Alamat:
	</div>
	<div class="col-sm-9">
		<i><?= $model->alamat; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Kodepos:
	</div>
	<div class="col-sm-6">
		<i><?= $model->kodepos; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Tempat/ Tanggal Lahir:
	</div>
	<div class="col-sm-9">
		<i><?= $model->tempat_lahir; ?>, <?= $model->tanggal_lahir; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nomor Telp
	</div>
	<div class="col-sm-9">
		<i><?= $model->telepon; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Jenis Kelamin:
	</div>
	<div class="col-sm-6">
		<i><?= ($model->jenkel == 'L'? 'Laki-laki' : 'Perempuan') ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Pekerjaan:
	</div>
	<div class="col-sm-6">
		<i><?= $model->pekerjaan; ?></i>
	</div>
</div>
