Per: <i><?= $model->tanggal_neraca; ?></i>
<div class="row">
	<div class="col-sm-6">
		AKTIVA
		
		<div class="row">
			<div class="col-sm-12">
			1. AKTIVA LANCAR
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Kas:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_lancar_kas, 0, 0, '.') ;?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Bank:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_lancar_bank, 0, 0, '.') ;?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Piutang:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_lancar_piutang, 0, 0, '.') ;?></i>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-6">
				Persedian Barang:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_lancar_barang, 0, 0, '.') ;?></i>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-6">
				Pekerjaan Dalam Proses:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_lancar_pekerjaan, 0, 0, '.') ;?></i>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				Jumlah (a):
			</div>
			<div class="col-sm-6">
                            <b><i>Rp. <?= number_format($model->total_aktiva, 0, 0, '.') ;?></i></b>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-12">
			2. AKTIVA TETAP
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Peralatan dalam Mesin:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_tetap_peralatan, 0, 0, '.') ;?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Investasi:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_tetap_investasi, 0, 0, '.') ;?></i>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				Jumlah (b):
			</div>
			<div class="col-sm-6">
                                <b><i>Rp.<?= number_format($model->total_aktiva_tetap, 0, 0, '.') ;?></i></b>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				3.AKTIVA LAINNYA (c):
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->aktiva_lainnya, 0, 0, '.') ;?></i>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				<b>TOTAL JUMLAH:</b>
			</div>
			<div class="col-sm-6">
                                <b><i>Rp.<?= number_format($model->total_aktiva_lainnya, 0, 0, '.') ;?></i></b>
			</div>
		</div>
		
	</div>
	<div class="col-sm-6">
		PASIVA
		
		<div class="row">
			<div class="col-sm-12">
			4. HUTANG JANGKAPENDEK
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Hutang dagang:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->pasiva_hutang_dagang, 0, 0, '.') ;?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Hutang pajak:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->pasiva_hutang_pajak, 0, 0, '.') ;?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Hutang lainnya:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->pasiva_hutang_lainnya, 0, 0, '.') ;?></i>
			</div>
		</div>	
		<br>
		<div class="row">
			<div class="col-sm-6">
				Jumlah (d):
			</div>
			<div class="col-sm-6">
                                <b><i>Rp.<?= number_format($model->total_hutang, 0, 0, '.') ;?></i></b>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				5.HUTANG JANGKAPANJANG:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->hutang_jangka_panjang, 0, 0, '.') ;?></i>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				6.KEKAYAAN BERSIH:
			</div>
			<div class="col-sm-6">
                                <i>Rp. <?= number_format($model->kekayaan_bersih, 0, 0, '.') ;?></i>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				<b>TOTAL JUMLAH:</b>
			</div>
			<div class="col-sm-6">
				<b><i>Rp.<?= number_format($model->total_kekayaan, 0, 0, '.') ;?></i></b>
			</div>
		</div>
		
	</div>
</div>	