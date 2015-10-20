<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\widgets\ListViewHome;
use yii\helpers\ArrayHelper;
use backend\models\Bidang;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>   
 
<style>

    
</style>
<div class="row">
    <div class="col-md-12 index-1">
       
               <h2 style="margin-bottom:30px;"">Selamat datang di Layanan Pusat Terpadu Satu Pintu DKI Jakarta</h2>
                <div class="col-md-4 col-sm-3 col-xs-6 text-center">
                    
                        <a href="<?= Url::to('site/perizinan')?>">
                        <i class="fa fa-files-o fa-5x bg-icon"></i>
                        <p>Perizinan</p>
                        </a>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6 text-center">
                         <a href="<?= Url::to('site/regulasi')?>">
                         <i class="fa fa-map-signs fa-5x bg-icon"></i>
                        <p>Regulasi</p>
                        </a>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6 text-center">
                        <a href="http://bptspdki.net/cariberkas/" target="_blank"><i class="fa fa-search fa-5x bg-icon"></i>
                        <p>Lacak Perizinan</p>
                        </a>
                </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 panel index-2">	
         <h2 style="color:#ffffff;">"Solusi Perizinan Warga Jakarta"</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12 panel index-3">
        <div class="row panel panel-primary blog-list-slider rounded shadow" style="background-color:rgba(255,255,255,0.6);min-height:400px;">
            <div class="panel-heading">
                <h3 class="panel-title">TENTANG BPTSP & PTSP</h3>
            </div><!-- /.panel-heading -->
            <div id="carousel-blog-list" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-blog-list" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-blog-list" data-slide-to="1"></li>
                    <li data-target="#carousel-blog-list" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="blog-list">
                            <div class="col-md-9">
                                <div class="media">
                                    <div class="media-body">
                                        <p><strong>Badan Pelayanan Terpadu Satu Pintu</strong>&nbsp;yang seianjutnya disingkat BPTSP adalah Satuan Kerja Perangkat Daerah yang menyelenggarakan Pelayanan Terpadu Satu Pintu</p>
                                    </div><!-- /.media-body -->
                                </div><!-- /.media -->
                                <div class="media">
                                    <div class="media-body">
                                       <p><strong>Pelayanan Terpadu Satu Pintu</strong>&nbsp;adalah kegiatan penyelenggaraan perizinan dan non perizinan yang proses pengelolaannya mulai dari tahap permohonan sampai ke tahap terbitnya dokumen dilakukan secara terpadu dengan sistem satu pintu di Provinsi Daerah Khusus Ibukota Jakarta</p>
                                    </div><!-- /.media-body -->
                                </div><!-- /.media -->
                                <div class="media">

                                    <div class="media-body">
                                        <p><strong>Tugas :</strong></p>
                                        <p>Badan PTSP mempunyai tugas melaksanakan pembinaan, pengendalian, monitoring dan evaluasi penyelenggaraan PTSP oleh Kantor PTSP, Satuan Pelaksana (Satlak) PTSP Kecamatan dan Satlak PTSP Kelurahan serta pelayanan dan penandatanganan izin dan non izin serta dokumen administrasi yang menjadi kewenangannya.</p>
                                    </div><!-- /.media-body -->
                                </div><!-- /.media -->
                            </div>
                            
                            <div class="col-md-3">
                                <img class="slider-pic" style="width:300px" src="<?= Yii::getAlias('@web') ?>/images/news/3online.jpg">
                            </div>
                       
                        </div><!-- /.blog-list -->
                    </div><!-- /.item -->

                    <div class="item">
                        <div class="blog-list">
                            <div class="col-md-9">
                                <div class="media">
                                    <div class="media-body">
                                        <p><strong>Fungsi :</strong></p>
                                        <li>Perumusan kebijakan teknis penyelenggaraan PTSP sesuai dengan ketentuan peraturan perundang-undangan;</li>
                                        <li>Pembinaan, pengendalian, monitoring dan evaluasi pelayanan perizinan dan non perizinan serta dokumen administrasi oleh Kantor PTSP, Satlak PTSP Kecamatan dan Satlak PTSP Kelurahan;</li>
                                        <li>Penerimaan berkas permohonan perizinan dan non perizinan serta dokumen administrasi sesuai kewenangannya;</li>
                                        <li>Penelitian/pemeriksaan berkas permohonan perizinan dan non perizinan serta dokumen administrasi sesuai kewenangannya;</li>
                                        <li>Pelaksanaan penelitian teknis/pengujian fisik permohonan perizinan dan non perizinan serla dokumen administrasi sesuai kewenangannya;</li>
                                        <li>Penandatanganan dokumen izin, non izin dan administrasi sesuai kewenangannya;</li>

                                    </div><!-- /.media-body -->
                                </div><!-- /.media -->
                            </div>
                            
                            <div class="col-md-3">
                                <img class="slider-pic" style="width:300px" src="<?= Yii::getAlias('@web') ?>/images/news/7616ahok.jpg">
                            </div>
                      
                        </div>
                    </div><!-- /.item -->
                    
                    <div class="item">
                        <div class="blog-list">
                            <div class="col-md-9">
                                <div class="media">
                                    <div class="media-body">
                                        <p><strong>Fungsi :</strong></p>
                                        <li>Pengelolaan arsip dokumen izin, non izin dan administrasi sesuai kewenangannya;</li>
                                        <li>Penetapan dan pemberian sanksi terhadap penyalahgunaan izin dan non izin serta dokumen administrasi sesuai kewenangannya;</li>
                                        <li>Pengelolaan sistem teknologi informasi penyelenggaraan PTSP;</li>
                                        <li>Pelayanan, pemprosesan dan penyelesaian pengaduan/keluhan atas penyelenggaraan PTSP;</li>
                                        <li>Pelayanan dan penyelesaian pengaduan/keluhan atas pelayanan di Kantor PTSP serta pengaduan/keluhan atas pelayanan Satlak PTSP Kecamatan dan Satlak PTSP Kelurahan yang tidak dapat diselesaikan oleh Kantor PTSP;</li>
                                        <li>Pencatatan, pembukuan dan pelaporan retribusi pelayanan penyelenggaraan PTSP;</li>
                                    </div><!-- /.media-body -->
                                </div><!-- /.media -->
                            </div>
                           
                            <div class="col-md-3">
                                <img class="slider-pic" style="width:300px" src="<?= Yii::getAlias('@web') ?>/images/news/58header.jpg">
                          
                            </div>
                        </div>
                    </div><!-- /.item -->
                </div><!-- /.carousel-inner -->
            </div><!-- /.carousel -->
        </div><!-- /.blog-list-slider -->
    </div>
