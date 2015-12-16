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
