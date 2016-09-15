<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisata */

?>
<div class="izin-pariwisata-view">

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
        'alamat:ntext',
        'rt',
        'rw',
        'propinsi_id',
        'wilayah_id',
        'kecamatan_id',
        'kelurahan_id',
        'kodepos',
        'email:email',
        'telepon',
        [
            'attribute' => 'negara.id',
            'label' => Yii::t('app', 'Kewarganegaraan'),
        ],
        'kitas',
        'passport',
        'npwp_perusahaan',
        'nama_perusahaan',
        'nama_gedung_perusahaan',
        'blok_perusahaan',
        'alamat_perusahaan:ntext',
        'propinsi_id_perusahaan',
        'wilayah_id_perusahaan',
        'kecamatan_id_perusahaan',
        'kelurahan_id_perusahaan',
        'kodepos_perusahaan',
        'telpon_perusahaan',
        'fax_perusahaan',
        'email_perusahaan:email',
        'nomor_akta_pendirian',
        'tanggal_pendirian',
        'nama_notaris_pendirian',
        'nomor_sk_pengesahan',
        'tanggal_pengesahan',
        'nomor_akta_cabang',
        'tanggal_cabang',
        'nama_notaris_cabang',
        'keputusan_cabang',
        'tanggal_keputusan_cabang',
        'identitas_sama',
        'nik_penanggung_jawab',
        'nama_penanggung_jawab',
        'tempat_lahir_penanggung_jawab',
        'tanggal_lahir_penanggung_jawab',
        'jenkel_penanggung_jawab',
        'alamat_penanggung_jawab:ntext',
        'rt_penanggung_jawab',
        'rw_penanggung_jawab',
        'propinsi_id_penanggung_jawab',
        'wilayah_id_penanggung_jawab',
        'kecamatan_id_penanggung_jawab',
        'kelurahan_id_penanggung_jawab',
        'kodepos_penanggung_jawab',
        'telepon_penanggung_jawab',
        [
            'attribute' => 'negara.id',
            'label' => Yii::t('app', 'Kewarganegaraan Id Penanggung Jawab'),
        ],
        'kitas_penanggung_jawab',
        'passport_penanggung_jawab',
        'no_tdup',
        'tanggal_tdup',
        'merk_nama_usaha',
        'titik_koordinat',
        'latitude',
        'longtitude',
        'nama_gedung_usaha',
        'blok_usaha',
        'alamat_usaha:ntext',
        'rt_usaha',
        'rw_usaha',
        'wilayah_id_usaha',
        'kecamatan_id_usaha',
        'kelurahan_id_usaha',
        'kodepos_usaha',
        'telpon_usaha',
        'fax_usaha',
        'nomor_objek_pajak_usaha',
        'jumlah_karyawan',
        'npwpd',
        'intensitas_jasa_perjalanan',
        'kapasitas_penyedia_akomodasi',
        'jum_kursi_jasa_manum',
        'jum_stand_jasa_manum',
        'jum_pack_jasa_manum',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>