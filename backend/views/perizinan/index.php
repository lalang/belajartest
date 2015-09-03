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
        <h2><i class="fa fa-list"></i> Data Perizinan</h2>
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
                        'attribute' => 'keterangan',
                        'label' => Yii::t('app', 'Keterangan'),
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $widget) {
                            $menit = 0;
                            switch ($model->izin->durasi_satuan) {
                                case 'Hari' :
                                    $menit = 8 * 60 * $model->izin->durasi;
                                    break;
                                case 'Jam' :
                                    $menit = 60 * $model->izin->durasi;
                                    break;
                                case 'Menit' :
                                    $menit = $model->izin->durasi;
                                    break;
                            }
                            if ($model->status == 'Selesai' || $model->status == 'Tolak Izin') {
                                return "Proses selesai";
                            } else {
                                $target_date = date_create($model->tanggal_mohon);
                                date_add($target_date, date_interval_create_from_date_string($model->izin->durasi . ' days'));
                                $start_date = new DateTime();
                                $date_final = $start_date->diff($target_date);
                                $interval = $date_final->d . ' hari ' . $date_final->h . ' jam ' . $date_final->i . ' menit';
                                $diff = $target_date > new DateTime() ? 'Kurang' : 'Terlewat';
                                return "Target: {$model->izin->durasi} {$model->izin->durasi_satuan}<br>"
                                        . "{$diff}: {$interval}";
                            }
                        },
                    ],
                    [
                        'attribute' => 'currentProcess',
                        'label' => Yii::t('app', 'Petugas'),
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $widget) {
                            return "{$model->currentProcess->pelaksana0->nama}";
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
                                'template' => '{view}'
                            ],
                        ];
                        ?>
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
                            'columns' => $gridColumn,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
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
