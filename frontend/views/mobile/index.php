<?php
use dektrium\user\widgets\LoginMobile;
?>

<div class="container">
	<br><br>
	<p align='center'><img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-home-mobile.png"></p>
	<h1>PTSP PROV. DKI JAKARTA</h1>
	<div class='form-login animated slideInDown'>
	<?php echo LoginMobile::widget();?>
	</div>
	<br><br>
</div>
