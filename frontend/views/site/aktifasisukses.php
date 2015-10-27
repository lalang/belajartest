<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
?>
<div class="wrapper wrapper-content animated fadeInRight">
 <div class='main-title-page'><h3><strong><?= Yii::t('frontend','Aktifasi Sukses') ?></strong></h3></div>
 <div class="ibox float-e-margins">
 <div class="ibox-title">
 
 <div class="ibox-tools">
 <a class="collapse-link">
 <i class="fa fa-chevron-up"></i>
 </a>

 </div>
 </div>
 <div class="ibox-content">
 
 <h2 class="font-bold"><?= Yii::t('frontend','Selamat pendaftaran Anda telah diaktifkan') ?></h2>
 <?= Yii::t('frontend','Silakan cek email Anda untuk mendapatkan Username dan Password. Untuk selanjutnya Anda bisa melakukan login ke Private Area untuk melakukan pengajuan izin. Untuk login pilih menu login dan masukan <b>Nik dan Password untuk Perorangan</b> Atau <b>NPWP dan Password untuk Perusahaan</b>') ?>.
 
 </div>
 </div>
</div>