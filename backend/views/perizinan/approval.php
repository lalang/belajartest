<?php

use backend\models\PerizinanProses;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\bootstrap\Modal;

/* @var $this View */
/* @var $model PerizinanProses */

$this->title = 'Approval Izin';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Approval SK'];
?>
<div class="row">
    <div class="col-md-12">

        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Approval Surat Keputusan</h3>

            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                                <?php
                                Modal::begin([
                                    'size'=>'modal-lg',
                                    'header' => '<h5>Preview Surat Keputusan</h5>',
                                    'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class'=> 'btn btn-primary'],
                                ]);
                                ?>
                                <div id="printableArea">
                                    <?= $this->render('_sk', ['model' => $model]) ?>
                                </div>                           
                                <?php
                                Modal::end();
                                ?>
                            
                            

                                <?php $this->title = 'Approval Izin'; ?>
                        </div>
                    </div>
                </div>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th style="width: 10px"  class="text-center">No.</th>
                            <th style="width: 300px"  class="text-center">Petugas</th>
                            <th class="text-center">Catatan Petugas</th>
                        </tr>
                        <?php
                        $catatans = PerizinanProses::find()->where('urutan < ' . $model->urutan . ' and perizinan_id = ' . $model->perizinan_id)->all();
                        $i = 1;
                        foreach ($catatans as $catatan) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?>.</td>
                                <td><?= $catatan->pelaksana->nama; ?></td>
                                <td><?= $catatan->keterangan; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody></table>

                <div class="panel-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                    <?php
                    if ($model->urutan == 1) {
                        $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut'];
                    } else if ($model->urutan == $model->perizinan->jumlah_tahap) {
                        $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Selesai' => 'Selesai'];
                    } else {
                        $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut'];
                    }
                    echo $form->field($model, 'status')->dropDownList($items, ['prompt' => ''])
                    ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>