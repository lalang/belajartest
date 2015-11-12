<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
?>
<div class="wrapper wrapper-content animated fadeInRight">
 <div class='main-title-page'><h3><strong><?= Yii::t('frontend','Reset Password Sukses') ?></strong></h3></div>
 <div class="ibox float-e-margins">
 <div class="ibox-title">
 
 <div class="ibox-tools">
 <a class="collapse-link">
 <i class="fa fa-chevron-up"></i>
 </a>

 </div>
 </div>
 <div class="ibox-content">
 
 <h2 class="font-bold"><?= Yii::t('frontend','Proses Reset Password') ?></h2>
 <?= Yii::t('frontend',$pesan) ?>
 </div>
 </div>
</div>