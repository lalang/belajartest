<div class="row">
    <div class="col-sm-2">
        <strong>Titik Koordinat:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->titik_koordinat; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Latitude:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->latitude; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Longtitude:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->longtitude; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>NPWP:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->npwp_perusahaan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Nama Perusahaan:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->nama_perusahaan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Alamat:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->alamat_perusahaan; ?>, <strong>RT:</strong> <?= $model->rt_perusahaan; ?>, <strong>RW:</strong> <?= $model->rw_perusahaan; ?></i></br>
        <i><strong>Prop.</strong> DKI Jakarta, <strong>Kab.</strong> <?= $model->nama_kabkota_pt; ?>, <strong>Kec.</strong> <?= $model->nama_kecamatan_pt; ?>, <strong>Kel.</strong> <?= $model->nama_kelurahan_pt; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Block:</strong>
    </div>
    <div class="col-sm-1">
        <i><?= $model->blok_perusahaan; ?></i>
    </div>
    <div class="col-sm-3">
        <strong>Nama Gedung:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->nama_gedung_perusahaan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Kodepos:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->kodepos_perusahaan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Telp:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->telpon_perusahaan; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Fax:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->fax_perusahaan; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Jumlah Karyawan:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->jumlah_karyawan; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Klarifikasi Usaha:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->klarifikasi_usaha; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Status Kantor:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->status_kantor; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Status Kepemilikan:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->status_kepemilikan; ?></i>
    </div>
</div>
