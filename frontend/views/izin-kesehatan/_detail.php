<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKesehatan */

?>
<div class="izin-kesehatan-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
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
        [
            'attribute' => 'status.id',
            'label' => Yii::t('app', 'Status'),
        ],
        [
            'attribute' => 'lokasi.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'tipe',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'agama',
        'alamat:ntext',
        'rt',
        'rw',
        'propinsi_id',
        'wilayah_id',
        'kecamatan_id',
        'kelurahan_id',
        'kodepos',
        'telepon',
        'email:email',
        'kitas',
        [
            'attribute' => 'negara.id',
            'label' => Yii::t('app', 'Kewarganegaraan'),
        ],
        'status_sip_offline',
        'jumlah_sip_offline',
        'nomor_str',
        'tanggal_berlaku_str',
        'perguruan_tinggi',
        'tanggal_lulus',
        'nomor_rekomendasi',
        [
            'attribute' => 'kepegawaian.id',
            'label' => Yii::t('app', 'Kepegawaian'),
        ],
        'nomor_fasilitas_kesehatan',
        'tanggal_fasilitas_kesehatan',
        'nomor_pimpinan',
        'tanggal_pimpinan',
        'npwp_tempat_praktik',
        'nama_tempat_praktik',
        'titik_koordinat',
        'latitude',
        'longtitude',
        'nama_gedung_praktik',
        'blok_tempat_praktik',
        'alamat_tempat_praktik:ntext',
        'rt_tempat_praktik',
        'rw_tempat_praktik',
        'wilayah_id_tempat_praktik',
        'kecamatan_id_tempat_praktik',
        'kelurahan_id_tempat_praktik',
        'kodepos_tempat_praktik',
        'telpon_tempat_praktik',
        'fax_tempat_praktik',
        'email_tempat_praktik:email',
        'nomor_izin_kesehatan',
        'jenis_praktik_i',
        'nama_tempat_praktik_i',
        'nomor_sip_i',
        'tanggal_berlaku_sip_i',
        'nama_gedung_praktik_i',
        'blok_tempat_praktik_i',
        'alamat_tempat_praktik_i:ntext',
        'rt_tempat_praktik_i',
        'rw_tempat_praktik_i',
        'propinsi_id_tempat_praktik_i',
        'wilayah_id_tempat_praktik_i',
        'kecamatan_id_tempat_praktik_i',
        'kelurahan_id_tempat_praktik_i',
        'telpon_tempat_praktik_i',
        'jenis_praktik_ii',
        'nama_tempat_praktik_ii',
        'nomor_sip_ii',
        'tanggal_berlaku_sip_ii',
        'nama_gedung_praktik_ii',
        'blok_tempat_praktik_ii',
        'alamat_tempat_praktik_ii:ntext',
        'rt_tempat_praktik_ii',
        'rw_tempat_praktik_ii',
        'propinsi_id_tempat_praktik_ii',
        'wilayah_id_tempat_praktik_ii',
        'kecamatan_id_tempat_praktik_ii',
        'kelurahan_id_tempat_praktik_ii',
        'telpon_tempat_praktik_ii',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>