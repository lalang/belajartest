<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Negara */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Negara',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Negara'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">
    <div class="row">
        <div class="col-sm-9">
            <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/negara/index'], ['class' => 'btn btn-warning']) ?>
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
				'kode_negara',
				'nama_negara',
			];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>		
		</div>
    </div>
    <!--
    <div class="row">
<?php
    $gridColumnIzinTdpPimpinan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        [
            'attribute' => 'jabatan.id',
            'label' => Yii::t('app', 'Jabatan'),
        ],
        [
            'attribute' => 'kewarganegaraan.id',
            'label' => Yii::t('app', 'Negara'),
        ],
        [
            'attribute' => 'jabatanLain.id',
            'label' => Yii::t('app', 'Jabatan'),
        ],
        'nama_lengkap',
        'tmplahir',
        'tgllahir',
        'alamat_lengkap',
        'kodepos',
        'telepon',
        'mulai_jabat',
        'jml_lbr_saham',
        'jml_rp_modal',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpPimpinan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Pimpinan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpPimpinan
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinTdpSaham = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => Yii::t('app', 'Izin Tdp'),
        ],
        'nama_lengkap',
        'alamat',
        'kodepos',
        'no_telp',
        [
            'attribute' => 'kewarganegaraan0.id',
            'label' => Yii::t('app', 'Negara'),
        ],
        'npwp',
        'jumlah_saham',
        'jumlah_modal',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinTdpSaham,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Tdp Saham').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinTdpSaham
    ]);
?>
    </div>-->
</div>