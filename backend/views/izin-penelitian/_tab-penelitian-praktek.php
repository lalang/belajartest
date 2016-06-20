<div class="row">
    <div class="col-sm-3">
        <strong>Tema:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->tema; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <b>Lokasi Penelitian :</b>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <ul>
                <li>
                    <?= $model->nama_kabkota_penelitian; ?>
                </li>
                <?php
                $lokasis = $model->izinPenelitianLokasis;
                foreach ($lokasis as $lokasi) {
                    $namaLokasi = backend\models\Lokasi::find()->where(['id' => $lokasi->kota_id])->one();
                    echo '<li>' . $namaLokasi->nama . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Instansi Penelitian:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->instansi_penelitian; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Bidang Penelitian:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->bidang_penelitian; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Alamat Penelitian:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->alamat_penelitian; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <b>Metode Penelitian :</b>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <ul>
                <?php
                $metodes = $model->izinPenelitianMetodes;
                foreach ($metodes as $metode) {
                    $namaMetode = backend\models\MetodePenelitian::find()->where(['id' => $metode->metode_id])->one();
                    echo '<li>' . $namaMetode->metode . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <strong>Tanggal Mulai:</strong>
    </div>
    <div class="col-sm-2">
        <i><?= $model->tgl_mulai_penelitian; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Tanggal Berakhir:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->tgl_akhir_penelitian; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <b>Anggota Penelitian : <?= $model->anggota; ?> Orang</b>
    </div>
    <div class="col-sm-4">
        <b>NIK Anggota</b>
    </div>
    <div class="col-sm-4">
        <b>Nama Anggota</b>
    </div>
    <div class="col-sm-4">
        <b>Bidang Anggota</b>
    </div>
    <?php
    $anggotas = $model->anggotaPenelitians;
    foreach ($anggotas as $anggota) {
        echo"<div class='col-sm-4'><i>" . $anggota->nik_peneliti . "</i></div>";
        echo"<div class='col-sm-4'><i>" . $anggota->nama_peneliti . "</i></div>";
        echo"<div class='col-sm-4'><i>" . $anggota->bidang . "</i></div>";
    }
    ?>
</div>