<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;
$this->params['breadcrumbs'][] = ['label' => $model->izin->bidang->nama, 'url' => ['index']];
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
                    <a href="#">Permohonan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Perizinan</li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-md-7">

                <!-- Start toggle switches -->
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Detail Permohonan</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-sub-heading">
                        <div class="callout callout-info"><p><a href="http://www.bootstrap-switch.org/" target="_blank">Bootstrap Switch 3</a>, Turn checkboxes and radio buttons in toggle switches.</p></div>
                    </div><!-- /.panel-sub-heading -->
                    <div class="panel-body">

                        <?php
                        $gridColumn = [
//                ['attribute' => 'id', 'hidden' => true],
                            'no_urut',
                            'tanggal_mohon',
//                            'no_izin',
//                            'berkas_noizin',
//                            'tanggal_izin',
                            'tanggal_expired',
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
                'lokasi_id',
                'keterangan:ntext',
//                'qr_code',
                            'tanggal_pertemuan',
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
                <!-- End toggle switches -->

            </div>
            <div class="col-md-5">

                <!-- Start input masks -->
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Data Pemohon</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        $user = \backend\models\User::findOne($model->pemohon_id);
                        ?>
                        
                        <ul class="list-unstyled no-margin">
                            <li class="text-center">
                                <img class="img-circle img-bordered-default" src="http://img.djavaui.com/?create=100x100,81B71A?f=ffffff" alt="...">
                            </li>
                            <li class="text-center">
                                <h4 class="text-capitalize"><?= $user->profile->name; ?></h4>
                                <h5>NIK: <?= $user->username; ?></h5>
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul class="list-group no-margin br-3">
                                    <li class="list-group-item"><i class="fa fa-envelope mr-5"></i> <?= $user->email; ?></li>
                                    <li class="list-group-item"><i class="fa fa-home mr-5"></i> <?= $user->profile->alamat; ?></li>
                                    <li class="list-group-item"><i class="fa fa-phone mr-5"></i> <?= $user->profile->telepon; ?></li>
                                </ul>
                            </li>
                        </ul><!-- /.list-unstyled -->
                       
                    </div><!-- /.panel-body  -->
                    
                </div><!-- /.panel -->
                <!-- End input masks -->

            </div>
        </div><!-- /.row -->



        <!--/ End page header -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    $gridColumnPerizinanProses = [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'id', 'hidden' => true],
                        [
                            'attribute' => 'active',
                            'value' => function ($model, $key, $index, $widget) {
                                if ($model->active == 1)
                                    return Html::badge(Html::icon('check'));
                                else
                                    return '';
                            },
//                'width' => '8%',
                            'vAlign' => 'middle',
                            'format' => 'raw',
//                'noWrap' => true
                        ],
                        'mekanismePelayanan.isi',
                        [
                            'attribute' => 'pelaksana0.nama',
                            'label' => Yii::t('app', 'Pelaksana'),
                        ],
//            'urutan',
                        'tanggal_proses',
//            'dokumen:ntext',
//            'pelaksana',
//            'dok_input:ntext',
//            'dok_proses:ntext',
//            'dok_output:ntext',
//            'nama_berkas',
//            'berkas',
//            'berkas_seo',
//            'status',
//            'keterangan:ntext',
//            'tanggal',
//            'valid',
//            'mulai',
//            'selesai',
//            'jarak',
//            'mekanisme_cek',
//            'aktif',
//            'jarak_sebelum',
//            'jarak_sekarang',
//            'type',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{proses}',
                            'buttons' => [
                                'proses' => function ($url, $model) {
                                    $url = Url::toRoute(['process', 'id' => $model->id]);
                                    if (Yii::$app->user->identity->pelaksana_id == $model->pelaksana_id && $model->active == 1)
                                        return Html::a(Html::bsLabel('Proses', Html::TYPE_PRIMARY), $url, [
                                                    'title' => Yii::t('yii', 'Proses'),
                                        ]);
                                    else
                                        return '';
                                },
                                    ]
                                ],
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerPerizinanProses,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                                'panel' => [
                                    'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>Proses Perizinan</h3>',
                                ],
                                'export' => false,
                                'columns' => $gridColumnPerizinanProses
                            ]);
                            ?>
                </div>
            </div>
        </div><!-- /.header-content -->
        <footer class="footer-content">
            2015 &copy; BPTSP DKI
            <span class="pull-right">All rights reserved</span>
        </footer><!-- /.footer-content -->
        <!--/ End footer content -->

</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->