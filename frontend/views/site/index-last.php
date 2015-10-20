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

/* @var $this yii\web\View */
$this->title = '';
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
    <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
    <div class="fadeInLeft">
        <div id="da-slider" class="da-slider">

            <div class="da-slide">
                <h2>Selamat datang di Pelayanan Terpadu Satu Pintu</h2>
                <p>Rekan dan Solusi Bagi Permasalahan Perizinan Warga Jakarta</p>

                <div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/1.png" alt="image01" /></div>
            </div>
            <div class="da-slide">
                <h2>Peningkatan kualitas pelayanan profesional</h2>
                <p>Memberi kemudahan pengurusan perizinan di Provinsi DKI Jakarta</p>

                <div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/2.png" alt="image01" /></div>
            </div>

            <div class="da-slide">
                <h2>Pembinaan dan pengembangan aparatur PTSP </h2>
                <p>Mengedepankan pemanfaatan sistem informasi untuk mempercepat pelayanan</p>

                <div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/3.png" alt="image01" /></div>
            </div>

            <nav class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </nav>
        </div>
    </div>
    
    <section id="heading" class="container services animated fadeInRight">
        <div class="row">
            <div class="col-sm-4">
                <div class="menu-bulet-container">
                    <a href="<?= Yii::getAlias('@web') ?>/site/perizinan" alt="Lihar Perizinan"><i class="menu-bulet fa fa-paste features-icon"></i><h2>Perizinan</h2></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="menu-bulet-container">
                    <a href="<?= Yii::getAlias('@web') ?>/site/regulasi" alt="Lihar Regulasi"><i class="menu-bulet fa fa-book features-icon"></i><h2>Regulasi</h2></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="menu-bulet-container">
                    <a href="http://bptspdki.net/cariberkas/"><i class="menu-bulet fa fa-search features-icon"></i><h2>Lacak Perizinan</h2></a>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="container services">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins animated fadeInRight">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>

                    <div class="ibox-content">

                        <!--TENTANG-->      
                        <!--
                        <div class="col-lg-12 text-center">
                            <div class="navy-line"></div>
                            <h1>Tentang BPTSP & PTSP</h1>
                        </div>
                        
                        <p>Badan Pelayanan Terpadu Satu Pintu yang seianjutnya disingkat BPTSP 
                           adalah Satuan Kerja Perangkat Daerah yang menyelenggarakan Pelayanan Terpadu Satu Pintu </p>
    
                       <p>Pelayanan Terpadu Satu Pintu adalah kegiatan penyelenggaraan perizinan dan non perizinan yang 
                           proses pengelolaannya mulai dari tahap permohonan sampai ke tahap terbitnya dokumen dilakukan 
                           secara terpadu dengan sistem satu pintu di Provinsi Daerah Khusus Ibukota Jakarta. </p>
    
                       <h3>Tugas :</h3>
                       <p>Badan PTSP mempunyai tugas melaksanakan pembinaan, pengendalian, monitoring dan evaluasi penyelenggaraan 
                           PTSP oleh Kantor PTSP, Satuan Pelaksana (Satlak) PTSP Kecamatan dan Satlak PTSP Kelurahan serta pelayanan 
                           dan penandatanganan izin dan non izin serta dokumen administrasi yang menjadi kewenangannya.</p>
                        -->

                        <?php
                        $searchModel = new PageSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $rows_data = $dataProvider->getModels();
                        foreach ($rows_data as $value_data) {
                            ?>
                            <div id='<?php echo $value_data->page_title_seo; ?>'></div>
                            <br><br>
                            <div class="col-lg-12 text-center">
                                <div class="navy-line"></div>
                                <h1><?php echo $value_data->page_title; ?></h1>
                            </div>

                            <?php echo $value_data->page_description; ?>
                        <?php } ?>	
                        <!--VISI/ MISI-->


                        <!--FUNGSI-->
                        <div class="wrapper wrapper-content">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="navy-line"></div>
                                        <h1>FUNGSI</h1>
                                    </div>     
                                    <div class="col-lg-12">
                                        <div class="col-sm-6">
                                            <div class="ibox-content">

                                                <ul class="todo-list m-t small-list">
                                                    <?php foreach ($fungsiLeft as $value) { ?>
                                                        <li>
                                                            <i class="fa fa-check-square"></i> 
                                                            <span class="m-l-xs">
                                                                <?php echo $value->nama; ?>
                                                            </span>

                                                        </li>
                                                    <?php } ?>                                             
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-content">

                                                <ul class="todo-list m-t small-list">
                                                    <?php foreach ($fungsiRight as $value) { ?>
                                                        <li>
                                                            <i class="fa fa-check-square"></i> 
                                                            <span class="m-l-xs">
                                                                <?php echo $value->nama; ?>
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
            </div>

    </section>

    <section id="visimisi" class="container services">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>VISI / MISI</h1>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row"> 
                <div class="row"> 
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title-noborder-top">
                                <div class="menu-bulet-container">
                                    <a href="<?= Yii::getAlias('@web') ?>/site/perizinan" alt="Lihar Perizinan"><i class="fa fa-users fa-2x"></i></a>
                                </div>
                            </div>
                            <div class="ibox-conten-noborder-bottom">
                                <p class="text-center">Menjadi Rekan dan Solusi Bagi Permasalahan Perizinan Warga Jakarta</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title-noborder-top">
                                <div class="menu-bulet-container">
                                    <a href="<?= Yii::getAlias('@web') ?>/site/perizinan" alt="Lihar Perizinan"><i class="fa fa-puzzle-piece fa-2x"></i></a>
                                </div>
                            </div>
                            <div class="ibox-conten-noborder-bottom">
                                <p class="text-center">Melakukan pembinaan dan pengembangan aparatur PTSP sesuai kompetensi</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title-noborder-top">
                                <div class="menu-bulet-container">
                                    <a href="<?= Yii::getAlias('@web') ?>/site/perizinan" alt="Lihar Perizinan"><i class="fa fa-bell fa-2x"></i></a>
                                </div>
                            </div>
                            <div class="ibox-conten-noborder-bottom">
                                <p class="text-center">Meningkatkan kualitas pelayanan perizinan/non perizinan secara profesional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row"> 
                <div class="row"> 
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins animated fadeInRight">
                            <div class="ibox-title-noborder-top">
                                <div class="menu-bulet-container">
                                    <a href="<?= Yii::getAlias('@web') ?>/site/perizinan" alt="Lihar Perizinan"><i class="fa fa-desktop fa-2x"></i></a>
                                </div>
                            </div>
                            <div class="ibox-conten-noborder-bottom">
                                <p class="text-center">Mengedepankan pemanfaatan sistem informasi untuk mempercepat pelayanan</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title-noborder-top">
                                <div class="menu-bulet-container">
                                    <a href="<?= Yii::getAlias('@web') ?>/site/perizinan" alt="Lihar Perizinan"><i class="fa fa-dropbox fa-2x"></i></a>
                                </div>
                            </div>
                            <div class="ibox-conten-noborder-bottom">
                                <p class="text-center">Mengelola pengaduan masyarakat dengan berbasis quick response</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title-noborder-top">
                                <div class="menu-bulet-container">
                                    <a href="<?= Yii::getAlias('@web') ?>/site/perizinan" alt="Lihar Perizinan"><i class="fa fa-cogs fa-2x"></i></a>
                                </div>
                            </div>
                            <div class="ibox-conten-noborder-bottom">
                                <p class="text-center">Menyediakan prasarana dan sarana kerja yang memadai dan handal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MANFAAT -->
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="navy-line"></div>
                        <h1>MANFAAT</h1>
                    </div>     
                    <div class="row animated fadeInRight">
                        <div class="col-md-3 text-center wow fadeInLeft">
                            <div>
                                <i class="fa fa-clock-o features-icon"></i>
                                <h3>Mendapatkan kepastian waktu dan biaya</h3>
                            </div>
                            <div class="m-t-lg">
                                <i class="fa fa-files-o features-icon"></i>
                                <h3>Mendapatkan kemudahan dalam proses pembuatan Izin</h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-center  wow zoomIn">
                            <img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/izin1.png" class="img-responsive" alt="PTSP DKI"/>
                        </div>
                        <div class="col-md-3 text-center wow fadeInRight">
                            <div>
                                <i class="fa fa-legal features-icon"></i>
                                <h3>Mendapatkan legalitas sehingga memperluas akses terhadap sumber saya lain dari sektor formal</h3>
                            </div>
                            <div class="m-t-lg">
                                <i class="fa fa-line-chart features-icon"></i>
                                <h3>Produktifitas & Kontibusi terhadap PAD</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>    

    <section id="berita" class="container services">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Berita</h1>
            </div>

            <?php foreach ($beritaUtama as $value) { ?>

                <div class="col-md-3">
                    <div class="ibox float-e-margins animated fadeInRight">           
                        <div>
                            <div class="ibox-content no-padding border-left-right frame-square">
                                <?php if ($value->gambar) { ?>
                                    <img class="retina crop img-responsive" src="<?= Yii::getAlias('@test') ?>/images/news/<?= $value->gambar ?>" alt="<?php echo $value->judul; ?>">
                                <?php } else { ?>
                                    <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/images/no-image.png">
                                <?php } ?>
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $value->judul; ?></strong></h4>
                                <p><i class="fa fa-calendar"></i> Update 
                                    <?php
                                    $pecah = explode('-', $value->tanggal);
                                    $bln = $pecah[2];
                                    $thn = $pecah[0];
                                    echo"$bln/$thn";
                                    ?></p>

                                <p style="min-height:150px;">
                                    <?php
                                    $text = strip_tags($value->isi_berita);
                                    $text = ucfirst(strtolower(mb_substr($text, 0, 200)));
                                    echo"$text...";
                                    ?>
                                </p>

                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= Html::a('Selengkapnya <i class="fa fa-arrow-right"></i>', ['/site/detailnews', 'id' => $value->judul_seo], ['class' => 'btn btn-primary btn-sm btn-block']) ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <div class="row ">

            <div class="col-md-6 animated fadeInRight">
                <ul class="sortable-list connectList agile-list">
                    <?php foreach ($beritaListLeft as $value) { ?>
                        <li class="warning-element">
                            <?= Html::a($value->judul, ['/site/detailnews', 'id' => $value->judul_seo]) ?>
                            <div class="agile-detail">
                                <?= Html::a('Selengkapnya', ['/site/detailnews', 'id' => $value->judul_seo], ['class' => 'pull-right btn btn-xs btn-white']) ?>
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
            <div class="col-md-6 animated fadeInRight">
                <ul class="sortable-list connectList agile-list">
                    <?php foreach ($beritaListRight as $value) { ?>
                        <li class="warning-element">
                            <?= Html::a($value->judul, ['/site/detailnews', 'id' => $value->judul_seo]) ?>
                            <div class="agile-detail">
                                <?= Html::a('Selengkapnya', ['/site/detailnews', 'id' => $value->judul_seo], ['class' => 'pull-right btn btn-xs btn-white']) ?>
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
                    <h2>Konten beritajakarta.com</h2>
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
                                            <a href="<?php echo $data[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'>Selengkapnya <i class="fa fa-arrow-right"></i></a>
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
                                            <a href="<?php echo $data2[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'>Selengkapnya <i class="fa fa-arrow-right"></i></a>
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
                                            <a href="<?php echo $data3[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'>Selengkapnya <i class="fa fa-arrow-right"></i></a>
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
                                            <a href="<?php echo $data4[0]['news_url']; ?>" class="btn btn-primary btn-sm btn-block"target='blank'>Selengkapnya <i class="fa fa-arrow-right"></i></a>
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
        <div class="col-lg-12 text-center" >
            <div class="navy-line"></div>
            <h1>Lokasi</h1>
        </div>
    </div>
    <div class="map_wraper">
    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d1667.7610644048543!2d106.82835678139917!3d-6.180700490703257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e69f42de6a308e5%3A0xf9321b0368a6ad42!2sKantor+Pemprov+DKI+Jakarta%2C+Jl.+Medan+Merdeka+Selatan+No.+8-9+Blok+F+Lt+1%2C+Gambir%2C+Daerah+Khusus+Ibukota+Jakarta+10110%2C+Indonesia!3m2!1d-6.1810129!2d106.82849549999999!5e0!3m2!1sen!2sid!4v1442586135893" width="1360" height="300" frameborder="0" style="border:0"></iframe>
    </iframe>
    </div>

</section>

 </div>
        <script>
            
            </script>