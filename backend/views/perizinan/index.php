<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\slider\Slider;
use yii\bootstrap\Progress;
use yii\bootstrap\Modal;
use backend\models\Perizinan;
use backend\models\PerizinanProses;
use backend\models\Simultan;

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
$this->registerJs("
    $('#lihat-data').on('show.bs.modal', function (event) {
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
Modal::begin([
    'id' => 'lihat-data',
    'header' => '<h4 class="modal-title">Data Permohonan</h4>',
    'size' => Modal::SIZE_LARGE,
//    'options'=>['height'=>'1200px'],
//    'headerOptions'=>['style'=>'background-color: whitesmoke;'],
//    'bodyOptions'=>['style'=>'background-color: whitesmoke;'],
        //'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class'=> 'btn btn-primary'],
]);

echo '...';

Modal::end();
?>
<?php
    if($status == 'Lanjut' || $status == 'Tolak'){
        echo $this->render('_search', ['model' => $searchModel, 'action'=>$action, 'varLink'=>$varKey, 'status'=>$status]);
    } elseif($status == 'statistik'){
        echo $this->render('_search', ['model' => $searchModel, 'lokasi'=>$lokasi, 'varLink'=>$varKey, 'status'=>$status]);
    }elseif($status == 'batal'){
        echo $this->render('_search', ['model' => $searchModel, 'lokasi'=>$lokasi, 'varLink'=>$varKey, 'status'=>$status]);
    } 
    
    else {
        echo $this->render('_search', ['model' => $searchModel, 'varLink'=>$varKey, 'status'=>$status]);
    }

       
?>
<br>
<?php
$gridColumn = [
//    [
//        'attribute' => 'processes',
//        'class' => 'kartik\grid\ExpandRowColumn',
//        'width' => '50px',
//        'value' => function ($model, $key, $index, $column) {
//            return GridView::ROW_COLLAPSED;
//        },
//        'detail' => function ($model, $key, $index, $column) {
//            return Yii::$app->controller->renderPartial('_progress', ['model' => $model]);
//        },
//                'headerOptions' => ['class' => 'kartik-sheet-style'],
//                'expandOneOnly' => true
//            ],
      [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{lihat}',
                'header' => 'Kode Registrasi',
                'buttons' => [
                    'lihat' => function ($url, $model) {
                            return Html::a($model->kode_registrasi.'<br> <span class="label label-danger">Lihat</span>', ['lihat', 'id' => $model->id], [
                                        'data-toggle' => "modal",
                                        'data-target' => "#lihat-data",
                                        'data-title' => "Data Pemohon",
                                        'title' => Yii::t('yii', 'Lihat Data'),
                            ]);
                        },
            ],
          ],
            [
                'attribute' => 'pemohon.id',
                'label' => Yii::t('app', 'Pemohon'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "<strong>{$model->pemohon->profile->name}</strong><br>User Name : {$model->pemohon->username}";
                },
            ],
            [
                'attribute' => 'izin.id',
                'label' => Yii::t('app', 'Perihal'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    $FindParent = Simultan::findOne(['perizinan_parent_id'=>$model->id])->id;
                    $FindChild = Simultan::findOne(['perizinan_child_id'=>$model->id])->id;
                    
                     if($FindParent || $FindChild){
                         if($FindParent){
                            $idParent = $model->id;
                            $idChild = Simultan::findOne(['perizinan_parent_id'=>$model->id])->perizinan_child_id;
                        } else {
                            $idChild = $model->id;
                            $idParent = Simultan::findOne(['perizinan_child_id'=>$model->id])->perizinan_parent_id;
                        }
                        
                        $PerizinanParent = Perizinan::findOne($idParent);
                        $PerizinanChild = Perizinan::findOne($idChild);
                        
                         return "{$model->izin->nama} {$model->status->nama} <br>Bidang: {$model->izin->bidang->nama} <br>Simultan: <br> &nbsp; &nbsp; {$PerizinanParent->izin->type} : {$PerizinanParent->kode_registrasi} <br> &nbsp; &nbsp; {$PerizinanChild->izin->type} : {$PerizinanChild->kode_registrasi}";
                     } else {
                         return "{$model->izin->nama} {$model->status->nama} <br>Bidang: {$model->izin->bidang->nama}";
                     }
                },
            ],
            ['attribute' => 'tanggal_mohon'],
            [
                'attribute' => 'eta',
                'label' => Yii::t('app', 'ETA'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return Yii::$app->formatter->asDate($model->pengambilan_tanggal, 'php: l, d F Y') . '<br><strong>' . $model->pengambilan_sesi . '</strong>';
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
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{status}',
                'header' => 'Status',
                'buttons' => [
                     'status' => function ($url, $model) {
                            return Html::a($model->status.'<br> <span class="label label-danger">Lihat</span>', ['status', 'id' => $model->id], [
                                        'data-toggle' => "modal",
                                        'data-target' => "#modal-status",
                                        'data-title' => "Status Pemrosesan Izin",
                                        'title' => Yii::t('yii', 'Status Pemrosesan'),
                            ]);
                    },
            ],
          ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{proses} ',
                'header' => 'Action',
                'buttons' => [
                    'mulai' => function ($url, $model) {
                        
                    },
                    'proses' => function ($url, $model) {
                        $FindParent = Simultan::findOne(['perizinan_parent_id'=>$model->id])->id;
                        $FindChild = Simultan::findOne(['perizinan_child_id'=>$model->id])->id;

                        //jika simultan atau tidak
                        if($FindParent || $FindChild){
                            //Jika parent cari id child, Jika child cari id parent
                            if($FindParent){
                                $idParent = $model->id;
                                $idChild = Simultan::findOne(['perizinan_parent_id'=>$model->id])->perizinan_child_id;
                            } else {
                                $idChild = $model->id;
                                $idParent = Simultan::findOne(['perizinan_child_id'=>$model->id])->perizinan_parent_id;
                            }

                                    
                            $getPelaksanaParent = PerizinanProses::findOne(['perizinan_id'=>$idParent, 'active'=>1]);
                            $getPelaksanaChild = PerizinanProses::findOne(['perizinan_id'=>$idChild, 'active'=>1]);

                            if($getPelaksanaParent->urutan == 1){
                                echo "|| 1. P = On || C = Off";
                                $ParentOn = 1;
                                $ChildOn = 0;
                            } elseif($getPelaksanaParent->pelaksana_id == $getPelaksanaChild->pelaksana_id) {
                                $statP = Perizinan::findOne(['id'=>$idParent])->status;
                                if( $statP == 'Berkas Siap' || $statP == 'Berkas Tolak Siap' ){
                                    echo "|| 2. P = On || C = ON";
                                    $ParentOn = 1;
                                    $ChildOn = 1;
                                } else {
                                    echo "|| 3. P = On || C = Off";
                                    $ParentOn = 1;
                                    $ChildOn = 0;
                                }
                            } elseif($findPelaksanaDiChild = PerizinanProses::findOne(['perizinan_id'=>$idChild, 'pelaksana_id'=>$getPelaksanaParent->pelaksana_id])) {
                                echo "|| 4. P = Off || C = On";
                                $ParentOn = 0;
                                $ChildOn = 1;
                            } elseif($findPelaksanaDiParent = PerizinanProses::findOne(['perizinan_id'=>$idParent, 'pelaksana_id'=>$getPelaksanaChild->pelaksana_id])) {
                                if($findPelaksanaDiParent->urutan <= $getPelaksanaChild->urutan){
                                    echo "|| 5. P = Off || C = On";
                                    $ParentOn = 0;
                                    $ChildOn = 1;
                                } else {
                                    echo "|| 6. P = On || C = Off";
                                    $ParentOn = 1;
                                    $ChildOn = 0;
                                }
                            }
                            
                            $PerizinanParent = Perizinan::findOne($idParent);
                            $PerizinanChild = Perizinan::findOne($idChild);

                            if($FindParent){
                                //On and Off
                                if($ParentOn == 1){
                                    if ($model->status == 'Berkas Siap') {

                                        $url = \yii\helpers\Url::toRoute(['berkas-siap', 'id' => $model->id,'cid' => $model->current_id]);
                                        return Html::a('Berkas Siap', $url, [
                                                    'title' => Yii::t('yii', 'Berkas Siap'),
                                                    'class' => 'btn btn-primary',
                                                    'data-confirm' => 'Berkas sudah siap dan notifikasi akan dikirimkan ke pemohon. Klik Ok untuk melanjutkan.',
                                                    'data-method' => 'POST'
                                        ]);
                                    } else if ($model->status == 'Berkas Tolak Siap') {

                                        $url = \yii\helpers\Url::toRoute(['berkas-tolak', 'id' => $model->id,'cid' => $model->current_id]);
                                        return Html::a('Berkas Tolak Siap', $url, [
                                                    'title' => Yii::t('yii', 'Berkas Tolak Siap'),
                                                    'class' => 'btn btn-primary',
                                                    'data-confirm' => 'Berkas Tolak sudah siap dan notifikasi akan dikirimkan ke pemohon. Klik Ok untuk melanjutkan.',
                                                    'data-method' => 'POST'
                                        ]);
                                    } else if ($model->status == 'Batal') {

                                        $url = \yii\helpers\Url::toRoute(['batal', 'id' => $model->id,'cid' => $model->current_id]);
                                        return Html::a('Batal', $url, [
                                                    'title' => Yii::t('yii', 'Batal'),
                                                    'class' => 'btn btn-primary',

                                                    'data-method' => 'POST'
                                        ]);
                                    } else if ($model->mulai_process == NULL) {
                                    return Html::a('Mulai', ['mulai', 'id' => $model->current_id], [
                                                'title' => Yii::t('yii', 'mulai'),
                                                'class' => 'btn btn-primary',
                                                'data-confirm' => 'Mulai proses SOP. Klik Ok untuk melanjutkan.',
                                                'data-method' => 'POST'
                                    ]);
                                      }
                                    else {
                                        $url = \yii\helpers\Url::toRoute([$model->current_action, 'id' => $model->current_id]);
                                        return Html::a($model->current_process, $url, [
                                                    'title' => Yii::t('yii', $model->current_process),
                                                    'class' => 'btn btn-primary',
                                        ]);
                                    }
                                } else {
                                    return Html::label("Menunggu Proses <br>".$PerizinanChild->izin->type." : ".$PerizinanChild->kode_registrasi);
                                }

                            } elseif($FindChild) {
                                //on and Off
                                if($ChildOn == 1){
                                    if ($model->status == 'Berkas Siap') {

                                        $url = \yii\helpers\Url::toRoute(['berkas-siap', 'id' => $model->id,'cid' => $model->current_id]);
                                        return Html::a('Berkas Siap', $url, [
                                                    'title' => Yii::t('yii', 'Berkas Siap'),
                                                    'class' => 'btn btn-primary',
                                                    'data-confirm' => 'Berkas sudah siap dan notifikasi akan dikirimkan ke pemohon. Klik Ok untuk melanjutkan.',
                                                    'data-method' => 'POST'
                                        ]);
                                    } else if ($model->status == 'Berkas Tolak Siap') {

                                        $url = \yii\helpers\Url::toRoute(['berkas-tolak', 'id' => $model->id,'cid' => $model->current_id]);
                                        return Html::a('Berkas Tolak Siap', $url, [
                                                    'title' => Yii::t('yii', 'Berkas Tolak Siap'),
                                                    'class' => 'btn btn-primary',
                                                    'data-confirm' => 'Berkas Tolak sudah siap dan notifikasi akan dikirimkan ke pemohon. Klik Ok untuk melanjutkan.',
                                                    'data-method' => 'POST'
                                        ]);
                                    } else if ($model->status == 'Batal') {

                                        $url = \yii\helpers\Url::toRoute(['batal', 'id' => $model->id,'cid' => $model->current_id]);
                                        return Html::a('Batal', $url, [
                                                    'title' => Yii::t('yii', 'Batal'),
                                                    'class' => 'btn btn-primary',

                                                    'data-method' => 'POST'
                                        ]);
                                    } else if ($model->mulai_process == NULL) {
                                    return Html::a('Mulai', ['mulai', 'id' => $model->current_id], [
                                                'title' => Yii::t('yii', 'mulai'),
                                                'class' => 'btn btn-primary',
                                                'data-confirm' => 'Mulai proses SOP. Klik Ok untuk melanjutkan.',
                                                'data-method' => 'POST'
                                    ]);
                                      }
                                    else {
                                        $url = \yii\helpers\Url::toRoute([$model->current_action, 'id' => $model->current_id]);
                                        return Html::a($model->current_process, $url, [
                                                    'title' => Yii::t('yii', $model->current_process),
                                                    'class' => 'btn btn-primary',
                                        ]);
                                    }
                                } else {
                                    return Html::label("Menunggu Proses <br>".$PerizinanParent->izin->type." : ".$PerizinanParent->kode_registrasi);
                                }
                            }


                        } else {
                            if ($model->status == 'Berkas Siap') {

                                $url = \yii\helpers\Url::toRoute(['berkas-siap', 'id' => $model->id,'cid' => $model->current_id]);
                                return Html::a('Berkas Siap', $url, [
                                            'title' => Yii::t('yii', 'Berkas Siap'),
                                            'class' => 'btn btn-primary',
                                            'data-confirm' => 'Berkas sudah siap dan notifikasi akan dikirimkan ke pemohon. Klik Ok untuk melanjutkan.',
                                            'data-method' => 'POST'
                                ]);
                            } else if ($model->status == 'Berkas Tolak Siap') {

                                $url = \yii\helpers\Url::toRoute(['berkas-tolak', 'id' => $model->id,'cid' => $model->current_id]);
                                return Html::a('Berkas Tolak Siap', $url, [
                                            'title' => Yii::t('yii', 'Berkas Tolak Siap'),
                                            'class' => 'btn btn-primary',
                                            'data-confirm' => 'Berkas Tolak sudah siap dan notifikasi akan dikirimkan ke pemohon. Klik Ok untuk melanjutkan.',
                                            'data-method' => 'POST'
                                ]);
                            } else if ($model->status == 'Batal') {

                                $url = \yii\helpers\Url::toRoute(['batal', 'id' => $model->id,'cid' => $model->current_id]);
                                return Html::a('Batal', $url, [
                                            'title' => Yii::t('yii', 'Batal'),
                                            'class' => 'btn btn-primary',

                                            'data-method' => 'POST'
                                ]);
                            } else if ($model->mulai_process == NULL) {
                            return Html::a('Mulai', ['mulai', 'id' => $model->current_id], [
                                        'title' => Yii::t('yii', 'mulai'),
                                        'class' => 'btn btn-primary',
                                        'data-confirm' => 'Mulai proses SOP. Klik Ok untuk melanjutkan.',
                                        'data-method' => 'POST'
                            ]);
                              }
                            else {
                                $url = \yii\helpers\Url::toRoute([$model->current_action, 'id' => $model->current_id]);
                                return Html::a($model->current_process, $url, [
                                            'title' => Yii::t('yii', $model->current_process),
                                            'class' => 'btn btn-primary',
                                ]);
                            }
                        }  
                    },
                           
                        ]
                    ],
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
