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
    <?php 
        $aktas = $model->izinSiupAktas;
        foreach ($aktas as $akta) {
            echo $akta->nomor_akta;
        }
    ?>

</div>