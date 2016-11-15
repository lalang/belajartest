<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
?>
<div class="wrapper wrapper-content animated fadeInRight">
 <div class='main-title-page'><h3><strong><?= Yii::t('frontend','Regitrasi Sukses') ?></strong></h3></div>
 <div class="ibox float-e-margins">
 <div class="ibox-title">
 
 <div class="ibox-tools">
 <a class="collapse-link">
 <i class="fa fa-chevron-up"></i>
 </a>

 </div>
 </div>
 <div class="ibox-content">
 
 <h2 class="font-bold"><?= Yii::t('frontend','Terima kasih telah mendaftarkan diri secara online.') ?></h2>
 <?= Yii::t('frontend','Silakan cek email Anda untuk memverifikasi alamat email tersebut. Durasi rata-rata pengiriman email verifikasi maksimal 24 jam dari saat mendaftar. Jika email tidak ditemukan pada folder <b>INBOX</b>, ada kemungkinan email tersebut masuk kedalam folder <b>JUNK</b>.') ?>

 </div>
 </div>
</div>