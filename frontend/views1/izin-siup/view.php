<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use kartik\grid\GridView;
use yii\helpers\Url;
use app\assets\admin\page\TimelineAsset;

TimelineAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Siup'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">
<div class="panel">
	 <div class="header-content">
        <h2><i class="fa fa-cubes"></i><?= Yii::t('app', 'Izin Siup').' '. Html::encode($this->title) ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/index') ?>">Perizinan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">SOP</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    
       <div class="pull-right" style="right:10%;">
            <?=             
             Html::a('<i class="fa fa-file-pdf-o"></i> ' . Yii::t('app', ''), 
                ['pdf', 'id' => $model['id']], 
                [
                    'class' => 'btn btn-circle btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Export to PDF')
                ]
            )?>                        
            <?= Html::a(Yii::t('app', '<i class="fa fa-pencil"></i>'), ['update', 'id' => $model->id], [
				'class' => 'btn btn-circle btn-danger',
					
				]) 
			?>
				
            <?= Html::a(Yii::t('app', '<i class="fa fa-trash-o"></i>'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-circle btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        
		</div>

    <div class="col-md-12">
	<div class="panel panel-tab rounded shadow">
	<!-- Start tabs heading -->
		<div class="panel-heading no-padding">
			<ul class="nav nav-tabs">
				
				<li><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i><span>Identitas Pemilik/Pengurus</span></a></li>
				
				<li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Perusahaan</span></a></li>
				<li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-sitemap"></i><span>Legalitas Perusahaan</span></a></li>
				<li><a href="#tab1-4" data-toggle="tab"><i class="fa fa-money"></i><span>Modal dan Saham</span></a></li>
				<li><a href="#tab1-5" data-toggle="tab"><i class="fa fa-cogs"></i><span>Kegiatan Usaha</span></a></li>
				<li><a href="#tab1-6" data-toggle="tab"><i class="fa fa-bar-chart"></i><span>Neraca Perusahaan</span></a></li>

			</ul>
		</div><!-- /.panel-heading -->
	<!--/ End tabs heading -->

	<!-- Start tabs content -->
	<div class="panel-body">
		<div class="tab-content">
		
		<div class="tab-pane fade in active" id="tab1-1">
		<?php 
		$gridColumn = [
			['attribute' => 'id', 'hidden' => true],
			[
				'attribute' => 'perizinan.id',
				'label' => Yii::t('app', 'Perizinan'),
			],
			[
				'attribute' => 'izin.id',
				'label' => Yii::t('app', 'Izin'),
			],
			[
				'attribute' => 'user.id',
				'label' => Yii::t('app', 'User'),
			],
			'ktp',
			'nama',
			'alamat:ntext',
			'tempat_lahir',
			'tanggal_lahir',
			'telepon',
			'fax',
			'passport',
			'kewarganegaraan',
			'jabatan_perusahaan',
			
			
		];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		</div>
		
		<div class="tab-pane fade" id="tab1-2">
		<?php 
		$gridColumn = [
			
			'npwp_perusahaan',
			'nama_perusahaan',
			'alamat_perusahaan:ntext',
			'telpon_perusahaan',
			'fax_perusahaan',
			'kelurahan_id',
			'status_perusahaan',
			'kode_pos',
			'bentuk_perusahaan',
			'akta_pendirian_no',
			'akta_pendirian_tanggal',
			'akta_pengesahan_no',
			'akta_pengesahan_tanggal',
			'no_daftar',
			'tanggal_pengesahan',
			
		];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		</div>
		
		<div class="tab-pane fade" id="tab1-3">
		<?php 
		$gridColumn = [
			
			'modal',
			'nilai_saham_pma',
			'saham_nasional',
			'saham_asing',
			
		];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		<?php
				$gridColumnIzinSiupAkta = [
				['class' => 'yii\grid\SerialColumn'],
				['attribute' => 'id', 'hidden' => true],
				[
				'attribute' => 'izinSiup.id',
				'label' => Yii::t('app', 'Izin Siup'),
				],
				'nomor_akta',
				'tanggal_akta',
				'nomor_pengesahan',
				'tanggal_pengesahan',
				];
				echo Gridview::widget([
				'dataProvider' => $providerIzinSiupAkta,
				'pjax' => true,
				'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
				'panel' => [
				'type' => GridView::TYPE_PRIMARY,
				'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Akta').' '. $this->title) . ' </h3>',
				],
				'columns' => $gridColumnIzinSiupAkta
				]);
			?>
		</div>
		
		<div class="tab-pane fade" id="tab1-4">
		<?php 
		$gridColumn = [
			
			'barang_jasa_dagangan',
			'tanggal_neraca',
			'aktiva_lancar_kas',
			'aktiva_lancar_bank',
			'aktiva_lancar_piutang',
			'aktiva_lancar_barang',
			'aktiva_lancar_pekerjaan',
			'aktiva_tetap_peralatan',
			'aktiva_tetap_investasi',
			'aktiva_lainnya',
			'pasiva_hutang_dagang',
			'pasiva_hutang_pajak',
			'pasiva_hutang_lainnya',
			'hutang_jangka_panjang',
			'kekayaan_bersih',
		];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		</div>
		
		<div class="tab-pane fade" id="tab1-5">
		<?php 
		$gridColumn = [
			'barang_jasa_dagangan',
		];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		<?php
				$gridColumnIzinSiupKbli = [
				['class' => 'yii\grid\SerialColumn'],
				['attribute' => 'id', 'hidden' => true],
				[
				'attribute' => 'izinSiup.id',
				'label' => Yii::t('app', 'Izin Siup'),
				],
				[
				'attribute' => 'kbli.id',
				'label' => Yii::t('app', 'Kbli'),
				],
				];
				echo Gridview::widget([
				'dataProvider' => $providerIzinSiupKbli,
				'pjax' => true,
				'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
				'panel' => [
				'type' => GridView::TYPE_PRIMARY,
				'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Kbli').' '. $this->title) . ' </h3>',
				],
				'columns' => $gridColumnIzinSiupKbli
				]);
			?>
		</div>
		
		<div class="tab-pane fade" id="tab1-6">
		<?php 
		$gridColumn = [
			'tanggal_neraca',
			'aktiva_lancar_kas',
			'aktiva_lancar_bank',
			'aktiva_lancar_piutang',
			'aktiva_lancar_barang',
			'aktiva_lancar_pekerjaan',
			'aktiva_tetap_peralatan',
			'aktiva_tetap_investasi',
			'aktiva_lainnya',
			'pasiva_hutang_dagang',
			'pasiva_hutang_pajak',
			'pasiva_hutang_lainnya',
			'hutang_jangka_panjang',
			'kekayaan_bersih',
		];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>
		</div>
		</div>
	</div><!-- /.panel-body -->
	<!--/ End tabs content -->
	</div>

	</div>
	
	<div class="col-md-6">
	
	</div>
	
