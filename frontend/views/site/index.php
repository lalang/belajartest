<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\widgets\ListViewHome;
use yii\helpers\ArrayHelper;
use backend\models\Bidang;
use yii\helpers\Url;
use frontend\models\Berita;
use backend\models\PageSearch;
use yii\web\CookieCollection;
/* @var $this yii\web\View */
?>  

<style>
    label{
        font-size:13px;
        color:#efefef;
    }
    .ibox-content h4 {min-height:45px}
    .konten-berita {min-height:220px;}
</style>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
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
				<img src="<?= Yii::getAlias('@test') ?>/images/slider/<?php echo $value->image ?>" width="100%"/>
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
	<div class='katalog'>
		<section id="heading" class="container services">
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
			
				<div class="col-sm-4">
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
				<div class="container">
					
                        <?php
                        $searchModel = new PageSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $rows_data = $dataProvider->getModels();
                        foreach ($rows_data as $value_data) {
						
							if($language=="en"){ 
								$v_page_title_seo = $value_data->page_title_seo_en;
								$v_page_title = $value_data->page_title_en;
								$v_page_description = $value_data->page_description_en;
							}else{
								$v_page_title_seo = $value_data->page_title_seo;
								$v_page_title = $value_data->page_title;
								$v_page_description = $value_data->page_description;
							}

                            ?>
                            <div id='<?php echo $v_page_title_seo; ?>'></div> 
                
                            <div class="col-lg-12 text-center">
                                <div class="navy-line"></div>
                                <h1><?php echo $v_page_title; ?></h1>
                            </div>

                            <?php echo $v_page_description; ?>
                        <?php } ?>	
                     
	
		
                        <!--FUNGSI-->
                        <div class="wrapper wrapper-content">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="navy-line"></div>
                                        <h1><?php echo Yii::t('frontend','FUNGSI'); ?></h1>
                                    </div>     
                                    <div class="col-lg-12">
                                        <div class="col-sm-6">
                                            <div class="ibox-content">

                                                <ul class="todo-list m-t small-list">
                                                    <?php foreach ($fungsiLeft as $value) { 
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
                                                    <?php foreach ($fungsiRight as $value) { 
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
                        </div>

				</div>
            </div>

    </section>

    <section id="visimisi" class="container services">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?php echo Yii::t('frontend','VISI / MISI'); ?></h1>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row"> 
                <div class="row"> 
				
				<?php foreach ($data_visi_misi as $value) { 
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
                                    <a href="<?php echo $link; ?>" target="<?php echo $value->target; ?>"><i class="<?php echo $value->icon; ?> fa-2x"></i></a>
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
        </div>
        <!-- MANFAAT -->
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="navy-line"></div>
                        <h1><?php echo Yii::t('frontend','MANFAAT'); ?></h1>
                    </div>     
                    <div class="row">
                        <div class="col-md-3 text-center wow fadeInLeft">
						
						<?php foreach ($data_manfaat_left as $value) { 
							if($language=="en"){ 
								$info = $value->info_en;
								$link=$value->link_en;
							}else{
								$info = $value->info;
								$link=$value->link;
							}
						?>
                            <div>
								<a href="<?php echo $link; ?>" target="<?php echo $value->target; ?>"><i class="<?php echo $value->icon; ?> fa-3x"></i></a>
                                <h3><?php echo $info; ?></h3>
                            </div>
						<?php } ?>	                            
                        </div>
                        <div class="col-md-6 text-center  wow zoomIn">
                            <img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/izin1.png" class="img-responsive" alt="PTSP DKI"/>
                        </div>
                        <div class="col-md-3 text-center wow fadeInRight">
							<?php foreach ($data_manfaat_right as $value) { 
							if($language=="en"){ 
								$info = $value->info_en;
								$link=$value->link_en;
							}else{
								$info = $value->info;
								$link=$value->link;
							}
							?>
                            <div>
								<a href="<?php echo $link; ?>" target="<?php echo $value->target; ?>"><i class="<?php echo $value->icon; ?> fa-3x"></i></a>
                                <h3><?php echo $info; ?></h3>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>    

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
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $judul_berita; ?></strong></h4>
                                <p><i class="fa fa-calendar"></i> Update 
                                    <?php
                                    $pecah = explode('-', $value->tanggal);
                                    $bln = $pecah[2];
                                    $thn = $pecah[0];
                                    echo"$bln/$thn";
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

    <?php
//$data = json_decode($response, true);
//$ekonomi = $data['ekonomi'];
    /* foreach ($ekonomi as $val) {
      echo $val['news_title'] . '<br>';
      } */
    $data = Berita::getBerita('ekonomi');
    $data2 = Berita::getBerita('pemerintahan');
    $data3 = Berita::getBerita('pembangunan');
    $data4 = Berita::getBerita('kesra');
//foreach ($data as $val) {
    //echo $val['news_title'] . '<br>';
//}
    /*
      $title_berita1 = $data[0]['news_title'];
      $title_berita2 = $data[1]['news_title'];
      $title_berita3 = $data[2]['news_title'];
      $title_berita4 = $data[3]['news_title']; */
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
                                    Update <?php
                                    $pecah = explode(' ', $data[0]['news_date']);
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$bln/$thn";
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
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$bln/$thn";
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
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$bln/$thn";
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
                                    $bln = $pecah[1];
                                    $thn = $pecah[2];
                                    echo"$bln/$thn";
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

<section id="lokasi" class="">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?= Yii::t('frontend','Lokasi') ?></h1>
        </div>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!
            1d3966.6243055548966!2d106.82849549999999!3d-6.181012899999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!
            1s0x2e69f42de6a308e5%3A0xf9321b0368a6ad42!2sKantor+Pemprov+DKI+Jakarta!5e0!3m2!1sen!2sid!4v1441048095280" width="100%" height="300" 
            frameborder="0" style="border:0" allowfullscreen>
    </iframe>

</section>

 </div>