<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Progress;
use app\assets\admin\dashboard\DashboardAsset;

use yii\helpers\Url;
use yii\widgets\LinkPager;


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

<style>
    .panel-default {border:none}
</style>

<div class="">
    
        <div class="breadcrumb-wrapper hidden-xs">
            
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
   
    <!--/ End page header -->
    
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= Html::encode($this->title) ?></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
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
                                    'type' => GridView::TYPE_DEFAULT,
                                    //'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
                                    'heading' => false,
                                    'footer' => false,
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
                                            'class' => 'btn btn-info',
                                            'itemsBefore' => [
                                                '<li class="dropdown-header">Export All Data</li>',
                                            ],
                                        ],
                                    ]),
                                ],
                            ]);
                            ?>
            </div>
        </div>
    
</div>
