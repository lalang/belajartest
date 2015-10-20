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

                            $p = $model->current / ($model->jumlah_tahap == 0 ? 1 : $model->jumlah_tahap) * 100;
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
                                'template' => '{proses} {berkas} {form} {sk} {cetak}',
                                'buttons' => [
                                    'proses' => function ($url, $model) {
                                        if (!$model->cek_berkas && !$model->cek_form && !$model->buat_sk && !$model->cetak_sk) {
                                            $url = \yii\helpers\Url::toRoute(['proses', 'id' => $model->current_id]);
                                            return Html::a('Proses', $url, [
                                                        'title' => Yii::t('yii', 'Proses Perizinan'),
                                                        'class' => 'btn btn-primary',
//                                                        'data' => [
//                                                            'method' => 'post',
//                                                        ],
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
                                            'berkas' => function ($url, $model) {
                                        $url = \yii\helpers\Url::toRoute(['cek-berkas', 'id' => $model->current_id]);
                                        if ($model->cek_berkas) {
                                            return Html::a('Cek Berkas', $url, [
                                                        'title' => Yii::t('yii', 'Cek Dokumen Persyaratan'),
                                                        'class' => 'btn btn-success',
                                                        'data-method' => 'post'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
                                            'form' => function ($url, $model) {
                                        $url = \yii\helpers\Url::toRoute(['cek-formulir', 'id' => $model->current_id]);
                                        if ($model->cek_form) {
                                            return Html::a('Approval Formulir', $url, [
                                                        'title' => Yii::t('yii', 'Approval Formulir Pendaftaran'),
                                                        'class' => 'btn btn-success'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
                                            'sk' => function ($url, $model) {
                                        $url = \yii\helpers\Url::toRoute(['approval-sk', 'id' => $model->current_id]);
                                        if ($model->buat_sk) {
                                            return Html::a('Approval SK', $url, [
                                                        'title' => Yii::t('yii', 'Approval SK'),
                                                        'class' => 'btn btn-success'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
                                            'cetak' => function ($url, $model) {
                                        $url = \yii\helpers\Url::toRoute(['cetak-sk', 'id' => $model->current_id]);
                                        if ($model->cetak_sk) {
                                            return Html::a('Cetak SK', $url, [
                                                        'title' => Yii::t('yii', 'Cetak SK SIUP'),
                                                        'class' => 'btn btn-success'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
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
