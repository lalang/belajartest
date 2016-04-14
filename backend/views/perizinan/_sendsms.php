<?php
$service = Send2SmsGateway($isdn, $msg, $upl);
if ($service['result'] === 'SUCCESS') {
    $errtyp = 'success';
} else {
    $errtyp = 'danger';
}
$message = $service['message'];

Yii::$app->getSession()->setFlash('warning', [
    'type' => $errtyp,
    'duration' => 9000,
    'icon' => 'fa fa-info',
    'message' => $message,
    'title' => 'SMS> Informasi berkas siap',
    'positonY' => 'top',
    'positonX' => 'right'
]);

function url_get_contents ($url, $uid, $pwd) {
    if (function_exists('curl_exec')){ 
        try {
            $ch = curl_init();

            if ($ch === FALSE) {
                $url_get_contents_data = FALSE;
                trigger_error('Curl failed with error #'.curl_errno($ch).': '.curl_error($ch));

            } else {
                $proxy = '10.15.3.21:80';
//                $proxyauth = 'user:password';

                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HEADER, 1);
//                curl_setopt($ch, CURLINFO_HEADER_OUT, true);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
//                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
//                curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "/CAcerts/BuiltinObjectToken-EquifaxSecureCA.crt");

                $url_get_contents_data = curl_exec($ch);
            }
            if ($url_get_contents_data === FALSE) {
                trigger_error('Curl failed with ERROR #'.curl_errno($ch).': '.curl_error($ch).' URL:'.$url);
//die(var_dump(curl_getinfo($ch,CURLINFO_HEADER_OUT)));
            }

            curl_close($ch);
//die($url_get_contents_data);
            
        } catch(Exception $e) {

            $url_get_contents_data = FALSE;
        }

    }elseif(function_exists('file_get_contents')){
        $url_get_contents_data = file_get_contents($url);
    }elseif(function_exists('fopen') && function_exists('stream_get_contents')){
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
    }else{
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}

function Send2SmsGateway($isdn, $msg, $upl) {
    $uid = 'BPTSPTes';
    $pwd = 'BPTSPTes123';
    $isdn = $isdn;
    $msg = $msg;
    $sdr = 'INFO'; //Sender or Masking that will be displayed on cell phone when the SMS received
    $div = 'FSI Testing'; //Clientâ€™s division name. Please set value division who has been registered by Jatis Team (Maximum 50 characters) (mandatory)
    $btch = 'batchtest'; //Batch information (Maximum 200 characters)
    $upl = $upl;
    $chn = '0'; //0: Normal SMS; 1: Alert SMS; 2: OTP SMS

    $url = "http://smsapi.jatismobile.com/index.ashx?userid=".$uid."&password=".$pwd."&msisdn=".$isdn."&message=".$msg."&sender=".$sdr."&division=".$div."&batchname=".$btch."&uploadby=".$upl."&channel=".$chn;

    $result = url_get_contents($url, $uid, $pwd);

    if ($result === FALSE) {
        $error = error_get_last();
        $data['message'] = $error['message'];
        $data['result'] = 'FAILED';
    } else {
//die($result);
        $data['message'] = $result;
        $data['result'] = 'SUCCESS';
    }

    return $data;
}
