<?php
$service = Send2SmsGateway($isdn, $msg, $upl, $url);
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
                $contentType = (isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : '');
                $proxy = '10.15.3.21';
                $proxyport = '80';
//                $proxyauth = 'user:password';

                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_PROXY, $proxy);
                curl_setopt($ch, CURLOPT_PROXYPORT, $proxyport);
//                curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
//                
//                curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
//                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_HEADER, TRUE);

                if($contentType) { 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: $contentType" )); 
                }

                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);

                curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
//                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
//                curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "/certs/gu.crt");
//die(getcwd() . "/certs/gu.crt");
                $url_get_contents_data = curl_exec($ch);
            }
            if ($url_get_contents_data === FALSE) {
                trigger_error('Curl failed with ERROR #'.curl_errno($ch).': '.curl_error($ch).' URL:'.$url);
            }
//die(var_dump(curl_getinfo($ch,CURLINFO_HEADER_OUT)));

            curl_close($ch);
            
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


function Send2SmsGateway($isdn, $msg, $upl, $url) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $string = '';
    for ($i = 0; $i < $random_string_length; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    //$uid = 'BPTSPTes';
    //$pwd = 'BPTSPTes123';
    //$isdn = $isdn;
    //$msg = $string.' '.$msg;
    //$sdr = 'INFO'; //Sender or Masking that will be displayed on cell phone when the SMS received
    //$div = 'FSI Testing'; //Clientâ€™s division name. Please set value division who has been registered by Jatis Team (Maximum 50 characters) (mandatory)
    //$btch = 'batchtest'; //Batch information (Maximum 200 characters)
    //$upl = $upl;
    //$chn = '1'; //0: Normal SMS; 1: Alert SMS; 2: OTP SMS

    //$url = "https://sms-api.jatismobile.com/index.ashx?userid=".$uid."&password=".$pwd."&msisdn=".$isdn."&message=".$msg."&sender=".$sdr."&division=".$div."&batchname=".$btch."&uploadby=".$upl."&channel=".$chn;

    $result = url_get_contents($url, $uid, $pwd);

    if ($result === FALSE) {
        $error = error_get_last();
        $data['message'] = $error['message'];
        $data['result'] = 'FAILED';
    } else {
        $data['message'] = $result;
        $data['result'] = 'SUCCESS';
    }

    return $data;
}
