<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
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
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('_progress', ['model' => $model]);
        },
//                'headerOptions' => ['class' => 'kartik-sheet-style'],
//                'expandOneOnly' => true
            ],
            ['attribute' => 'kode_registrasi'],
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
                    return "{$model->izin->nama} {$model->status_izin} <br>Bidang: {$model->izin->bidang->nama}";
                },
            ],
            ['attribute' => 'tanggal_mohon'],
            [
                'attribute' => 'eta',
                'label' => Yii::t('app', 'ETA'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return date('l, d F Y', strtotime($model->pengambilan_tanggal)) . '<br><strong>' . $model->pengambilan_sesi.'</strong>';
                },
            ],
            ['attribute' => 'lokasiPengambilan.nama'],
//            [
//                'attribute' => 'eta',
//                'label' => Yii::t('app', 'ETA'),
//                'format' => 'html',
//                'value' => function ($model, $key, $index, $widget) {
//                    $menit = 0;
//                    switch ($model->izin->durasi_satuan) {
//                        case 'Hari' :
//                            $menit = 8 * 60 * $model->izin->durasi;
//                            break;
//                        case 'Jam' :
//                            $menit = 60 * $model->izin->durasi;
//                            break;
//                        case 'Menit' :
//                            $menit = $model->izin->durasi;
//                            break;
//                    }
//                    if ($model->status == 'Selesai' || $model->status == 'Tolak Izin') {
//                        return "Proses selesai";
//                    } else {
//                        $target_date = date_create($model->tanggal_mohon);
//                        date_add($target_date, date_interval_create_from_date_string($model->izin->durasi . ' days'));
//                        $start_date = new DateTime();
//                        $date_final = $start_date->diff($target_date);
//                        $interval = $date_final->d . ' hari ' . $date_final->h . ' jam ' . $date_final->i . ' menit';
//                        $diff = $target_date > new DateTime() ? 'Kurang' : 'Terlewat';
//                        return "Target: {$model->izin->durasi} {$model->izin->durasi_satuan}<br>"
//                                . "{$diff}: {$interval}";
//                    }
//                },
//            ],
            'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{proses}',
                'buttons' => [
                    'proses' => function ($url, $model) {
                        $url = \yii\helpers\Url::toRoute([$model->current_action, 'id' => $model->current_id]);
                        return Html::a($model->current_process, $url, [
                                    'title' => Yii::t('yii', $model->current_process),
                                    'class' => 'btn btn-primary',
                        ]);
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
