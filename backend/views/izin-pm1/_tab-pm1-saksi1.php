<div class="row">
	<div class="col-sm-3">
		NIK:
	</div>
	<div class="col-sm-9">
		<i><?= $model->nik_saksi1; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		No. KK:
	</div>
	<div class="col-sm-9">
		<i><?= $model->no_kk_saksi1; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nama:
	</div>
	<div class="col-sm-9">
		<i><?= $model->nama_saksi1; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Alamat:
	</div>
	<div class="col-sm-9">
		<i><?= $model->alamat_saksi1; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Kodepos:
	</div>
	<div class="col-sm-6">
		<i><?= $model->kodepos_saksi1; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Tempat/ Tanggal Lahir:
	</div>
	<div class="col-sm-9">
		<i><?= $model->tempat_lahir_saksi1; ?>, <?= $model->tanggal_lahir_saksi1; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Nomor Telp
	</div>
	<div class="col-sm-9">
		<i><?= $model->telepon_saksi1; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Jenis Kelamin:
	</div>
	<div class="col-sm-6">
		<i><?= ($model->jenkel_saksi1 == 'L'? 'Laki-laki' : 'Perempuan') ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		Pekerjaan:
	</div>
	<div class="col-sm-6">
		<i><?= $model->pekerjaan_saksi1; ?></i>
	</div>
</div>
