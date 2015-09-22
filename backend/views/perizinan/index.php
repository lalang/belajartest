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
?>
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
            [
                'attribute' => 'pemohon.id',
                'label' => Yii::t('app', 'Pemohon'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
                },
            ],
            'processes',
            [
                'attribute' => 'izin.id',
                'label' => Yii::t('app', 'Perihal'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "{$model->izin->nama} <br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: {$model->tanggal_mohon}</em>";
                },
            ],
//            [
//                'attribute' => 'current_no',
////                        'class' => 'kartik\slider\Slider',
//                'label' => Yii::t('app', 'Progress'),
//                'format' => 'raw',
//                'value' => function ($model, $key, $index, $widget) {
//                    $p = $model->current_no / $model->jumlah_tahap * 100;
//
//                    return Slider::widget([
//                                'name' => 'current_no',
//                                'value' => $model->current_no,
//                                'sliderColor' => Slider::TYPE_GREY,
//                                'handleColor' => Slider::TYPE_DANGER,
//                                'pluginOptions' => [
////                                            'orientation'=>'vertical',
////                                            'handle' => 'circle',
////                            'tooltip' => 'always',
////                                            'reversed'=>true,
//                                    'min' => 1,
//                                    'max' => $model->jumlah_tahap,
//                                    'ticks' => explode(',', $model->steps),
//                                    'ticks_labels' => explode(',', $model->processes),
//                                    'ticks_snap_bounds' => 50
//                                ],
//                                'options' => ['disabled' => true]
//                    ]);
//                },
//                    ],
//        'tanggal_mohon',
//        'no_izin',
//        'berkas_noizin',
//        'tanggal_izin',
//        'tanggal_expired',
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
                    'pjax' => true,
                    'resizableColumns' => true,
                    'responsive' => true,
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
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