</div>

<div class="row">
        <div class="col-md-12 panel index-berita">
        <h2><i class="fa fa-comments"></i>&nbsp;&nbsp; Berita :</h2>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="blog-item blog-quote rounded shadow">
                        <div class="quote quote-teal">
                            <a href="blog-single.html">
                                If you want to accomplish the goals of your life, you have to begin with the spirit
                                <small class="quote-author">- Oprah Winfrey -</small>
                            </a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li>By: <a href="http://djavaui.com/" target="_blank">Djava UI</a></li>
                                <li>Jun 08, 2014</li>
                                <li><a href="">62 Comments</a></li>
                            </ul>
                        </div><!-- blog-details -->
                    </div><!-- /.blog-item -->
                </div><!-- col-md-3 -->
                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="blog-item blog-quote rounded shadow">
                        <div class="quote quote-teal">
                            <a href="blog-single.html">
                                If you want to accomplish the goals of your life, you have to begin with the spirit
                                <small class="quote-author">- Oprah Winfrey -</small>
                            </a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li>By: <a href="http://djavaui.com/" target="_blank">Djava UI</a></li>
                                <li>Jun 08, 2014</li>
                                <li><a href="">62 Comments</a></li>
                            </ul>
                        </div><!-- blog-details -->
                    </div><!-- /.blog-item -->
                </div><!-- col-md-3 -->

                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="blog-item blog-quote rounded shadow">
                        <div class="quote quote-teal">
                            <a href="blog-single.html">
                                If you want to accomplish the goals of your life, you have to begin with the spirit
                                <small class="quote-author">- Oprah Winfrey -</small>
                            </a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li>By: <a href="http://djavaui.com/" target="_blank">Djava UI</a></li>
                                <li>Jun 08, 2014</li>
                                <li><a href="">62 Comments</a></li>
                            </ul>
                        </div><!-- blog-details -->
                    </div><!-- /.blog-item -->
                </div><!-- col-md-3 -->
                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="blog-item blog-quote rounded shadow">
                        <div class="quote quote-teal">
                            <a href="blog-single.html">
                                If you want to accomplish the goals of your life, you have to begin with the spirit
                                <small class="quote-author">- Oprah Winfrey -</small>
                            </a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li>By: <a href="http://djavaui.com/" target="_blank">Djava UI</a></li>
                                <li>Jun 08, 2014</li>
                                <li><a href="">62 Comments</a></li>
                            </ul>
                        </div><!-- blog-details -->
                    </div><!-- /.blog-item -->
                </div><!-- col-md-3 -->
                

        </div>
</div>


<div class="row">
    <div class="col-md-12 panel index-kontak">	
        <h2><i class="fa fa-comments-o"></i>&nbsp;&nbsp; Hubungi kami :</h2>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <div class="panel rounded shadow no-overflow">
                <!-- Start ribbon wrapper -->
                <div class="ribbon-wrapper">
                    <div class="ribbon ribbon-teals ribbon-shadow">Alamat</div>
                </div>
                <!--/ End ribbon wrapper -->
                <div class="panel-body">
                    <h4 class="no-margin"><i class="fa fa-home fa-3x"></i></h4>
                    Jl. Kebon Sirih 18 Blok H Lt 18
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            
            <div class="panel rounded shadow no-overflow">
                <!-- Start ribbon wrapper -->
                <div class="ribbon-wrapper">
                    <div class="ribbon ribbon-teals ribbon-shadow">Telpon</div>
                </div>
                <!--/ End ribbon wrapper -->
                <div class="panel-body">
                    <h4 class="no-margin"><i class="fa fa-phone fa-3x"></i></h4>
                    021-3822968
                </div><!-- /.panel-body -->
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <div class="panel rounded shadow no-overflow">
                <!-- Start ribbon wrapper -->
                <div class="ribbon-wrapper">
                    <div class="ribbon ribbon-teals ribbon-shadow">Medsos</div>
                </div>
                <!--/ End ribbon wrapper -->
                <div class="panel-body">
                    <h4 class="no-margin"><i class="fa fa-comment fa-3x"></i></h4>
                     <button class="btn btn-circle btn-facebook"><i class="fa fa-facebook"></i></button>
                     <button class="btn btn-circle btn-twitter"><i class="fa fa-twitter"></i></button>
                </div><!-- /.panel-body -->
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
              <div class="panel rounded shadow no-overflow">
                <!-- Start ribbon wrapper -->
                <div class="ribbon-wrapper">
                    <div class="ribbon ribbon-teals ribbon-shadow">Email</div>
                </div>
                <!--/ End ribbon wrapper -->
                <div class="panel-body">
                    <h4 class="no-margin"><i class="fa fa-envelope fa-3x"></i></h4>
                     email@email.com
                </div><!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>