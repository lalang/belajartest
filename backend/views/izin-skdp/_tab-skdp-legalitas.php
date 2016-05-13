<div class="row">	
    <div class="col-sm-12">
        <b>Akta Pendirian</b>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
                <strong>Nomor:</strong>
            </div>
            <div class="col-sm-2">
                <i><?= $model->nomor_akta_pendirian; ?></i>
            </div>
            <div class="col-sm-2">
                <strong>Tgl Akta:</strong>
            </div>
            <div class="col-sm-2">
                <i><?= $model->tanggal_pendirian; ?></i>
            </div>
            <div class="col-sm-2">
                <strong>Nama Notaris:</strong>
            </div>
            <div class="col-sm-2">
                <i><?= $model->nama_notaris_pendirian; ?></i>
            </div>
        </div>
    </div>	

    <div class="col-sm-12">
        <b>SK Pengesahan</b>
    </div>
    <div class="col-sm-12">	

        <div class="row">
            <div class="col-sm-2">
                <strong>Nomor:</strong>
            </div>
            <div class="col-sm-2">
                <i><?= $model->nomor_sk_kemenkumham; ?></i>
            </div>
            <div class="col-sm-2">
                <strong>Tgl Pengesahan:</strong>
            </div>
            <div class="col-sm-6">
                <i><?= $model->tanggal_pengesahan; ?></i>
            </div>
        </div>		
    </div>
    <div class="col-sm-12">&nbsp;</div>
    <div class="col-sm-12">
        <strong>AKTA PERUBAHAN</strong>
    </div>
    <div class="col-sm-2">
        <b>Nama Notaris</b>
    </div>
    <div class="col-sm-2">
        <b>Nomor Akta</b>
    </div>
    <div class="col-sm-2">
        <b>Tanggal Akta</b>
    </div>
    <div class="col-sm-2">
        <b>Nomor Pengesahan</b>
    </div>
    <div class="col-sm-4">
        <b>Tanggal Pengesahan</b>
    </div>
    <?php
    $aktas = $model->izinSkdpAktas;
    foreach ($aktas as $akta) {
        echo"<div class='col-sm-2'><i>" . $akta->nama_notaris . "</i></div>";
        echo"<div class='col-sm-2'><i>" . $akta->nomor_akta . "</i></div>";
        echo"<div class='col-sm-2'><i>" . $akta->tanggal_akta . "</i></div>";
        echo"<div class='col-sm-2'><i>" . $akta->nomor_pengesahan . "</i></div>";
        echo"<div class='col-sm-4'><i>" . $akta->tanggal_pengesahan . "</i></div>";
    }
    ?>

</div>