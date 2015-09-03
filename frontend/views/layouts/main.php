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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PTSPDKI</title>
    <link rel="shortcut icon"  type="image/png" size="36x36" href="<?= Yii::getAlias('@web') ?>/images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/bootstrap.css" rel="stylesheet">
    
    <!--Parallax-->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/assets/parallax/css/style2.css" />
    <script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/assets/parallax/js/modernizr.custom.28468.js"></script>

    <noscript>
        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/assets/parallax/css/nojs.css" />
     </noscript>
     <!--Parallax-->
     
    <!-- Animation CSS -->
    <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/style.css" rel="stylesheet">
</head>
<?php $this->beginBody() ?>
<body id="page-top" class="landing-page">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                         <img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-ptsp-icon.png">
                          
                           <span class="moto-header">BADAN PELAYANAN TERPADU SATU PINTU
                           <p class="moto-header">DKI JAKARTA</p>
                          </span>
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-home "></i></a></li>
                        <li><a class="page-scroll" href="#tentang">Tentang</a></li>
                    <!--<li><a class="page-scroll" href="#visimisi">Visi/Misi</a></li>
                        <li><a class="page-scroll" href="#fungsi">Fungsi</a></li>
                        <li><a class="page-scroll" href="#manfaat">Manfaat</a></li>-->
                         <li><a href="/site/perizinan">Perizinan</a></li>
                         <li><a href="/site/regulasi">Regulasi</a></li>
                        <li><a href="/site/news">Berita</a></li>
                        <li><a href="/user/login">Login</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
</div>

<!--CONTENT-->

<div style="margin:90px 20px;">
    <?php echo $content ; ?>
</div>
<!--CONTENT-->


<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Kontak Kami</h1>
                <h2>Silakan menghubungi kami melalui info berikut :</h2>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-4 col-lg-offset-2">
                <address>
                    <strong><span class="navy">Dinas Komunikasi Informatika dan Kehumasan Pemerintah Provinsi DKI Jakarta </span></strong><br/>
                    Jl. Kebon Sirih 18 Blok H Lt 18<br/>
                    <i class="fa fa-phone"></i>&nbsp;&nbsp;021-3822968<br/>
                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;bptsp@jakarta.go.id
                </address>
            </div>
            <div class="col-lg-4">
                <section class="comments gray-section" style="margin-top: -35px;background:none;">
                   <div class="container">
                       
                       <div class="row features-block">
                           <div class="col-lg-4">
                               <div class="bubble" style="background-color: rgba(255,255,255,0.6)">
                                   <h4>"Solusi Perizinan Warga Jakarta"</h4>
                                   Memberi kemudahan pengurusan perizinan di Provinsi DKI Jakarta


                               </div>
                               <div class="comments-avatar">
                                   <a href="" class="pull-left">
                                       <img alt="image" src="<?= Yii::getAlias('@web') ?>/images/logo-dki-small.png">
                                   </a>
                                   <div class="media-body">
                                       <div class="commens-name">
                                           BTPSP DKI
                                       </div>
                                       
                                   </div>
                               </div>
                           </div>

                       </div>
                   </div>

               </section>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="m-t-sm">
                    Ikuti kami 
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2015 PTSP DKI</strong><br/></p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="<?= Yii::getAlias('@web') ?>/assets/inspinia/js/jquery-2.1.1.js"></script>
<script src="<?= Yii::getAlias('@web') ?>/assets/inspinia/js/bootstrap.min.js"></script>
<script src="<?= Yii::getAlias('@web') ?>/assets/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= Yii::getAlias('@web') ?>/assets/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= Yii::getAlias('@web') ?>/assets/inspinia/js/inspinia.js"></script>
<script src="<?= Yii::getAlias('@web') ?>/assets/inspinia/js/plugins/pace/pace.min.js"></script>
<script src="<?= Yii::getAlias('@web') ?>/assets/inspinia/js/plugins/wow/wow.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
		<script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/assets/parallax/js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: false,
					bgincrement	: 450
				});
			
			});
		</script>	
</body>
</html>
<?php $this->endPage() ?>
