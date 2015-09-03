<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Izin');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> <?= Html::encode($this->title) ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('izin/index') ?>"><?= Html::encode($this->title) ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Data</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">
	
	<div class="izin-index">
		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

		<p>
			<?= Html::a(Yii::t('app', 'Create Izin'), ['create'], ['class' => 'btn btn-success']) ?>
			<?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
		</p>
		<div class="search-form" style="display:none">
			<?=  $this->render('_search', ['model' => $searchModel]); ?>
		</div>

		<?php 
		$gridColumn = [
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
			[
				'class' => 'yii\grid\ActionColumn',
			],
		]; 
		?>
		<?= GridView::widget([
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
				]) ,
			],
		]); ?>

	</div>

	</div>
</section>
