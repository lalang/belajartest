<?php 
use app\assets\admin\dashboard\DashboardAsset;
use yii\helpers\Html;
use yii\web\YiiAsset;
use app\assets\admin\CoreAsset;

CoreAsset::register($this);

DashboardAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <!-- START @HEAD -->
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="">
        <meta name="author" content="Djava UI">
        <title><?= $this->title ?></title>
        <!--/ END META SECTION -->
        
        <!-- START @FAVICONS -->
         <link rel="shortcut icon"  type="image/png" size="36x36" href="<?= Yii::getAlias('@web') ?>/images/favicon.png">
        <!--<link href="<?= Yii::getAlias('@web') ?>/images/android-icon-144x144.png" rel="apple-touch-icon-precomposed" sizes="144x144">-->
        <!--<link href="../../../img/ico/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">-->
        <!--<link href="../../../img/ico/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">-->
        <!--<link href="../../../img/ico/apple-icon-57x57.png" rel="apple-touch-icon-precomposed">-->
        <!--<link href="../../../img/ico/apple-touch-icon.png" rel="shortcut icon">-->
        <!--/ END FAVICONS -->

        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="../../../assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->
        <link href="../../../assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/bower_components/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet">
         <!-- START @THEME STYLES -->
<!--        <link href="../../../assets/admin/css/reset.css" rel="stylesheet">
        <link href="../../../assets/admin/css/layout.css" rel="stylesheet">
        <link href="../../../assets/admin/css/components.css" rel="stylesheet">
        <link href="../../../assets/admin/css/plugins.css" rel="stylesheet">-->
        <link href="../../../assets/admin/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="../../../assets/admin/css/custom.css" rel="stylesheet">
        <!--/ END THEME STYLES -->
        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../../assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="../../../assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
        <!-- START @FAVICONS -->
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/android-icon-144x144.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon.png" rel="shortcut icon">
        <!-- END FAVICONS -->

        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet">
        <!--/ END FONT STYLES -->
        <?= Html::csrfMetaTags() ?>
        <?php $this->head();  ?>
        
    </head>
    <!--/ END HEAD -->

        
    <body class="page-session page-header-fixed page-sidebar-fixed">
    <?php $this->beginBody() ?>
        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- START @WRAPPER -->
        <section id="wrapper">

            <!-- START @HEADER -->
            <?php echo $this->render("_header-admin") ?>
            <!--/ END HEADER -->

          
            <?php echo $this->render("_sidebar-left") ;?>
            <!--/ END SIDEBAR LEFT -->
                
            <!-- START @PAGE CONTENT -->
            <?php echo $content ; ?>
            
            <!--/ END PAGE CONTENT -->

          
              <?php echo $this->render("/shares/_footer_admin") ;?>
        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->


        
    <?php $this->endBody() ?>

    </body>
    <!--/ END BODY -->
    <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
       
</html>
<?php $this->endPage() ?>

