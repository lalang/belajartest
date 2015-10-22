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

    <div class="header-content">
        <h2><i class="fa fa-list-alt"></i> Form <?= Html::encode($this->title); ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/view') ?>">Detail</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl(['perizinan/view', 'id' => $model->perizinan->id]) ?>">Permohonan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Perizinan</li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <?php
    $user = \backend\models\User::findOne($model->perizinan->pemohon_id);
    ?>
    <div class="body-content animated fadeIn">
        <div class="row">


            <div class="col-md-7">

                <!-- Start toggle switches -->
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Detail Mekanisme Pelayanan</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-sub-heading">
                        <div class="callout callout-info"><p><?= $model->sop->deskripsi_sop; ?></p></div>
                    </div><!-- /.panel-sub-heading -->
                    <div class="panel-body">

                        <?php
                        $gridColumn = [
                            'urutan',
                            'tanggal_proses',
                            'pelaksana0.nama',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                        ?>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
                <!-- End toggle switches -->

                <!--</div>-->

            </div>

            <div class="col-md-5">

                <div class="panel panel-theme rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Data Pemohon</h3>
                        </div>
                        <div class="pull-right">
                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-google-plus"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body no-padding">


                        <ul class="list-unstyled no-margin">

                            <li class="text-center">
                                <h4 class="text-capitalize"><?= $user->profile->name; ?></h4>
                                <h5>NIK: <?= $user->username; ?></h5>
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul class="list-group no-margin br-3">
                                    <li class="list-group-item"><i class="fa fa-envelope mr-5"></i> <?= $user->email; ?></li>
                                    <li class="list-group-item"><i class="fa fa-home mr-5"></i> <?= $user->profile->alamat; ?></li>
                                    <li class="list-group-item"><i class="fa fa-phone mr-5"></i> <?= $user->profile->telepon; ?></li>
                                </ul>
                            </li>
                            <br>
                            <div class="text-center">
                                <?php
                                $url = \yii\helpers\Url::toRoute([$model->perizinan->izin->action . '/view', 'id' => $model->perizinan->referrer_id]);
                                echo Html::a(Html::bsLabel('Lihat Detail Permohonan', Html::TYPE_DANGER), $url, [
                                    'title' => Yii::t('yii', 'Lihat Detail Permohonan'),
                                ]);
                                ?>
                            </div>
                            <br>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->

            </div>

        </div><!-- /.row -->


        <div class="row">
            <div class="col-md-7">
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Dokumen Izin</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->errorSummary($model); ?>

                        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                        <?=
                        $form->field($model, 'dokumen')->widget(TinyMce::className(), [
                            'options' => ['rows' => 12],
                            'language' => 'id',
                            'clientOptions' => [
                                'plugins' => [
                                    "advlist autolink lists link charmap print preview anchor",
                                    "searchreplace visualblocks code fullscreen",
                                    "insertdatetime media table contextmenu paste"
                                ],
                                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                            ]
                        ]);
                        ?>

                        <?php // $form->field($model, 'dok_input')->textarea(['rows' => 6]) ?>

                        <?php // $form->field($model, 'dok_proses')->textarea(['rows' => 6]) ?>

                        <?php // $form->field($model, 'dok_output')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'valid')->dropDownList(['Y' => 'Y', 'N' => 'N',], ['prompt' => '']) ?>

                        <?= $form->field($model, 'mekanisme_cek')->dropDownList([ 'Y' => 'Y', 'N' => 'N'], ['prompt' => '']) ?>


                        <?php
                        if ($model->urutan == 1) {
                            $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut'];
                        } else if ($model->urutan == $model->perizinan->jumlah_tahap) {
                            $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Selesai' => 'Selesai'];
                        } else {
                            $items = [ 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut'];
                        }
                        echo $form->field($model, 'status')->dropDownList($items, ['prompt' => ''])
                        ?>

                        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>


                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div>
            <div class="col-md-5">
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
//                                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
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


                <?php echo $this->render('/shares/_footer_admin'); ?>
        <!--/ End footer content -->

</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
