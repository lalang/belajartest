<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 

?>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); ?>
<div class="wrapper wrapper-content animated fadeInRight">

	<div class='main-title-page'><h2><strong><?php echo Yii::t('frontend','Berita'); ?></strong></h2></div>

	<div class="ibox float-e-margins">
			<div class="ibox-title">
				 <?= Html::a('<i class="fa fa-backward"></i> '.Yii::t('frontend','Kembali'), ['/site/news'],['class'=>'']) ?> 
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>

				</div>
			</div>
			<div class="ibox-content">

				<?php
					foreach ($rows as $value){ 
					
					if($language=="en"){ 
						$judul_seo = $value['judul_seo_en'];
						$judul_berita =$value['judul_en'];
						$isi_berita = $value['isi_berita_en'];
						
						$hari = days($value['hari']);
						$get_date = explode('-',$value['tanggal']);
						$tgl = $get_date[2];
						$bulan = months($get_date[1]);
						$tahun = $get_date[0]; 
						
					}else{
						$judul_seo = $value['judul_seo'];
						$judul_berita = $value['judul'];
						$isi_berita = $value['isi_berita'];
						
						$hari = $value['hari'];
						$get_date = explode('-',$value['tanggal']);
						$tgl = $get_date[2];
						$bulan = bulan($get_date[1]);
						$tahun = $get_date[0];  
					}
						
				?>	

			<div class="wrapper wrapper-content animated fadeInRight">

				<div class='main-title-page'><h3><?php echo $judul_berita; ?></h3></div>

					<div class="panel">
						<p><i class="fa fa-calendar fa-lg"></i> <?php echo $hari; ?>, 	<?php echo"$tgl $bulan $tahun"; ?></p>
					</div>

					<?php if($value['gambar']){?>
						<img class="" src="<?= Yii::getAlias('@test') ?>/images/news/<?php echo $value['gambar'];?>" style='float:left; margin: 0px 5px 5px 0px;'>
						
					<?php } ?>
						
					<?php 
						echo $isi_berita;
					?>				
				<?php
				}
				?>
				<?php
					function bulan($bulan)
					{
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

			</div>
		</div>
	</div>

</div>
