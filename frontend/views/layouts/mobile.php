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

use backend\models\MenuNavMainSearch;
use backend\models\MenuNavSubSearch;

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
		<!-- There are three possible values for X-Frame-Options:
		DENY - The page cannot be displayed in a frame, regardless of the site attempting to do so.
		SAMEORIGIN - The page can only be displayed in a frame on the same origin as the page itself.
		ALLOW-FROM uri - The page can only be displayed in a frame on the specified origin. 
		-->
		<meta http-equiv="X-Frame-Options" content="ALLOW-FROM">
	<!--	<script type='text/javascript'>window.parent.location.reload()</script>-->
        <title>PTSP DKI </title>
        <link rel="shortcut icon"  type="image/png" size="36x36" href="<?= Yii::getAlias('@web') ?>/images/favicon.png">
        <!-- Bootstrap core CSS -->
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/bootstrap.css" rel="stylesheet">

        <!-- Animation CSS -->
        <link href="<?= Yii::getAlias('@web') ?>/css/animate.css" rel="stylesheet">
		
        <!-- Custom styles for this template -->
        <link href="<?= Yii::getAlias('@web') ?>/css/style-mobile.css" rel="stylesheet">
		<?php $this->head() ?>
    </head>
    
	<body id="page-top" class="landing-page">
		<?php $this->beginBody() ?>
		<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); ?>
		
        <!--CONTENT-->
        <?php echo $content; ?>
        <!--CONTENT-->

    </body>
</html>
<?php $this->endPage() ?>