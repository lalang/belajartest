<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bidang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bidang'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bidang-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Bidang').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model['id']], 
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnDokumenPendukung = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'bidang.id',
            'label' => Yii::t('app', 'Bidang'),
        ],
        [
            'attribute' => 'dokumenIzin.id',
            'label' => Yii::t('app', 'Dokumen Izin'),
        ],
        'modul',
        'isi:ntext',
        'berkas',
        'pelaksana',
        'pelaksana_id',
        'durasi',
        'durasi_satuan',
        'urutan',
        'aktif',
        'petugas_cek',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerDokumenPendukung,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Dokumen Pendukung').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnDokumenPendukung
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzin = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'jenis',
        [
            'attribute' => 'bidang.id',
            'label' => Yii::t('app', 'Bidang'),
        ],
        'nama',
        'kode',
        'fno_surat',
        'aktif',
        'wewenang_id',
        'cek_lapangan',
        'cek_sprtrw',
        'cek_obyek',
        'cek_perusahaan',
        'durasi',
        'durasi_satuan',
        'latar_belakang:ntext',
        'persyaratan:ntext',
        'mekanisme:ntext',
        'pengaduan:ntext',
        'dasar_hukum:ntext',
        'definisi:ntext',
        'biaya',
        'brosur:ntext',
        'arsip_id',
        'type',
        'action',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzin,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzin
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinSiup = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'registrasi.id',
            'label' => Yii::t('app', 'Registrasi'),
        ],
        [
            'attribute' => 'bidang.id',
            'label' => Yii::t('app', 'Bidang'),
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
        'no_sk',
        'no_daftar',
        'tanggal_pengesahan',
        'modal',
        'nilai_saham_pma',
        'saham_nasional',
        'saham_asing',
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
    echo Gridview::widget([
        'dataProvider' => $providerIzinSiup,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinSiup
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnRegistrasi = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'registrasis.id',
            'label' => Yii::t('app', 'Registrasi'),
        ],
        [
            'attribute' => 'user.id',
            'label' => Yii::t('app', 'User'),
        ],
        [
            'attribute' => 'bidang.id',
            'label' => Yii::t('app', 'Bidang'),
        ],
        'no_identitas',
        'urutan',
        'tanggal_permohonan',
        'no_izin',
        'berkas_noizin',
        'tanggal_izin',
        'tanggal_expired',
        'status',
        'aktif',
        'registrasi_urutan',
        'nomor_sp_rt_rw',
        'tanggal_sp_rt_rw',
        'peruntukan',
        'nama_perusahaan',
        'tanggal_cek_lapangan',
        'status_daftar',
        'petugas_daftar',
        [
            'attribute' => 'lokasi.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'keterangan:ntext',
        'qr_code',
        'tanggal_pertemuan',
        'tanggal_pengambilan',
        'jam_pengambilan',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerRegistrasi,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Registrasi').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnRegistrasi
    ]);
?>
    </div>
</div>