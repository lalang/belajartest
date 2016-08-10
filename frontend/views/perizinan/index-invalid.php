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

<?= $this->render('_search', ['model' => $searchModel, 'keyVar' => $keyVar]); ?>
<br>
<?php
Modal::begin([
    'id' => 'modal-status',
    'header' => '<h4 class="modal-title">Status Pemrosesan Izin</h4>',
//    'size'=> Modal::SIZE_LARGE,
    'options' => ['height' => '600px'],
//    'headerOptions'=>['style'=>'background-color: whitesmoke;'],
//    'bodyOptions'=>['style'=>'background-color: whitesmoke;'],
        //'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class'=> 'btn btn-primary'],
]);

echo '...';

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
            return $model->kode_registrasi;
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

            $tgl_mohon = Yii::$app->formatter->asDate($model->tanggal_mohon, "php:d-M-Y");
            $tgl_expired = Yii::$app->formatter->asDate($model->tanggal_expired, "php:d-M-Y");
            return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: {$tgl_mohon}</em><br><em>Tanggal Masa Berlaku: {$tgl_expired}</em>";
        },
    ],
    [
        'attribute' => 'no_izin',
        'label' => Yii::t('app', 'No. SK'),
        'format' => 'html',
        'value' => function ($model, $key, $index, $widget) {
            return $model->no_izin;
        },
    ],
    [
        'attribute' => 'tanggal_izin',
        'label' => Yii::t('app', 'Tanggal SK'),
        'format' => 'html',
        'value' => function ($model, $key, $index, $widget) {
            $tgl_izin = Yii::$app->formatter->asDate($model->tanggal_izin, "php:d-M-Y");
            //return $model->tanggal_izin;
            return "{$tgl_izin}";
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
    [
        'attribute' => 'status',
        'label' => Yii::t('app', 'Status'),
        'format' => 'html',
        'value' => function ($model, $key, $index, $widget) {
            return 'Tidak Berlaku';
        },
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{ket}',
        'header' => 'Keterangan',
        'buttons' => [
            'ket' => function ($url, $model) {
            
                $modelRelasi = backend\models\Perizinan::find()
                        ->where(['relasi_id'=>$model->id])
                        ->one();
                        
                return 'Digantikan Dengan No.Reg '.Html::a(' <strong>' . $modelRelasi->kode_registrasi .'</strong>', ['done?PerizinanSearch%5Bcari%5D='.$modelRelasi->kode_registrasi], [
                            //'class' => 'btn btn-primary',
                            'title' => Yii::t('yii', 'Menuju ke Perizinan No.Reg '.$modelRelasi->kode_registrasi),
                ]);
                //return 'Digantikan Dengan No.Reg <strong>' . $modelRelasi->kode_registrasi .'</strong>';
            },
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
<?php // echo $this->render('/shares/_footer_admin');    ?>

<!--/ END PAGE CONTENT -->
