<?php
namespace common\components;

use SoapClient;
use SoapFault;

class Service {

    public static function getPendudukInfo($nik, $nokk) {
        try {
        $client = new SoapClient("http://10.15.3.116:11000/ws/com.gov.dki.in.ws:PendudukMgmt?WSDL");
        $params = array(
            "nik" => $nik,
            "nokk" => $nokk,
        );

        $result = $client->__soapCall('getPendudukInfo', array($params));
        }catch (SoapFault $fault) {
             $data['response'] = FALSE;
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
        
        $client = new SoapClient("http://10.15.3.116:5555/ws/gov.dki.djp.api.expose.ws:DKISOA_DJPprov?WSDL", $config);

        //$client = new SoapClient("http://10.15.3.116:5555/ws/gov.dki.djp.api.expose.ws:DKISOA_DJPprov?WSDL");
        $params = array(
            "npwp" => $npwp,
        );
        
            
        $result = $client->__soapCall('npwpVerificationWrapper', array($params));
        }catch (SoapFault $fault) {
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
                $data['nama'] = $result->WP_INFO->NAMA;
                $data['alamat'] = $result->WP_INFO->ALAMAT;
                $data['jnis_wp'] = $result->WP_INFO->JENIS_WP;
                $data['response'] = TRUE;
            }
//        }
        return $data;
    }

}
