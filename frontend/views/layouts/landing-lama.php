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
use \yii\db\Query;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<style>
    #login-form-rememberme label {color:#ebebeb;}    
</style>
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
        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/assets/parallax/css/style2.css" />
        <script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/assets/parallax/js/modernizr.custom.28468.js"></script>

        <!--Parallax-->

        <!-- Animation CSS -->
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/animate.css" rel="stylesheet">
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= Yii::getAlias('@web') ?>/assets/inspinia/css/style.css" rel="stylesheet">
    </head>
    <?php $this->beginBody() ?>
    <?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); ?>
    <body id="page-top" class="landing-page">
        <div class="navbar-wrapper">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!--<div class="container">-->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                        <img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-dki-small.png">
                        <span class="moto-header">PTSP DKI JAKARTA</span>
                    </a>
                </div>


                <div id="navbar" class="navbar-collapse collapse container">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="<?= Yii::$app->homeUrl ?>"><?php echo Yii::t('frontend', 'Beranda'); ?></a></li>
                        <?php
                        $searchModel = new PageSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $rows_data = $dataProvider->getModels();
                        foreach ($rows_data as $value_data) {
                            if ($language == "en") {
                                $page_title_seo = $value_data->page_title_seo_en;
                                $page_title = $value_data->page_title_en;
                            } else {
                                $page_title_seo = $value_data->page_title_seo;
                                $page_title = $value_data->page_title;
                            }
                            ?>
                            <!--
                            <li><?= Html::a($value_data->page_title, ['/site/page', 'id' => $value_data->page_title_seo]) ?></li>-->

                            <li><a class="page-scroll" href="<?= Yii::$app->homeUrl ?>#<?php echo $page_title_seo; ?>"><?php echo $page_title; ?></a></li>
                        <?php } ?>
                        <li><a class="page-scroll" href="<?= Yii::$app->homeUrl ?>#visimisi"><?php echo Yii::t('frontend', 'Visi/Misi'); ?></a></li>
                        <li><a class="page-scroll" href="<?= Yii::$app->homeUrl ?>#berita"><?php echo Yii::t('frontend', 'Berita'); ?></a></li>
                        <li><?= Html::a('FAQ', ['/site/faq']) ?></li>
                        <li><a class="page-scroll" href="<?= Yii::$app->homeUrl ?>#lokasi"><?php echo Yii::t('frontend', 'Lokasi'); ?></a></li>

                        <?php if (Yii::$app->user->isGuest) { ?>

                            <li class="dropdown"> 
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="middle-box text-center loginscreen animated fadeInDown">
                                            <div>

                                                <?php
                                                echo Login::widget();
                                                ?>

                                            </div>
                                        </div>
                                    </li>                         
                                </ul>
                            </li>

                            <!--<li><a class="" href="/user/registration/register">Daftar</a></li>-->

                            <!--<li><a href="/user/login" data-toggle="modal" data-target="#LoginModal" >Login</a></li>-->

                        <?php } else { ?>
                            <li><a class="" href="/perizinan/index">Layanan Anda</a></li>
                            <li class=""><?= Html::a('Logout', ['/user/logout']) ?></li>

                        <?php } ?>
                        <li class="dropdown"> 
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo Yii::t('frontend', 'Bahasa'); ?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="col-lg-6 text-center">
                                        <!--<a class="" href="/id/"><img style="width:18px" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/flag-indonesia-icon.png">-->
                                        <?= Html::a('<img class="" src="/assets/inspinia/img/flag-indonesia-icon.png" width="30"><p>IDN</p>', ['/site/lang', 'id' => 'id']) ?>
<!--                                            <p>IDN<p>                                       -->
                                        </a>
                                    </div>
                                    <div class="col-lg-6 text-center">
