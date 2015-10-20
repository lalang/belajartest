<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use kartik\grid\GridView;
use yii\helpers\Url;
use app\assets\admin\page\TimelineAsset;

TimelineAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
?>

<div class="col-md-12">
    <div class="panel panel-tab rounded shadow">
        <!-- Start tabs heading -->
        <div class="panel-heading no-padding">
            <ul class="nav nav-tabs">

                <li><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i><span>Identitas Pemilik/Pengurus</span></a></li>

                <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Perusahaan</span></a></li>
                <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-sitemap"></i><span>Legalitas Perusahaan</span></a></li>
                <li><a href="#tab1-4" data-toggle="tab"><i class="fa fa-money"></i><span>Modal dan Saham</span></a></li>
                <li><a href="#tab1-5" data-toggle="tab"><i class="fa fa-cogs"></i><span>Kegiatan Usaha</span></a></li>
                <li><a href="#tab1-6" data-toggle="tab"><i class="fa fa-bar-chart"></i><span>Neraca Perusahaan</span></a></li>

            </ul>
        </div><!-- /.panel-heading -->
        <!--/ End tabs heading -->

        <!-- Start tabs content -->
        <div class="panel-body">
            <div class="tab-content">

                <div class="tab-pane fade in active" id="tab1-1">
                    <?php
                    $gridColumn = [
                        ['attribute' => 'id', 'hidden' => true],
                        [
                            'attribute' => 'perizinan.id',
                            'label' => Yii::t('app', 'Perizinan'),
                        ],
                        [
                            'attribute' => 'izin.id',
                            'label' => Yii::t('app', 'Izin'),
                        ],
                        [
                            'attribute' => 'user.id',
                            'label' => Yii::t('app', 'User'),
                        ],
                        'ktp',
                        'nama',
                        'alamat:ntext',
                        'tempat_lahir',
                        'tanggal_lahir',
                        'telepon',
                        'fax',
                        'passport',
                        'kewarganegaraan',
                        'jabatan_perusahaan',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                    ?>
                </div>

                <div class="tab-pane fade" id="tab1-2">
                    <?php
                    $gridColumn = [

                        'npwp_perusahaan',
                        'nama_perusahaan',
                        'alamat_perusahaan:ntext',
                        'telpon_perusahaan',
                        'fax_perusahaan',
                        'kelurahan_id',
                        'status_perusahaan',
                        'kode_pos',
                        'bentuk_perusahaan',
                        'akta_pendirian_no',
                        'akta_pendirian_tanggal',
                        'akta_pengesahan_no',
                        'akta_pengesahan_tanggal',
                        'no_daftar',
                        'tanggal_pengesahan',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                    ?>
                </div>

                <div class="tab-pane fade" id="tab1-3">
                    <?php
                    $gridColumn = [

                        'modal',
                        'nilai_saham_pma',
                        'saham_nasional',
                        'saham_asing',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                    ?>
                    <?php
                    $gridColumnIzinSiupAkta = [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'id', 'hidden' => true],
                        [
                            'attribute' => 'izinSiup.id',
                            'label' => Yii::t('app', 'Izin Siup'),
                        ],
                        'nomor_akta',
                        'tanggal_akta',
                        'nomor_pengesahan',
                        'tanggal_pengesahan',
                    ];
                    echo Gridview::widget([
                        'dataProvider' => $providerIzinSiupAkta,
                        'pjax' => true,
                        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                        'panel' => [
                            'type' => GridView::TYPE_PRIMARY,
                            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Akta') . ' ' . $this->title) . ' </h3>',
                        ],
                        'columns' => $gridColumnIzinSiupAkta
                    ]);
                    ?>
                </div>

                <div class="tab-pane fade" id="tab1-4">
                    <?php
                    $gridColumn = [

                        'barang_jasa_dagangan',
                        'tanggal_neraca',
                        'aktiva_lancar_kas',
                        'aktiva_lancar_bank',
                        'aktiva_lancar_piutang',
                        'aktiva_lancar_barang',
                        'aktiva_lancar_pekerjaan',
                        'aktiva_tetap_peralatan',
                        'aktiva_tetap_investasi',
                        'aktiva_lainnya',
                        'pasiva_hutang_dagang',
                        'pasiva_hutang_pajak',
                        'pasiva_hutang_lainnya',
                        'hutang_jangka_panjang',
                        'kekayaan_bersih',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                    ?>
                </div>

                <div class="tab-pane fade" id="tab1-5">
                    <?php
                    $gridColumn = [
                        'barang_jasa_dagangan',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                    ?>
                    <?php
                    $gridColumnIzinSiupKbli = [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'id', 'hidden' => true],
                        [
                            'attribute' => 'izinSiup.id',
                            'label' => Yii::t('app', 'Izin Siup'),
                        ],
                        [
                            'attribute' => 'kbli.id',
                            'label' => Yii::t('app', 'Kbli'),
                        ],
                    ];
                    echo Gridview::widget([
                        'dataProvider' => $providerIzinSiupKbli,
                        'pjax' => true,
                        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                        'panel' => [
                            'type' => GridView::TYPE_PRIMARY,
                            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Kbli') . ' ' . $this->title) . ' </h3>',
                        ],
                        'columns' => $gridColumnIzinSiupKbli
                    ]);
                    ?>
                </div>

                <div class="tab-pane fade" id="tab1-6">
                    <?php
                    $gridColumn = [
                        'tanggal_neraca',
                        'aktiva_lancar_kas',
                        'aktiva_lancar_bank',
                        'aktiva_lancar_piutang',
                        'aktiva_lancar_barang',
                        'aktiva_lancar_pekerjaan',
                        'aktiva_tetap_peralatan',
                        'aktiva_tetap_investasi',
                        'aktiva_lainnya',
                        'pasiva_hutang_dagang',
                        'pasiva_hutang_pajak',
                        'pasiva_hutang_lainnya',
                        'hutang_jangka_panjang',
                        'kekayaan_bersih',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                    ?>
                </div>
            </div>
        </div><!-- /.panel-body -->
        <!--/ End tabs content -->
    </div>

</div>

