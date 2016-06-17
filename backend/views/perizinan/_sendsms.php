<?php

$service = Send2SmsGateway($pemohon, $reg);
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

function Send2SmsGateway($pemohon, $noRegis) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $string = '';
    for ($i = 0; $i < $random_string_length; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    $uid = 'BPTSP';
    $pwd = 'BPTSP123';
    $isdn = \dektrium\user\models\Profile::findOne(['user_id'=>  $pemohon])->telepon;
    $sdr = 'BPTSP-DKI';
    
    $msg = Yii::t('user', 'Permohonan perizinan / non perizinan Anda dengan nomor registrasi ') . $noRegis . " telah selesai. " .
      Yii::t('user', 'Silahkan datang ke loket PTSP sesuai permohonan, untuk verifikasi dokumen persyaratan dan pengambilan dokumen izin/non izin.') . " - " .
      Yii::t('user', '' . date("d-m-Y H:i:s"));
    
    $msg = urlencode($msg);
    $div = urlencode('Sistem Informasi Manajemen');
    $btch = '-';
    $upl = 'PTSP_ONLINE';
    $chn = '0';
    $url = "https://sms-api.jatismobile.com/index.ashx?userid=" . $uid . "&password=" . $pwd . "&msisdn=" . $isdn . "&message=" . $msg . "&sender=" . $sdr . "&division=" . $div . "&batchname=" . $btch . "&uploadby=" . $upl . "&channel=" . $chn;
    
    $proxy = '10.15.3.21';
    $proxyport = '80';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxyport);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    $result = curl_exec($ch);
    
    curl_close($ch);

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
