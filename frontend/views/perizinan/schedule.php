<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use kartik\datecontrol\DateControl;


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
//                            'pengambilan_sesi',
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

                    <div class="callout callout-info">
                        <p><br>Pengambilan izin berada di <?= $model->izin->wewenang->nama; ?></p>
                        <div id="quota"></div>
                    </div>


                    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                    <?php
                    $start_date = new DateTime($model->tanggal_mohon);
                    if ($model->izin->durasi_satuan == 'Hari') {
                        date_add($start_date, date_interval_create_from_date_string($model->izin->durasi . " days"));
                    }
                    echo $form->field($model, 'pengambilan_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
//                        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pertemuan')],
//                        'id'=>'tanggal-id',
                        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy',
                            'startDate' => date_format($start_date, "d-m-Y"),
                        ]
                    ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
//                    echo date_format($start_date, "d-m-Y");
//                    echo $form->field($model, 'pengambilan_tanggal')->widget(DateControl::classname(), [
////                        'autoWidget' => false,
////                        'widgetClass' => '\kartik\widgets\DatePicker::classname()',
//                        'pluginOptions' => [
//                            'autoclose' => true,
//                            'format' => 'dd-mm-yyyy',
//                            'startDate' => date_format($start_date, "d-m-Y"),
//                        ],
//                        'type' => DateControl::FORMAT_DATE,
//                    ]);
                    ?>

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
                            'options' => ['id' => 'kel-id'],
                            'pluginOptions' => [
                                'depends' => ['kabkota-id', 'kec-id'],
                                'placeholder' => 'Pilih Kelurahan...',
                                'url' => Url::to(['kelurahan'])
                            ]
                        ]);
                        ?>

                       <?= $form->field($model, 'pengambilan_sesi')->dropDownList(['Sesi I' => 'Sesi I', 'Sesi II' => 'Sesi II']); ?>

                    <?php } else if ($model->izin->wewenang_id == 3) { ?>

                        <?= $form->field($model, 'kabupaten_kota')->dropDownList(\backend\models\Lokasi::getKabKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..']); ?>

                        <?=
                        $form->field($model, 'lokasi_id')->widget(\kartik\widgets\DepDrop::classname(), [
                            'options' => ['id' => 'kec-id'],
                            'pluginOptions' => [
                                'depends' => ['kabkota-id'],
                                'placeholder' => 'Pilih Kecamatan...',
                                'url' => Url::to(['kecamatan'])
                            ]
                        ]);
                        ?>

                        <?= $form->field($model, 'pengambilan_sesi')->dropDownList(['Sesi I' => 'Sesi I', 'Sesi II' => 'Sesi II']); ?>

                    <?php } else if ($model->izin->wewenang_id == 2) { ?>

                        <?=
                        $form->field($model, 'lokasi_id')->dropDownList(\backend\models\Lokasi::getKotaOptions(), ['id' => 'kabkota-id', 'class' => 'input-large form-control', 'prompt' => 'Pilih Kota..',
                            'onchange' => "
                                $.ajax({
                                    url: '" . Url::to(['session']) . "',
                                    type: 'GET',
                                    data:{lokasi:$(this).val(), tanggal:$('#perizinan-pengambilan_tanggal').val()},
                                    dataType: 'html',
                                    async: false,
                                    success: function(data, textStatus, jqXHR)
                                    {
                                       $('#quota').html(data)
                                    }
                                });
                            "]);
                        ?>

                        

                        <?php
//                        $form->field($model, 'pengambilan_sesi')->widget(\kartik\widgets\DepDrop::classname(), [
//                            'options' => ['id' => 'kuota-id'],
//                            'pluginOptions' => [
//                                'depends' => ['kabkota-id'],
//                                'placeholder' => 'Pilih Sesi...',
//                                'url' => Url::to(['session'])
//                            ]
//                        ]);
//                        $kuota = \backend\models\Kuota::findOne(['lokasi_id' => 134]);
//                        $sesi = [];
//                        $sesi[0] = 'Sesi I (' . $kuota->sesi_1_mulai . ' - ' . $kuota->sesi_1_selesai . ')';
//                        $sesi[1] = 'Sesi II (' . $kuota->sesi_2_mulai . ' - ' . $kuota->sesi_2_selesai . ')';
//                        
                        ?>

                        <?= $form->field($model, 'pengambilan_sesi')->dropDownList(['Sesi I' => 'Sesi I', 'Sesi II' => 'Sesi II']); ?>

                    <?php } ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Daftar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div class="callout callout-warning">
                        <p>Pada saat verifikasi dan pengambilan SK, agar membawa dokumen cetak yang sudah ditandatangani sebagai berikut :</p>
                        <p><?= $this->render('_print', ['model' => $model]) ?></p>
                        <p>disertai dengan dokumen asli kelengkapan persyaratan sebagai berikut :</p>
                        <?php $docs = \backend\models\Perizinan::getDocs($model->izin_id); ?>
                        <ol>
                            <?php foreach ($docs as $doc) { ?>
                                <li><?= $doc['isi']; ?></li>
                            <?php } ?>
                        </ol> 
                    </div>
                </div>
            </div>

        </div>
    </div><!-- /.body-content -->

</section><!-- /#page-content -->
