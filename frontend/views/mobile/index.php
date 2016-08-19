<?php
use dektrium\user\widgets\LoginMobile;
?>

<div class="container">
	<br><br>
	<p align='center'><img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-home-mobile.png"></p>
	<div class='form-login animated slideInDown'>
	<?php echo LoginMobile::widget();?>
	</div>
</div>
