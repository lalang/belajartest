<?php
use backend\models\Izin;
use backend\models\PerizinanSearch;
use kartik\slider\Slider;
use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;

use kartik\widgets\DepDrop;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $model->id;
$sk_siup =$model;
//die(print_r($model->id));
// $sk_siup = str_replace('{qrcode}', '<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
//print_r($sk_siup);echo 'asdf';

$asdf = array('asdf', 'asdfasdf', 'asdfasdfasdf');
//echo Html::a('Test', ['/'.$model->izin->action.'/dgs', 'id' => $model->perizinan_id], [
//                                    'class' => 'btn btn-primary',
//                                    'id' => 'validation_button',
//                        ]);

//echo json_encode($asdf);
//echo '<a href="/izin-penelitian/dgs?id='.''.$model->id.'">tes</a>';
echo '<img src="' . Url::to(['qrdigitals', 'data' => $model->id]) . '"/>';

echo '<button type="button" class="btn btn-primary" id="verifikasi"><i class="icon fa fa-sign-in"></i> Verifikasi</button>';

if($model->izin->action == 'izin-penelitian'){
    $data = (new \yii\db\Query())
        ->select('id, perizinan_id, sign1, sign2, sign3, sign4, sign5')
        ->from('perizinan_signature')
        ->where('perizinan_id ='.$model->id)
        ->one();
    if($data){
        $this->registerJs('$(document).ready(function(){ $(".btn btn-primary btn-disabled").attr("disabled", false); });');
    } else {
        $this->registerJs('$(document).ready(function(){ $(".btn btn-primary btn-disabled").attr("disabled", true); });');
    }

    $this->registerJs('
        $(document).ready(function(){
            $("#verifikasi").click(function(){
                $.ajax({
                    type: "post",
                    data: "perizinan_id=" +'.$model->id.',
                    url: "'.Yii::getAlias('@test').'/perizinan/verifikasiqr",
                    success: function(result){
                        if(result == "success"){
                            $("#succVer").show();
                            $("#failVer").hide();
                            $("#prosVer").hide();
                            $(".btn btn-primary btn-disabled").attr("disabled", false);
                            $("#validation_button").attr("disabled", true);
                            $("body").click(function(){ location.reload(); });
                        } else if(result == "fail"){
                            $("#failVer").show();
                            $("#succVer").hide();
                            $("#prosVer").hide();
                            $(".btn btn-primary btn-disabled").attr("disabled", true);
                        } else {
                            $("#prosVer").show();
                            $("#succVer").hide();
                            $("#failVer").hide();
                            $(".btn btn-primary btn-disabled").attr("disabled", true);
                        }
                    }
                });
            });
            
            $("#modal-status").on("hidden.bs.modal", function(e){ location.reload(); });
        });
    ');
}
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
