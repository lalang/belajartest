<?php

use backend\models\IzinSiup;
use backend\models\PerizinanProses;
use backend\models\User;
use dosamigos\tinymce\TinyMce;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use backend\models\Zonasi;
use yii\helpers\ArrayHelper;

/* @var $this View */
/* @var $model PerizinanProses */

$this->title = 'Cek Teknis';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cek Formulir'];
?>

<div class="row">
    <div class="col-md-12">

        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Cek Formulir</h3>

            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
                <?php
                $user = User::findOne($model->perizinan->pemohon_id);
                ?>
                <?php
                $izin_model = IzinSiup::findOne($model->perizinan->referrer_id);

                echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                    'model' => $izin_model
                ]);
                $this->title = 'Cek Teknis';
//                echo $this->render('/' . $model->perizinan->izin->action . '/view', ['id' => $model->perizinan->referrer_id]);
                ?>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <div class="panel-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>


                    <?=
                    $form->field($model, 'zonasi')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => ArrayHelper::map(Zonasi::find()->select(['id', 'concat(kode, " - ", replace(zonasi, "SUB ZONA ", "")) as kode_zonasi'])->asArray()->all(), 'id', 'kode_zonasi'),
                        'options' => ['placeholder' => Yii::t('app', '[N\A] - Tanpa zonasi')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                    ?>

                    <?= $form->field($model, 'sesuai')->radioList(['Y' => 'Sesuai', 'N' => 'Tidak Sesuai']); ?>
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
