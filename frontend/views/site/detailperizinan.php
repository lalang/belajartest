<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 
use	yii\bootstrap\Tabs;

/* @var $this yii\web\View */
$this->title = 'Detail Perizinan';
//$this->context->layout = 'main-no-landing';
?>
<div class="wrapper wrapper-content animated fadeInRight">
    
<div class='main-title-page'><h3><strong><?= Html::encode($this->title) ?>: <?php echo $data_izin['nama']; ?></strong></h3></div>
    
    <div class="ibox float-e-margins">
        <div class="ibox-title">
             <a href="<?= Url::to('../perizinan')?>"><i class="fa fa-backward"></i> Kembali</a>
             
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
        <div class="ibox-content">
            <?php
            //Persyaratan
            $no=1;
            foreach ($rows_persyaratan as $data_persyaratan){ 
                    $list_persyaratan .= '
                    <tr>
                            <td data-title="No">'.$no.'</td>
                            <td data-title="Persyaratan">'.$data_persyaratan['isi'].'</td>
							<td data-title="Download" align="center"><a href="'.\Yii::$app->urlManager->createAbsoluteUrl('download/dok_perizinan/'.$data_persyaratan['file']).'" class="btn btn-info" target="_blank"><i class="fa fa-download "></i> Download</a></td>
                    </tr>';
            $no++;
            }

            //Pelayanan
            $no=1;
            foreach ($rows_pelayanan as $data_pelayanan){ 
                    $list_pelayanan .= '
                    <tr>
                            <td data-title="No">'.$no.'</td>
                            <td data-title="Mekanisme">'.$data_pelayanan['deskripsi_sop'].'</td>
                    </tr>';
            $no++;
            }

//            Pengaduan
//            $no=1;
//            foreach ($rows_pengaduan as $data_pengaduan){ 
//                    $list_pengaduan .= '
//                    <tr>
//                            <td data-title="No">'.$no.'</td>
//                            <td data-title="Mekanisme">'.$data_pengaduan['isi'].'</td>
//                    </tr>';
//            $no++;
//            }

            //Dasar Hukum
            $no=1;
            foreach ($rows_dasar_hukum as $data_dasar_hukum){ 
                    $list_dasar_hukum .= '
                    <tr>
                            <td data-title="No">'.$no.'</td>
                            <td data-title="Dasar Hukum">'.$data_dasar_hukum['isi'].'</td>
                    </tr>';
            $no++;
            }

            //Definisi
            $no=1;
            foreach ($rows_definisi as $data_definisi){ 
                    $list_definisi .= '
                    <tr>
                            <td data-title="Definisi">'.$data_definisi['isi'].'</td>
                    </tr>';
            $no++;
            }

            echo Tabs::widget([
                'items' => [
                    [
                        'label' => 'Persyaratan',
                        'content' => '
                        <div class="tabdetail-perizinan">
                                <div class="wrapper wrapper-content animated fadeInRight"  style="width: 100%; margin:0 auto;">
                                            <div id="no-more-tables">
                                                <table class="col-md-12 table-bordered table-striped table-condensed cf">
                                                            <thead class="cf">
                                                                    <tr>
																			<th>No</th>	
																			<th>Persyaratan</th>
																			<th></th>
																	</tr>
                                                            </thead>
                                                    <tbody>'
                                                    .$list_persyaratan.
                                                    '</tbody>
                                                    </table>
                                            </div>
                                        </div>
                                </div>',
                        'active' => true
                    ],
                    [
                        'label' => 'Mekanisme Pelayanan',
                        'content' => '
                        <div class="tabdetail-perizinan">
                                <div class="wrapper wrapper-content animated fadeInRight"  style="width: 100%; margin:0 auto;">
                                            <div id="no-more-tables">
                                                <table class="col-md-12 table-bordered table-striped table-condensed cf">
                                                            <thead class="cf">
                                                                    <tr>
                                                                                    <th>No</th>	
                                                                                    <th>Mekanisme Pelayanan</th>
                                                                            </tr>
                                                            </thead>
                                                    <tbody>'
                                                    .$list_pelayanan.
                                                    '
                                                    <tr>
                                                        <td data-title="" colspan="2"><b>Durasi: '.$data_izin['durasi'].' '.$data_izin['durasi_satuan'].'</b></td>
                                                    </tr>  
                                                    </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                </div>',
                    ],
//                    [
//                        'label' => 'Mekanisme Pengaduan',
//                        'content' => '
//                        <div class="tabdetail-perizinan">
//							<div class="wrapper wrapper-content animated fadeInRight"  style="width: 100%; margin:0 auto;">
//								<div id="no-more-tables">
//									<table class="col-md-12 table-bordered table-striped table-condensed cf">
//												<thead class="cf">
//														<tr>
//																		<th>No</th>	
//																		<th>Mekanisme Pengaduan</th>
//																</tr>
//												</thead>
//										<tbody>'
//										.$list_pengaduan.
//										'</tbody>
//										</table>
//								</div>
//							</div>
//						</div>',
//                    ],
                    [
                        'label' => 'Dasar Hukum',
                        'content' => '
                        <div class="tabdetail-perizinan">
                                <div class="wrapper wrapper-content animated fadeInRight"  style="width: 100%; margin:0 auto;">
										<div id="no-more-tables">
											<table class="col-md-12 table-bordered table-striped table-condensed cf">
														<thead class="cf">
																<tr>
																				<th>No</th>	
																				<th>Dasar Hukum Pelayanan</th>
																		</tr>
														</thead>
												<tbody>'
												.$list_dasar_hukum.
												'</tbody>
												</table>
                                            </div>
                                        </div>
                                </div>',
                    ],
                    [
					
					
                        'label' => 'Definisi',
                        'content' => '
                        <div class="tabdetail-perizinan">
                                <div class="wrapper wrapper-content animated fadeInRight"  style="width: 100%; margin:0 auto;">
                                            <div id="no-more-tables">
                                                <table class="col-md-12 table-bordered table-striped table-condensed cf">
														<thead class="cf">
															<tr>
																<th>Definisi</th>
															</tr>
														</thead>
                                                    <tbody>'
                                                    .$list_definisi.
                                                    '</tbody>
                                                    </table>
                                            </div>
                                        </div>
                                </div>',
                    ],
                  //  [
                 //       'label' => 'Biaya',
                  //      'content' => '<div class="wrapper wrapper-content animated fadeInRight tabdetail-perizinan">Biaya Rp.0</div>',
               //     ],

                ],
            ]);
            ?>
        </div>
    </div>

</div>
<div style="clear:both"></div>

