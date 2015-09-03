<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\widgets\ListViewHome;
use yii\helpers\ArrayHelper;
use backend\models\Bidang;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = '';
?>  

<div style="margin:-90px -20px;">

<div class="fadeInLeft">
        <div id="da-slider" class="da-slider">
                
                <div class="da-slide">
                        <h2>Selamat datang di Pelayanan Terpadu Satu Pintu</h2>
                        <p>Meningkatkan kualitas pelayanan perizinan/non perizinan secara profesional.</p>
                      
                        <div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/1.png" alt="image01" /></div>
                </div>
                <div class="da-slide">
                        <h2>Solusi Perizinan Warga Jakarta</h2>
                        <p>Memberi kemudahan pengurusan perizinan di Provinsi DKI Jakarta.</p>
                       
                        <div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/2.png" alt="image01" /></div>
                </div>
                <nav class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                </nav>
        </div>
</div>
<!--<div id="inSlider" class="carousel carousel-fade" data-ride="carousel" >
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Selamat datang di Pelayanan Terpadu Satu Pintu</h1>
                    <h2>DKI Jakarta</h2>
                    <p>
                        <a class="btn btn-lg btn-primary page-scroll" href="#tentang" role="button">Lihat</a>
                    
                    </p>
                </div>
               
            </div>
          
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption">
                    <h1>"Solusi Perizinan Warga Jakarta"</h1>
                    <h2>Memberi kemudahan pengurusan perizinan di Provinsi DKI Jakarta</h2>
                    <p><a class="btn btn-lg btn-primary page-scroll" href="#visimisi" role="button">Lihat</a></p>
                </div>
            </div>
           
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>-->


<section id="features" class="container services">
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
         <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Tentang BPTSP & PTSP</h1>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                     <p>Badan Pelayanan Terpadu Satu Pintu yang seianjutnya disingkat BPTSP 
                        adalah Satuan Kerja Perangkat Daerah yang menyelenggarakan Pelayanan Terpadu Satu Pintu </p>

                    <p>Pelayanan Terpadu Satu Pintu adalah kegiatan penyelenggaraan perizinan dan non perizinan yang 
                        proses pengelolaannya mulai dari tahap permohonan sampai ke tahap terbitnya dokumen dilakukan 
                        secara terpadu dengan sistem satu pintu di Provinsi Daerah Khusus Ibukota Jakarta. </p>

                    <h3>Tugas :</h3>
                    <p>Badan PTSP mempunyai tugas melaksanakan pembinaan, pengendalian, monitoring dan evaluasi penyelenggaraan 
                        PTSP oleh Kantor PTSP, Satuan Pelaksana (Satlak) PTSP Kecamatan dan Satlak PTSP Kelurahan serta pelayanan 
                        dan penandatanganan izin dan non izin serta dokumen administrasi yang menjadi kewenangannya.</p>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="visimisi" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Visi / Misi</h1>
                <h2>Menjadi Rekan dan Solusi Bagi Permasalahan Perizinan Warga Jakarta.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/avatar3.jpg" class="img-responsive img-circle img-small" alt="">
                    <p>Melakukan pembinaan dan pengembangan aparatur PTSP sesuai kompetensi. </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/avatar1.jpg" class="img-responsive img-circle" alt="">
                    <p>Meningkatkan kualitas pelayanan perizinan/non perizinan secara profesional.</p>
                </div>
            </div>
            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/avatar2.jpg" class="img-responsive img-circle img-small" alt="">
                    <p>Mengedepankan pemanfaatan sistem informasi untuk mempercepat pelayanan.</p>
                </div>
            </div>
           
        </div>
        <div class="row">
             <div class="col-sm-5 wow fadeInLeft">
                <div class="team-member">
                      <img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/avatar4.jpg" class="img-responsive img-circle img-small" alt="">
                    <p>Mengelola pengaduan masyarakat dengan berbasis quick response. </p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="team-member wow zoomIn">
                    <p>&nbsp;</p>
                </div>
            </div>
            <div class="col-sm-5 wow fadeInRight">
                <div class="team-member">
                    <img src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/landing/avatar5.jpg" class="img-responsive img-circle img-small" alt="">
                    <p>Menyediakan prasarana dan sarana kerja yang memadai dan handal.</p>
                </div>
            </div>
           
        </div>
     
    </div>
</section>

