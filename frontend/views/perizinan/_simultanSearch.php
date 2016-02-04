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


$search = "$(document).ready(function(){
     
 $('#status-id').change(
    function () {
        if ($('#status-id').val() != '') {
            $('#select2-izin-id-container').empty();
            $('#searchizin-bidang_izin').val('');
            $('#izin').show();
            if($('#isiChild').val() !=''){
                
                $('#daftar').show();
            } else {
                $('#daftar').hide();
            }
            
        } else {
            $('#izin').hide(); 
        }
    }
);
     
    $('#izin-id').change(function () {
     if ($('#izin-id').val() != '') {
         $('#daftar').show();  
     } else {
         $('#daftar').hide(); 
     }
     });
     
   
});";
$this->registerJs($search);

?>



<div class="panel panel-primary">
    <div class="panel-heading">Pilihan Paket Izin</div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal',]); ?>
        <?php
            $izinID = backend\models\Perizinan::findOne($_SESSION['id_paket'])->izin_id;
            $ActifRecord = \backend\models\Package::find()
                    ->joinWith('paketIzin')
                    ->where(['package.izin_id'=>$izinID])
                    ->select('izin.status_id')
                    ->groupBy('izin.status_id');
            $query = \backend\models\Status::find()
                    ->andWhere(['in','status.id',$ActifRecord])
                    ->select(['status.id as id', 'status.nama as nama'])
                    ->orderBy('status.id')->asArray()->all();
        ?>
        
        <?=
            $form->field($model, 'stat')->dropDownList(\yii\helpers\ArrayHelper::map($query, 'id', 'nama'), ['id' => 'status-id', 'prompt' => 'Pilih'])->label('Status')
        ?>
        <div id="izin" style="display:none; text-align: center; " >
            <?php
                $izinID = backend\models\Perizinan::findOne($_SESSION['id_paket']);
//                $bentukPer = \backend\models\IzinSiup::findOne($condition)
                $dataIzin = Izin::findOne($izinID->izin_id);
                if($dataIzin->type == 'SIUP'){
                    $bentukPer = \backend\models\IzinSiup::findOne($izinID->referrer_id)->bentuk_perusahaan;
                }
                $ActifRecord = \backend\models\Package::find()
                        ->where(['izin_id'=>$izinID->izin_id])
                        ->andWhere(['status'=>'Y'])
                        ->select('paket_izin_id');
                $query = Izin::find()
                        ->where(['like','izin.nama',$bentukPer])
                        ->andWhere(['in','izin.id',$ActifRecord])
                        ->select(['izin.id as id', 'izin.nama as nama'])
                        ->orderBy('izin.id')->one();
            ?>
            <?php
            if($query->nama){
                echo '<strong>'.$query->nama.'</strong></br>';
            } else {
                echo '<strong>Bentuk perusahaan ('.$bentukPer.') pada izin '.$dataIzin->type.', tidak memiliki paket izin.</strong></br>';
            }
            
            echo $form->field($model, 'izinChild', ['template' => '{input}'])->textInput(['style' => 'display:none', 'value'=>$query->nama, 'id'=>'isiChild']);
//            $idChild = $query->id;
//                $form->field($model, 'izin')->dropDownList(\yii\helpers\ArrayHelper::map($query, 'id', 'nama'), ['id' => 'izin-id', 'prompt' => 'Pilih'])->label('Jenis Izin')
            ?>
        </div>
        <br>
        <div id="daftar" style="display:none">
            <div class="form-group text-center">
                <?= Html::a('Buat Permohonan', ['proses-simultan','id'=>$idChild],['class' => 'btn btn-primary','title' => Yii::t('yii', 'Pengajuan Izin Paket'),]) ?>
                <?php // Html::submitButton(Yii::t('app', 'Buat Permohonan'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
