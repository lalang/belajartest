<div class="row">
    <div class="col-sm-3">
        <strong>NPWP:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->npwp; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Nama Instansi:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->nama_instansi; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Fakultas:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->fakultas; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Alamat:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->alamat_instansi; ?>,</i></br>
        <i><strong>Prop.</strong> <?= $model->nama_propinsi_pt; ?>, <strong>Kab.</strong> <?= $model->nama_kabkota_pt; ?>, <strong>Kec.</strong> <?= $model->nama_kecamatan_pt; ?>, <strong>Kel.</strong> <?= $model->nama_kelurahan_pt; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Kodepos:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->kodepos_instansi; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Email:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->email_instansi; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Telp:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->telepon_instansi; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Fax:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->fax_instansi; ?></i>
    </div>
</div>
