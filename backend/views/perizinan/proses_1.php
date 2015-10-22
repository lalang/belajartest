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
    <?php
    $user = \backend\models\User::findOne($model->perizinan->pemohon_id);
    ?>
    <div class="body-content animated fadeIn">
        <div class="panel-sub-heading">
            <div class="callout callout-info"><p><?= $model->sop->deskripsi_sop; ?></p></div>
        </div>
        <div class="row">
            <!--<div class="col-md-12">-->
            <?php
            $izin_model = \backend\models\base\IzinSiup::findOne($model->perizinan->referrer_id);
            $providerIzinSiupAkta = new \yii\data\ArrayDataProvider([
                'allModels' => $izin_model->izinSiupAktas,
            ]);
            $providerIzinSiupKbli = new \yii\data\ArrayDataProvider([
                'allModels' => $izin_model->izinSiupKblis,
            ]);
            echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                'model' => $izin_model,
                'providerIzinSiupAkta' => $providerIzinSiupAkta,
                'providerIzinSiupKbli' => $providerIzinSiupKbli,
            ]);
//                echo $this->render('/' . $model->perizinan->izin->action . '/view', ['id' => $model->perizinan->referrer_id]);
            ?>
            <!--</div>-->


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

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->errorSummary($model); ?>

                        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                        <?php
                        echo $form->field($model, 'dokumen')->widget(TinyMce::className(), [
                            'options' => ['rows' => 12],
                            'language' => 'id',
                            'clientOptions' => [
                                'plugins' => [
                                    "advlist autolink lists link charmap print preview anchor",
                                    "searchreplace visualblocks code fullscreen",
                                    "insertdatetime media table contextmenu paste"
                                ],
                                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                            ]
                        ]);
                        ?>

                        <?php // $form->field($model, 'dok_input')->textarea(['rows' => 6])  ?>

                        <?php // $form->field($model, 'dok_proses')->textarea(['rows' => 6])  ?>

                        <?php // $form->field($model, 'dok_output')->textarea(['rows' => 6])  ?>

                        <?php // $form->field($model, 'valid')->dropDownList(['Y' => 'Y', 'N' => 'N',], ['prompt' => '']) ?>

                        <?php // $form->field($model, 'mekanisme_cek')->dropDownList([ 'Y' => 'Y', 'N' => 'N'], ['prompt' => '']) ?>


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
                            <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div>
            
        </div><!-- /.row -->


</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