<!--                                        <a class="" href="/id/"><img style="width:18px" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/flag-england-icon.png">-->
                                        <?= Html::a('<img class="" src="/assets/inspinia/img/flag-england-icon.png" width="30"><p>EN</p>', ['/site/lang', 'id' => 'en']) ?>
                                            <!--<p>EN<p>-->
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown"> 
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-search "></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="middle-box text-center loginscreen animated fadeInDown">
                                        <div >

                                            <?php $form = ActiveForm::begin(); ?> 
                                            <div class="input-group col-md-12">
                                                <input type="hidden" name="flag" value='izin'>
                                                <input type="text" style="" class="form-control" required placeholder="Cari disini" name="cari">
                                                <span class="input-group-btn"> 
                                                    <button type="submit" value="submit" class="btn btn-primary"> &nbsp;Cari ! </button> 
                                                </span>
                                            </div>  


                                            <?php ActiveForm::end(); ?> 

                                        </div>
                                    </div>
                                </li>                         
                            </ul>
                        </li>
                    </ul>

                </div>
                <!--</div>-->
            </nav>
        </div>

        <!--CONTENT-->

        <div class="fake-margin-landing1" style="">
            <?php echo $content; ?>
        </div>
        <!--CONTENT-->


        <section id="contact" class="gray-section contact">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><?= Yii::t('frontend', 'Kontak') ?></h1>
                <h3><?= Yii::t('frontend', 'Silakan menghubungi kami melalui info berikut') ?>:</h3>
                <h3><strong><span class="navy"><?= Yii::t('frontend', 'Dinas Komunikasi Informatika dan Kehumasan Pemerintah Provinsi DKI Jakarta') ?></span></strong></h3>
            </div>

            <div class="col-sm-12">

                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">   
                            <h5 class="text-center"><i class="fa fa-home"></i>&nbsp;&nbsp;Jl. Kebon Sirih 18 Blok H Lt 18</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">   
                            <h5 class="text-center"><i class="fa fa-phone"></i>&nbsp;&nbsp;021-3822968</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">   
                            <h5 class="text-center"><i class="fa fa-envelope"></i>&nbsp;&nbsp;bptsp@jakarta.go.id</h5>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="m-t-sm">
                        Follow
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
                    <p><strong>&copy; 2015 BPTSP DKI JAKARTA</strong><br/></p>
                </div>
            </div>

        </section>

        <!-- <div class="col-sm-6">
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
            </div>-->

        <!-- ############# MODALS -->
        <div class="modal inmodal fade" id="LoginModal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">

                    <div class="modal-header">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal inmodal fade" id="RegisterModal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">

                    <div class="modal-header">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal inmodal fade" id="BahasaModal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Pilihan Bahasa</h4>
                    </div>

                    <div class="modal-footer">
                        <span class="text-center col-lg-12">
                            <div class="col-lg-6">
                                <a class="text-center" href="/id/"><img class="" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/flag-indonesia-icon.png"><p>Indonesia</p><a/>
                            </div>
                            <div class="col-lg-6">
                                <a class="text-center" href="/id/"><img class="" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/flag-england-icon.png"><p>English</p></a>
                            </div>
                        </span>
                    </div>     
                </div>

            </div>
        </div>

        <!-- #################### MODALS -->

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
                $('a.page-scroll').bind('click', function (event) {
                    var link = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $(link.attr('href')).offset().top - 50
                    }, 500);
                    event.preventDefault();
                });
            });

            var cbpAnimatedHeader = (function () {
                var docElem = document.documentElement,
                        header = document.querySelector('.navbar-default'),
                        didScroll = false,
                        changeHeaderOn = 200;
                function init() {
                    window.addEventListener('scroll', function (event) {
                        if (!didScroll) {
                            didScroll = true;
                            setTimeout(scrollPage, 250);
                        }
                    }, false);
                }
                function scrollPage() {
                    var sy = scrollY();
                    if (sy >= changeHeaderOn) {
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
            $(function () {

                $('#da-slider').cslider({
                    autoplay: true,
                    bgincrement: 450
                });

            });
        </script>	
    </body>
</html>
<?php $this->endPage() ?>
