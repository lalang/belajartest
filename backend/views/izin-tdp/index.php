<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinTdpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin Tdp';
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
        <?= Html::a('Create Izin Tdp', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'siup.id',
            'label' => 'Izin Siup',
        ],
        [
            'attribute' => 'user.id',
            'label' => 'User',
        ],
        'tdp_jenis_daftar',
        'tdp_pembaruan_ke',
        'tdp_nama_kelompok',
        'tdp_status_perusahaan',
        'tdp_id_perusahaan_induk',
        'tdr_perusahaan_induk_no_tdp',
        'tdp_id_lokasi_produk_unit',
        'tdp_tanggal_mulai',
        'tdp_jangka_waktu_berdiri',
        'tdp_bentuk_kerja_sama',
        'tdp_merek_dagang',
        'tdp_merek_dagang_no',
        'tdp_hak_paten',
        'tdp_hak_paten_no',
        'tdp_hak_cipta',
        'tdp_hak_cipta_no',
        'izin_tdp_jum_dirut',
        'izin_tdp_jum_direktur',
        'izin_tdp_komisaris',
        'izin_tdp_akta_pendirian_no',
        'izin_tdp_akta_pendirian_nama_notaris',
        'izin_tdp_akta_pendirian_alamat:ntext',
        'izin_tdp_akta_pendirian_tlpn',
        'izin_tdp_akta_pendirian_tgl',
        'izin_tdp_akta_perubahan_no',
        'izin_tdp_akta_perubahan_nama_notaris',
        'izin_tdp_akta_perubahan_tgl',
        'izin_tdp_pengesahan_menkuham_no',
        'izin_tdp_pengesahan_menkuham_tgl',
        'izin_tdp_persetujuan_menkuham_no',
        'izin_tdp_persetujuan_menkuham_tgl',
        'izin_tdp_perubahan_anggaran_no',
        'izin_tdp_perubahan_anggaran_tgl',
        'izin_tdp_perubahan_direksi_no',
        'izin_tdp_perubahan_direksi_tgl',
        'izin_tdp_jum_pemegang_saham',
        'izin_tdp_komoditi_pokok',
        'izin_tdp_komoditi_lainsatu',
        'izin_tdp_komoditi_laindua',
        'izin_tdp_omset_pertahun_int',
        'izin_tdp_omset_pertahun_string',
        'izin_tdp_jum_karyawan_wni',
        'izin_tdp_jum_karyawan_wna',
        'izin_tdp_bidang_usaha',
        'izin_tdp_kapasitas_mesin_terpasang',
        'izin_tdp_kapasitas_mesin_terpasang_satuan',
        'izin_tdp_kapasitas_mesin_produksi',
        'izin_tdp_kapasitas_mesin_produksi_satuan',
        'izin_tdp_komponen_mesin_lokal',
        'izin_tdp_komponen_mesin_impor',
        'izin_tdp_jenis_usaha',
        'izin_tdp_jenis_perusahaan',
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
