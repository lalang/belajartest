<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinTdgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin Tdg';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-tdg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Izin Tdg', ['create'], ['class' => 'btn btn-success']) ?>
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
            'attribute' => 'perizinan.id',
            'label' => 'Perizinan',
        ],
        [
            'attribute' => 'izin.id',
            'label' => 'Izin',
        ],
        [
            'attribute' => 'status.id',
            'label' => 'Status',
        ],
        'tipe',
        'pemilik_nik',
        'pemilik_pengenal',
        'pemilik_nama',
        'pemilik_alamat:ntext',
        'pemilik_rt',
        'pemilik_rw',
        'pemilik_propinsi',
        'pemilik_kabupaten',
        'pemilik_kecamatan',
        'pemilik_kelurahan',
        'pemilik_kodepos',
        'pemilik_telepon',
        'pemilik_fax',
        'pemilik_email:email',
        'perusahaan_npwp',
        'perusahaan_nama',
        'perusahaan_namagedung',
        'perusahaan_blok_lantai',
        'perusahaan_namajalan:ntext',
        'perusahaan_propinsi',
        'perusahaan_kabupaten',
        'perusahaan_kecamatan',
        'perusahaan_kelurahan',
        'perusahaan_kodepos',
        'perusahaan_fax',
        'perusahaan_email:email',
        'gudang_koordinat_1',
        'gudang_koordinat_2',
        'gudang_blok_lantai',
        'gudang_namajalan:ntext',
        'gudang_propinsi',
        'gudang_kabupaten',
        'gudang_kecamatan',
        'gudang_kelurahan',
        'gudang_kodepos',
        'gudang_telepon',
        'gudang_fax',
        'gudang_email:email',
        'gudang_luas',
        'gudang_kapasitas',
        'gudang_kapasitas_satuan',
        'gudang_nilai',
        'gudang_komposisi_nasional',
        'gudang_komposisi_asing',
        'gudang_kelengkapan',
        'gudang_sarana_listrik',
        'gudang_sarana_air',
        'gudang_sarana_pendingin',
        'gudang_sarana_forklif',
        'gudang_sarana_komputer',
        'gudang_kepemilikan',
        'gudang_imb_nomor',
        'gudang_imb_tanggal',
        'gudang_uug_nomor',
        'gudang_uug_tanggal',
        'gudang_uug_berlaku',
        'gudang_isi:ntext',
        'hs_koordinat_1',
        'hs_koordinat_2',
        'hs_namagedung',
        'hs_blok_lantai',
        'hs_namajalan:ntext',
        'hs_propinsi',
        'hs_kabupaten',
        'hs_kecamatan',
        'hs_kelurahan',
        'hs_kodepos',
        'hs_telepon',
        'hs_fax',
        'hs_email:email',
        'hs_luas',
        'hs_kapasitas',
        'hs_kapasitas_satuan',
        'hs_nilai',
        'hs_komposisi_nasional',
        'hs_komposisi_asing',
        'hs_kelengkapan',
        'hs_sarana_listrik',
        'hs_sarana_air',
        'hs_sarana_pendingin',
        'hs_sarana_forklif',
        'hs_sarana_komputer',
        'hs_kepemilikan',
        'hs_imb_nomor',
        'hs_imb_tanggal',
        'hs_uug_nomor',
        'hs_uug_tanggal',
        'hs_isi:ntext',
        'bapl_file',
        'catatan_tambahan:ntext',
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
