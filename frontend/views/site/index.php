<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\widgets\ListViewHome;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use backend\models\Bidang;
use yii\helpers\Url;
//use frontend\models\Berita;
use yii\web\CookieCollection;
/* @var $this yii\web\View */
use yii\jui\AutoComplete;
/*use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
*/
//$this->context->layout = 'main-beranda';
?> 

<style>
    label{
        font-size:13px;
        color:#efefef;
    }
    .ibox-content h4 {min-height:45px}
    .konten-berita {min-height:220px;}
</style>
<style>
	#popup {
	/*	background-color:#000;opacity:0.4;filter:alpha(opacity=40);*/
		display:none;
		position:absolute;
		margin:0 auto;
		margin-top:25px;
		top: 50%;
		left: 50%;
		border:0px;
		transform: translate(-50%, -50%);
		z-index: 9999;
	}
	
	#popclose {
		display:none;
		position:absolute;
		margin:0 auto;
		margin-top:25px;
		top: 50%;
		left: 50%;
		border:0px;
		transform: translate(-50%, -50%);
		z-index: 9999;
	}
	
	.panel-footer{
		text-align: right;
		z-index: 99999;
		width: 100%;
		padding:0px;
		border: 0px;
		position: absolute;
		background:transparent;
	}
	
	.close-pop{
		background:#000000;
		color: $ffffff;
		border: #000000;
		border-radius: 0px;
	}
	
	@media (max-width: 450px) {
		
		#popup{
			width: 100%;
			top: 40%;
			left: 50%;
		}
		.popup-img img{
			width: 100%;
			height: auto;	
		}
		
	}
</style>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
/*
echo $form->field($data_kantor, 'nama')->widget(Select2::classname(), [
 'data' => ArrayHelper::map($data_kantor, 'id', 'nama'),
 'options' => ['placeholder' => 'Select ...'],
 ]);*/
?>

