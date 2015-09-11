<?php

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = $model->perizinan->izin->nama;
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
?>
<section id="page-content">

    <div class="header-content">
        <h2><i class="fa fa-list-alt"></i> Form <?= Html::encode($this->title); ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/view') ?>">Detail</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl(['perizinan/view', 'id' => $model->perizinan->id]) ?>">Permohonan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Perizinan</li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <div class="body-content animated fadeIn">
        <div class="panel-sub-heading">
            <div class="callout callout-info"><p><?= $model->mekanismePelayanan->isi; ?></p></div>
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

        <br>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Dokumen Izin</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
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
//                        $form->field($model, 'isi_dokumen')->widget(TinyMce::className(), [
//                            'options' => ['rows' => 12],
//                            'language' => 'id',
//                            'clientOptions' => [
//                                'plugins' => [
//                                    "advlist autolink lists link charmap print preview anchor",
//                                    "searchreplace visualblocks code fullscreen",
//                                    "insertdatetime media table contextmenu paste"
//                                ],
//                                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
//                            ]
//                        ]);
                        ?>

                        <?php
//                        if ($model->urutan == 1) {
//                            $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut'];
//                        } else if ($model->urutan == $model->perizinan->jumlah_tahap) {
//                            $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Selesai' => 'Selesai'];
//                        } else {
                        $items = [ 'Lanjut' => 'Lanjut'];
//                        }, 
                        echo $form->field($model, 'status')->dropDownList($items, ['prompt' => '']);
                        
                        ?>

                        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>


                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div>

        </div><!-- /.row -->


</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
