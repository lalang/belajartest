<?php

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Set Schedule')];
$this->params['breadcrumbs'][] = $this->title;

isset($show_popup_kuota) ? $popup_alert = $show_popup_kuota : $popup_alert = 0; // Add by Panji
?>
<br>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?= $this->render('_step', ['value' => 5]) ?>
    </div>
    <div class="col-sm-1"></div>
</div>
<br><br><br><br><br>
<div class="row">

    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Jadwal dan Lokasi Pengambilan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Mohon diperhatikan!</h4>
                    <p>Permohonan perizinan yang dilakukan di atas jam 12:00 siang akan dilayani di hari kerja berikutnya.</p>
                    <p>Silahkan pilih tanggal pengambilan, kemudian pilih lokasi dan sesi pengambilan yang diinginkan lalu klik tombol Daftar.</p>
                </div>
                <?php
//                    $items = [
//                        '0' => 'Di ' . $model->izin->wewenang->nama . ' ' . $model->lokasiIzin->nama,
//                        '1' => 'Di lokasi lain (akan ada penambahan durasi 1 hari untuk pengiriman dokumen)'
//                    ]
                    $items = [
                        '0' => 'Di ' . $model->izin->wewenang->nama . ' ' . $model->lokasiIzin->nama,
                        
                    ]
                ?>
                <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
                 ̰<?= $form->field($model, 'opsi_pengambilan')->radioList($items, ['id'=>'opsi_pengambilan', 
                    'onchange' => "
                                $.ajax({
                                    url: '" . Url::to(['render-schedule']) . "',
                                    type: 'GET',
                                    data:{
                                        opsi_pengambilan:$(\"input[name='Perizinan[opsi_pengambilan]']:checked\").val(), 
                                        pid: ".$_GET['id'].",  
                                    },
                                    dataType: 'html',
                                    async: false,
                                    success: function(data, textStatus, jqXHR)
                                    {
                                       $('#form-schedule').html(data)
                                    }
                                });
                            "
                    ]); ?>
                <?php ActiveForm::end(); ?>

                <div id="form-schedule">
                    
                </div> ̰
            </div>


        </div>
    </div>

</div>

<?php
// Add by Panji
if($popup_alert != 0){
     $this->registerJs("$(document).ready(function(){ $('#popup_alert').modal('show'); });");
?>
<div id="popup_alert" class="modal fade" tabindex="-1" role="dialog" style="margin-top: 250px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert...</h4>
            </div>
            <div class="modal-body">
                <p>Maaf, kuota pada sesi di tanggal yang anda pilih sudah habis. Mohon untuk memilih tanggal lain.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->     
<?php
}
// End
?>