<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 

/* @var $this yii\web\View */
//$this->context->layout = 'main-no-landing';
?>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
?>
<div class='main-title-page'><h2><strong><?php echo Yii::t('frontend','Berita'); ?></strong></h2></div>

<div class="ibox float-e-margins">
        <div class="ibox-title">
            <a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-backward"></i> Kembali Ke Dashboard</a>
             
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
        <div class="ibox-content">

			<div class="row">
				<?php foreach ($models as $value): 
						
						if($language=="en"){ 
							$judul_seo = $value->judul_seo_en;
							$judul_berita = $value->judul_en;
							$isi_berita = $value->isi_berita_en;
							
							$hari = days($value->hari);
							$get_date = explode('-',$value->tanggal);
							$tgl = $get_date[2];
							$bulan = months($get_date[1]);
							$tahun = $get_date[0]; 
							
						}else{
							$judul_seo = $value->judul_seo;
							$judul_berita = $value->judul;
							$isi_berita = $value->isi_berita;
							
							$hari = $value->hari;
							$get_date = explode('-',$value->tanggal);
							$tgl = $get_date[2];
							$bulan = bulan($get_date[1]);
							$tahun = $get_date[0]; 
						}
				?> 
				<div class="col-md-3">
					<div class="ibox">
						<div class="ibox-content product-box" style='height: 450px;'>

							<div class="product-ibox-content no-padding border-left-right">
								
								<?php if($value->gambar){?>
									<img src="<?= Yii::getAlias('@test') ?>/images/news/<?= $value->gambar ?>" alt="Image not found" style="height:200px; width:100%;"/>
								<?php }else{ ?>
									<img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/images/no-image.png">
								<?php } ?>
							</div>
							
							<div class="product-desc">
								<span class="product-price">
									<i class="fa fa-calendar fa-lg"></i> <?php echo $hari; ?>, 	<?php echo"$tgl $bulan $tahun"; ?>
								</span>
								<?= Html::a('<h3 class="title-news">'.$judul_berita.'</h3>', ['/site/detailnews', 'id'=>$judul_seo]) ?>
								


								<div class="small m-t-xs">
								   <?php 
								$text = strip_tags($isi_berita);
								$text = substr($text,0,300);
								echo"$text...";
						?>
								</div>
								
							</div>
						</div>	
						<div class="m-t text-righ">
							<?= Html::a(Yii::t('frontend','Selengkapnya').' <i class="fa fa-search"></i>', ['/site/detailnews', 'id'=>$value->judul_seo], ['class'=>'btn btn-primary btn-sm btn-block']) ?>
						</div>	
					</div>					
				</div>


			<?php endforeach; 

			function bulan($bulan){
				if($bulan=="01"){$bulan = "Januari";}else
				if($bulan=="02"){$bulan = "Februari";}else
				if($bulan=="03"){$bulan = "Maret";}else
				if($bulan=="04"){$bulan = "April";}else
				if($bulan=="05"){$bulan = "Mei";}else
				if($bulan=="06"){$bulan = "Juni";}else
				if($bulan=="07"){$bulan = "Juli";}else
				if($bulan=="08"){$bulan = "Agustus";}else
				if($bulan=="09"){$bulan = "September";}else
				if($bulan=="10"){$bulan = "Oktober";}else
				if($bulan=="11"){$bulan = "November";}else
				{$bulan = "Desember";}

				return $bulan;
			}    
			
			function months($month){
				if($month=="01"){$month = "January";}else
				if($month=="02"){$month = "February";}else
				if($month=="03"){$month = "March";}else
				if($month=="04"){$month = "April";}else
				if($month=="05"){$month = "Mey";}else
				if($month=="06"){$month = "Juny";}else
				if($month=="07"){$month = "July";}else
				if($month=="08"){$month = "August";}else
				if($month=="09"){$month = "September";}else
				if($month=="10"){$month = "October";}else
				if($month=="11"){$month = "November";}else
				{$month = "December";}

				return $month;
			}    
			
			function days($day){
				if($day=="Senen"){$day = "Monday";}else
				if($day=="Selasa"){$day = "Tuesday";}else
				if($day=="Rabu"){$day = "Wednesday";}else
				if($day=="Kamis"){$day = "Thursday";}else
				if($day=="Jumat"){$day = "Friday";}else
				if($day=="Sabtu"){$day = "Saturday";}else
				{$day = "Sunday";}

				return $day;
			}    
			?>
			</div>

			<?= LinkPager::widget(['pagination' => $pagination]) ?>

		</div>
    </div>
</div>
