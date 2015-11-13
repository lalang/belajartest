<div class="row">
	<div class="col-sm-12">
		AKTA PENDIRIAN
	</div>
	
	<div class="col-sm-3">
		<b>Akta Pendirian</b>
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-3">
				Nomor:
			</div>
			<div class="col-sm-3">
				<i><?= $model->akta_pendirian_no; ?></i>
			</div>
			<div class="col-sm-3">
				Tgl Akta:
			</div>
			<div class="col-sm-3">
				<i><?= $model->akta_pendirian_tanggal; ?></i>
			</div>
		</div>
	</div>	
	
	<div class="col-sm-3">
		<b>SK Kemenkumham</b>
	</div>
	<div class="col-sm-9">	
		
		<div class="row">
			<div class="col-sm-3">
				Nomor:
			</div>
			<div class="col-sm-3">
				<i><?= $model->no_sk; ?></i>
			</div>
			<div class="col-sm-3">
				Tgl Pengesahan:
			</div>
			<div class="col-sm-3">
				<i><?= $model->tanggal_pengesahan; ?></i>
			</div>
		</div>		
	</div>
	<div class="col-sm-12">&nbsp;</div>
	<div class="col-sm-12">
		AKTA PERUBAHAN
	</div>
	<div class="col-sm-3">
		<b>Nomor Akta</b>
	</div>
	<div class="col-sm-3">
		<b>Tanggal Akta</b>
	</div>
	<div class="col-sm-3">
		<b>Nomor Pengesahan</b>
	</div>
	<div class="col-sm-3">
		<b>Tanggal Pengesahan</b>
	</div>
    <?php 
        $aktas = $model->izinSiupAktas;
        foreach ($aktas as $akta) {
			echo"<div class='col-sm-3'><i>".$akta->nomor_akta."</i></div>";
			echo"<div class='col-sm-3'><i>".$akta->tanggal_akta."</i></div>";
			echo"<div class='col-sm-3'><i>".$akta->nomor_pengesahan."</i></div>";
			echo"<div class='col-sm-3'><i>".$akta->tanggal_pengesahan."</i></div>";
        }
    ?>

</div>