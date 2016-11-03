<div class="row">
	<div class="col-sm-3">
		<strong>Identitas sama dengan Pemilik:</strong>
	</div>
	<div class="col-sm-9">
		<i><?php if($model->identitas_sama=="Y"){echo"Iya";}else{echo"Tidak";} ?></i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>NIK Penanggung Jawab:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nik_penanggung_jawab; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Nama Penanggung Jawab:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_penanggung_jawab; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Tempat Lahir Penanggung Jawab:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->tempat_lahir_penanggung_jawab; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Tanggal Lahir Penanggung Jawab:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->tanggal_lahir_penanggung_jawab; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Jenis Kelamin Penanggung Jawab:</strong>
	</div>
	<div class="col-sm-3">
		<i><?php if($model->jenkel_penanggung_jawab=="L"){echo"Laki-laki";}else{echo"Perempuan";} ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Alamat Penanggung Jawab:</strong>
	</div>
	<div class="col-sm-9">
		<i><?= $model->alamat_penanggung_jawab; ?></i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>RT:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->rt_penanggung_jawab; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>RW:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->rw_penanggung_jawab; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Propinsi:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->propinsi_id_penanggung_jawab); echo $dataProv['nama'];?>
		</i>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Kota / Kabupaten:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->wilayah_id_penanggung_jawab); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kecamatan:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kecamatan_id_penanggung_jawab); echo $dataProv['nama'];?>
		</i>
	</div>
	<div class="col-sm-3">
		<strong>Kelurahan:</strong>
	</div>
	<div class="col-sm-3">
		<i>
		<?php $dataProv = \backend\models\Lokasi::getLokasi($model->kelurahan_id_penanggung_jawab); echo $dataProv['nama'];?>
		</i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Kodepos:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->kodepos_penanggung_jawab; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Telepon:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->telepon_penanggung_jawab; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-3">
		<strong>Passport:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->passport_penanggung_jawab; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Kewarganegaraan:</strong>
	</div>
	<div class="col-sm-3">
		<i><?php
			$kewarganegaraan = \backend\models\Negara::find()->andWhere(['id' => $model->kewarganegaraan_id_penanggung_jawab])->one();
			echo $kewarganegaraan->nama_negara;
		 ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Kitas:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->kitas_penanggung_jawab; ?></i>
	</div>
</div>
