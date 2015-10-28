<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Status */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Status').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
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
        'kode',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinSiup = [
        ['class' => 'yii\grid\SerialColumn'],
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
        [
            'attribute' => 'status.id',
            'label' => Yii::t('app', 'Status'),
        ],
        'tipe',
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
        'lokasi_id',
        'wilayah_id',
        'kecamatan_id',
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
    $gridColumnPerizinan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'kode_registrasi',
        [
            'attribute' => 'perizinans.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'pemohon.id',
            'label' => Yii::t('app', 'User'),
        ],
        'referrer_id',
        'id_groupizin',
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        'pengesah_id',
        [
            'attribute' => 'status0.id',
            'label' => Yii::t('app', 'Status'),
        ],
        'jumlah_tahap',
        'no_urut',
        'tanggal_mohon',
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
        'petugas_cek',
        [
            'attribute' => 'petugasDaftar.id',
            'label' => Yii::t('app', 'User'),
        ],
        [
            'attribute' => 'lokasiIzin.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        [
            'attribute' => 'lokasiPengambilan.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'keterangan:ntext',
        'qr_code',
        'tanggal_pertemuan',
        'status_daftar',
        'pengambilan_tanggal',
        'pengambilan_sesi',
        'pengambil_nik',
        'pengambil_nama',
        'pengambil_telepon',
        [
            'attribute' => 'zonasi.zonasi',
            'label' => Yii::t('app', 'Zonasi'),
        ],
        'zonasi_sesuai',
        'alasan_penolakan:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinan
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSop = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        [
            'attribute' => 'status.id',
            'label' => Yii::t('app', 'Status'),
        ],
        'nama_sop',
        'deskripsi_sop:ntext',
        [
            'attribute' => 'pelaksana.id',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        'durasi',
        'durasi_satuan',
        'urutan',
        'aktif',
        'action_id',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSop,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Sop').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnSop
    ]);
?>
    </div>
</div>