<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSiupOfflineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perizinan Siup Offline';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="box"  style="padding:10px 4px;">

    <p>
        <?= Html::a('Create <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search <i class="fa fa-search-plus"></i>', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'no_izin',
        'pemilik_nama',
        'pemilik_tempat_lahir',
        'pemilik_tanggal_lahir',
        'pemilik_alamat_rumah',
        'pemilik_propinsi',
        'pemilik_kabupaten',
        'pemilik_kecamatan',
        'pemilik_kelurahan',
        'pemilik_no_telpon',
        'pemilik_no_ktp',
        'pemilik_kewarganegaraan',
        'perusahaan_nama',
        'perusahaan_alamat',
        'perusahaan_propinsi',
        'perusahaan_kabupaten',
        'perusahaan_kecamatan',
        'perusahaan_kelurahan',
        'perusahaan_kodepos',
        'perusahaan_no_telpon',
        'perusahaan_no_fax',
        'perusahaan_email:email',
        'created_date',
        'updated_date',
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
