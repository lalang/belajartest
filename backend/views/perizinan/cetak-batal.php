<?php
use backend\models\PerizinanBerkasSearch;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\Modal;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = 'Cetak';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cetak SK'];
?>
<div class="row">
    <div class="col-md-12">

        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Cetak Surat Keputusan</h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            Modal::begin([
                                'size' => 'modal-lg',
                                'header' => '<h5>Preview Surat Keputusan</h5>',
                                'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class' => 'btn btn-primary'],
                            ]);
                            ?>
                            <div id="printableArea">
                                <?= $this->render('_sk', ['model' => $model]) ?>
                            </div>                           
                            <?php
                            Modal::end();
                            ?>
                            
                        </div>
                    </div>
                </div>

    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        //var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();
        window.onfocus=function(){ window.close();}
        //window.close();

        //document.body.innerHTML = originalContents;
    }
    
    window.printDiv('printableArea');
    //window.onload = printDiv('printableArea');
</script>
