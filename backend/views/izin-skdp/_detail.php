<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSkdp */

?>
<div class="izin-skdp-view">

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
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'agama',
        'alamat:ntext',
        'rt',
        'rw',
        'wilayah_id',
        'kecamatan_id',
        'kelurahan_id',
        'kodepos',
        'telepon',
        'passport',
        [
            'attribute' => 'negara.id',
            'label' => Yii::t('app', 'Kewarganegaraan'),
        ],
        'npwp_perusahaan',
        'nama_perusahaan',
        'titik_koordinat',
        'latitude',
        'longtitude',
        'nama_gedung_perusahaan',
        'blok_perusahaan',
        'alamat_perusahaan:ntext',
        'rt_perusahaan',
        'rw_perusahaan',
        'wilayah_id_perusahaan',
        'kecamatan_id_perusahaan',
        'kelurahan_id_perusahaan',
        'kodepos_perusahaan',
        'telpon_perusahaan',
        'fax_perusahaan',
        'klarifikasi_usaha',
        'status_kepemilikan',
        'status_kantor',
        'jumlah_karyawan',
        'nomor_akta_pendirian',
        'tanggal_pendirian',
        'nama_notaris_pendirian',
        'nomor_sk_kemenkumham',
        'tanggal_pengesahan',
        'nama_notaris_pengesahan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>