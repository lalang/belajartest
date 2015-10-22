<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinTdpPimpinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin Tdp Pimpinan';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-tdp-pimpinan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Izin Tdp Pimpinan', ['create'], ['class' => 'btn btn-success']) ?>
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
            'attribute' => 'izinTdp.id',
            'label' => 'Izin Tdp',
        ],
        'izin_tdp_pimpinan_kedudukan',
        'izin_tdp_pimpinan_nama',
        'izin_tdp_pimpinan',
        'izin_tdp_pimpinan_tmpt_lahir',
        'izin_tdp_pimpinan_tgl_lahir',
        'izin_tdp_pimpinan_alamat:ntext',
        'izin_tdp_pimpinan_kodepos',
        'izin_tdp_pimpinan_tlpn',
        'izin_tdp_pimpinan_kewarganegara',
        'izin_tdp_pimpinan_tgl_mulai',
        'izin_tdp_pimpinan_jum_saham',
        'izin_tdp_pimpinan_jum_modal',
        'izin_tdp_pimpinan_kedudukan_lain',
        'izin_tdp_pimpinan_nama_perusahaan',
        'izin_tdp_pimpinan_alamat_perusahaan:ntext',
        'izin_tdp_pimpinan_kodepos_perusahaan',
        'izin_tdp_pimpinan_tlpn_perusahaan',
        'izin_tdp_pimpinan_tgl_mulai_perusahaan',
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
