<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IzinPariwisataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Izin Pariwisata');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-pariwisata-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Izin Pariwisata'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'filterInputOptions' => ['placeholder' => 'Perizinan', 'id' => 'grid-izin-pariwisata-search-perizinan_id']
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
                'filterInputOptions' => ['placeholder' => 'Izin', 'id' => 'grid-izin-pariwisata-search-izin_id']
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
                'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid-izin-pariwisata-search-user_id']
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
                'filterInputOptions' => ['placeholder' => 'Status', 'id' => 'grid-izin-pariwisata-search-status_id']
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
                'filterInputOptions' => ['placeholder' => 'Lokasi', 'id' => 'grid-izin-pariwisata-search-lokasi_id']
            ],
        'tipe',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'alamat:ntext',
        'rt',
        'rw',
        'propinsi_id',
        'wilayah_id',
        'kecamatan_id',
        'kelurahan_id',
        'kodepos',
        'email:email',
        'telepon',
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
                'filterInputOptions' => ['placeholder' => 'Negara', 'id' => 'grid-izin-pariwisata-search-kewarganegaraan_id']
            ],
        'kitas',
        'passport',
        'npwp_perusahaan',
        'nama_perusahaan',
        'nama_gedung_perusahaan',
        'blok_perusahaan',
        'alamat_perusahaan:ntext',
        'propinsi_id_perusahaan',
        'wilayah_id_perusahaan',
        'kecamatan_id_perusahaan',
        'kelurahan_id_perusahaan',
        'kodepos_perusahaan',
        'telpon_perusahaan',
        'fax_perusahaan',
        'email_perusahaan:email',
        'nomor_akta_pendirian',
        'tanggal_pendirian',
        'nama_notaris_pendirian',
        'nomor_sk_pengesahan',
        'tanggal_pengesahan',
        'nomor_akta_cabang',
        'tanggal_cabang',
        'nama_notaris_cabang',
        'keputusan_cabang',
        'tanggal_keputusan_cabang',
        'identitas_sama',
        'nik_penanggung_jawab',
        'nama_penanggung_jawab',
        'tempat_lahir_penanggung_jawab',
        'tanggal_lahir_penanggung_jawab',
        'jenkel_penanggung_jawab',
        'alamat_penanggung_jawab:ntext',
        'rt_penanggung_jawab',
        'rw_penanggung_jawab',
        'propinsi_id_penanggung_jawab',
        'wilayah_id_penanggung_jawab',
        'kecamatan_id_penanggung_jawab',
        'kelurahan_id_penanggung_jawab',
        'kodepos_penanggung_jawab',
        'telepon_penanggung_jawab',
        [
                'attribute' => 'kewarganegaraan_id_penanggung_jawab',
                'label' => Yii::t('app', 'Kewarganegaraan Id Penanggung Jawab'),
                'value' => function($model){
                    return $model->negara->id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Negara', 'id' => 'grid-izin-pariwisata-search-kewarganegaraan_id_penanggung_jawab']
            ],
        'kitas_penanggung_jawab',
        'passport_penanggung_jawab',
        'no_tdup',
        'tanggal_tdup',
        'merk_nama_usaha',
        'titik_koordinat',
        'latitude',
        'longtitude',
        'nama_gedung_usaha',
        'blok_usaha',
        'alamat_usaha:ntext',
        'rt_usaha',
        'rw_usaha',
        'wilayah_id_usaha',
        'kecamatan_id_usaha',
        'kelurahan_id_usaha',
        'kodepos_usaha',
        'telpon_usaha',
        'fax_usaha',
        'nomor_objek_pajak_usaha',
        'jumlah_karyawan',
        'npwpd',
        'intensitas_jasa_perjalanan',
        'kapasitas_penyedia_akomodasi',
        'jum_kursi_jasa_manum',
        'jum_stand_jasa_manum',
        'jum_pack_jasa_manum',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pariwisata']],
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
