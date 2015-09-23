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
		
			<?php
			$kblis = $model->izinSiupKblis;
			foreach ($kblis as $kbli) {?>
            <div class="row">
				<div class="col-sm-2">
					<i><?= $kbli->kbli->kode; ?></i>
				</div>
				<div class="col-sm-4">
					<i><?= $kbli->kbli->nama; ?></i>
				</div>
				<div class="col-sm-4">
					<i><?= $kbli->keterangan; ?></i>
				</div>
                </div>
			<?php } ?>	
		
	</div>
	
</div>	
