<div class="row">
	<div class="col-sm-3">
		<strong>Nomor Akta Pendirian:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->nomor_akta_pendirian; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Tanggal Pendirian:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= Yii::$app->formatter->asDate($model->tanggal_pendirian, 'php: d F Y'); ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Nama Notaris Pendirian:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->nama_notaris_pendirian; ?></i>
	</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Nomor SK Pengesahan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nomor_sk_pengesahan; ?></i>
    </div>
	<div class="col-sm-3">
        <strong>Tanggal Pengesahan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= Yii::$app->formatter->asDate($model->tanggal_pengesahan, 'php: d F Y'); ?></i>
    </div>
</div>

<!-- s: Lopping -->
<div class="panel-heading panel-title" style="background:#dddddd; margin-top: 10px;"><span class="glyphicon glyphicon-book"></span> Akta Perubahan</div>
<div class="panel-body" style="border:1px solid #dddddd; margin-bottom: 10px;">
<?php
$akta = \backend\models\IzinPariwisataAkta::findAll(['izin_pariwisata_id' => $model->id]);
foreach($akta as $dataAkta){?>
<div class="row">
	<div class="col-sm-3">
		<strong>Nomor Akta:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $dataAkta->nomor_akta; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Tanggal Akta:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= Yii::$app->formatter->asDate($dataAkta->tanggal_akta, 'php: d F Y'); ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Nama Notaris:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $dataAkta->nama_notaris; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Nomor Pengesahan:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $dataAkta->nomor_pengesahan; ?></i>
	</div>	
	<div class="col-sm-3">
		<strong>Tanggal Pengesahan:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= Yii::$app->formatter->asDate($dataAkta->tanggal_pengesahan, 'php: d F Y'); ?></i>
	</div>
</div>
<?php } ?>
</div>
<!-- e: Lopping -->
<div class="row">
	<div class="col-sm-3">
		<strong>Nomor Akta Cabang (Jika ada):</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->nomor_akta_cabang; ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Tanggal Akta Cabang:</strong>
	</div>
	<div class="col-sm-3">
		<i><?= Yii::$app->formatter->asDate($model->tanggal_cabang, 'php: d F Y'); ?></i>
	</div>
	<div class="col-sm-3">
		<strong>Nama Notaris Cabang (Jika ada):</strong>
	</div>
	<div class="col-sm-3">
		<i><?= $model->nama_notaris_cabang; ?></i>
	</div>

</div>
<div class="row">
    <div class="col-sm-6">
        <strong>Keputusan/ Penunjukan/ Dokumen yang sejenis (Jika ada):</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->keputusan_cabang; ?></i>
    </div>
</div>
<div class="row">
	<div class="col-sm-6">
        <strong>Tanggal Keputusan Cabang:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= Yii::$app->formatter->asDate($model->tanggal_keputusan_cabang, 'php: d F Y'); ?></i>
    </div>
</div>
