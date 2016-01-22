<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinTdpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Izin Tdp');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-tdp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Izin Tdp'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'bentukPerusahaan.id',
            'label' => Yii::t('app', 'Bentuk Perusahaan'),
        ],
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
        'perpanjangan_ke',
        'i_1_pemilik_nama',
        'i_2_pemilik_tpt_lahir',
        'i_2_pemilik_tgl_lahir',
        'i_3_pemilik_alamat',
        'i_3_pemilik_propinsi',
        'i_3_pemilik_kabupaten',
        'i_3_pemilik_kecamatan',
        'i_3_pemilik_kelurahan',
        'i_4_pemilik_telepon',
        'i_5_pemilik_no_ktp',
        'i_6_pemilik_kewarganegaraan',
        'ii_1_perusahaan_nama',
        'ii_2_perusahaan_alamat',
        'ii_2_perusahaan_propinsi',
        'ii_2_perusahaan_kabupaten',
        'ii_2_perusahaan_kecamatan',
        'ii_2_perusahaan_kelurahan',
        'ii_2_perusahaan_kodepos',
        'ii_2_perusahaan_no_telp',
        'ii_2_perusahaan_no_fax',
        'ii_2_perusahaan_email:email',
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
        'iii_5_npwp',
        [
            'attribute' => 'iii6StatusPerusahaan.id',
            'label' => Yii::t('app', 'Status Perusahaan'),
        ],
        'iii_7a_tgl_pendirian',
        'iii_7b_tgl_mulai_kegiatan',
        'iii_8_bentuk_kerjasama_pihak3',
        'iii_9a_merek_dagang_nama',
        'iii_9a_merek_dagang_nomor',
        'iii_9b_hak_paten_nama',
        'iii_9b_hak_paten_nomor',
        'iii_9c_hak_cipta_nama',
        'iii_9c_hak_cipta_nomor',
        'iv_a1_nomor',
        'iv_a1_tanggal',
        'iv_a1_notaris_nama',
        'iv_a1_notaris_alamat',
        'iv_a1_telpon',
        'iv_a2_nomor',
        'iv_a2_tanggal',
        'iv_a2_notaris',
        'iv_a3_nomor',
        'iv_a3_tanggal',
        'iv_a4_nomor',
        'iv_a4_tanggal',
        'iv_a5_nomor',
        'iv_a5_tanggal',
        'iv_a6_nomor',
        'iv_a6_tanggal',
        'v_jumlah_dirut',
        'v_jumlah_direktur',
        'v_jumlah_komisaris',
        'v_jumlah_pengurus',
        'v_jumlah_pengawas',
        'v_jumlah_sekutu_aktif',
        'v_jumlah_sekutu_pasif',
        'v_jumlah_sekutu_aktif_baru',
        'v_jumlah_sekutu_pasif_baru',
        'vi_jumlah_pemegang_saham',
        'vii_b_omset',
        'vii_b_terbilang',
        'vii_c1_dasar',
        'vii_c2_ditempatkan',
        'vii_c3_disetor',
        'vii_c4_saham',
        'vii_c5_nominal',
        'vii_c6_aktif',
        'vii_c7_pasif',
        'vii_d_totalaset',
        'vii_e_wni',
        'vii_e_wna',
        'vii_f_matarantai',
        'vii_fa_jumlah',
        [
            'attribute' => 'viiFaSatuan.id',
            'label' => Yii::t('app', 'Satuan'),
        ],
        'vii_fb_jumlah',
        'vii_fb_satuan',
        'vii_fc_lokal',
        'vii_fc_impor',
        'vii_f_pengecer',
        'viii_jenis_perusahaan',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
        ],
        // set a label for default menu
        'export' => [
            'label' => 'Page',
            'fontAwesome' => true,
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>
