<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use app\assets\admin\dashboard\DashboardAsset;

DashboardAsset::register($this);


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
<section id="page-content">

    <!-- Start page header -->
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


                <div class="search-form" style="display:none">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>

                <?php
                $gridColumn = [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id', 'hidden' => true],
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
                    'no_urut',
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
                                'template' => '{view} {schedule}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        $action = $model->izin->action . '/view';
                                        $url = \yii\helpers\Url::toRoute([$action, 'id' => $model->id]);
                                        if ($model->status == 'Daftar') {
                                            return Html::a('<i class="fa fa-calendar"></i>', $url, [
                                                        'title' => Yii::t('yii', 'Jadwal'),
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    },
                                            'schedule' => function ($url, $model) {
                                        $url = \yii\helpers\Url::toRoute(['schedule', 'id' => $model->id]);
                                        if ($model->status == 'Daftar') {
                                            return Html::a('<i class="fa fa-calendar"></i>', $url, [
                                                        'title' => Yii::t('yii', 'Jadwal'),
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    }
                                        ]
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
                                    // set a label for default menu
                                    'export' => [
                                        'label' => 'Page',
                                        'fontAwesome' => true,
                                    ],
                                    // your toolbar can include the additional full export menu
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
                            </div>

                        </div><!-- /.row -->

                    </div><!-- /.body-content -->
                    <!--/ End body content -->
                    <?php echo $this->render('/shares/_footer_admin'); ?>

</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
