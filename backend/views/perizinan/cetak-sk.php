<?php

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = $model->perizinan->kode_registrasi;
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cetak SK'];
?>
<div class="row">
    <div class="col-md-12">
        <br>
        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>
        <br>
        
        
        <div class="box">
            
            <div class="box-header with-border">
                <h3 class="box-title">Cetak Surat Keputusan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <div class="callout callout-info">
                    <h4>Petunjuk SOP!</h4>
                    <p><?= $model->sop->deskripsi_sop; ?></p>
                </div>
                <br>
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-1"></div>
                            <div class="col-md-9" style="background-color: white; padding-left: 20px; border: 4px solid #ebebeb">
                                <div id="printableArea">
                                    <?= $this->render('_sk', ['model' => $model]) ?>
                                </div>

                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <div class="panel-body">
                    <p>
                        <?=
                        Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak SIUP'), ['cetak-siup', 'id' => $model->id], [
                            'target' => '_blank',
                            'data-toggle' => 'tooltip',
                            'class' => 'btn btn-success',
                            'onclick' => "printDiv('printableArea')",
                            'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                                ]
                        )
                        ?>       
                    </p>

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                    <?php
                    $items = [ 'Lanjut' => 'Lanjut'];
                    echo $form->field($model, 'status')->dropDownList($items, ['prompt' => '']);
                    ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
