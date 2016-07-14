<div class="col-sm-12">
    <?php if($model->izinKesehatanJadwalSatus != null && $model->izinKesehatanJadwalSatus->jam_praktik !=null){?>
    <h3><strong>Tempat Praktek Satu</strong></h3>
        <div class="row">
            <ul>
                
                <?php
                
                $jadwal = $model->izinKesehatanJadwalSatus;
                $i=1;
                foreach ($jadwal as $jadwals) {
                    echo  '<li> Jadwal '.$i.'</li>';
                    echo $jadwals->hari_praktik.' ';
                    echo $jadwals->jam_praktik;
                    $i++;
                }
                
                ?>
            </ul>
        </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Fasilitas Kesehatan:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->jenis_praktik_i; ?>, <strong>Nama Tempat Praktik:</strong> <?= $model->nama_tempat_praktik_i; ?>, 
            <strong>nomor sip:</strong> <?= $model->nomor_sip_i; ?>
            <strong>Masa Berlaku SIP:</strong> <?= Yii::$app->formatter->asDate($model->tanggal_berlaku_sip_i, 'php: d F Y'); ?>
        </i></br>
        
    </div>
</div>

<div class="row">
    <div class="col-sm-1">
        <strong>Nama Gedung:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_gedung_praktik_i; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Blok Tempat_Praktik:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->blok_tempat_praktik_i; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Alamat Tempat Praktik:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->alamat_tempat_praktik_i; ?></i>
         <strong>RT:</strong> <?= $model->rt_tempat_praktik_i; ?>, <strong>RW:</strong> <?= $model->rw_tempat_praktik_i; ?></i></br>
        <i><strong>Prop.</strong> <?= $model->propinsi_praktik_1; ?><strong>Kab.</strong> <?= $model->wilayah_praktik_1; ?>, 
           <strong>Kec.</strong> <?= $model->kecamatan_praktik_1; ?>, <strong>Kel.</strong> <?= $model->kelurahan_praktik_1; ?>
        </i>
    </div>
</div>
<?php }
        
    if($model->izinKesehatanJadwalDuas != null && $model->izinKesehatanJadwalSatus->jam_praktik !=null){?>
<div class="col-sm-12">
    <h3><strong>Tempat Praktek Dua</strong></h3>
        <div class="row">
            <ul>
                
                <?php
                $jadwal = $model->izinKesehatanJadwalDuas;
                $i=1;
                foreach ($jadwal as $jadwals) {
                    echo  '<li> Jadwal '.$i.'</li>';
                    echo $jadwals->hari_praktik.' ';
                    echo $jadwals->jam_praktik;
                    $i++;
                }
                ?>
            </ul>
        </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <strong>Fasilitas Kesehatan:</strong>
    </div>
    <div class="col-sm-9">
        <i><?= $model->jenis_praktik_ii; ?>, <strong>Nama Tempat Praktik:</strong> <?= $model->nama_tempat_praktik_ii; ?>, 
            <strong>nomor sip:</strong> <?= $model->nomor_sip_ii; ?>
            <strong>Masa Berlaku SIP:</strong> <?= Yii::$app->formatter->asDate($model->tanggal_berlaku_sip_ii, 'php: d F Y'); ?>
        </i></br>
        
    </div>
</div>

<div class="row">
    <div class="col-sm-1">
        <strong>Nama Gedung:</strong>
    </div>
    <div class="col-sm-3">
        <i><?= $model->nama_gedung_praktik_ii; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Blok Tempat_Praktik:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->blok_tempat_praktik_ii; ?></i>
    </div>
    <div class="col-sm-2">
        <strong>Alamat Tempat Praktik:</strong>
    </div>
    <div class="col-sm-6">
        <i><?= $model->alamat_tempat_praktik_ii; ?></i>
         <strong>RT:</strong> <?= $model->rt_tempat_praktik_ii; ?>, <strong>RW:</strong> <?= $model->rw_tempat_praktik_ii; ?></i></br>
        <i><strong>Prop.</strong> <?= $model->propinsi_praktik_2; ?><strong>Kab.</strong> <?= $model->wilayah_praktik_2; ?>, 
           <strong>Kec.</strong> <?= $model->kecamatan_praktik_2; ?>, <strong>Kel.</strong> <?= $model->kelurahan_praktik_2; ?>
        </i>
    </div>
</div>
 <?php }
 else echo 'Tidak ada jadwal lain';
 ?>