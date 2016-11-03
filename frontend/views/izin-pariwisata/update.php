<?php

use yii\helpers\Html;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisata */

$this->title = Yii::t('app', 'Permohonan Izin Pariwisata');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br>
		<div style="text-align: center">
			<?=
			Slider::widget([
				'name' => 'current_no',
				'value' => 2,
				'sliderColor' => Slider::TYPE_GREY,
				'handleColor' => Slider::TYPE_DANGER,
				'pluginOptions' => [
		//            'min' => 1,
		//            'max' => $model->jumlah_tahap,
					'ticks' => [1,2,3,4,5,6,7],
					'ticks_labels' => ['Cari Izin','Input Formulir','Unggah Berkas','Preview SK','Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
					'ticks_snap_bounds' => 50,
					'tooltip' => 'always',
					'formatter'=>new yii\web\JsExpression("function(val) {
					   return 'Anda Disini';
					}")
				],
				'options' => ['disabled' => true, 'style' => 'width: 80%']
			]);
			?>
		</div>
		<br>
    </div>
    <div class="col-sm-1"></div>
</div>
<!-- s: Buat Load data sebelumnya -->
<input type='hidden' name='nik_penanggung_jawab' value='<?php echo $model->nik_penanggung_jawab; ?>' id='nik_penanggung_jawab'>
<input type='hidden' name='nama_penanggung_jawab' value='<?php echo $model->nama_penanggung_jawab; ?>' id='nama_penanggung_jawab'>
<input type='hidden' name='tempat_lahir_penanggung_jawab' value='<?php echo $model->tempat_lahir_penanggung_jawab; ?>' id='tempat_lahir_penanggung_jawab'>
<input type='hidden' name='tanggal_lahir_penanggung_jawab' value='<?php echo $model->tanggal_lahir_penanggung_jawab; ?>' id='tanggal_lahir_penanggung_jawab'>
<input type='hidden' name='jenkel_penanggung_jawab' value='<?php echo $model->jenkel_penanggung_jawab; ?>' id='jenkel_penanggung_jawab'>
<input type='hidden' name='alamat_penanggung_jawab' value='<?php echo $model->alamat_penanggung_jawab; ?>' id='alamat_penanggung_jawab'>
<input type='hidden' name='rt_penanggung_jawab' value='<?php echo $model->rt_penanggung_jawab; ?>' id='rt_penanggung_jawab'>
<input type='hidden' name='rw_penanggung_jawab' value='<?php echo $model->rw_penanggung_jawab; ?>' id='rw_penanggung_jawab'>
<input type='hidden' name='kodepos_penanggung_jawab' value='<?php echo $model->kodepos_penanggung_jawab; ?>' id='kodepos_penanggung_jawab'>
<input type='hidden' name='telepon_penanggung_jawab' value='<?php echo $model->telepon_penanggung_jawab; ?>' id='telepon_penanggung_jawab'>
<input type='hidden' name='kewarganegaraan_id_penanggung_jawab' value='<?php echo $model->kewarganegaraan_id_penanggung_jawab; ?>' id='kewarganegaraan_id_penanggung_jawab'>
<input type='hidden' name='kitas_penanggung_jawab' value='<?php echo $model->kitas_penanggung_jawab; ?>' id='kitas_penanggung_jawab'>
<input type='hidden' name='passport_penanggung_jawab' value='<?php echo $model->passport_penanggung_jawab; ?>' id='passport_penanggung_jawab'>
<!-- e: Buat Load data sebelumnya -->

<?= $this->render('_form', [
	'model' => $model,
]) ?>


