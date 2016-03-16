<?php 
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
    ->where(['id' => $model->perizinan_id])
    ->all();

$params = array( 'request' => [
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
    'va_bpjs' => '',
    ]
);

if ($viewdata[0]['status'] == 'Selesai') {
    
    echo '<div class="box box-info"><div class="box-header with-border"><pre>';
    $time_start = microtime(true);
    $options = array(
        'login' => 'ptsp',
        'password' => 'ptsp123',
        /*'soap_version' => SOAP_1_2,*/
        'exceptions' => true,
        'cache_wsdl' => WSDL_CACHE_NONE,
        'connection_timeout' => 5,
    );

    try {
        $client = new SoapClient("http://10.15.3.114:12000/ws/gov.dki.bpjs.ws.provider:insertDBTempBpjsSiup?WSDL", $options);
        $response = $client->__soapCall("insertDBTempBpjsSiup", array($params));
die(print_r($response));
    } catch (SoapFault $fault) {
        trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
die($fault->faultstring);
    }

//    try 
//    {
//        $client = new SoapClient("http://10.15.3.114:12000/ws/gov.dki.bpjs.ws.provider:insertDBTempBpjsSiup?WSDL", $options);
//    }
//    catch (Exception $e) 
//    {
//        echo "<h2>Exception Error!</h2>";
//        $time_request = (microtime(true)-$time_start);
//        if(ini_get('default_socket_timeout') < $time_request) {
//            $error = '<strong>Time Out</strong>';
//        } else {
//            $error = $e->getMessage();
//        }
//        echo $error;
//    }
//    finally
//    {
//        try 
//        {
//            $response = $client->__soapCall("insertDBTempBpjsSiup", array($params));
//        } 
//        catch (Exception $e)
//        { 
//            echo 'Caught exception: ',  $e->getMessage(), "\n";
//        }
//        print_r($params);
//        $code = $response->response->code;
//        $message = $response->response->message;
//        echo '<strong>RESULT</strong>';
//        echo '<br/>code: '.$code;
//        echo '<br/>message: '.$message;
//        echo '</div></div>';
//    }
}
// end: eko/wsdl