<!--<div class="col-md-12">
	
	<div class="panel panel-tab rounded shadow">
	
		<div class="panel-heading no-padding">
			<ul class="nav nav-tabs">
				<li class="active">
				<a href="#tab1-1" data-toggle="tab">
				<i class="fa fa-file-text"></i>
				<span>Izin Siup Akta</span>
				</a>
				</li>
				
				<li>
				<a href="#tab1-2" data-toggle="tab">
				<i class="fa fa-file-text"></i>
				<span>Izin Siup KBLI</span>
				</a>
				</li>

			</ul>
		</div>
		
	<div class="panel-body">
		<div class="tab-content">
		<div class="tab-pane fade in active" id="tab1-1">
			<?php
	//			$gridColumnIzinSiupAkta = [
	//			['class' => 'yii\grid\SerialColumn'],
	//			['attribute' => 'id', 'hidden' => true],
	//			[
	//			'attribute' => 'izinSiup.id',
	//			'label' => Yii::t('app', 'Izin Siup'),
	//			],
	//			'nomor_akta',
	//			'tanggal_akta',
	//			'nomor_pengesahan',
	//			'tanggal_pengesahan',
	//			];
	//			echo Gridview::widget([
	//			'dataProvider' => $providerIzinSiupAkta,
	//			'pjax' => true,
	//			'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
	//			'panel' => [
	//			'type' => GridView::TYPE_PRIMARY,
	//			'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Akta').' '. $this->title) . ' </h3>',
		//		],
	//			'columns' => $gridColumnIzinSiupAkta
	//			]);
			?>
		</div>
		<div class="tab-pane fade" id="tab1-2">-->
			<?php
	//			$gridColumnIzinSiupKbli = [
	//			['class' => 'yii\grid\SerialColumn'],
	//			['attribute' => 'id', 'hidden' => true],
	//			[
	//			'attribute' => 'izinSiup.id',
	//			'label' => Yii::t('app', 'Izin Siup'),
	//			],
	//			[
	//			'attribute' => 'kbli.id',
	//			'label' => Yii::t('app', 'Kbli'),
	//			],
	//			];
	//			echo Gridview::widget([
	//			'dataProvider' => $providerIzinSiupKbli,
	//			'pjax' => true,
	//			'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
	//			'panel' => [
	//			'type' => GridView::TYPE_PRIMARY,
	//			'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup Kbli').' '. $this->title) . ' </h3>',
	//			],
	//			'columns' => $gridColumnIzinSiupKbli
	//			]);
			?>
		<!--</div>

		</div>
	</div>
	</div>
</div>
</div>-->
</section>

                    