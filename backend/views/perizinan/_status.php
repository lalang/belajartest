<?php
// test eko: wsdl
$viewdata = (new \yii\db\Query())
    ->select([
        'id', 
        'kode_registrasi',
        'nama_perusahaan',
        'alamat_perusahaan',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'kode_pos',
        'telpon_perusahaan',
        'fax_perusahaan',
        'email',
        'status_badanusaha',
        'bentuk_perusahaan',
        'no_izin',
        'jenis_usaha',
        'npwp_perusahaan',
        'nama_pimpinan_pengurus',
        'status_kepemilikanbadanusaha',
        'status',
        'id_izin_id',
        'tgl_simpan',
        'flag_sent',
        ])
    ->from('v_bpjs_xml_siup')
    ->where(['id' => $model->id])
    ->all();
    $params = array(
        'id' => $viewdata[0]['id'], 
        'kode_registrasi' => $viewdata[0]['kode_registrasi'],
        'nama_perusahaan' => $viewdata[0]['nama_perusahaan'],
        'alamat_perusahaan' => $viewdata[0]['alamat_perusahaan'],
        'kelurahan' => $viewdata[0]['kelurahan'], 
        'kecamatan' => $viewdata[0]['kecamatan'],
        'kabupaten' => $viewdata[0]['kabupaten'],
        'kode_pos' => $viewdata[0]['kode_pos'],
        'telpon_perusahaan' => $viewdata[0]['telpon_perusahaan'], 
        'fax_perusahaan' => $viewdata[0]['fax_perusahaan'],
        'email' => $viewdata[0]['email'],
        'status_badanusaha' => $viewdata[0]['status_badanusaha'],
        'bentuk_perusahaan' => $viewdata[0]['bentuk_perusahaan'], 
        'no_izin' => $viewdata[0]['no_izin'],
        'jenis_usaha' => $viewdata[0]['jenis_usaha'],
        'npwp_perusahaan' => $viewdata[0]['npwp_perusahaan'],
        'nama_pimpinan_pengurus' => $viewdata[0]['nama_pimpinan_pengurus'], 
        'status_kepemilikanbadanusaha' => $viewdata[0]['status_kepemilikanbadanusaha'],
        'status' => $viewdata[0]['status'],
        'id_izin_id' => $viewdata[0]['id_izin_id'],
        'tgl_simpan' => $viewdata[0]['tgl_simpan'], 
        'va_bpjs' => '123',
    );

echo '<div class="box box-info"><div class="box-header with-border">';

try 
{
    $time_start = microtime(true);
    $options = array(
        /*'login' => 'ptsp',*/
        /*'password' => 'ptsp123',*/
        /*'soap_version' => SOAP_1_2,*/
        'exceptions' => 1,
        'trace' => 1,
        'cache_wsdl' => WSDL_CACHE_NONE,
        'connection_timeout' => 15,
    );
    $client = new SoapClient("http://10.15.3.114:12000/ws/gov.dki.bpjs.ws.provider:insertDBTempBpjsSiup?WSDL", $options);
}
catch (Exception $e) 
{
    echo "<h2>Exception Error!</h2>";
    $time_request = (microtime(true)-$time_start);
    if(ini_get('default_socket_timeout') < $time_request) {
        echo 'Time Out';
    } else {
        $error = $e->getMessage();
        echo $error;
    }
}

try 
{
    $response = $client->__soapCall("insertDBTempBpjsSiup", array($params));
} 
catch (Exception $e)
{ 
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
print_r($params);
echo 'result: ';
echo '<br/>code: '.$response->response->code;
echo '<br/>message: '.$response->response->message;
echo '</div></div>';

?>
<div style="background-color: whitesmoke">
<ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            Permohonan Masuk (<?= \Yii::$app->formatter->asDate($model->tanggal_mohon, 'php: d M Y'); ?>)
        </span>
    </li>
    <!-- /.timeline-label -->

    <?php
    Yii::$app->formatter->locale = 'id-ID'; 
    foreach ($model->perizinanProses as $proses) {
        ?>

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <?php if ($proses->urutan < $model->current_no || $model->status == 'Selesai' || $model->status == 'Batal' || $model->status == 'Tolak Selesai') { ?>
                <i class="fa fa-check bg-green"></i>
            <?php } else if ($proses->urutan == $model->current_no) { ?>
                <i class="fa fa-arrow-right bg-red"></i>
            <?php } else { ?>
                <i class="fa fa-envelope bg-gray"></i>
            <?php } ?>
            <div class="timeline-item">
                
                <?php 
                    $mulai=$proses->mulai; 
                    $selesai=$proses->selesai;
               
                $selisih = (int)(strtotime ($selesai) - strtotime ($mulai));
                
                if($selesai!=NULL){
                    if(($selisih/60) < 1){
                        echo '<span class="time"> Lama Proses:'.$selisih.' Detik </span>';
                    } elseif(($selisih/60) > 0 && ($selisih/(60*60)) < 1){
                        $lama = (int)($selisih / 60);
                        echo '<span class="time"> Lama Proses:'.$lama.' Menit </span>';
                    } elseif (($selisih/(60*60)) > 0 && ($selisih/(60*60*24)) < 1) {
                        $lama = (int)($selisih / (60*60));
                        echo '<span class="time"> Lama Proses:'.$lama.' Jam </span>';
                    } elseif (($selisih/(60*60*24)) > 0) {
                        $lama = (int)($selisih / (60*60*24));
                        echo '<span class="time"> Lama Proses:'.$lama.' Hari </span>';
                    }
                } else {
                    
                }
                ?>
                
                <span class="time">Target: <?= $proses->sop->durasi.'&nbsp;&nbsp;'.$proses->sop->durasi_satuan ; ?></span>

                <h5 class="timeline-header"><?= $proses->nama_sop; ?> - <?= $proses->pelaksana->nama; ?></h5>
                  <div class="timeline-body">
                      mulai Proses : <i class="fa fa-clock-o"></i> <?= $proses->mulai != NULL? date('d M Y H:i:s',  strtotime($proses->mulai)):''; ?> <br>
                      Selesai Proses : <i class="fa fa-clock-o"></i> <?= $proses->selesai != NULL? date('d M Y H:i:s',  strtotime($proses->selesai)):''; ?> <br>
                     <?php $diff = strtotime($proses->selesai) - strtotime($proses->mulai); ?>
                      Catatan Petugas : <?= $proses->keterangan; ?>   <br> 
                    </div>
            </div>

        </li>
        <!-- END timeline item -->

    <?php } ?>
    <li class="time-label">
        <span class="bg-red">
            Selesai
        </span>
    </li>
</ul>
</div>
