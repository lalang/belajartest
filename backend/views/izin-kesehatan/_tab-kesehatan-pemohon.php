<div class="row">
    <div class="col-sm-3">
        <strong>NIK:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->nik; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Nama:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->nama_gelar; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Jenis Kelamin:</strong>
    </div>
    <div class="col-sm-9">
        <i><?php 
                  if($model->jenkel=='L')
                  {echo 'Laki-laki ';}
                  else echo 'Perempuan';
                  ?>, 
            <strong>Tempat Lahir:</strong> <?= $model->tempat_lahir; ?>, <strong>Tanggal lahir:</strong> <?= Yii::$app->formatter->asDate($model->tanggal_lahir, 'php: d F Y'); ?>
        </i></br>
        <i><strong>Agama:</strong> <?= $model->agama; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Alamat:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->alamat; ?>, <strong>RT:</strong> <?= $model->rt; ?>, <strong>RW:</strong> <?= $model->rw; ?></i></br>
        <i><strong>Prop.</strong> <?= $model->nama_propinsi; ?>, <strong>Kab.</strong> <?= $model->nama_kabkota; ?>, <strong>Kec.</strong> <?= $model->nama_kecamatan; ?>, <strong>Kel.</strong> <?= $model->nama_kelurahan; ?></i>
    </div>
</div>

<div class="row">
    <div class="col-sm-1">
        <strong>Kodepos:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->kodepos; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Telepon:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->telepon; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Email:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->email; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-1">
        <strong>Kewarganegaraan:</strong>
    </div>
    <div class="col-sm-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i><?= $model->nama_negara; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Kitas:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->kitas; ?></i>
    </div>
</div>