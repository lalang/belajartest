
<?php

use backend\models\Perizinan;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "SELAMAT DATANG | PTSP DKI";
?>
	
<div class="row">
    <div class="col-md-12">
        <div class="box">

        </div>
    </div>
</div>


<div class="alert alert-info alert-dismissible">
	<p><h4>Selamat datang Petugas <b><?= Yii::$app->user->identity->pelaksana->nama; ?></b>,</h4></p>

	<?php if(Yii::$app->user->identity->pelaksana_id=="7"){ ?>

	<p>Untuk mengetahui permohonan baru yang masuk dapat memilih menu 
	<a href="<?= Url::to(['/perizinan/index','status' => 'registrasi']) ?>">permohonan baru</a> disamping kiri.</p>

	<p>Untuk mem-verifikasi berkas dapat memilih menu 
	<a href="<?= Url::to(['/perizinan/index','status' => 'verifikasi']) ?>">verifikasi berkas</a> disamping kiri.</p>

	<p>Untuk mem-verifikasi berkas tolak memilih menu <a href="<?= Url::to(['/perizinan/index','status' => 'verifikasi-tolak']) ?>">verifikasi berkas tolak</a> disamping kiri.</p>
	
	<?php }elseif(Yii::$app->user->identity->pelaksana_id=="5"){ ?>
	
	<p>Untuk mengetahui permohonan baru yang masuk dapat memilih menu 
	<a href="<?= Url::to(['/perizinan/index']) ?>">permohonan baru</a> disamping kiri.</p>
	
	<?php }?>
</div>


