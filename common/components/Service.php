<?php
namespace common\components;

use SoapClient;
use SoapFault;

class Service {

    public static function getPendudukInfo($nik, $nokk) {
        $client = new SoapClient("http://10.15.3.116:11000/ws/com.gov.dki.in.ws:PendudukMgmt?WSDL");
        $params = array(
            "nik" => $nik,
            "nokk" => $nokk,
        );

        $result = $client->__soapCall('getPendudukInfo', array($params));
        if (is_soap_fault($result)) {
            $data['response'] = FALSE;
            $data['message'] = 'fault';
        } else {
            if ($result->statusCode == 0) {
                $data['response'] = FALSE;
                $data['message'] = 'NIK dan KK tidak valid';
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
        }
        return $data;
    }

}
