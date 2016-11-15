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
		<?php $this->head() ?>
    </head>
    
    <body id="page-top" class="landing-page">
		<?php $this->beginBody() ?>
		<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); ?>
        <div class="navbar-wrapper">
            <nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
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
                        <span class="moto-header">BADAN PTSP PROV. DKI JAKARTA</span>
                    </a>
                </div>


                <div id="navbar" class="navbar-collapse collapse container">

                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        $model = new MenuNavMainSearch();						
						$dataProvider = $model->searchActive(Yii::$app->request->queryParams);
                        $rows_data = $dataProvider->getModels();
						
                        foreach ($rows_data as $value_data) {
                            if ($language == "en") {
                                $nama_menu = $value_data->nama_en;
                                $link_menu = $value_data->link_en;
                            } else {
                                $nama_menu = $value_data->nama;
                                $link_menu = $value_data->link;
                            }
							
							$jml_char = strlen($link_menu);
							$tanda = substr($link_menu,-$jml_char,1);  
							
							if($tanda=="#"){
								$link_menu = "../../".$link_menu;
							}
							
							//cek anak
							$model = new MenuNavSubSearch();						
							$dataProviderSub = $model->searchActive($value_data->id);
							$jml = count($dataProviderSub);
							
							if($jml){
								$drop = "class='dropdown'";
								$a_down ="<span class='caret'></span>";
								$toggle="data-toggle='dropdown'";
								$class="class='dropdown-toggle'";
							}else{
								$drop = "";
								$a_down ="";	
								$toggle="";
								$class="class='page-scroll'";
							}
                            ?>

                             <li <?php echo"$drop";?>><a <?php echo $class; ?> href="<?php echo $link_menu; ?>" target="<?php echo $value_data->target; ?>" <?php echo $toggle; ?>><?php echo $nama_menu;?> <?php echo $a_down; ?></a>
								<?php if($jml){ 
								?>
									<ul class="dropdown-menu">
										<?php 
										foreach ($dataProviderSub as $data_sub) {
											if ($language == "en") {
												$nama_menu_sub = $data_sub->nama_en;
												$link_menu_sub = $data_sub->link_en;
											} else {
												$nama_menu_sub = $data_sub->nama;
												$link_menu_sub = $data_sub->link;
											}
											
											$jml_char_sub = strlen($link_menu_sub);
											$tanda_sub = substr($link_menu_sub,-$jml_char_sub,1);  
											
											if($tanda_sub=="#"){
												$link_menu_sub = "../../".$link_menu_sub;
											}
										?>
										<li><a class="page-scroll" href="<?php echo $link_menu_sub; ?>" target="<?php echo $data_sub->target; ?>"><?php echo $nama_menu_sub; ?></a></li>
										<?php } ?>
									</ul>	
								<?php
								}
								?>
							 </li>
                        <?php } ?>

                        <?php if (Yii::$app->user->isGuest) { ?>

                            <li class="dropdown"> 
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Izin Online <span class='caret'></span></a> 
                                <ul class="dropdown-menu">
                                    <li><a class="page-scroll" href='#'>Cara Mendaftar</a></li>
									<li><a class="page-scroll" href='#'>Daftar Disini</a></li>
									<li>
										<div class="middle-box text-center loginscreen animated fadeInDown">
											<div style='color:#ffffff; font-size:15px; font-weight: bold; border-bottom: 1px solid #1ab394; padding-bottom:5px;'>Form Login</div>
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

                                            <?php $form = ActiveForm::begin(['action' => '/site/searchglobal']); ?> 
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
		<?php
		$model = new KontakSearch();
        $data_kontak = $model->active_kontak();
		if ($language == "en") {
				$judul = $data_kontak->judul_en;
				$info_main = $data_kontak->info_main_en;
				$info_sub = $data_kontak->info_sub_en;
				$alamat = $data_kontak->alamat_en;
			} else {
				$judul = $data_kontak->judul;
				$info_main = $data_kontak->info_main;
				$info_sub = $data_kontak->info_sub;
				$alamat = $data_kontak->alamat;
			}
		?>					
        <section id="contact" class="gray-section contact">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><?php echo $judul; ?></h1>
                <h3><?php echo $info_main; ?></h3>
                <h3><strong><span class="navy"><?php echo $info_sub; ?></span></strong></h3>
            </div>

            <div class="col-sm-12">

                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">   
                            <h5 class="text-center"><i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo"$alamat"; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">   
                            <h5 class="text-center"><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo $data_kontak->tlp; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">   
                            <h5 class="text-center"><i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo $data_kontak->email; ?></h5>
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
                        <?php if($data_kontak->twitter){ ?>
						<li><a href='<?php echo $data_kontak->twitter; ?>' target='blank'><i class="fa fa-twitter"></i></a></li>
						<?php } ?>
						<?php if($data_kontak->facebook){ ?>
                        <li><a href='<?php echo $data_kontak->facebook; ?>' target='blank'><i class="fa fa-facebook"></i></a>
						<?php } ?>
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
		<a id="top" href='#'><i class="fa fa-arrow-circle-up"></i></a>	
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

		<!--s: Back To Top -->
		<!--<script src="http://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>-->
		 <script type="text/javascript">
			  var toper = $('a#top');
		 
		 
			  $(window).scroll(function(){
					  if ($(this).scrollTop() > 100) {
						  toper.fadeIn( 200 );
					  } else {
						  toper.fadeOut( 200 );
					  }
				  });
		 
				   toper.click(function(){
					$('html, body').animate({scrollTop:0}, 500);
					return false;
				});
			</script>
			<script type="text/javascript">
			var s = skrollr.init();
			</script>
		<!--e: Back To Top -->
		
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
