<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use kartik\slider\Slider;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = $this->title;
//$search = "$('.search-button').click(function(){
//	$('.search-form').toggle(1000);
//	return false;
//});";
//$this->registerJs($search);
$this->registerJs("
    $('#modal-status').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
?>

<?= $this->render('_search', ['model' => $searchModel]); ?>
<br>
<?php
Modal::begin([
    'id' => 'modal-status',
    'header' => '<h4 class="modal-title">Status Pemrosesan Izin</h4>',
//    'size'=> Modal::SIZE_LARGE,
    'options'=>['height'=>'600px'],
    //'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class'=> 'btn btn-primary'],
]);
 
echo 'aman ganteng';
 
Modal::end();

?>

<?php
$gridColumn = [
//    [
//        'attribute' => 'processes',
//        'class' => 'kartik\grid\ExpandRowColumn',
//        'width' => '50px',
//        'value' => function ($model, $key, $index, $column) {
//            return GridView::ROW_EXPANDED;
//        },
//        'detail' => function ($model, $key, $index, $column) {
//            return Yii::$app->controller->renderPartial('_progress', ['model' => $model]);
//        },
////                'headerOptions' => ['class' => 'kartik-sheet-style'],
////                'expandOneOnly' => true
//            ],
//            ['attribute' => 'kode_registrasi'],
    [
                'attribute' => 'kode_registrasi',
                'label' => Yii::t('app', 'Kode Registrasi'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->id]);
                            return Html::a($model->kode_registrasi, $url, [
                                        'title' => Yii::t('yii', 'View'),
//                                        'class' => 'btn btn-primary'
                            ]);
                },
            ],
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
                'attribute' => 'lokasi_pengambilan_id',
                'label' => Yii::t('app', 'Lokasi Pengambilan'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->lokasiPengambilan->nama;
                },
            ],
//            [
//                'attribute' => 'currentProcess',
//                'label' => Yii::t('app', 'Petugas'),
//                'format' => 'html',
//                'value' => function ($model, $key, $index, $widget) {
//                    return Html::a($model->currentProcess->pelaksana->nama,['status','id'=>$model->id],[
//                                                    'data-toggle'=>"modal",
//                                                    'data-target'=>"#modal-status",
//                                                    'data-title'=>"Status Pemrosesan Izin",
//                                                    ]); 
//                },
//            ],

            'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {status}',
                'header' => 'Berkas Permohonan',
                'buttons' => [
                    'view' => function ($url, $model) {
//                        $action = $model->izin->action . '/view';
                        $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->id]);
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
                            'status' => function ($url, $model) {
                        return Html::a('Status',['status','id'=>$model->id],[
                                                    'data-toggle'=>"modal",
                                                    'data-target'=>"#modal-status",
                                                    'data-title'=>"Status Pemrosesan Izin",
                            'class' => 'btn btn-primary',
                            'title' => Yii::t('yii', 'Status Pemrosesan'),
                                                    ]);
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
//                    'pjax' => true,
//                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
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
                <?php // echo $this->render('/shares/_footer_admin');  ?>

<!--/ END PAGE CONTENT -->
