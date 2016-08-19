<?php

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = 'Preview SK';
$this->params['breadcrumbs'][] = ['label' => $model->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Preview SK'];
?>
<div class="row">
    <div class="col-md-12">
        <?= $this->render('_step', ['value' => 4]) ?>

        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Preview Surat Keputusan</h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Untuk diperhatikan!</h4>
                    <p>Pastikan semua data anda sudah benar, silahkan ubah jika ada yang tidak sesuai.</p>
                    <p>Setelah data permohonan anda mulai didaftarkan, maka data sudah tidak bisa diubah kembali.</p>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div style="border: solid 1px; padding: 40px">
                            <?= $izin->teks_preview; ?>

                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <?php ActiveForm::begin(); ?>
                            <?= Html::submitButton(Yii::t('app', 'Ubah Formulir Permohonan'), ['name' => 'action', 'value' => 'back', 'class' => 'btn btn-primary']) ?>
                            <?php
                                if($model->status_id == 4 ){
                            ?>
                            <?= Html::submitButton(Yii::t('app', 'Lanjut Ke Proses Berikutnya'), ['name' => 'action', 'value' => 'next', 'class' => 'btn btn-success', 'id' => 'lanjut' ]) ?>

                            <?php
                                } else {
                            ?>
                            <?= Html::submitButton(Yii::t('app', 'Lanjut Ke Proses Berikutnya'), ['name' => 'action', 'value' => 'next', 'class' => 'btn btn-success', 'id' => 'lanjut', 'disabled'=>true ]) ?>
                            <?=
                            Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak Surat Pernyataan'), ['print-pernyataan', 'id' => $model->id], [
                                'id'=>'cetak',
                                'target' => '_blank',
                                'data-toggle' => 'tooltip',
                                'title' => Yii::t('app', 'Will open the generated PDF file in a new window'),
                                'class' => 'btn btn-warning',
                                'onclick'=>'myFunction()'
                                    ]
                            )
                            ?>
                            <?php } ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>

            </div><!-- ./box-body -->

        </div><!-- /.box -->
    </div>
</div>

<script>

function myFunction() {
    document.getElementById("lanjut").disabled = false;
}

</script>