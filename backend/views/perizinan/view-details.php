<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\slider\Slider;
use yii\bootstrap\Progress;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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

    if($status == 'statistik'){
        
        $izins = \backend\models\Perizinan::getDataIzinAdmin($lokasi);

                        foreach ($izins as $value) {
                            $text = str_replace(' ', '', $value['nama']);
                            $pecah = explode('-', $text);

                       /*     if ($pecah[1] == "KECAMATAN") {
                               $kec_nama[] = $value['nama'];
                                $kec_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $kec_id[] = $value['id'];
                            } elseif ($pecah[1] == "KELURAHAN") {
                                $kel_nama[] = $value['nama'];
                                $kel_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $kel_id[] = $value['id'];
                            } elseif (strpos($text, 'KOTA') !== false) {
                                $kab_nama[] = $value['nama'];
                                $kab_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $kab_id[] = $value['id'];
                            } else {
                                $prov_nama[] = $value['nama'];
                                $prov_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                                $prov_id[] = $value['id'];
                            }*/

//			echo Html::a(Yii::t('app', 'Total Permohonan <span class="badge">'.$value['total_permohonan'].'</span>'), ['statistik', 'lokasi' => $lokasi], ['class' => 'btn btn-info']);	
//			echo '&nbsp;';
            echo Html::a(Yii::t('app', 'Baru <span class="badge">'.$value['baru'].'</span>'), ['statistik-status', 'lokasi' => $lokasi,'status'=>'daftar'], ['class' => 'btn btn-info']); 
			echo '&nbsp;';
			echo Html::a(Yii::t('app', 'Proses <span class="badge">'.$value['proses'].'</span>'), ['statistik-status', 'lokasi' => $lokasi,'status'=>'proses'], ['class' => 'btn btn-info']);  
            echo '&nbsp;';
			
			echo Html::a(Yii::t('app', 'Revisi <span class="badge">'.$value['revisi'].'</span>'), ['statistik-status', 'lokasi' => $lokasi,'status'=>'revisi'], ['class' => 'btn btn-info']);  
			echo '&nbsp;';
			echo Html::a(Yii::t('app', 'Selesai <span class="badge">'.$value['selesai'].'</span>'), ['statistik-status', 'lokasi' => $lokasi,'status'=>'selesai'], ['class' => 'btn btn-info']);
            echo '&nbsp;';
			echo Html::a(Yii::t('app', 'Selesai Lanjut <span class="badge">'.$value['lanjut_selesai'].'</span>'), ['statistik-status', 'lokasi' => $lokasi,'status'=>'lanjut_selesai'], ['class' => 'btn btn-info']); 
			echo '&nbsp;';
			echo Html::a(Yii::t('app', 'Selesai Tolak <span class="badge">'.$value['tolak_selesai'].'</span>'), ['statistik-status', 'lokasi' => $lokasi,'status'=>'tolak_selesai'], ['class' => 'btn btn-info']); 
			echo '&nbsp;';
			echo Html::a(Yii::t('app', 'Batal <span class="badge">'.$value['batal'].'</span>'), ['statistik-status', 'lokasi' => $lokasi,'status'=>'batal'], ['class' => 'btn btn-info']);	
			
			echo '<br><br>';
                            }
         
            $this->title = Yii::t('app', $value['nama']);
            $this->params['breadcrumbs'][] = 'Perizinan';
            
            echo $this->render('_search', ['model' => $searchModel, 'lokasi'=>$lokasi, 'varLink'=>$varKey, 'status'=>$status]);
        
//            echo '</br>';
//            echo 'Baru :'.$value['baru'];
            
    } elseif($status == 'Red' || $status == 'Yellow' || $status == 'Green'){
        echo $this->render('_search', ['model' => $searchModel, 'varLink'=>$varKey, 'status'=>$status]);
    } elseif($status == 'view-history'){
        echo $this->render('_searchHistory', ['model' => $searchModel, 'status'=>$status, 'pemohonID'=>$pemohonID]);
    } else {
        echo $this->render('_searchByVar', ['model' => $searchModel, 'varLink'=>$varKey]);
    } 
    
    
?>
<br>

<?php
if($status != 'Red' && $status != 'statistik'){
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
                    return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
                },
            ],
            [
                'attribute' => 'no_izin',
                'label' => Yii::t('app', 'No. SK'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    if($model->no_izin != NULL)
                    {return $model->no_izin;}
                    else{ return " "; }
                },
            ],
            [
                'attribute' => 'izin.id',
                'label' => Yii::t('app', 'Perihal'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    $tgl_mohon=Yii::$app->formatter->asDate($model->tanggal_mohon, "php:d-M-Y");
                    $tgl_expired=Yii::$app->formatter->asDate($model->tanggal_expired, "php:d-M-Y");
                    if($model->tanggal_expired != Null )
                    {
                         return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: "
                    . "{$tgl_mohon}</em><br><em>Tanggal Masa Berlaku: {$tgl_expired}</em>";
                        
                    }
                    else{
                        return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: "
                    . "{$tgl_mohon}</em><br>";
                    }
                },
            ],
            [
                'attribute' => 'tanggal_mohon',
                'format'=>['DateTime','php:d-m-Y H:i:s']
            ],
            [
                'attribute' => 'pengambilan_tanggal',
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
                ];
}
elseif($status == 'statistik'){
       $gridColumn = [
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
                    return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
                },
            ],
            [
                'attribute' => 'no_izin',
                'label' => Yii::t('app', 'No. SK'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    if($model->no_izin != NULL)
                    {return $model->no_izin;}
                    else{ return " "; }
                },
            ],
            [
                'attribute' => 'izin.id',
                'label' => Yii::t('app', 'Perihal'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    $tgl_mohon=Yii::$app->formatter->asDate($model->tanggal_mohon, "php:d-M-Y");
                    $tgl_expired=Yii::$app->formatter->asDate($model->tanggal_expired, "php:d-M-Y");
                    if($model->tanggal_expired != Null )
                    {
                         return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: "
                    . "{$tgl_mohon}</em><br><em>Tanggal Masa Berlaku: {$tgl_expired}</em>";
                        
                    }
                    else{
                        return "{$model->izin->nama}<br>Bidang: {$model->izin->bidang->nama}<br><em>Tanggal: "
                    . "{$tgl_mohon}</em><br>";
                    }
                },
            ],
            [
                'attribute' => 'tanggal_mohon',
                'format'=>['DateTime','php:d-m-Y H:i:s']
            ],
            [
			    'attribute' => 'pengambilan_tanggal',
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
                ];

               }
else {
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
                    return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
                },
            ],
            [
                'attribute' => 'izin.id',
                'label' => Yii::t('app', 'Perihal'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "{$model->izin->nama} <br>Bidang: {$model->izin->bidang->nama}";
                },
            ],
            [
                'attribute' => 'tanggal_mohon',
                'format'=>['DateTime','php:d-m-Y H:i:s']
            ],
            [
                'attribute' => 'pengambilan_tanggal',
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
                                'label' => Yii::t('app', 'Keterangan'),
                                'format' => 'html',
                                'value' => function ($model) {
                                        if($model->status == 'Verifikasi' || $model->status == 'Verifikasi Tolak') return 'Pemohon Belum Datang';
                                        else return '';
                                },
                          ],
                ];
}

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
