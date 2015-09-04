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
  
<div id="top-reasons">
				<div class="inner">
					<div class="row">
			<div class="col-md-12">
				
				<article>
					<h2>Selamat datang di Layanan Pusat Terpadu Satu Pintu DKI Jakarta</h2>
					<!--<p class="text-muted">
					   "Solusi Perizinan Warga Jakarta"
					</p>-->
					 
				</article>
				<div class="row">
					<div class="col-md-4 col-sm-3 col-xs-6 text-center">
						
						<a href="<?= Yii::$app->getUrlManager()->createUrl('site/perizinan')?>">
						<i class="fa fa-files-o fa-5x"></i>
						<span>Perizinan</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-3 col-xs-6 text-center">
						 <a href="<?= Yii::$app->getUrlManager()->createUrl('site/regulasi')?>">
						 <i class="fa fa-balance-scale fa-5x"></i>
						<span>Regulasi</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-3 col-xs-6 text-center">
						<a href="http://bptspdki.net/cariberkas/" target="_blank"><i class="fa fa-search fa-5x"></i>
						<span>Lacak Perizinan</span>
						</a>
					</div>
				   
				</div>
				
				
				<div class="row">
					<div class="co-md-12">
					<!-- Start scrollable panel -->
						<div class="panel panel-scrollable">
							<div class="panel-heading">
								<h2>"Solusi Perizinan Warga Jakarta"</h2>
							</div><!-- /.panel-heading -->
							<div class="panel-body">
							
								<p><strong> Badan Pelayanan Terpadu Satu Pintu</strong> yang seianjutnya disingkat BPTSP adalah Satuan Kerja Perangkat Daerah yang menyelenggarakan Pelayanan Terpadu Satu Pintu</p>
								
								<p>Pelayanan Terpadu Satu Pintu adalah kegiatan penyelenggaraan perizinan dan non perizinan yang proses pengelolaannya mulai dari tahap permohonan sampai ke tahap terbitnya dokumen dilakukan secara terpadu dengan sistem satu pintu di Provinsi Daerah Khusus Ibukota Jakarta</p>
								
								<p>Badan PTSP mempunyai tugas melaksanakan pembinaan, pengendalian, monitoring dan evaluasi penyelenggaraan PTSP oleh Kantor PTSP, Satuan Pelaksana (Satlak) PTSP Kecamatan dan Satlak PTSP Kelurahan serta pelayanan dan penandatanganan izin dan non izin serta dokumen administrasi yang menjadi kewenangannya.</p>
								
								
							</div><!-- /.panel-body -->
						</div><!-- /.panel -->
						<!--/ End scrollable panel -->
						
					</div>
				</div>
				
				
				<div class="row">
					<h2>Berita :</h2>
					<div class="col-md-12 panel">						
						<div class="col-md-4 col-sm-3 col-xs-6">
							<div class="blog-item blog-quote rounded shadow">
								<div class="quote quote-primary">
									<a href="blog-single.html">
										Sometimes when you innovate, you make mistakes. It is best to admit them quickly, and get on with improving your other innovations.
										<small class="quote-author">- Steve Jobs -</small>
									</a>
								</div>
								<div class="blog-details">
									<ul class="blog-meta">
										<li>By: <a href="http://djavaui.com/" target="_blank">Djava UI</a></li>
										<li>Jun 08, 2014</li>
										<li><a href="">3 Comments</a></li>
									</ul>
								</div><!-- blog-details -->
							</div><!-- /.blog-item -->
						</div><!-- col-md-3 -->
						
						<div class="col-md-4 col-sm-3 col-xs-6">
							<div class="blog-item blog-quote rounded shadow">
								<div class="quote quote-primary">
									<a href="blog-single.html">
										Sometimes when you innovate, you make mistakes. It is best to admit them quickly, and get on with improving your other innovations.
										<small class="quote-author">- Steve Jobs -</small>
									</a>
								</div>
								<div class="blog-details">
									<ul class="blog-meta">
										<li>By: <a href="http://djavaui.com/" target="_blank">Djava UI</a></li>
										<li>Jun 08, 2014</li>
										<li><a href="">3 Comments</a></li>
									</ul>
								</div><!-- blog-details -->
							</div><!-- /.blog-item -->
						</div><!-- col-md-3 -->
						
						<div class="col-md-4 col-sm-3 col-xs-6">
							<div class="blog-item blog-quote rounded shadow">
								<div class="quote quote-primary">
									<a href="blog-single.html">
										Sometimes when you innovate, you make mistakes. It is best to admit them quickly, and get on with improving your other innovations.
										<small class="quote-author">- Steve Jobs -</small>
									</a>
								</div>
								<div class="blog-details">
									<ul class="blog-meta">
										<li>By: <a href="http://djavaui.com/" target="_blank">Djava UI</a></li>
										<li>Jun 08, 2014</li>
										<li><a href="">3 Comments</a></li>
									</ul>
								</div><!-- blog-details -->
							</div><!-- /.blog-item -->
						</div><!-- col-md-3 -->

					</div>
				</div>
				
				<div class="row">
					<div class="co-md-12">
						<h2>Hubungi kami :</h2>
						<div class="col-md-4 col-sm-3 col-xs-6 text-center">
							 <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-home fa-3x"></i></h3>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body">
                                    Jl. Kebon Sirih 18 Blok H Lt 18
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->
						</div>
						<div class="col-md-4 col-sm-3 col-xs-6 text-center">
							<div class="panel panel-lilac">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-phone fa-3x"></i></h3>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body">
                                    021-3822968
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->
						</div>
						<div class="col-md-4 col-sm-3 col-xs-6 text-center">
							<div class="panel panel-teal">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-comment fa-3x"></i></h3>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body">
                                    <button class="btn btn-circle btn-facebook"><i class="fa fa-facebook"></i></button>
                                    <button class="btn btn-circle btn-twitter"><i class="fa fa-twitter"></i></button>

                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->
						</div>
					
						</div>
					<div class="row">
						<h2>Lokasi :</h2>
						<div class="col-md-12 panel">						
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6243055548966!2d106.82849549999999!3d-6.181012899999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42de6a308e5%3A0xf9321b0368a6ad42!2sKantor+Pemprov+DKI+Jakarta!5e0!3m2!1sen!2sid!4v1441048095280" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

						</div>
					</div>
				
			</div>
			</div>	
	</div>	
</div>	


<!--<script src="<?php // Yii::getAlias('@web') ?>/assets/parallax/js/jquery-2.1.1.js"></script>
<script src="<?php // Yii::getAlias('@web') ?>/assets/parallax/js/main.js"></script>  Resource jQuery -->