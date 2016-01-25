<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocUserManSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Document User Manual');
//$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="box"  style="padding:10px 4px;">


    <?php
    // echo $this->render('_search', ['model' => $searchModel]); 
//---------------------------------------Admin---------------------------------------
    if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')) {
        ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create Doc User Man <i class="fa fa-plus"></i>'), ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a(Yii::t('app', 'Advance Search <i class="fa fa-search-plus"></i>'), '#', ['class' => 'btn btn-info search-button']) ?>
        </p>
        <div class="search-form" style="display:none">
    <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <?php
        $gridColumn = [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            ['attribute' => 'id_access',
                'value' => 'id_access',
                'label' => Yii::t('app', 'Title'),
            ],
            'nama',
            [
                'attribute' => 'File',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->aktivasi == 'Y') {
                        $path = $model->docs;
                        $fileName = preg_replace('/[\s\n]+/', '-', strtolower($model->nama));
                        $ext = pathinfo($path, PATHINFO_EXTENSION);

                        return Html::a(Yii::t('user', '<i class="fa fa-download"></i> Download'), ['/dokumen/' . $fileName . '.' . $ext], [
                                    'class' => 'btn btn-xs btn-primary',
                                    'onclick' => "window.open(this.href,'_blank');return false;",
                                        ]


//                        return Html::a(
//                                        Yii::t('user', '<i class="fa fa-download"></i> Download'), 
//                                         [Yii::$app->urlManager->createUrl('/dokumen/'.$model->nama. '.'.$ext)],
//                                        [
//                                        'class' => 'btn btn-xs btn-primary',
//                                        'onclick'=>"window.open(this.href,'_blank');return false;",
//
//                                        ]
                        );
                    }
                },
                    ],
                    [

                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {status}',
                        'header' => 'Action',
                        'buttons' => [
                            'view' => function ($url, $model) {
//                        $action = $model->izin->action . '/view';
                                $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->id]);

                                return Html::a('Lihat', $url, [
                                            'title' => Yii::t('yii', 'View'),
                                            'class' => 'btn btn-primary'
                                ]);
                            },
                                ]
                            ],
                        ];
                        ?>
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
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

                        <?php
 // -----------------------------------------Petugas, Kepala, Tim_tu,------------------------------------
                    } else {
                        if (Yii::$app->user->can($model->id_access == 'Petugas')) {
                            ?>

                            <div class="search-form" style="display:none">
                            <?= $this->render('_search', ['model' => $searchModel]); ?>
                            </div>

                                <?php
                                $gridColumn = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id', 'hidden' => true],
                                    ['attribute' => 'id_access',
                                        'value' => 'id_access',
                                        'label' => Yii::t('app', 'Title'),
                                    ],
                                    'nama',
                                    [
                                        'attribute' => 'File',
                                        'format' => 'raw',
                                        'value' => function ($model) {
                                            if ($model->aktivasi == 'Y') {
                                                $path = $model->docs;
                                               $fileName = preg_replace('/[\s\n]+/', '-', strtolower($model->nama));
                                                $ext = pathinfo($path, PATHINFO_EXTENSION);

                                                return Html::a(Yii::t('user', '<i class="fa fa-download"></i> Download'), ['/dokumen/' .$fileName . '.' . $ext], [
                                                            'class' => 'btn btn-xs btn-primary',
                                                            'onclick' => "window.open(this.href,'_blank');return false;",
                                                                ]
                                                );
                                            }
                                        },
                                            ],
                                        ];
                                    }
                                    ?>
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
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
                            }
                            ?>
</div>
