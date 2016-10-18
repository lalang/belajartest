<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\SubJenisUsaha */

$this->title = Yii::t('app', 'View {modelClass}', [
    'modelClass' => 'Sub Jenis Usaha',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Jenis Usaha'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/berita/index'], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
		<div class="col-md-12">
		<?php 
			$gridColumn = [
				['attribute' => 'id', 'hidden' => true],
				[
					'attribute' => 'jenisUsaha.keterangan',
					'label' => Yii::t('app', 'Jenis Usaha'),
				],
				'keterangan',
				'aktif',
			];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		</div>
    </div>
    
    <div class="row">
<?php
if($providerIzin->totalCount){
    $gridColumnIzin = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            'jenis',
            [
                'attribute' => 'bidang.id',
                'label' => Yii::t('app', 'Bidang')
        ],
            [
                'attribute' => 'rumpun.id',
                'label' => Yii::t('app', 'Rumpun')
        ],
            'tipe',
            [
                'attribute' => 'status.id',
                'label' => Yii::t('app', 'Status')
        ],
            'nama',
            'alias',
            'kode',
            'fno_surat',
            'aktif',
            [
                'attribute' => 'wewenang.id',
                'label' => Yii::t('app', 'Wewenang')
        ],
            'cek_lapangan',
            'cek_sprtrw',
            'cek_obyek',
            'durasi',
            'durasi_satuan',
            'cek_perusahaan',
            'masa_berlaku',
            'masa_berlaku_satuan',
            'latar_belakang:ntext',
            'persyaratan:ntext',
            'mekanisme:ntext',
            'pengaduan:ntext',
            'dasar_hukum:ntext',
            'definisi:ntext',
            'biaya',
            'brosur:ntext',
            [
                'attribute' => 'arsip.id',
                'label' => Yii::t('app', 'Arsip')
        ],
            'type',
            'preview_data:ntext',
            'template_sk:ntext',
            'template_penolakan:ntext',
            'template_preview:ntext',
            'template_valid:ntext',
            'template_batal:ntext',
            'template_ba_lapangan:ntext',
            'template_ba_teknis:ntext',
            'action',
            'min',
            'max',
            'zonasi',
            'mulai_perpanjangan',
            'mulai_perpanjangan_satuan',
            [
                'attribute' => 'bidangIzinUsaha.id',
                'label' => Yii::t('app', 'Bidang Izin')
        ],
            [
                'attribute' => 'jenisUsaha.id',
                'label' => Yii::t('app', 'Jenis Usaha')
        ],
            [
                'attribute' => 'subJenisUsaha.id',
                'label' => Yii::t('app', 'Sub Jenis')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzin,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Izin').' '. $this->title),
        ],
        'columns' => $gridColumnIzin
    ]);
}
?>
    </div>
</div>