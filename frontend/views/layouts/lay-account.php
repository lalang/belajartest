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
        <!--/ END FONT STYLES -->
        
        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
        
        <?php $this->head();  ?>
    </head>
  
    <body class="page-sound yii2">
        <?php $this->beginBody() ?>
        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- START @SIGN WRAPPER -->
        <?php echo $content ?>
        <!--/ END SIGN WRAPPER -->

       
        <?php $this->endBody() ?>

        <!-- START GOOGLE ANALYTICS -->
       
        <!--/ END GOOGLE ANALYTICS -->
    </body>
    <!-- END BODY -->

</html>
<?php $this->endPage() ;?>