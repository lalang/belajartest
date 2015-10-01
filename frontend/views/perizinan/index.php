<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use kartik\slider\Slider;


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

<?=  $this->render('_search', ['model' => $searchModel]); ?>
<br>

                <?php
                $gridColumn = [
                    [
        'attribute' => 'processes',
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_EXPANDED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('_progress', ['model' => $model]);
        },
//                'headerOptions' => ['class' => 'kartik-sheet-style'],
//                'expandOneOnly' => true
            ],
                    ['attribute' => 'kode_registrasi'],
//        [
//            'attribute' => 'perizinans.id',
//            'label' => Yii::t('app', 'Perizinan'),
//        ],
//                    [
//                        'attribute' => 'pemohon.id',
//                        'label' => Yii::t('app', 'Pemohon'),
//                        'format' => 'html',
//                        'value' => function ($model, $key, $index, $widget) {
//                            return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
//                        },
//                    ],
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
                            return "{$model->currentProcess->pelaksana->nama}";
                        },
                    ],
                    /*[
                        'attribute' => 'current',
                        //'class' => 'yii\bootstrap\Progress',
                        'label' => Yii::t('app', 'Progress'),
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $widget) {
                            $p = $model->current_no / ($model->jumlah_tahap == 0 ? 1 : $model->jumlah_tahap) * 100;
//                return $widget([
//                'percent' => $p,
//                'label' => $model->current . ' / ' . $model->jumlah_tahap,
//                ]);
                            return Progress::widget([
                                        'percent' => $p,
                                        'label' => $model->current_no . ' / ' . $model->jumlah_tahap,
                            ]);
                        },
                            ],*/
//        'tanggal_mohon',
//        'no_izin',
//        'berkas_noizin',
//        'tanggal_izin',
//        'tanggal_expired',
                            'status',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {update}',
                                'header'=>'Berkas Permohonan',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        $action = $model->izin->action . '/view';
                                        $url = \yii\helpers\Url::toRoute([$action, 'id' => $model->referrer_id]);
                                        if ($model->status == 'Daftar') {
                                            return Html::a('Lihat', $url, [
                                                        'title' => Yii::t('yii', 'View'),
                                                        'class' => 'btn btn-primary'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
                                            'update' => function ($url, $model) {
                                        $action = $model->izin->action . '/update';
                                        $url = \yii\helpers\Url::toRoute([$action, 'id' => $model->referrer_id]);
                                        if ($model->status == 'Daftar') {
                                            return Html::a('Ubah', $url, [
                                                        'title' => Yii::t('yii', 'Update'),
                                                        'class' => 'btn btn-primary'
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
//                                            'schedule' => function ($url, $model) {
//                                        $url = \yii\helpers\Url::toRoute(['schedule', 'id' => $model->id]);
//                                        if ($model->status == 'Daftar') {
//                                            return Html::a('<i class="fa fa-calendar"></i>', $url, [
//                                                        'title' => Yii::t('yii', 'Jadwal'),
//                                            ]);
//                                        } else {
//                                            return '';
//                                        }
//                                    }
                                        ]
                                    ],
                                ];
                                ?>
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
//                                    'filterModel' => $searchModel,
                                    'columns' => $gridColumn,
                                    'pjax' => true,
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                                    'panel' => [
                                        'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<h3 class="panel-title"><i class="fa fa-envelope"></i>  Data Perizinan Anda </h3>',
                                    ],
                                    'export' => false
                                        // set a label for default menu
//                                    'export' => [
//                                        'label' => 'Page',
//                                        'fontAwesome' => true,
//                                    ],
                                        // your toolbar can include the additional full export menu
//                                    'toolbar' => [
//                                        '{export}',
//                                        ExportMenu::widget([
//                                            'dataProvider' => $dataProvider,
//                                            'columns' => $gridColumn,
//                                            'target' => ExportMenu::TARGET_BLANK,
//                                            'fontAwesome' => true,
//                                            'dropdownOptions' => [
//                                                'label' => 'Full',
//                                                'class' => 'btn btn-default',
//                                                'itemsBefore' => [
//                                                    '<li class="dropdown-header">Export All Data</li>',
//                                                ],
//                                            ],
//                                        ]),
//                                    ],
                                ]);
                                ?>
                            </div>

                        </div><!-- /.row -->

                    </div><!-- /.body-content -->
                    <!--/ End body content -->
                    <?php // echo $this->render('/shares/_footer_admin'); ?>

<!--/ END PAGE CONTENT -->
