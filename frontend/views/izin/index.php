<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use app\assets\admin\dashboard\DashboardAsset;
use yii\helpers\Url;

DashboardAsset::register($this);


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<section id="page-content">

    <!-- Start page header -->
    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> Daftar Perizinan</h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('izin/index') ?>">Perizinan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Daftar</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-md-12">
                <div class="panel rounded shadow">
                    <div class="panel-sub-heading">
                        <div class="callout callout-info">
                            <p>Silahkan cari perizinan yang anda butuhkan lalu klik tombol Daftar untuk membuat permohonan</p>
                            <p>Namun mohon maaf belum semua perizinan tersedia secara online, untuk yang tidak tersedia silahkan melakukan pendaftaran langsung ke kantor perizinan</p>
                        </div>
                    </div><!-- /.panel-sub-heading -->
                    <div class="panel-body">
                        <?php
                        $gridColumn = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'hidden' => true],
//        'jenis',
                            [
                                'attribute' => 'bidang_id',
                                'vAlign' => 'middle',
                                'width' => '180px',
                                'label' => Yii::t('app', 'Bidang'),
                                'value' => function ($model, $key, $index, $widget) {
                                    return $model->bidang->nama;
                                },
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Bidang::find()->orderBy('nama')->asArray()->all(), 'id', 'nama'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Pilih bidang', 'style' => '"width: 250px;'],
                                'format' => 'raw'
                            ],
                            'nama',
//                        'kode',
//        'fno_surat',
//        'aktif',
                            [
                                'attribute' => 'wewenang_id',
                                'label' => Yii::t('app', 'Wewenang'),
                                'value' => function ($model, $key, $index, $widget) {
                                    return $model->wewenang->nama;
                                },
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Wewenang::find()->where('parent_id is null')->orderBy('nama')->asArray()->all(), 'id', 'nama'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Pilih wewenang', 'style' => '"width: 150px;'],
                                'format' => 'raw'
                            ],
//        'cek_lapangan',
//        'cek_sprtrw',
//        'cek_obyek',
//        'cek_perusahaan',
                            [
                                'attribute' => 'durasi',
                                'label' => Yii::t('app', 'Durasi'),
                                'value' => function ($model, $key, $index, $widget) {
                                    return $model->durasi . ' ' . $model->durasi_satuan;
                                },
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} | {new}',
                                'header' => 'Action',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        $url = Url::toRoute(['view', 'id' => $model->id]);
                                        return Html::a('Lihat', $url, [
                                                    'title' => Yii::t('yii', 'Lihat Persyaratan'),
                                        ]);
                                    },
                                            'new' => function ($url, $model) {
                                        if ($model->action != null) {
                                            $url = Url::toRoute([$model->action . '/create', 'id' => $model->id]);
                                            return Html::a('Daftar', $url, [
                                                        'title' => Yii::t('yii', 'Buat Permohonan'),
                                            ]);
                                        } else {
                                            return 'N/A';
                                        }
                                    }
                                        ]
                                    ],
                                ];
                                ?>
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => $gridColumn,
                                    'pjax' => true,
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
//                    'panel' => [
//                        'type' => GridView::TYPE_DEFAULT,
//                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Cari Perizinan') . ' </h3>',
//                    ],
                                    // set a label for default menu
                                    'export' => false,
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>

                </div><!-- /.row -->

            </div><!-- /.body-content -->
            <!--/ End body content -->
            <?php echo $this->render('/shares/_footer_admin'); ?>

</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
