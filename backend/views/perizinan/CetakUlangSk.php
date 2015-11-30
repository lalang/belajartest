<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\slider\Slider;
use yii\bootstrap\Progress;
use yii\bootstrap\Modal;

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
$this->registerJs("
    $('#lihat-data').on('show.bs.modal', function (event) {
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
<?php
Modal::begin([
    'id' => 'modal-status',
    'header' => '<h4 class="modal-title">Status Pemrosesan Izin</h4>',
    'options' => ['height' => '600px'],
]);

Modal::end();
?>
<?php
Modal::begin([
    'id' => 'lihat-data',
    'header' => '<h4 class="modal-title">Data Permohonan</h4>',
    'size' => Modal::SIZE_LARGE,
]);

Modal::end();
?>
<?= $this->render('_searchCetakUlangSk', ['model' => $searchModel]); ?>
<br>
<?php
$gridColumn = [

      [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{lihat}',
                'header' => 'Kode Registrasi',
                'buttons' => [
                    'lihat' => function ($url, $model) {
                            return Html::a($model->kode_registrasi.'<br> <span class="label label-danger">Lihat</span>', ['lihat', 'id' => $model->id], [
                                        'data-toggle' => "modal",
                                        'data-target' => "#lihat-data",
                                        'data-title' => "Data Pemohon",
                                        'title' => Yii::t('yii', 'Lihat Data'),
                            ]);
                        },
            ],
          ],
            [
                'attribute' => 'pemohon.id',
                'label' => Yii::t('app', 'Pemohon'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
                },
            ],
            [
                'attribute' => 'izin.id',
                'label' => Yii::t('app', 'Perihal'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "{$model->izin->nama} {$model->status->nama} <br>Bidang: {$model->izin->bidang->nama}";
                },
            ],
            ['attribute' => 'tanggal_mohon'],
            [
                'attribute' => 'eta',
                'label' => Yii::t('app', 'ETA'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return Yii::$app->formatter->asDate($model->pengambilan_tanggal, 'php: l, d F Y') . '<br><strong>' . $model->pengambilan_sesi . '</strong>';
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{status}',
                'header' => 'Status',
                'buttons' => [
                     'status' => function ($url, $model) {
                            return Html::a($model->status.'<br> <span class="label label-danger">Lihat</span>', ['status', 'id' => $model->id], [
                                        'data-toggle' => "modal",
                                        'data-target' => "#modal-status",
                                        'data-title' => "Status Pemrosesan Izin",
                                        'title' => Yii::t('yii', 'Status Pemrosesan'),
                            ]);
                    },
            ],
          ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{proses} ',
                'header' => 'Action',
                'buttons' => [
                    'mulai' => function ($url, $model) {
                        
                    },
                            'proses' => function ($url, $model) {
								if($model->status=="Berkas Siap"){
                                                                    $url = \yii\helpers\Url::toRoute(['print-ulang-sk', 'id' => $model->current_id]);
								}else{
                                                                    $url = \yii\helpers\Url::toRoute(['print-ulang-sk', 'id' => $model->current_id]);
								}
                                return Html::a('<i class="fa fa-print"></i> Cetak', $url, [
                                            'title' => Yii::t('yii', $model->current_process),
                                            'class' => 'btn btn-success',
                                            'target' => '_blank',
                                            'class' => 'btn btn-success',
                                ]);
                 
                        
                    },
                           
                        ]
                    ],
                ];
                ?>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
                    'columns' => $gridColumn,
//                    'pjax' => true,
                    'resizableColumns' => true,
                    'responsive' => true,
//                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<h3 class="panel-title"><i class="fa fa-envelope"></i>  ' . Html::encode($this->title) . ' </h3>',
                    ],
                    'tableOptions' => ['class' => 'col-md-7'],
                    'export' => false,
                    // set a label for default menu
                    'export' => [
                        'label' => 'Page',
                        'fontAwesome' => true,
                    ],
//                    // your toolbar can include the additional full export menu
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
                        ]),
                    ],
                ]);
                ?>
