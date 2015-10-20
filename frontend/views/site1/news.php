<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 

/* @var $this yii\web\View */
?>
<div class='main-title-page'><h1>Berita</h1></div>

<div class="row">
<?php foreach ($models as $value): 
	$get_date = explode('-',$value->tanggal);
	$tgl = $get_date[2];
	$bulan = bulan($get_date[1]);
	$tahun = $get_date[0]; 
?> 
	<div class="col-sm-4">
		<?php if($value->gambar){?>
			<div class="img-news">	
			<img class="" src="<?= Yii::getAlias('@web') ?>/images/news/<?= $value->gambar ?>" style="height:200px; width:100%;">
			
			</div>
		<?php } ?>
		<div class="contain-news">
			<i class="fa fa-calendar fa-lg"></i> <?= $value->hari ?>, 	<?php echo"$tgl $bulan $tahun"; ?>
			<a href="<?= Yii::$app->getUrlManager()->createUrl('detailnews/?id='.$value->judul_seo)?>"><h3 class='title-news'><?= $value->judul ?></h3></a>			
			<?php 
				$text = strip_tags($value->isi_berita);
				$text = substr($text,0,300);
				echo"$text...";
			?>
			<p><a href="<?= Yii::$app->getUrlManager()->createUrl('detailnews/?id='.$value->judul_seo)?>" class="btn btn-info"><i class="fa fa-search"></i> Detail</a></p>
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
?>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
