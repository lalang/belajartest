<?php
namespace common\components;

use SoapClient;
use SoapFault;

class Service {

    public static function Send2SmsGateway($isdn, $msg, $upl) {
        $uid = 'BPTSPTes';
        $pwd = 'BPTSPTes123';
        $isdn = $isdn;
        $msg = $msg;
        $sdr = 'INFO'; //Sender or Masking that will be displayed on cell phone when the SMS received
        $div = 'FSI Testing'; //Client’s division name. Please set value division who has been registered by Jatis Team (Maximum 50 characters) (mandatory)
        $btch = 'batchtest'; //Batch information (Maximum 200 characters)
        $upl = $upl;
        $chn = '0'; //0: Normal SMS; 1: Alert SMS; 2: OTP SMS

        $options = array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
            )
        );

        $context = stream_context_create($options);

        //$url = "http://smsapi.jatismobile.com/index.ashx?userid=".$uid."&password=".$pwd."&msisdn=".$isdn."&message=".$msg."&sender=".$sdr."&division=".$div."&batchname=".$btch."&uploadby=".$upl."&channel=".$chn;
        $url = "https://api.exchange.coinbase.com/products/BTC-USD/candles?start=2015-05-07&end=2015-05-08&granularity=900";

        $result = file_get_contents($url, false, $context);

        //die();
        if ($result === FALSE) {
            $error = error_get_last();
            $data['message'] = "HTTP request failed. Error was: " . $error['message'];
            $data['result'] = 'FAILED';
        } else {
            $data['message'] = "Everything went better than expected";
            $data['result'] = 'SUCCESS';
        }

        return $data;
    }

    public static function Sendtransaksi4bpjs($id) {
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
            ->where(['id' => $id])
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
            $opts = array(
                'http'=>array(
                    'user_agent' => 'PHPSoapClient'
                    )
                );

            $context = stream_context_create($opts);

            $time_start = microtime(true);
            $options = array(
                'stream_context' => $context,
                'login' => 'ptsp',
                'password' => 'ptsp123',
                /*'soap_version' => SOAP_1_2,*/
                'trace' => 0,
                'exceptions' => 1,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'connection_timeout' => 5
            );

            try {
                $client = new SoapClient("http://10.15.3.114:12000/ws/gov.dki.bpjs.ws.provider:insertDBTempBpjsSiup?WSDL", $options);
                $response = $client->__soapCall("insertDBTempBpjsSiup", array($params));
                $data['message'] = $response->response->code.' | '.$response->response->message;

            } catch (SoapFault $fault) {
                $data['message'] = "SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})";
            }

            echo '</pre></div></div>';
            return $data;
        }
    }

    public static function getPendudukInfo($nik, $nokk) {
        try {
        $client = new SoapClient("http://10.15.3.116:11000/ws/com.gov.dki.in.ws:PendudukMgmt?WSDL");
        $params = array(
            "nik" => $nik,
            "nokk" => $nokk,
        );

        $result = $client->__soapCall('getPendudukInfo', array($params));
        }catch (SoapFault $fault) {
             $data['message'] = 'fault';
//        if (is_soap_fault($result)) {
//            $data['response'] = FALSE;
//            $data['message'] = 'fault';
        }
//        else {
            if ($result->statusCode == 0) {
//                $data['response'] = FALSE;
//                $data['message'] = 'NIK dan KK tidak valid';
            } elseif ($result->statusCode == 1) {
                $data['nama'] = $result->data->namaLgkp;
                $data['tmp_lahir'] = $result->data->tmpLahir;
                $data['tgl_lahir_result'] = $result->data->tglLahir;
                $tt = explode('/', $data['tgl_lahir_result']);
                $data['tgl_lahir'] = $tt[2] . '-' . $tt[1] . '-' . $tt[0];
                switch ($result->data->jenisKlmn) {
                    case '1':
                        $jk = 'L';
                        break;
                    case '2':
                        $jk = 'P';
                        break;
                }
                $data['jk'] = $jk;
                $data['prop'] = $result->data->noProp;
                $data['kab'] = $result->data->noKab;
                $data['kec'] = $result->data->noKec;
                $data['kel'] = $result->data->noKel;
                $data['alamat'] = $result->data->alamat . ' RT ' . $result->data->noRT . ' RW ' . $result->data->noRW;
                $data['response'] = TRUE;
            }
//        }
        return $data;
    }

    public static function getNpwpInfo($npwp) {

        // options for ssl in php 5.6.5
        try {
        $opts = array(
            'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false)
        );
        // SOAP 1.2 client
        $config = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_2, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts) );

        //Eko | 1-4-2016
        $client = new SoapClient("http://10.15.3.116:5555/ws/gov.dki.djp.api.expose.ws:DKISOA_DJP_NpwpInfo?WSDL", $config);

        //$client = new SoapClient("http://10.15.3.116:5555/ws/gov.dki.djp.api.expose.ws:DKISOA_DJPprov?WSDL", $config);
        //$client = new SoapClient("http://10.15.3.116:5555/ws/gov.dki.djp.api.expose.ws:DKISOA_DJPprov?WSDL");
        $params = array(
            "npwp" => $npwp,
        );

        //Eko | 1-4-2016
        $result = $client->__soapCall('npwpVerificationInfo', array($params));
        //$result = $client->__soapCall('npwpVerificationWrapper', array($params));
        } catch (SoapFault $fault) {
            $data['response'] = FALSE;
        }
//        if (is_soap_fault($result)) {
//            $data['response'] = FALSE;
//            $data['message'] = 'fault';
//        } else {
            if ($result->WP_INFO->NPWP == NULL) {
//                $data['response'] = FALSE;
//                $data['message'] = 'NPWP tidak valid';
            } elseif ($result->WP_INFO== 1) {
                //Eko | 1-4-2016
                $data['nama'] = $result->WP_INFO->NAMA_WP;
                $data['alamat'] = $result->WP_INFO->ALAMAT_WP;
                $data['jnis_wp'] = $result->WP_INFO->JENIS_WP;
                //$data['nama'] = $result->WP_INFO->NAMA;
                //$data['alamat'] = $result->WP_INFO->ALAMAT;
                $data['response'] = TRUE;
            }
//        }
        return $data;
    }

}
