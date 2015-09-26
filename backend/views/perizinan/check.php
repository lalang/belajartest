<?php

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = $model->perizinan->izin->nama;
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
?>
<section id="page-content">

    
    <?php
    $user = \backend\models\User::findOne($model->perizinan->pemohon_id);
    ?>
    <div class="body-content animated fadeIn">
        <div class="panel-sub-heading">
            <div class="callout callout-info"><p><?= $model->sop->deskripsi_sop; ?></p></div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Dokumen Persyaratan</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">

                        <?php
                        $gridColumn = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'hidden' => true],
                            'isi:ntext',
                            [
                                'class' => 'kartik\grid\BooleanColumn',
                                'attribute' => 'check',
                                'vAlign' => 'middle'
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{check} {uncheck}',
                                'buttons' => [
                                    'check' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-check"></i>', ['check', 'id' => $model->id], [
                                                    'data' => [
                                                        'method' => 'post',
                                                    ],
                                        ]);
                                    },
                                            'uncheck' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-remove"></i>', ['uncheck', 'id' => $model->id], [
                                                    'data' => [
                                                        'method' => 'post',
                                                    ],
                                        ]);
                                    }
                                        ]
                                    ],
                                ];

                                echo \kartik\grid\GridView::widget([
                                    'dataProvider' => $providerPerizinanDokumen,
                                    'columns' => $gridColumn,
                                    'pjax' => true,
                                    'summary' => '',
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
//                            'panel' => [
//                                'type' => GridView::TYPE_PRIMARY,
//                                'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode($this->title) . ' </h3>',
//                            ],
                                    // set a label for default menu
                                    'export' => false,
                                        // your toolbar can include the additional full export menu
                                ]);
                                ?>

                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div>
        </div><!-- /.row -->


</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
