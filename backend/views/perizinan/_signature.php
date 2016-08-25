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
//echo Html::a('Test', ['/'.$model->izin->action.'/dgs', 'id' => $model->perizinan_id], [
//                                    'class' => 'btn btn-primary',
//                                    'id' => 'validation_button',
//                        ]);

//echo json_encode($asdf);
//echo '<a href="/izin-penelitian/dgs?id='.''.$model->id.'">tes</a>';
echo '<img src="' . Url::to(['qrdigitals', 'data' => $model->perizinan_id]) . '"/>';

echo '<button type="button" class="btn btn-primary" id="verifikasi"><i class="icon fa fa-sign-in"></i> Verifikasi</button>';

$this->registerJs('
    $("#verifikasi").click(function(){
        $.ajax({
            type: "post",
            data: "perizinan_id=" +'.$model->perizinan_id.',
            url: "'.Yii::getAlias('@test') . '/perizinan/verifikasiqr",
            success: function(result){
                if(result == "success"){
                    $("#succVer").show();
                    $(".btn btn-primary btn-disabled").attr(“disabled”, false);
                    $("#validation_button).attr("disabled", true);
                } else if(result == "fail"){
                    $("#failVer").show();
                    $(".btn btn-primary btn-disabled").attr(“disabled”, true);
                } else {
                    $("#prosVer").show();
                    $(".btn btn-primary btn-disabled").attr(“disabled”, true);
                }
            }
        });
    });
');

?>

<div id="succVer" class="alert alert-success alert-dismissible" role="alert" style="display: none">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Digital signature telah terverifikasi...</strong>
</div>
<div id="failVer" class="alert alert-danger alert-dismissible" role="alert" style="display: none">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Digital signature gagal diverifikasi...</strong>
</div>
<div id="prosVer" class="alert alert-warning alert-dismissible" role="alert" style="display: none">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Digital signature masih dalam proses verifikasi...</strong>
</div>