<div class="fake-margin-landing2">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">    
		
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php $loop_slide=0; foreach ($data_slide as $value) { 
			if($loop_slide=="0"){$active="class='active'";}else{$active="";}?>
			<li data-target="#myCarousel" data-slide-to="<?php echo$loop_slide; ?>" <?php echo $active; ?>></li>
			<?php
			$loop_slide++;
			}?>
		</ol>
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php $loop_slide=1; foreach ($data_slide as $value) { 
				
				if($language=="en"){ 
					$judul = $value->title_en;
					$conten = $value->conten_en;
				}else{
					$judul = $value->title;
					$conten = $value->conten;
				}
				
				if($loop_slide=="1"){$active="active";}else{$active="";}
			?>
			  <div class="item <?php echo $active;?>">
				<img src="<?= Yii::getAlias('@test') ?>/images/slider/<?php echo $value->image ?>" height='100'/>
				<div class="carousel-caption">
					<?php if($judul){echo "<h3>$judul</h3>";}?>
					<?php if($conten){echo "<p>$conten</p>";}?>
				</div>
			  </div>
			<?php $loop_slide++; } ?>
	  
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>

	<?php echo$data_kontak->judul; ?>
	<div class="katalog" style=" padding-bottom: 10px;">
		<section id="heading" class="container services" style="padding-top: 20px;">
			<div class="row">
				<?php foreach ($data_menu_katalog as $value) { 
					if($language=="en"){ 
						$nama = $value->nama_en;
						$link = $value->link_en;
					}else{
						$nama = $value->nama;
						$link = $value->link;
					}
				?>
			
				<div class="col-sm-3">
					<div class="menu-bulet-container">
						<a href="<?php echo $link;?>" alt="<?php echo $nama;?>" target='<?php echo $value->target;?>'><i class="menu-bulet <?php echo $value->icon;?> features-icon"></i><h2><?php echo $nama; ?></h2></a>
					</div>
				</div>
				<?php } ?>
			   
			</div>
		</section>
	</div>
	<hr class='general'>
	
    <section class="container services">
        <div class="row">

            <div class="col-lg-12">
				<div class="container page-statis">
					
                        <?php
                   /*     $searchModel = new PageSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $rows_data = $dataProvider->getModels();*/
                        foreach ($data_page as $value_data) {
						
							if($language=="en"){ 
								$v_judul_seo = $value_data->judul_seo_en;
								$v_judul = $value_data->judul_en;
								$v_description = $value_data->description_en;
							}else{
								$v_judul_seo = $value_data->judul_seo;
								$v_judul = $value_data->judul;
								$v_description = $value_data->description;
							}

                            ?>
                            <div id='<?php echo $v_judul_seo; ?>'></div> 
                
                            <div class="col-lg-12 text-center">
                                <div class="navy-line"></div>
                                <h1><?php echo $v_judul; ?></h1>
                            </div>
							<div class='page-landing'>
							<?php if($value_data->gambar){?>
								<img src="<?= Yii::getAlias('@test') ?>/images/pages/<?= $value_data->gambar ?>" alt="Image not found" style="float: left; margin: 0px 10px 10px 0px"/>
							<?php } ?>
                            <?php echo $v_description; ?>
							</div>
                        <?php } ?>	
                

				</div>
            </div>

    </section>

	<?php if($publish_sub[0]=="Y"){ ?>
    <section id="<?php echo $title_seo_sub[0]; ?>" class="container services">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?php echo $title_sub[0]; ?></h1>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row"> 
			   <div class="col-lg-12">
					<div class="col-sm-6">
						<div class="ibox-content">

							<ul class="todo-list m-t small-list">
								<?php foreach ($Sublan1Left as $value) { 
									if($language=="en"){ 
										$v_fungsi_left = $value->nama_en;
									}else{
										$v_fungsi_left = $value->nama;
									}
								?>
									<li>
										<i class="fa fa-check-square"></i> 
										<span class="m-l-xs">
											<?php echo $v_fungsi_left; ?>
										</span>

									</li>
								<?php } ?>                                             
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="ibox-content">

							<ul class="todo-list m-t small-list">
								<?php foreach ($Sublan1Right as $value) { 
									if($language=="en"){ 
										$v_fungsi_right = $value->nama_en;
									}else{
										$v_fungsi_right = $value->nama;
									}
								?>
									<li>
										<i class="fa fa-check-square"></i> 
										<span class="m-l-xs">
											<?php echo $v_fungsi_right; ?>
										</span>

									</li>
								<?php } ?>          
							</ul>
						</div>
					</div>
				</div>				
             </div>
        </div>
	</section>	
	<?php } ?>	
	
	
	
	
	<?php if($publish_sub[1]=="Y"){ ?>
    <section id="<?php echo $title_seo_sub[1]; ?>" class="container services">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?php echo $title_sub[1]; ?></h1>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row"> 
				
				<?php foreach ($data_sublan2 as $value) { 
						if($language=="en"){ 
							$info = $value->info_en;
							$link = $value->link_en;
						}else{
							$info = $value->info;
							$link = $value->link;
						}
				?>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title-noborder-top">
                                <div class="menu-bulet-container">
									<?php if($link){ ?>
										<a href="<?php echo $link; ?>" target="<?php echo $value->target; ?>"><i class="<?php echo $value->icon; ?> fa-2x"></i></a>
									<?php }else{ ?>
										<i class="<?php echo $value->icon; ?> fa-2x"></i>	
									<?php } ?>
                                </div>
                            </div>
                            <div class="ibox-conten-noborder-bottom">
                                <p class="text-center"><?php echo $info; ?></p>
                            </div>
                        </div>
                    </div>
				<?php } ?>
             </div>
        </div>
	</section>	
	<?php } ?>	
	
	<?php if($publish_sub[2]=="Y"){ ?>	
	<section id="<?php echo $title_seo_sub[2]; ?>" class="container services">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?php echo $title_sub[2]; ?></h1>
        </div>
		
		
        <!-- MANFAAT -->
        <div class="wrapper wrapper-content">				
			<div class="row">
				<div class="col-md-3 text-center wow fadeInLeft">
				
				<?php foreach ($data_Sublan3_left as $value) { 
					if($language=="en"){ 
						$info = $value->info_en;
						$link=$value->link_en;
					}else{
						$info = $value->info;
						$link=$value->link;
					}
				?>
					<div>
						<?php if($link){ ?>
							<a href="<?php echo $link; ?>" target="<?php echo $value->target; ?>"><i class="<?php echo $value->icon; ?> fa-3x"></i></a>
						<?php }else{ ?>
							<i class="<?php echo $value->icon; ?> fa-3x"></i>
						<?php } ?>
						<h3><?php echo $info; ?></h3>
					</div>
				<?php } ?>	                            
				</div>
				<div class="col-md-6 text-center  wow zoomIn">
					<img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/izin1.png" class="img-responsive" alt="PTSP DKI"/>
				</div>
				<div class="col-md-3 text-center wow fadeInRight">
					<?php foreach ($data_Sublan3_right as $value) { 
					if($language=="en"){ 
						$info = $value->info_en;
						$link=$value->link_en;
					}else{
						$info = $value->info;
						$link=$value->link;
					}
					?>
					<div>
						<?php if($link){ ?>
						<a href="<?php echo $link; ?>" target="<?php echo $value->target; ?>"><i class="<?php echo $value->icon; ?> fa-3x"></i></a>
						<?php }else{ ?>
						<i class="<?php echo $value->icon; ?> fa-3x"></i>
						<?php } ?>
						<h3><?php echo $info; ?></h3>
					</div>
					<?php } ?>
				</div>
			</div>
        </div>
    </section>    
	<?php } ?>

    <section id="berita" class="container services">
        <div class="row animated fadeInRight">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><?php echo Yii::t('frontend','Berita'); ?></h1>
            </div>

            <?php foreach ($beritaUtama as $value) { 
				if($language=="en"){ 
					$judul_berita = $value->judul_en;
					$isi_berita = $value->isi_berita_en;
					$judul_seo=$value->judul_seo_en;
				}else{
					$judul_berita = $value->judul;
					$isi_berita = $value->isi_berita;
					$judul_seo=$value->judul_seo;
				}
			?>

                <div class="col-md-3">
                    <div class="ibox float-e-margins">           
                        <div>
                            <div class="ibox-content no-padding border-left-right frame-square">
                                <?php if ($value->gambar) { ?>
                                    <img class="retina crop img-responsive" src="<?= Yii::getAlias('@test') ?>/images/news/<?= $value->gambar ?>" alt="<?php echo $value->judul; ?>">
                                <?php } else { ?>
                                    <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/images/no-image.png">
                                <?php } ?>
                            </div>
                            <div class="ibox-content profile-content" style="margin: 0px 5px 0px 5px">
                                <h4><strong><?php echo $judul_berita; ?></strong></h4>
                                <p><i class="fa fa-calendar"></i> Update 
                                    <?php
                                    $pecah = explode('-', $value->tanggal);
									$tgl = $pecah[2];
                                    $bln = $pecah[1];
                                    $thn = $pecah[0];
                                    echo"$tgl/$bln/$thn";
                                    ?></p>

                                <p style="min-height:150px;">
                                    <?php
                                    $text = strip_tags($isi_berita);
                                    $text = ucfirst(strtolower(mb_substr($text, 0, 200)));
                                    echo"$text...";
                                    ?>
                                </p>

                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= Html::a(Yii::t('frontend','Selengkapnya').' <i class="fa fa-arrow-right"></i>', ['/site/detailnews', 'id' => $judul_seo], ['class' => 'btn btn-primary btn-sm btn-block']) ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <div class="row animated fadeInRight">


            <div class="col-md-6">
                <ul class="sortable-list connectList agile-list">
                    <?php foreach ($beritaListLeft as $value) { 
						if($language=="en"){ 
							$v_berita_list_left = $value->judul_en;
							$v_judul_seo_list_left = $value->judul_seo_en;
						}else{
							$v_berita_list_left = $value->judul;
							$v_judul_seo_list_left = $value->judul_seo;
						}					
					?>
                        <li class="warning-element">
                            <?= Html::a($v_berita_list_left, ['/site/detailnews', 'id' => $v_judul_seo_list_left]) ?>
                            <div class="agile-detail">
                                <?= Html::a(Yii::t('frontend','Selengkapnya'), ['/site/detailnews', 'id' => $v_judul_seo_list_left], ['class' => 'pull-right btn btn-xs btn-white']) ?>
                                <i class="fa fa-clock-o"></i> 
                                <?php
                                $pecah = explode('-', $value->tanggal);
                                $tgl = $pecah[1];
                                $bln = $pecah[2];
                                $thn = $pecah[0];
                                echo"$tgl/$bln/$thn";
                                ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="sortable-list connectList agile-list">
                    <?php foreach ($beritaListRight as $value) { 
						if($language=="en"){ 
							$v_berita_list_right = $value->judul_en;
							$v_judul_seo_list_right = $value->judul_seo_en;
						}else{
							$v_berita_list_right = $value->judul;
							$v_judul_seo_list_right = $value->judul_seo;
						}		
					?>
                        <li class="warning-element">
                            <?= Html::a($v_berita_list_right, ['/site/detailnews', 'id' => $v_judul_seo_list_right]) ?>
                            <div class="agile-detail">
                                <?= Html::a(Yii::t('frontend','Selengkapnya'), ['/site/detailnews', 'id' => $v_judul_seo_list_right], ['class' => 'pull-right btn btn-xs btn-white']) ?>
                                <i class="fa fa-clock-o"></i> 
                                <?php
                                $pecah = explode('-', $value->tanggal);
                                $tgl = $pecah[1];
                                $bln = $pecah[2];
                                $thn = $pecah[0];
                                echo"$tgl/$bln/$thn";
                                ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </div>

    </section>
	
	<section style='text-align: center' class="container">	
		<div class="row">
			<div class="col-md-6 animated fadeInLeft beritajakarta">
				<a href='http://beritajakarta.com' target='blank'><img src="<?= Yii::getAlias('@web') ?>/images/general/beritajakarta.jpg" alt="Berita Jakarta"></a>
			</div>
			<div class="col-md-6 animated fadeInRight smartcity">
				<a href='http://smartcity.jakarta.go.id' target='blank'><img src="<?= Yii::getAlias('@web') ?>/images/general/logo_jsc_city.png" alt="Smart City"></a>
			</div>				
		</div>
	</section>
	<div style='clear: both;'></div>
    <?php
  //  $data = Berita::getBerita('ekonomi');
   // $data2 = Berita::getBerita('pemerintahan');
   // $data3 = Berita::getBerita('pembangunan');
    //$data4 = Berita::getBerita('kesra');
	
	if($data[0]['news_title']!="" and $data2[0]['news_title']!="" and $data3[0]['news_title']!="" and $data4[0]['news_title']!=""){
    ?>

    <section id="berita" class="gray-section team">
        <div class="row animated fadeInRight" >
            <div class="container">    
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h2>beritajakarta.com</h2>
                </div>
                <div class="col-md-3">
                    <div class="ibox float-e-margins">           
                        <div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $data[0]['news_title']; ?></strong></h4>
                                <p><i class="fa fa-calendar"></i> 
                                    Update 
									<?php
                                    $pecah = explode(' ', $data[0]['news_date']);
									$tgl = $pecah[0];
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$tgl/$bln/$thn";
                                    ?>
                                </p>
                                    <p class="konten-berita">
								<?php
                                $img = $data[0]['news_image'];
                                $img_alt = $data[0]['news_image_alt'];
                                if ($img) {
                                    ?>
                                    <img alt="<?php echo $img_alt; ?>" class="img-responsive" src="<?php echo $img; ?>" style='float: left; margin: 0px 5px 5px 0px'>
                                <?php } else { ?>
                                    <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/images/no-image.png" style='float: left; margin: 0px 5px 5px 0px'>
                                <?php } ?>
								<?php echo $data[0]['news_content']; ?>
                                </p>

                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo $data[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'><?= Yii::t('frontend','Selengkapnya') ?> <i class="fa fa-arrow-right"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="ibox float-e-margins">           
                        <div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $data2[0]['news_title']; ?></strong></h4>
                                <p><i class="fa fa-calendar"></i> Update 
                                    <?php
                                    $pecah = explode(' ', $data2[0]['news_date']);
									$tgl = $pecah[0];
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$tgl/$bln/$thn";
                                    ?>
                                </p>
                                   <p class="konten-berita">
								<?php
                                $img = $data2[1]['news_image'];
                                $img_alt = $data2[1]['news_image_alt'];
                                if ($img) {
                                    ?>
                                    <img alt="<?php echo $img_alt; ?>" class="img-responsive" src="<?php echo $img; ?>" style='float: left; margin: 0px 5px 5px 0px'>
                                <?php } else { ?>
                                    <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/images/no-image.png" style='float: left; margin: 0px 5px 5px 0px'>
								<?php } ?>
								<?php echo $data2[0]['news_content']; ?>
                                </p>

                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo $data2[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'><?= Yii::t('frontend','Selengkapnya') ?> <i class="fa fa-arrow-right"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="ibox float-e-margins">           
                        <div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $data3[0]['news_title']; ?></strong></h4>
                                <p><i class="fa fa-calendar"></i> Update 
                                    <?php
                                    $pecah = explode(' ', $data3[0]['news_date']);
									$tgl = $pecah[0];
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$tgl/$bln/$thn";
                                    ?>
                                </p>

                                <p class="konten-berita">
								<?php
                                $img = $data3[0]['news_image'];
                                $img_alt = $data3[0]['news_image_alt'];
                                if ($img) {
                                    ?>
                                    <img alt="<?php echo $img_alt; ?>" class="img-responsive" src="<?php echo $img; ?>" style='float: left; margin: 0px 5px 5px 0px'>
                                <?php } else { ?>
                                    <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/images/no-image.png" style='float: left; margin: 0px 5px 5px 0px'>
								<?php } ?>
								<?php echo $data3[0]['news_content']; ?>
                                </p>

                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo $data3[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'><?= Yii::t('frontend','Selengkapnya') ?> <i class="fa fa-arrow-right"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="ibox float-e-margins">           
                        <div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $data4[0]['news_title']; ?></strong></h4>
                                <p><i class="fa fa-calendar"></i> Update 
                                    <?php
                                    $pecah = explode(' ', $data4[0]['news_date']);
									$tgl = $pecah[0];
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$tgl/$bln/$thn";
                                    ?>
                                </p>
                                <p class="konten-berita">
								<?php
                                $img = $data4[0]['news_image'];
                                $img_alt = $data4[0]['news_image_alt'];
                                if ($img) {
                                    ?>
                                    <img alt="<?php echo $img_alt; ?>" class="img-responsive" src="<?php echo $img; ?>" style='float: left; margin: 0px 5px 5px 0px'>
									<?php } else { ?>
                                    <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/images/no-image.png" style='float: left; margin: 0px 5px 5px 0px'>
								<?php } ?>
								<?php echo $data4[0]['news_content']; ?>
                                </p>

                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo $data4[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'><?= Yii::t('frontend','Selengkapnya') ?> <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>        
	<?php } ?>
 </div>

<?php if($img_popup and $_SESSION['open']!="1")
{?>
	<!-- let's call the following div as the POPUP FRAME -->
	<div id="popup" class="popup panel panel-primary">
		
		<!-- and here comes the image -->
		<div class="panel-footer">
			<button id="close" class="btn btn-md btn-default close-pop">x</button>
		</div>	
		<div class='popup-img'>
		<?php if($link_popup){?>
		<a href='<?php echo $link_popup; ?>' target='<?php echo $target_popup; ?>'><img src="<?= Yii::getAlias('@test') ?>/images/popup/<?php echo $img_popup;?>" alt="popup"></a>
		<?php }else{ ?>
		<img src="<?= Yii::getAlias('@test') ?>/images/popup/<?php echo $img_popup;?>" alt="popup">
		<?php } ?>
		</div>
		<!-- Now this is the button which closes the popup-->
		
	</div>
	<script src="/js/jquery.min.js"></script>
		
	<script>
	$(document).ready(function () {
		//select the POPUP FRAME and show it
		$("#popup").hide().fadeIn(1000);
		/* setTimeout(function(){ 
			$("#popup").fadeOut("slow"); 
		  }, 5000 ); */

		//close the POPUP if the button with id="close" is clicked
		$("#close").on("click", function (e) {
			e.preventDefault();
			$("#popup").fadeOut(1000);
		});
		
		$("body").click(function(){
		  $("#popup").fadeOut().removeClass("active");
		});
		
	});
	</script>
	<?php
	$session = Yii::$app->session;
	$session->set('open','1');

 } ?>
