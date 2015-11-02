<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Izin */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">
	<div class="row">
		<div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/izin/index'], ['class' => 'btn btn-warning']) ?>
		</div>
		<div class="col-sm-3" style="margin-top: 15px">
		<p>
			<?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
					'method' => 'post',
				],
			]) ?>
		</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				//'id',
				'jenis',
				['attribute' => 'bidang.nama', 'label' => 'Nama Bidang'],
                            ['attribute' => 'rumpun.nama', 'label' => 'Nama Rumpun'],
                            'tipe',
                            ['attribute' => 'status.nama', 'label' => 'Nama Status'],
				'nama',
				'kode',
				'fno_surat',
				'aktif',
				['attribute' => 'wewenang.nama', 'label' => 'Nama Wewenang'],
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
				['attribute' => 'arsip.nama', 'label' => 'Nama Arsip'],
				'type',
				'template_sk:ntext',
				'template_penolakan:ntext',
				'template_valid:ntext',
				'template_ba_lapangan:ntext',
				'template_ba_teknis:ntext',
				'action',
			],
		]) ?>
		</div>
	</div>
</div>
