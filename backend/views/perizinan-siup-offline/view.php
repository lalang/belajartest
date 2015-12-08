<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSiupOffline */

$this->title = 'View No Izin: '.$model->no_izin;
$this->params['breadcrumbs'][] = ['label' => 'Perizinan Siup Offline', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
            <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/perizinan-siup-offline/index'], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update <i class="fa fa-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete <i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
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
				'no_izin',
				'pemilik_nama',
				'pemilik_tempat_lahir',
				'pemilik_tanggal_lahir',
				'pemilik_alamat_rumah',
				'pemilik_propinsi',
				'pemilik_kabupaten',
				'pemilik_kecamatan',
				'pemilik_kelurahan',
				'pemilik_no_telpon',
				'pemilik_no_ktp',
				'pemilik_kewarganegaraan',
				'perusahaan_nama',
				'perusahaan_alamat',
				'perusahaan_propinsi',
				'perusahaan_kabupaten',
				'perusahaan_kecamatan',
				'perusahaan_kelurahan',
				'perusahaan_kodepos',
				'perusahaan_no_telpon',
				'perusahaan_no_fax',
				'perusahaan_email:email',
				'created_date',
				'updated_date',
			];
			echo DetailView::widget([
				'model' => $model,
				'attributes' => $gridColumn
			]); 
		?>		
		</div>
    </div>
</div>