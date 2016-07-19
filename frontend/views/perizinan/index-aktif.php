<?php

//    Samuel
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use kartik\slider\Slider;
use yii\bootstrap\Modal;
use backend\models\Izin;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = $this->title;

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
    'options' => ['height' => '600px'],
]);

echo '...';

Modal::end();
?>

<?php
$gridColumn = [

    [
        'attribute' => 'kode_registrasi',
        'label' => Yii::t('app', 'Kode Registrasi'),
        'format' => 'html',
        'value' => function ($model, $key, $index, $widget) {
            return $model->kode_registrasi;
        },
    ],
    [
        'attribute' => 'izin.id',
        'label' => Yii::t('app', 'Perihal'),
        'format' => 'html',
        'value' => function ($model, $key, $index, $widget) {

            $tgl_izin = Yii::$app->formatter->asDate($model->tanggal_izin, "php:d-M-Y");
            $tgl_expired = Yii::$app->formatter->asDate($model->tanggal_expired, "php:d-M-Y");
            return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: {$tgl_izin}</em><br><em>Tanggal Masa Berlaku: {$tgl_expired}</em>";
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
//           
    'status',
//    [
//        'class' => 'yii\grid\ActionColumn',
//        'template' => '{perubahan}',
//        'header' => 'Perubahan',
//        'buttons' => [
//            'perubahan' => function ($url, $model) {
//                if ($model->aktif == 'Y' && $model->tanggal_mohon > "2016-06-01 00:00:00") {
//                    $Izin = Izin::find()
//                            ->where(['kode' => $model->izin->kode . '.1'])
//                            ->andWhere('alias is not NULL and alias <>""')
//                            ->one();
//
//                    $action = Izin::findOne($Izin->id)->action . '/perubahan';
//                    if ($Izin->id) {
//                        return Html::a('Lanjutkan', [$action, 'id' => $Izin->id, 'sumber' => $model->id], [
//                                    'class' => 'btn btn-primary',
//                                    'title' => Yii::t('yii', 'Pengajuan Perpanjangan Izin'),
//                        ]);
//                    } else {
//                        return 'Maaf, izin ini tidak dapat diperpanjang';
//                    }
//                } else if ($model->aktif == 'Y') {
//                    return 'Maaf, izin ini tidak dapat menggunakan fitur ini. Silahkan lakukan pendaftaran melalui "<strong>Daftar Perizinan</strong>"';
//                } else {
//                    return 'Maaf, izin ini sudah diajukan perpanjangan';
//                }
//            },
//        ]
//    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{pencabutan}',
        'header' => 'Pencabutan',
        'buttons' => [
            'pencabutan' => function ($url, $model) {
                if ($model->aktif == 'Y' && $model->tanggal_mohon > "2016-06-01 00:00:00") {
                    $kodeArr = explode(".",$model->izin->kode);
                    $kode = $kodeArr[0].'.'.$kodeArr[1];
                    
                    $Izin = Izin::find()
                            ->where(['kode' => $kode . '.8'])
                            ->andWhere('alias is not NULL and alias <>""')
                            ->one();

                    $action = Izin::findOne($Izin->id)->action . '/pencabutan';
                    if ($Izin->id) {
                        return Html::a('Lanjutkan', [$action, 'id' => $Izin->id, 'sumber' => $model->id], [
                                    'class' => 'btn btn-primary',
                                    'title' => Yii::t('yii', 'Pengajuan Pencabutan Izin'),
                        ]);
                    } else {
                        return 'Maaf, izin ini tidak dapat melakukan pencabutan';
                    }
                } else if ($model->aktif == 'Y') {
                    return 'Maaf, izin ini tidak dapat menggunakan fitur ini. Silahkan lakukan pendaftaran melalui "<strong>Daftar Perizinan</strong>"';
                } else {
                    return 'Maaf, izin ini sudah diajukan pencabutan';
                }
            },
        ]
    ],
];
?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumn,
//                    
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fa fa-envelope"></i>  Data Perizinan Anda </h3>',
    ],
    'export' => false
]);
?>
</div>

</div><!-- /.row -->

</div><!-- /.body-content -->
<!--/ End body content -->
<?php // echo $this->render('/shares/_footer_admin');   ?>

<!--/ END PAGE CONTENT -->
