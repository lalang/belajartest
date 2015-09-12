<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 

/* @var $this yii\web\View */
$this->context->layout = 'main-no-landing';
?>

<?php
	foreach ($rows as $value){ 

	$get_date = explode('-',$value['tanggal']);
	$tgl = $get_date[2];
	$bulan = bulan($get_date[1]);
	$tahun = $get_date[0]; 		
?>	

<div class="wrapper wrapper-content animated fadeInRight">

<div class='main-title-page'><h3><?= Html::encode($this->title) ?></h3></div>


    
    <div class="panel">
        <p><i class="fa fa-calendar fa-lg"></i> <?php echo $value['hari']; ?>, 	<?php echo"$tgl $bulan $tahun"; ?></p>
    </div>

	<?php if($value['gambar']){?>
		<img class="" src="<?= Yii::getAlias('@web') ?>/images/news/<?php echo $value['gambar'];?>" style='float:left; margin: 0px 5px 5px 0px;'>
	<?php } ?>
		
	<?php 
		echo $value['isi_berita'];
	?>	
				
<?php
}
?>
<p><a href="<?= Url::to('/site/news')?>" class="btn btn-info"><i class="fa fa-backward"></i>
 Kembali</a></p>

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
?>
</div>