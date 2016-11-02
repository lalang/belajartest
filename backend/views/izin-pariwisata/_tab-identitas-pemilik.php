<div class="row">
    <div class="col-sm-3">
        <strong>NIK:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nik; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Nama:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Tempat Lahir: </strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->tempat_lahir; ?></i>
	</div>	
	<div class="col-sm-3">
		<strong>Tanggal Lahir:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->tanggal_lahir; ?></i>
	</div>

	<div class="col-sm-3">
		<strong>Jenis Kelamin:</strong>
	</div>
	<div class="col-sm-3">
		<i><?php if($model->jenkel=="L"){echo"Laki-laki";}else{echo"Perempuan";} ?></i>
	</div>
</div>

<div class="row">
    <div class="col-sm-3">
        <strong>Alamat:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->alamat; ?></i>
    </div>
</div>	
<div class="row">
	<div class="col-sm-3">
		<strong>RT: </strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->rt; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>RW:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->rw; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Propinsi:</strong>
	</div>
	<div class="col-sm-3">
		<i><?php $dataProv = \backend\models\Lokasi::getLokasi($model->propinsi_id); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kota/ Kabupaten:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->wilayah_id); echo $dataProv['nama'];?>
		</i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Kecamatan:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kecamatan_id); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kelurahan:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kelurahan_id); echo $dataProv['nama'];?>
		</i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Kodepos:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->kodepos; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Telepon:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->telepon; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Email:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->email; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Passport:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->passport; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Kewarganegaraan:</strong>
	</div>
	<div class="col-sm-3">
		<i><?php
			$kewarganegaraan = \backend\models\Negara::find()->andWhere(['id' => $model->kewarganegaraan_id])->one();
			echo $kewarganegaraan->nama_negara;
		 ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Kitas:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->kitas; ?></i>
	</div>
</div>


