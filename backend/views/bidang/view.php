<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bidang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bidang'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

  <div class="box"  style="padding:10px 4px;">
    <div class="col-md-12">
      
        <div class="col-md-9">
            <h2><?= Yii::t('app', 'Bidang').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-md-3" style="margin-top: 15px;">
            <?=             
             Html::a('<i class="fa fa-file-pdf-o"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model['id']], 
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>                        
            <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
        
    </div>
   
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
   
<?php
    $gridColumnIzin = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'jenis',
        [
            'attribute' => 'bidang.id',
            'label' => Yii::t('app', 'Bidang'),
        ],
        'nama',
        'kode',
        'fno_surat',
        'aktif',
        'wewenang_id',
        'cek_lapangan',
        'cek_sprtrw',
        'cek_obyek',
        'cek_perusahaan',
        'durasi',
        'durasi_satuan',
        'latar_belakang:ntext',
        'persyaratan:ntext',
        'mekanisme:ntext',
        'pengaduan:ntext',
        'dasar_hukum:ntext',
        'definisi:ntext',
        'biaya',
        'brosur:ntext',
        'arsip_id',
        'type',
        'action',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzin,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fa fa-book"></i>  ' . Html::encode(Yii::t('app', 'Izin').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzin
    ]);
?>   
    </div>