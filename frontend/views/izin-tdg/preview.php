<?php

use yii\helpers\Html;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */

$this->title = Yii::t('app', 'Preview SK TDG');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Siup'), 'url' => ['index']];
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
        'value' => 3,
        'sliderColor' => Slider::TYPE_GREY,
        'handleColor' => Slider::TYPE_DANGER,
        'pluginOptions' => [
//            'min' => 1,
//            'max' => $model->jumlah_tahap,
            'ticks' => [1,2,3,4,5,6],
            'ticks_labels' => ['Cari Izin','Input Formulir','Preview SK','Jadwal Pengambilan', 'Pemrosesan Izin', 'Pengambilan Izin'],
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

<div class="row">
	<div class="col-md-12">
		<div class="box">
			
				<div class="box-header with-border">
					<h3 class="box-title">Perview Surat Keputusan</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
		</div>
	</div>
</div>
<div class="alert alert-warning alert-dismissible">
	<h4>	<i class="icon fa fa-bell"></i> Mohon diperhatikan!</h4>
	<p>Pastikan semua data Anda sudah benar, silakan ubah jika ada yang tidak sesuai</p>
	<p>Setelah data permohonan Anda mulai didaftarkan, maka data sudah tidak bisa diubah kembali.</p>
</div>
<div style='border-radius: 5px; border-color:#c0c0c0; padding:10px;'>				
	<?= $model->preview_data; ?>
</div>
<div class="box text-center">
<br><?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ubah Formulir Permohonan') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Lanjut ke proses selanjutnya') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
										
									</div>