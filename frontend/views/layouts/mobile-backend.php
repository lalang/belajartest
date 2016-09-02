<?php

use frontend\assets\AppAsset;
use dektrium\user\widgets\Login;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use dektrium\user\models\User;
//use dektrium\user\widgets\Connect;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\models\PageSearch;
use backend\models\KontakSearch;
use \yii\db\Query;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
	<!--	<script type='text/javascript'>window.parent.location.reload()</script>-->
        <title>PTSP DKI </title>
        <link rel="shortcut icon"  type="image/png" size="36x36" href="<?= Yii::getAlias('@web') ?>/images/favicon.png">
		
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/bootstrap/css/bootstrap.min.css"/>
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/font-awesome-4.5.0/css/font-awesome.min.css"/>
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/ionicons/-2.0.1/css/ionicons.min.css"/>
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/dist/css/AdminLTE.min.css"/>
		<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/dist/css/skins/_all-skins.min.css"/>
		<!-- iCheck -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/iCheck/flat/blue.css"/>
		<!-- Morris chart -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/morris/morris.css"/>
		<!-- jvectormap -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css"/>
		<!-- Date Picker -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/datepicker/datepicker3.css"/>
		<!-- Daterange picker -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/daterangepicker/daterangepicker-bs3.css"/>
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>



		


		

	
		
		
		
		
		
		
		
		
		
		
		
        <!-- Custom styles for this template -->
        <link href="<?= Yii::getAlias('@web') ?>/css/style-mobile-backend.css" rel="stylesheet">
		<?php $this->head() ?>
		<?php 
	/*	$mobile = \Yii::$app->session->get('mobile');
		echo $mobile; die();
		if (!Yii::$app->user->identity->profile->name) {?>
                <meta http-equiv="refresh" content="http://portal-ptsp.local/mobile"/>
        <?php } */?>
    </head>
    
	<body id="page-top" class="skin-green">
		<?php $this->beginBody() ?>
		<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); ?>
		
		<!-- Site wrapper -->
		<div class="wrapper">

			<header class="main-header">
				<?php echo Html::a(Yii::t('frontend', 'PTSP DKI'), ['/mobile-backend/index/'],['class'=>'logo']) ?>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li>
								<?php echo Html::a(Yii::t('user', '<span class="glyphicon glyphicon-log-out"></span> Logout'), ['/user/security/logout/'], [
									//'class' => 'btn btn-danger',
									'data' => [
										'confirm' => Yii::t('backend', 'Apakah Anda yakin akan keluar?'),
										'method' => 'post',
									],
								]) ?>

							</li>
							
				  
						</ul>
					</div>
				</nav>
			</header>
			
			<!-- =============================================== -->
			<!--sidebar didalam content->
			<!--CONTENT-->
			<?php echo $content; ?>
			<!--CONTENT-->
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 2.3.0
				</div>
				<strong>Copyright &copy; 2016 Mobile PTSP DKI.</strong> All rights reserved.
			</footer>
		</div>	

		<!-- jQuery 2.1.4 -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/js/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/bootstrap/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/bootstrap/js/raphael-min.js"></script>
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/morris/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/knob/jquery.knob.js"></script>
		<!-- daterangepicker -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/js/moment.min.js"></script>
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/plugins/fastclick/fastclick.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/dist/js/app.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?= Yii::getAlias('@web') ?>/assets_adminlte/dist/js/demo.js"></script>
		
    </body>
</html>
<?php $this->endPage() ?>
