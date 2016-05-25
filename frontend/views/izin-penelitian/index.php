<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IzinPenelitianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin Penelitian';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-penelitian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Izin Penelitian', ['create'], ['class' => 'btn btn-success']) ?>
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
            'attribute' => 'user.id',
            'label' => 'User',
        ],
        [
            'attribute' => 'status.id',
            'label' => 'Status',
        ],
        [
            'attribute' => 'lokasi.id',
            'label' => 'Lokasi',
        ],
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_pemohon',
        'rt',
        'rw',
        'kelurahan_pemohon',
        'kecamatan_pemohon',
        'kabupaten_pemohon',
        'provinsi_pemohon',
        'telepon_pemohon',
        'email:email',
        'kode_pos',
        'pekerjaan_pemohon',
        'npwp',
        'nama_instansi',
        'fakultas',
        'alamat_instansi',
        'kelurahan_instansi',
        'kecamatan_instansi',
        'kabupaten_instansi',
        'provinsi_instansi',
        'email_instansi:email',
        'kodepos_instansi',
        'telepon_instansi',
        'fax_instansi',
        'tema',
        'kab_penelitian',
        'kec_penelitian',
        'kel_penelitian',
        'instansi_penelitian',
        'alamat_penelitian',
        'bidang_penelitian',
        'tgl_mulai_penelitian',
        'tgl_akhir_penelitian',
        'anggota',
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