<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\assets\admin\dashboard\DashboardAsset;
use yii\widgets\DetailView;

DashboardAsset::register($this);


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
?>
<section id="page-content">

    <!-- Start page header -->
    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> Set Jadwal Perizinan</h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/index') ?>">Perizinan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Set Jadwal</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">

                <div class="panel panel-theme rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Detail Permohonan</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body no-padding">

                        <?php
                        $gridColumn = [
//                ['attribute' => 'id', 'hidden' => true],
                            'tanggal_mohon',
                            'izin.nama',
                            'izin.bidang.nama',
                            [
                                'attribute' => 'izin.nama',
                                'label' => Yii::t('app', 'Nama Izin'),
                                'value' => $model->izin->nama,
                            ],
                            [
                                'attribute' => 'izin.bidang_id',
                                'label' => Yii::t('app', 'Bidang'),
                                'value' => $model->izin->bidang->nama,
                            ],
                            [
                                'attribute' => 'izin_id',
                                'label' => Yii::t('app', 'Durasi'),
                                'format' => 'html',
                                'value' => $model->izin->durasi . ' ' . $model->izin->durasi_satuan,
                            ],
//                            'berkas_noizin',
//                            'tanggal_izin',
//                            'tanggal_expired',
                            'status',
//                            'aktif',
//                'registrasi_urutan',
//                'nomor_sp_rt_rw',
//                'tanggal_sp_rt_rw',
//                'peruntukan',
//                'nama_perusahaan',
//                            'tanggal_cek_lapangan',
//                            'petugas_cek',
//                            'status_daftar',
//                [
//                    'attribute' => 'petugasDaftar.id',
//                    'label' => Yii::t('app', 'User'),
//                ],
//                            'lokasi_id',
//                            'keterangan:ntext',
//                'qr_code',
//                            'tanggal_pertemuan',
//                            'pengambilan_tanggal',
//                            'pengambilan_jam',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                        ?>
                    </div><!-- /.panel-body -->

                </div><!-- /.panel -->

            </div>

            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-theme rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Jadwal Pengambilan</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="callout callout-info"><p><br>Pengambilan izin berada di kantor <?= $model->izin->wewenang->nama; ?></p></div>

                    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                    <?php if ($model->izin->wewenang_id == 4) { ?>

                        <?= $form->field($model, 'kabupaten_kota')->dropDownList(\backend\models\Lokasi::getKabKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>

                        <?=
                        $form->field($model, 'kecamatan')->widget(\kartik\widgets\DepDrop::classname(), [
                            'options' => ['id' => 'kec-id'],
                            'pluginOptions' => [
                                'depends' => ['kabkota-id'],
                                'placeholder' => 'Pilih Kecamatan...',
                                'url' => Url::to(['subcat'])
                            ]
                        ]);
                        ?>

                        <?=
                        $form->field($model, 'lokasi_id')->widget(\kartik\widgets\DepDrop::classname(), [
                            'pluginOptions' => [
                                'depends' => ['kabkota-id', 'kec-id'],
                                'placeholder' => 'Pilih Kelurahan...',
                                'url' => Url::to(['prod'])
                            ]
                        ]);
                        ?>
                    <?php } else if ($model->izin->wewenang_id == 3) { ?>

                        <?= $form->field($model, 'kabupaten_kota')->dropDownList(\backend\models\Lokasi::getKabKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>

                        <?=
                        $form->field($model, 'lokasi_id')->widget(\kartik\widgets\DepDrop::classname(), [
                            'options' => ['id' => 'kec-id'],
                            'pluginOptions' => [
                                'depends' => ['kabkota-id'],
                                'placeholder' => 'Pilih Kecamatan...',
                                'url' => Url::to(['subcat'])
                            ]
                        ]);
                        ?>

                    <?php } else if ($model->izin->wewenang_id == 2) { ?>

                        <?= $form->field($model, 'lokasi_id')->dropDownList(\backend\models\Lokasi::getKabKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>

                    <?php } ?>
                    <?php
                    $start_date = new DateTime($model->tanggal_mohon);
                    if ($model->izin->durasi_satuan == 'Hari') {
                        date_add($start_date, date_interval_create_from_date_string($model->izin->durasi . " days"));
                    }
                    echo $form->field($model, 'pengambilan_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
                        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pertemuan')],
                        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'startDate' => date_format($start_date, "Y-m-d"),
                        ]
                    ]);
                    ?>

                    <?= $form->field($model, 'pengambilan_jam')->widget(\kartik\widgets\TimePicker::className()); ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Daftar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div><!-- /.body-content -->
    <!-- Start footer content -->
    <?php echo $this->render('/shares/_footer_admin'); ?>
    <!--/ End footer content -->

</section><!-- /#page-content -->
