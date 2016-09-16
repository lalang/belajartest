<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisata */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Izin Pariwisata').' '. Html::encode($this->title) ?></h2>
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
    
    <div class="row">
<?php
if($providerIzinPariwisataAkta->totalCount){
    $gridColumnIzinPariwisataAkta = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            'nomor_akta',
            'tanggal_akta',
            'nama_notaris',
            'nomor_pengesahan',
            'tanggal_pengesahan',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataAkta,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-akta']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Akta').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataAkta
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerIzinPariwisataFasilitas->totalCount){
    $gridColumnIzinPariwisataFasilitas = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            [
                'attribute' => 'fasilitasKamar.id',
                'label' => Yii::t('app', 'Fasilitas Kamar')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataFasilitas,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-fasilitas']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Fasilitas').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataFasilitas
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerIzinPariwisataJenisManum->totalCount){
    $gridColumnIzinPariwisataJenisManum = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            [
                'attribute' => 'jenisManum.id',
                'label' => Yii::t('app', 'Jenis Manum')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataJenisManum,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-jenis-manum']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Jenis Manum').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataJenisManum
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerIzinPariwisataKapasitasAkomodasi->totalCount){
    $gridColumnIzinPariwisataKapasitasAkomodasi = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            [
                'attribute' => 'tipeKamar.id',
                'label' => Yii::t('app', 'Tipe Kamar')
        ],
            'jumlah_kapasitas',
            'jumlah_unit',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataKapasitasAkomodasi,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-kapasitas-akomodasi']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Kapasitas Akomodasi').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataKapasitasAkomodasi
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerIzinPariwisataKapasitasTransport->totalCount){
    $gridColumnIzinPariwisataKapasitasTransport = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            'jumlah_kapasitas',
            'jumlah_unit',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataKapasitasTransport,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-kapasitas-transport']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Kapasitas Transport').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataKapasitasTransport
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerIzinPariwisataKbli->totalCount){
    $gridColumnIzinPariwisataKbli = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            [
                'attribute' => 'kbli.id',
                'label' => Yii::t('app', 'Kbli')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataKbli,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-kbli']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Kbli').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataKbli
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerIzinPariwisataTeknis->totalCount){
    $gridColumnIzinPariwisataTeknis = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            [
                'attribute' => 'jenisIzin.id',
                'label' => Yii::t('app', 'Jenis Izin')
        ],
            'no_izin',
            'tanggal_izin',
            'tanggal_masa_berlaku',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataTeknis,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-teknis']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Teknis').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataTeknis
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerIzinPariwisataTujuanWisata->totalCount){
    $gridColumnIzinPariwisataTujuanWisata = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'izinPariwisata.id',
                'label' => Yii::t('app', 'Izin Pariwisata')
        ],
            [
                'attribute' => 'tujuanWisata.id',
                'label' => Yii::t('app', 'Tujuan Wisata')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinPariwisataTujuanWisata,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata-tujuan-wisata']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin Pariwisata Tujuan Wisata').' '. $this->title),
        ],
        'columns' => $gridColumnIzinPariwisataTujuanWisata
    ]);
}
?>
    </div>
</div>