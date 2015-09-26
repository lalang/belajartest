<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 

/* @var $this yii\web\View */
//$this->context->layout = 'main-no-landing';
?>
<div class='main-title-page'><h1>Berita</h1></div>

<div class="row">
    <?php foreach ($models as $value): 
            $get_date = explode('-',$value->tanggal);
            $tgl = $get_date[2];
            $bulan = bulan($get_date[1]);
            $tahun = $get_date[0]; 
    ?> 
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">

                <div class="product-ibox-content no-padding border-left-right">
                    
                    <?php if($value->gambar){?>
                        <img src="<?= Yii::getAlias('@web') ?>/images/news/<?= $value->gambar ?>" alt="Image not found" onError="this.onerror=null;this.src='<?= Yii::getAlias('@web') ?>/assets/inspinia/img/no-image.png';" style="height:200px; width:100%;"/>   
                        <!--<img class="" src="<?= Yii::getAlias('@web') ?>/images/news/<?= $value->gambar ?>" style="height:200px; width:100%;">-->
                    
                    <?php } ?>
                </div>
                
                <div class="product-desc">
                    <span class="product-price">
                        <i class="fa fa-calendar fa-lg"></i> <?= $value->hari ?>, 	<?php echo"$tgl $bulan $tahun"; ?>
                    </span>

                    <a href="#" class="product-name"><a href="<?= Url::to('detailnews/?id='.$value->judul_seo)?>"><h3 class='title-news'><?= $value->judul ?></h3></a>	</a>


                    <div class="small m-t-xs">
                       <?php 
                    $text = strip_tags($value->isi_berita);
                    $text = substr($text,0,300);
                    echo"$text...";
            ?>
                    </div>
                    <div class="m-t text-righ">

                        <a href="<?= Url::to('detailnews/?id='.$value->judul_seo)?>" class="btn btn-info"><i class="fa fa-search"></i> Selengkapnya</a>
                    </div>
                </div>
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
?>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
