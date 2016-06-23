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
        <i><?= $model->nama; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Alamat:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->alamat_pemohon; ?>, <strong>RT:</strong> <?= $model->rt; ?>, <strong>RW:</strong> <?= $model->rw; ?></i></br>
        <i><strong>Prop.</strong> <?= $model->nama_propinsi; ?>, <strong>Kab.</strong> <?= $model->nama_kabkota; ?>, <strong>Kec.</strong> <?= $model->nama_kecamatan; ?>, <strong>Kel.</strong> <?= $model->nama_kelurahan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Tempat/ Tanggal Lahir:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->tempat_lahir; ?>, <?= $model->tanggal_lahir; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-1">
        <strong>Kodepos:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->kode_pos; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Telepon:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->telepon_pemohon; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-1">
        <strong>Pekerjaan:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->pekerjaan_pemohon; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Email:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->email; ?></i>
    </div>
</div>