<section id="fungsi" class="container services">
    <div class="row">
        <div class="col-lg-12">
            <h2>Fungsi</h2>
            <div class="col-sm-6">
                <div class="ibox-content">

                    <ul class="todo-list m-t small-list">
                        <li>
                            <i class="fa fa-check-square"></i> 
                            <span class="m-l-xs">
                            Perumusan kebijakan teknis penyelenggaraan PTSP sesuai dengan ketentuan peraturan perundang-undangan</span>

                        </li>
                        <li>
                            <i class="fa fa-check-square"></i> 
                            <span class="m-l-xs">
                            Pembinaan, pengendalian, monitoring dan evaluasi pelayanan perizinan dan non perizinan serta dokumen administrasi oleh Kantor PTSP, Satlak PTSP Kecamatan dan Satlak PTSP Kelurahan</span>
                        </li>
                        <li>
                           <i class="fa fa-check-square"></i> 
                           <span class="m-l-xs">Penerimaan berkas permohonan perizinan dan non perizinan serta dokumen administrasi sesuai kewenangannya</span>
                        </li>
                        <li>
                           <i class="fa fa-check-square"></i> 
                            <span class="m-l-xs">
                            Penelitian/pemeriksaan berkas permohonan perizinan dan non perizinan serta dokumen administrasi sesuai kewenangannya</span>
                        </li>
                        <li>
                           <i class="fa fa-check-square"></i> 
                            <span class="m-l-xs">
                            Pelaksanaan penelitian teknis/pengujian fisik permohonan perizinan dan non perizinan serla dokumen administrasi sesuai kewenangannya</span>
                        </li>
                         <li>
                           <i class="fa fa-check-square"></i> 
                            <span class="m-l-xs">Penandatanganan dokumen izin, non izin dan administrasi sesuai kewenangannya</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                    <div class="ibox-content">

                        <ul class="todo-list m-t small-list">
                            <li>
                               <i class="fa fa-check-square"></i> 
                               <span class="m-l-xs">Penyerahan dokumen izin, non izin dan administrasi sesuai kewenangannya</span>
                            </li>
                            <li>
                              <i class="fa fa-check-square"></i> 
                              <span class="m-l-xs">
                              Pengelolaan arsip dokumen izin, non izin dan administrasi sesuai kewenangannya</span>
                            </li>
                            <li>
                              <i class="fa fa-check-square"></i> 
                              <span class="m-l-xs">Penetapan dan pemberian sanksi terhadap penyalahgunaan izin dan non izin serta dokumen administrasi sesuai kewenangannya</span>
                            </li>
                            <li>
                              <i class="fa fa-check-square"></i> 
                              <span class="m-l-xs">Pengelolaan sistem teknologi informasi penyelenggaraan PTSP</span>
                            </li>
                            <li>
                              <i class="fa fa-check-square"></i> 
                              <span class="m-l-xs">Pelayanan, pemprosesan dan penyelesaian pengaduan/keluhan atas penyelenggaraan PTSP</span>
                            </li>
                            <li>
                              <i class="fa fa-check-square"></i> 
                              <span class="m-l-xs">Pelayanan dan penyelesaian pengaduan/keluhan atas pelayanan di Kantor PTSP serta pengaduan/keluhan atas pelayanan 
                              Satlak PTSP Kecamatan dan Satlak PTSP Kelurahan yang tidak dapat diselesaikan oleh Kantor PTSP</span>
                            </li>
                            <li>
                               <i class="fa fa-check-square"></i> 
                               <span class="m-l-xs">Pencatatan, pembukuan dan pelaporan retribusi pelayanan penyelenggaraan PTSP</span>
                            </li> 

                        </ul>
                    </div>
            </div>
        
        </div>
    </div>
</section>

<section id="manfaat" class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Manfaat</h1>
        </div>
    </div>
    <div class="row">
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
</section>

<section id="berita" class="container services">
     <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Berita</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Berita</h5>
            </div>
            <div>
                <div class="ibox-content no-padding border-left-right">
                    <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/no-image.png">
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>Judul berita</strong></h4>
                    <p><small>14 Junli 2015</small></p>
                    
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                    </p>
                    
                    <div class="user-button">
                        <div class="row">
                           
                                <button type="button" class="btn btn-primary btn-sm btn-block">Selengkapnya</button>
                           
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <div class="col-md-3">
       <div class="ibox float-e-margins">
           <div class="ibox-title">
               <h5>Berita</h5>
           </div>
           <div>
               <div class="ibox-content no-padding border-left-right">
                   <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/no-image.png">
               </div>
               <div class="ibox-content profile-content">
                   <h4><strong>Judul berita</strong></h4>
                   <p><small>14 Junli 2015</small></p>

                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                   </p>

                   <div class="user-button">
                       <div class="row">

                               <button type="button" class="btn btn-primary btn-sm btn-block">Selengkapnya</button>

                       </div>
                   </div>
               </div>
       </div>
    </div>
    </div>
    <div class="col-md-3">
       <div class="ibox float-e-margins">
           <div class="ibox-title">
               <h5>Berita</h5>
           </div>
           <div>
               <div class="ibox-content no-padding border-left-right">
                   <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/no-image.png">
               </div>
               <div class="ibox-content profile-content">
                   <h4><strong>Judul berita</strong></h4>
                   <p><small>14 Junli 2015</small></p>

                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                   </p>

                   <div class="user-button">
                       <div class="row">

                               <button type="button" class="btn btn-primary btn-sm btn-block">Selengkapnya</button>

                       </div>
                   </div>
               </div>
       </div>
    </div>
    </div>
    <div class="col-md-3">
       <div class="ibox float-e-margins">
           <div class="ibox-title">
               <h5>Berita</h5>
           </div>
           <div>
               <div class="ibox-content no-padding border-left-right">
                   <img alt="image" class="img-responsive" src="<?= Yii::getAlias('@web') ?>/assets/inspinia/img/no-image.png">
               </div>
               <div class="ibox-content profile-content">
                   <h4><strong>Judul berita</strong></h4>
                   <p><small>14 Junli 2015</small></p>

                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                   </p>

                   <div class="user-button">
                       <div class="row">

                               <button type="button" class="btn btn-primary btn-sm btn-block">Selengkapnya</button>

                       </div>
                   </div>
               </div>
       </div>
    </div>
    </div>

</section>

<section id="berita" class="gray-section team">
     <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Lokasi kami</h1>
        </div>
    </div>
     <div class="row">
<!--        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!
        1d3966.6243055548966!2d106.82849549999999!3d-6.181012899999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!
        1s0x2e69f42de6a308e5%3A0xf9321b0368a6ad42!2sKantor+Pemprov+DKI+Jakarta!5e0!3m2!1sen!2sid!4v1441048095280" width="100%" height="300" 
        frameborder="0" style="border:0" allowfullscreen></iframe>-->
    </div>

</section>
    
</div>