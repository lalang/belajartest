<?php
use dektrium\user\widgets\Login;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PTSP DKI </title>
        <link rel="shortcut icon"  type="image/png" size="36x36" href="<?= Yii::getAlias('@web') ?>/images/favicon.png">
        <!-- Bootstrap core CSS -->
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/bootstrap.css" rel="stylesheet">

        <!--Parallax-->

        <!-- Animation CSS -->
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/animate.css" rel="stylesheet">
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/style-mobile.css" rel="stylesheet">
		<?php $this->head() ?>
    </head>
	<body>
		<div class="container">
			<p align='center'><img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-home-mobile.png"></p>
			<?php echo Login::widget();?>
		</div>
	</body>
</html>