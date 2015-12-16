<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Tdp'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
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
        'bentuk_perusahaan',
        [
            'attribute' => 'perizinan.id',
            'label' => 'Perizinan',
        ],
        [
            'attribute' => 'izin.id',
            'label' => 'Izin',
        ],
        [
            'attribute' => 'user.id',
            'label' => 'User',
        ],
        [
            'attribute' => 'status.id',
            'label' => 'Status',
        ],
        'perpanjangan_ke',
        'iii_1_nama_kelompok',
        'iii_2_status_prsh',
        'iii_2_induk_nama_prsh',
        'iii_2_induk_nomor_tdp',
        'iii_2_induk_alamat',
        'iii_2_induk_propinsi',
        'iii_2_induk_kabupaten',
        'iii_2_induk_kecamatan',
        'iii_2_induk_kelurahan',
        'iii_3_lokasi_unit_produksi',
        'iii_3_lokasi_unit_produksi_propinsi',
        'iii_3_lokasi_unit_produksi_kabupaten',
        'iii_4_bank_utama_1',
        'iii_4_bank_utama_2',
        'iii_4_jumlah_bank',
        'iii_7b_tgl_mulai_kegiatan',
        'iii_8_bentuk_kerjasama_pihak3',
        'iii_9a_merek_dagang_nama',
        'iii_9a_merek_dagang_nomor',
        'iii_9b_hak_paten_nama',
        'iii_9b_hak_paten_nomor',
        'iii_9c_hak_cipta_nama',
        'iii_9c_hak_cipta_nomor',
        'iv_a1_notaris_nama',
        'iv_a1_notaris_alamat',
        'iv_a1_telpon',
        'iv_a2_notaris',
        'iv_a4_nomor',
        'iv_a4_tanggal',
        'iv_a5_nomor',
        'iv_a5_tanggal',
        'iv_a6_nomor',
        'iv_a6_tanggal',
        'v_jumlah_dirut',
        'v_jumlah_direktur',
        'v_jumlah_komisaris',
        'vi_jumlah_pemegang_saham',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>