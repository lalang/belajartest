<?php

use yii\helpers\Html;
//use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use app\assets\admin\CoreAsset;

CoreAsset::register($this);


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> Data Perizinan <span><?php echo Yii::$app->user->identity->wewenang->nama . ' ' . Yii::$app->user->identity->lokasi->nama; ?></span></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/index') ?>">Perizinan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Data</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">
        
        <div class="row">
            <div class="col-md-12">

                <p>
                    <?= Html::a(Yii::t('app', 'Semua'), ['filter', 'status' => ''], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                    <?= Html::a(Yii::t('app', 'Baru'), ['filter', 'status' => 'daftar'], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                    <?= Html::a(Yii::t('app', 'Proses'), ['filter', 'status' => 'proses'], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                    <?= Html::a(Yii::t('app', 'Tolak'), ['filter', 'status' => 'tolak'], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                    <?= Html::a(Yii::t('app', 'Revisi'), ['filter', 'status' => 'revisi'], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                    <?= Html::a(Yii::t('app', 'Lanjut'), ['filter', 'status' => 'lanjut'], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                    <?= Html::a(Yii::t('app', 'Selesai'), ['filter', 'status' => 'selesai'], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                    <?= Html::a(Yii::t('app', 'Tolak Izin'), ['filter', 'status' => 'tolak izin'], ['data-method' => 'post', 'class' => 'btn btn-info search-button']) ?>
                </p>

                <?php
                $gridColumn = [
//            ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id'],
//        [
//            'attribute' => 'perizinans.id',
//            'label' => Yii::t('app', 'Perizinan'),
//        ],
                    [
                        'attribute' => 'pemohon.id',
                        'label' => Yii::t('app', 'Pemohon'),
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $widget) {
                            return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
                        },
                    ],
//        'id_groupizin',
                    [
                        'attribute' => 'izin.id',
                        'label' => Yii::t('app', 'Perihal'),
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $widget) {
                            return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: {$model->tanggal_mohon}</em>";
                        },
                    ],
                    [
                        'attribute' => 'current',
                        //'class' => 'yii\bootstrap\Progress',
                        'label' => Yii::t('app', 'Progress'),
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $widget) {
                            $p = $model->current / $model->jumlah_tahap * 100;
//                return $widget([
//                'percent' => $p,
//                'label' => $model->current . ' / ' . $model->jumlah_tahap,
//                ]);
                            return Progress::widget([
                                        'percent' => $p,
                                        'label' => $model->current . ' / ' . $model->jumlah_tahap,
                            ]);
                        },
                            ],
//        'tanggal_mohon',
//        'no_izin',
//        'berkas_noizin',
//        'tanggal_izin',
//        'tanggal_expired',
                            'status',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{check} {process}',
                                'buttons' => [
                                    'process' => function ($url, $model) {
                                        if ($model->status != 'Selesai') {
                                            $url = \yii\helpers\Url::toRoute(['process', 'id' => $model->current_id]);
                                            return Html::a('Proses Berkas', $url, [
                                                        'title' => Yii::t('yii', 'View'),
                                                        'class' => 'btn btn-primary'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
                                            'check' => function ($url, $model) {
                                        $url = \yii\helpers\Url::toRoute(['check-document', 'id' => $model->current_id]);
                                        if ($model->status == 'Daftar') {
                                            return Html::a('Cek Persyaratan', $url, [
                                                        'title' => Yii::t('yii', 'Cek Dokumen Persyaratan'),
                                                        'class' => 'btn btn-success'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    }
                                        ]
                                    ]
                                ];
                                ?>
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
                                    'columns' => $gridColumn,
//                                    'pjax' => true,
//                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                                    'panel' => [
                                        'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<h3 class="panel-title"><i class="fa fa-envelope"></i>  ' . Html::encode($this->title) . ' </h3>',
                                    ],
                                    'export' => false,
                                        // set a label for default menu
//                    'export' => [
//                        'label' => 'Page',
//                        'fontAwesome' => true,
//                    ],
//                    // your toolbar can include the additional full export menu
//                    'toolbar' => [
//                        '{export}',
//                        ExportMenu::widget([
//                            'dataProvider' => $dataProvider,
//                            'columns' => $gridColumn,
//                            'target' => ExportMenu::TARGET_BLANK,
//                            'fontAwesome' => true,
//                            'dropdownOptions' => [
//                                'label' => 'Full',
//                                'class' => 'btn btn-default',
//                                'itemsBefore' => [
//                                    '<li class="dropdown-header">Export All Data</li>',
//                                ],
//                            ],
//                        ]),
//                    ],
                                ]);
                                ?>
                            </div>

                        </div><!-- /.row -->

                    </div><!-- /.body-content -->
                    <!--/ End body content -->


                </section><!-- /#page-content -->

                <?php echo $this->render('/shares/_footer_admin'); ?>
<!--/ END PAGE CONTENT -->
