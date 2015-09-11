<?php 
use app\assets\admin\dashboard\DashboardAsset;

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
        
        <META NAME="description" CONTENT="Pelayanan terpadu satu pintu, pemerintah propinsi DKI Jakarta, mempermudah pengurusan dan memberikan solusi bagi permasalahan perizinan warga Jakarta">
        <META NAME="keywords" CONTENT="Pelayanan terpadu satu pintu pemerintah propinsi jakarta, PTSP, BPTSP">
        <META NAME="robot" CONTENT="index,follow">
        <META NAME="copyright" CONTENT="Copyright © 2015 BPTSP ">
        <META NAME="author" CONTENT="BPTSP">
        <META NAME="language" CONTENT="">
        <META NAME="revisit-after" CONTENT="7 days">

        <title><?= $this->title ?></title>
        <!--/ END META SECTION -->

        <!-- START @FAVICONS -->
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="<?= \Yii::getAlias('@asset') ?>/img/ico/yii/apple-touch-icon.png" rel="shortcut icon">
        <!-- END FAVICONS -->

        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <?php $this->head();  ?>
        
    </head>
    <!--/ END HEAD -->

    <body class="page-session page-sound page-header-fixed page-sidebar-fixed">
    <?php $this->beginBody() ?>
        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- START @WRAPPER -->
        <section id="wrapper">

            <!-- START @PAGE CONTENT -->
            <?php echo $content ; ?>
            <!--/ END PAGE CONTENT -->

        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

        <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->

        
    <?php $this->endBody() ?>

    <!-- START GOOGLE ANALYTICS -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-55892530-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!--/ END GOOGLE ANALYTICS -->

    </body>
    <!--/ END BODY -->

</html>
<?php $this->endPage() ?>
