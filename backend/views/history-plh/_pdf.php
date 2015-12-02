<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\HistoryPlh */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'History Plh'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-plh-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'History Plh').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'user_id',
        'user_lokasi',
        'user_plh_id',
        'user_plh_lokasi',
        'tanggal_mulai',
        'tanggal_akhir',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPerizinan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'kode_registrasi',
        'parent_id',
        'pemohon_id',
        'referrer_id',
        'id_groupizin',
        'izin_id',
        'pengesah_id',
        [
            'attribute' => 'plh.id',
            'label' => Yii::t('app', 'History Plh'),
        ],
        'status_id',
        'jumlah_tahap',
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
        'petugas_daftar_id',
        'lokasi_izin_id',
        'lokasi_pengambilan_id',
        'keterangan:ntext',
        'qr_code',
        'tanggal_pertemuan',
        'status_daftar',
        'pengambilan_tanggal',
        'pengambilan_sesi',
        'pengambil_nik',
        'pengambil_nama',
        'pengambil_telepon',
        'zonasi_id',
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
</div>