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
				<i>Rp.<?= $model->aktiva_lancar_kas; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Bank:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->aktiva_lancar_bank; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Piutang:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->aktiva_lancar_piutang; ?></i>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-6">
				Persedian Barang:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->aktiva_lancar_barang; ?></i>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-6">
				Pekerjaan Dalam Proses:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->aktiva_lancar_pekerjaan; ?></i>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				Jumlah (a):
			</div>
			<div class="col-sm-6">
				<b><i>Rp.<?php $total_a = $model->aktiva_lancar_kas+$model->aktiva_lancar_bank+$model->aktiva_lancar_piutang+$model->aktiva_lancar_barang+$model->aktiva_lancar_pekerjaan; echo $total_a;?></i></b>
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
				<i>Rp.<?= $model->aktiva_tetap_peralatan; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Investasi:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->aktiva_tetap_investasi; ?></i>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				Jumlah (b):
			</div>
			<div class="col-sm-6">
				<b><i>Rp.<?php $total_b = $model->aktiva_tetap_peralatan+$model->aktiva_tetap_investasi; echo $total_b;?></i></b>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				3.AKTIVA LAINNYA (c):
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->aktiva_lainnya; ?></i>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				<b>TOTAL JUMLAH:</b>
			</div>
			<div class="col-sm-6">
				<b><i>Rp.<?php $jumlah_aktiva = $total_a + $total_b + $model->aktiva_lainnya; echo $jumlah_aktiva; ?></i></b>
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
				<i>Rp.<?= $model->pasiva_hutang_dagang; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Hutang pajak:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->pasiva_hutang_pajak; ?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				Hutang lainnya:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->pasiva_hutang_lainnya; ?></i>
			</div>
		</div>	
		<br>
		<div class="row">
			<div class="col-sm-6">
				Jumlah (d):
			</div>
			<div class="col-sm-6">
				<b><i>Rp.<?php $total_d = $model->pasiva_hutang_dagang+$model->pasiva_hutang_pajak+$model->pasiva_hutang_lainnya; echo $total_d;?></i></b>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				5.HUTANG JANGKAPANJANG:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->hutang_jangka_panjang; ?></i>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				6.KEKAYAAN BERSIH:
			</div>
			<div class="col-sm-6">
				<i>Rp.<?= $model->kekayaan_bersih; ?></i>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-6">
				<b>TOTAL JUMLAH:</b>
			</div>
			<div class="col-sm-6">
				<b><i>Rp.<?php $jumlah_pasiva = $total_d + $model->hutang_jangka_panjang + $model->kekayaan_bersih; echo $jumlah_pasiva; ?></i></b>
			</div>
		</div>
		
	</div>
</div>	