<div class="row">
	<div class="col-sm-4">
		Modal Dan Nilai Kekayaan Bersih Perusahaan:
	</div>
	<div class="col-sm-8">
		<i><?= $model->modal; ?></i>
	</div>
</div>		
<div class="row">
	<div class="col-sm-4">
		Saham (Khusus untuk penanam modal asing)
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-3">
				Total Nilai Saham:
			</div>
			<div class="col-sm-3">
				<i><?= $model->nilai_saham_pma; ?></i>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-4">
				Komposisi Pemilik Saham
			</div>
			<div class="col-sm-8">
				<div class="row">	
					<div class="col-sm-4">
						Saham Nasional:
					</div>
					<div class="col-sm-8">
						<i><?= $model->saham_nasional; ?></i>
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-4">
						Saham Asing:
					</div>
					<div class="col-sm-8">
						<i><?= $model->saham_asing; ?></i>
					</div>
				</div>		
			</div>
		</div>
	</div>	
</div>	