<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use kartik\slider\Slider;
use yii\bootstrap\Modal;
use backend\models\Perizinan;
use backend\models\Simultan;
use backend\models\Izin;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = $this->title;
//$search = "$('.search-button').click(function(){
//    $('.search-form').toggle(1000);
//    return false;
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

<?= $this->render('../_sidebar', ['active' => $active]) ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Perpanjangan
    </h1>
    <ol class="breadcrumb">
        <li><?php echo Html::a(Yii::t('frontend', '<i class="fa fa-dashboard"></i> Home'), ['/mobile-backend/index/']) ?></li>
        <li class="active">Perpanjangan</li>
    </ol>
</section>

<section class="content">
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
            $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->id]);
            $lokasiAmbil = $model->lokasiPengambilan->nama;
            $sesi = $model->pengambilan_sesi;
            if ($lokasiAmbil != null && $sesi != null) {
                return Html::a($model->kode_registrasi . '<br> <span class="label label-danger">Lihat</span>', $url, [
                            'title' => Yii::t('yii', 'View'),
//                                        'class' => 'btn btn-primary'
                ]);
            } else {
                return $model->kode_registrasi;
            }
        },
    ],
    [
        'attribute' => 'izin.id',
        'label' => Yii::t('app', 'Perihal'),
        'format' => 'html',
        'value' => function ($model, $key, $index, $widget) {

            $tgl_mohon = Yii::$app->formatter->asDate($model->tanggal_mohon, "php:d-M-Y");
            $tgl_expired = Yii::$app->formatter->asDate($model->tanggal_expired, "php:d-M-Y");

            if ($model->status == "Tolak" || $model->status == "Daftar") {
                return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}";
            } elseif ($model->status == "Verifikasi" || $model->status == "Lanjut" || $model->status == "Selesai") {
                return "<p>Status: <em>".$model->status."</em></p><p>Lokasi Pengambilan:<br><em>".$model->lokasiPengambilan->nama."</em></p><p>{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: {$tgl_mohon}</em><br><em>Tanggal Masa Berlaku: {$tgl_expired}</em></p>";
            }
        },
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{perpanjangan}',
        'header' => 'Perpanjangan',
        'buttons' => [
            'perpanjangan' => function ($url, $model) {
                if ($model->aktif == 'Y' && $model->tanggal_mohon > "2016-06-01 00:00:00") {

                    $kodeArr = explode(".",$model->izin->kode);
                    $kode = $kodeArr[0].'.'.$kodeArr[1];
                    
                    $Izin = Izin::find()
                            ->where(['kode' => $kode .'.1'])
                            ->andWhere('alias is not NULL and alias <>""')
                            ->one();

                    $action = Izin::findOne($Izin->id)->action . '/perpanjangan';
                    if ($Izin->id) {
                        return Html::a('Perpanjangan', [$action, 'id' => $Izin->id, 'sumber' => $model->id], [
                                    'class' => 'btn btn-primary',
                                    'title' => Yii::t('yii', 'Pengajuan Perpanjangan Izin'),
                        ]);
                    } else {
                        return 'Maaf, izin ini tidak dapat diperpanjang';
                    }
                } else if ($model->aktif == 'Y') {
                    return 'Maaf, izin ini tidak dapat menggunakan fitur ini. Silahkan lakukan pendaftaran melalui "<strong>Daftar Perizinan</strong>"';
                } else {
                    return 'Maaf, izin ini sudah diajukan perpanjangan';
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
    'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'heading' => '<h3 class="panel-title"><i class="fa fa-envelope"></i>  Data Perizinan Anda </h3>',
    ],
]);
?>
</section>
