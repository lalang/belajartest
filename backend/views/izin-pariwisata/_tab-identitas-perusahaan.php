<div class="row">
    <div class="col-sm-3">
        <strong>NPWP Perusahaan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->npwp_perusahaan; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Nama Perusahaan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_perusahaan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Nama Gedung Perusahaan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_gedung_perusahaan; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Blok Perusahaan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->blok_perusahaan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Alamat:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->alamat_perusahaan; ?></i>
    </div>
</div>	
<div class="row">
	<div class="col-sm-3">
		<strong>Propinsi Perusahaan: </strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->propinsi_id_perusahaan); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kota/ Kabupaten:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->wilayah_id_perusahaan); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kecamatan Perusahaan:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kecamatan_id_perusahaan); echo $dataProv['nama'];?>
		</i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Kelurahan Perusahaan:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kelurahan_id_perusahaan); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kodepos Perusahaan:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->kodepos_perusahaan; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Telepon Perusahaan:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->telpon_perusahaan; ?></i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Fax Perusahaan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->fax_perusahaan; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Email Perusahaan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->email_perusahaan; ?></i>
    </div>
</div>