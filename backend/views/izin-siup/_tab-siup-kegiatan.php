<div class="row">
	<div class="col-sm-3">
		Kelembagaan:
	</div>
	<div class="col-sm-9">
		<i><?= $model->kelembagaan; ?></i>
	</div>
</div>	
<div class="row">
	<div class="col-sm-3">
		Kegiatan Usaha KBLI:
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-2">
				<b>Kode KBLI</b>
			</div>
			<div class="col-sm-4">
				<b>Nama KBLI</b>
			</div>
			<div class="col-sm-4">
				<b>Keterangan</b>
			</div>
		</div>
		<div class="row">
			<?php
			$kblis = $model->izinSiupKblis;
			foreach ($kblis as $kbli) {?>
				<div class="col-sm-2">
					<i><?= $kbli->kbli_kode; ?></i>
				</div>
				<div class="col-sm-4">
					<i><?= $kbli->kbli_nama; ?></i>
				</div>
				<div class="col-sm-4">
					<i><?= $kbli->kbli_keterangan; ?></i>
				</div>
			<?php } ?>	
		</div>
	</div>
	<br>
	<div class="col-sm-3">
		Barang/ Jasa Dagang Utama:
	</div>
	<div class="col-sm-9">
		<i><?= $model->barang; ?></i>
	</div>
</div>	
