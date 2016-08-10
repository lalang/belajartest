<?php
use yii\helpers\Url;
use yii\helpers\BaseUrl;
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $model->id;
$sk_siup =$model;
// $sk_siup = str_replace('{qrcode}', '<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
//print_r($sk_siup);echo 'asdf';

$asdf = array('asdf', 'asdfasdf', 'asdfasdfasdf');
echo Html::a('Test', ['/'.$model->izin->action.'/dgs', 'id' => $model->perizinan_id], [
                                    'class' => 'btn btn-primary',
                                    
                        ]);

//echo json_encode($asdf);
//echo '<a href="/izin-penelitian/dgs?id='.''.$model->id.'">tes</a>';
echo '<img src="' . Url::to(['qrdigital', 'data' => $model->perizinan_id]) . '"/>';
