<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IzinSkdpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Izin Skdp');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-skdp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Izin Skdp'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'perizinan_id',
                'label' => Yii::t('app', 'Perizinan'),
                'value' => function($model){
                    return $model->perizinan->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Perizinan', 'id' => 'grid-izin-skdp-search-perizinan_id']
            ],
        [
                'attribute' => 'izin_id',
                'label' => Yii::t('app', 'Izin'),
                'value' => function($model){
                    return $model->izin->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Izin', 'id' => 'grid-izin-skdp-search-izin_id']
            ],
        [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'User'),
                'value' => function($model){
                    return $model->user->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid-izin-skdp-search-user_id']
            ],
        [
                'attribute' => 'status_id',
                'label' => Yii::t('app', 'Status'),
                'value' => function($model){
                    return $model->status->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Status', 'id' => 'grid-izin-skdp-search-status_id']
            ],
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'agama',
        'alamat:ntext',
        'rt',
        'rw',
        'wilayah_id',
        'kecamatan_id',
        'kelurahan_id',
        'kodepos',
        'telepon',
        'passport',
        [
                'attribute' => 'kewarganegaraan_id',
                'label' => Yii::t('app', 'Kewarganegaraan'),
                'value' => function($model){
                    return $model->negara->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Negara', 'id' => 'grid-izin-skdp-search-kewarganegaraan_id']
            ],
        'npwp_perusahaan',
        'nama_perusahaan',
        'titik_koordinat',
        'latitude',
        'longtitude',
        'nama_gedung_perusahaan',
        'blok_perusahaan',
        'alamat_perusahaan:ntext',
        'rt_perusahaan',
        'rw_perusahaan',
        'wilayah_id_perusahaan',
        'kecamatan_id_perusahaan',
        'kelurahan_id_perusahaan',
        'kodepos_perusahaan',
        'telpon_perusahaan',
        'fax_perusahaan',
        'klarifikasi_usaha',
        'status_kepemilikan',
        'status_kantor',
        'jumlah_karyawan',
        'nomor_akta_pendirian',
        'tanggal_pendirian',
        'nama_notaris_pendirian',
        'nomor_sk_kemenkumham',
        'tanggal_pengesahan',
        'nama_notaris_pengesahan',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-skdp']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
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
