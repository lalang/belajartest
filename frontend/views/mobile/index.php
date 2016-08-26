<?php
use dektrium\user\widgets\LoginMobile;
?>

<div class="container">
	<br><br>
	<p align='center'><img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-home-mobile.png"></p>
	<h1>PTSP PROV. DKI JAKARTA</h1>
	<?php if(isset($alert)){?>
		<div class="alert alert-warning alert-dismissible">
			<?php echo"$alert"; ?>
		</div>
	<?php } ?>	

	<div class='form-login'>
	<?php echo LoginMobile::widget();?>
	</div>
	<br><br>
	
</div>
<div class="form-footer">
	<strong>Copyright &copy; 2016 Mobile PTSP DKI.</strong> All rights reserved.
</div>
