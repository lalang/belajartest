<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IzinKesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Izin Kesehatan');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-kesehatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Izin Kesehatan'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'filterInputOptions' => ['placeholder' => 'Perizinan', 'id' => 'grid-izin-kesehatan-search-perizinan_id']
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
                'filterInputOptions' => ['placeholder' => 'Izin', 'id' => 'grid-izin-kesehatan-search-izin_id']
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
                'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid-izin-kesehatan-search-user_id']
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
                'filterInputOptions' => ['placeholder' => 'Status', 'id' => 'grid-izin-kesehatan-search-status_id']
            ],
        [
                'attribute' => 'lokasi_id',
                'label' => Yii::t('app', 'Lokasi'),
                'value' => function($model){
                    return $model->lokasi->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Lokasi', 'id' => 'grid-izin-kesehatan-search-lokasi_id']
            ],
        'tipe',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'agama',
        'alamat:ntext',
        'rt',
        'rw',
        'propinsi_id',
        'wilayah_id',
        'kecamatan_id',
        'kelurahan_id',
        'kodepos',
        'telepon',
        'email:email',
        'kitas',
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
                'filterInputOptions' => ['placeholder' => 'Negara', 'id' => 'grid-izin-kesehatan-search-kewarganegaraan_id']
            ],
        'status_sip_offline',
        'jumlah_sip_offline',
        'nomor_str',
        'tanggal_berlaku_str',
        'perguruan_tinggi',
        'tanggal_lulus',
        'nomor_rekomendasi',
        [
                'attribute' => 'kepegawaian_id',
                'label' => Yii::t('app', 'Kepegawaian'),
                'value' => function($model){
                    return $model->kepegawaian->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Kepegawaian::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Kepegawaian', 'id' => 'grid-izin-kesehatan-search-kepegawaian_id']
            ],
        'nomor_fasilitas_kesehatan',
        'tanggal_fasilitas_kesehatan',
        'nomor_pimpinan',
        'tanggal_pimpinan',
        'npwp_tempat_praktik',
        'nama_tempat_praktik',
        'titik_koordinat',
        'latitude',
        'longtitude',
        'nama_gedung_praktik',
        'blok_tempat_praktik',
        'alamat_tempat_praktik:ntext',
        'rt_tempat_praktik',
        'rw_tempat_praktik',
        'wilayah_id_tempat_praktik',
        'kecamatan_id_tempat_praktik',
        'kelurahan_id_tempat_praktik',
        'kodepos_tempat_praktik',
        'telpon_tempat_praktik',
        'fax_tempat_praktik',
        'email_tempat_praktik:email',
        'nomor_izin_kesehatan',
        'jenis_praktik_i',
        'nama_tempat_praktik_i',
        'nomor_sip_i',
        'tanggal_berlaku_sip_i',
        'nama_gedung_praktik_i',
        'blok_tempat_praktik_i',
        'alamat_tempat_praktik_i:ntext',
        'rt_tempat_praktik_i',
        'rw_tempat_praktik_i',
        'propinsi_id_tempat_praktik_i',
        'wilayah_id_tempat_praktik_i',
        'kecamatan_id_tempat_praktik_i',
        'kelurahan_id_tempat_praktik_i',
        'telpon_tempat_praktik_i',
        'jenis_praktik_ii',
        'nama_tempat_praktik_ii',
        'nomor_sip_ii',
        'tanggal_berlaku_sip_ii',
        'nama_gedung_praktik_ii',
        'blok_tempat_praktik_ii',
        'alamat_tempat_praktik_ii:ntext',
        'rt_tempat_praktik_ii',
        'rw_tempat_praktik_ii',
        'propinsi_id_tempat_praktik_ii',
        'wilayah_id_tempat_praktik_ii',
        'kecamatan_id_tempat_praktik_ii',
        'kelurahan_id_tempat_praktik_ii',
        'telpon_tempat_praktik_ii',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-kesehatan']],
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
