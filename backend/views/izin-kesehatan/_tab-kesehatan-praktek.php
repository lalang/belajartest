<div class="row">
    <div class="col-sm-3">
        <strong>No STR:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->nomor_str; ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Tanggal Berlaku STR:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= Yii::$app->formatter->asDate($model->tanggal_berlaku_str, 'php: d F Y'); ?></i>
    </div>
    <div class="col-sm-3">
        <strong>Perguruan Tinggi:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->perguruan_tinggi; ?></i>
    </div>
    <div class="col-sm-3">
        <strong>Tanggal Lulus:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= Yii::$app->formatter->asDate($model->tanggal_lulus, 'php: d F Y'); ?></i>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>No Rekomendasi:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->nomor_rekomendasi; ?>, 
            <strong>Status Kepegawaian:</strong> 
        <?= $model->nama_pegawai; ?></i></br>
        <i><strong>Fasilitas Kesehatan:</strong> <?= $model->nama_izin; ?>,
           <strong>No Fasilitas Kesehatan:</strong> <?= $model->nomor_fasilitas_kesehatan; ?>,
           <strong>Tanggal Fasilitas Kesehatan:</strong> <?= Yii::$app->formatter->asDate($model->tanggal_fasilitas_kesehatan, 'php: d F Y'); ?>
        </i>
        
    </div>
</div>

<div class="row">
    <div><strong>Surat Keterangan dari Pimpinan</strong></div>
    <div class="col-sm-3">
        <strong>Nomor:</strong>
        <i><?= $model->nomor_pimpinan; ?>
    </div>
    <div class="col-sm-9">
        <strong>Tanggal Surat:</strong> 
        <?= Yii::$app->formatter->asDate($model->tanggal_pimpinan, 'php: d F Y');?></i></br>
    </div>
</div>
<div class="col-sm-12">
        <div class="row">
            <ul>
                
                <?php
                $jadwal = $model->izinKesehatanJadwals;
                $i=1;
                foreach ($jadwal as $jadwals) {
                    echo  '<li> Jadwal '.$i.'</li>';
                    echo $jadwals->hari_praktik;
                    echo $jadwals->jam_praktik;
                    $i++;
                }
                ?>
            </ul>
        </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>NPWP:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->npwp_tempat_praktik; ?>, <strong>Nama Tempat Praktik:</strong> <?= $model->nama_tempat_praktik; ?>, 
            <strong>latitude:</strong> <?= $model->latitude; ?>
            <strong>longitude:</strong> <?= $model->longitude; ?>
        </i></br>
        
    </div>
</div>

<div class="row">
    <div class="col-sm-1">
        <strong>Nama Gedung:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_gedung_praktik; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Blok Tempat_Praktik:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->blok_tempat_praktik; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Alamat Tempat Praktik:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->alamat_tempat_praktik; ?></i>
         <strong>RT:</strong> <?= $model->rt_tempat_praktik; ?>, <strong>RW:</strong> <?= $model->rw_tempat_praktik; ?></i></br>
        <i><strong>Kab.</strong> <?= $model->nama_kabkota_pt; ?>, 
           <strong>Kec.</strong> <?= $model->nama_kecamatan_pt; ?>, <strong>Kel.</strong> <?= $model->nama_kelurahan_pt; ?>
        </i>
    </div>
</div>
<div class="row">
    <div class="col-sm-1">
        <strong>Kode Pos praktik:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->kodepos_tempat_praktik; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Telepon praktik:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->telpon_tempat_praktik; ?>,
        <strong>Fax praktik:</strong><?= $model->fax_tempat_praktik; ?>, 
        <strong>Email praktik:</strong>><?= $model->email_tempat_praktik; ?>, 
        
        </i>
    </div>
    
    
    <div class="col-sm-2">
        <strong>No Izin Kesehatan:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->nomor_izin_kesehatan; ?></i>
    </div></br></br></br>
    <div class="col-sm-2">
        <strong>Jadwal lain:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->status_sip_offline; ?>,
        <strong>Jumlah jadwal lain</strong> <?= $model->jumlah_sip_offline; ?>
        </i>
    </div>
</div>