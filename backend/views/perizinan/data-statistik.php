
<?php

use backend\models\Perizinan;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "Statistik | PTSP DKI";
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- fix for small devices only -->

        </div><!-- /.box-header -->
               
                    <?php
                    $izins = Perizinan::getDataPerizinan();
                    foreach ($izins as $value) {
                        $text = str_replace(' ', '', $value['nama']);
                        $pecah = explode('-', $text);

                        if ($pecah[1] == "KECAMATAN") {
                            $kec_nama[] = $value['nama'];
                            $kec_baru[] = $value['baru'];
                            $kec_proses[] = $value['proses'];
                            $kec_revisi[] = $value['revisi'];
                            $kec_selesai[] = $value['selesai'];
                            $kec_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                            $kec_id[] = $value['id'];
                        } elseif ($pecah[1] == "KELURAHAN") {
                            $kel_nama[] = $value['nama'];
                            $kel_baru[] = $value['baru'];
                            $kel_proses[] = $value['proses'];
                            $kel_revisi[] = $value['revisi'];
                            $kel_selesai[] = $value['selesai'];
                            $kel_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                            $kel_id[] = $value['id'];
                        } elseif (strpos($text, 'KOTA') !== false) {
                            $kab_nama[] = $value['nama'];
                            $kab_baru[] = $value['baru'];
                            $kab_proses[] = $value['proses'];
                            $kab_revisi[] = $value['revisi'];
                            $kab_selesai[] = $value['selesai'];
                            $kab_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                            $kab_id[] = $value['id'];
                        } else {
                            $prov_nama[] = $value['nama'];
                            $prov_baru[] = $value['baru'];
                            $prov_proses[] = $value['proses'];
                            $prov_revisi[] = $value['revisi'];
                            $prov_selesai[] = $value['selesai'];
                            $prov_jumlah[] = $value['baru'] + $value['proses'] + $value['revisi'] + $value['selesai'];
                            $prov_id[] = $value['id'];
                        }
                    }
                    ?>



                    <div class="box-body">
                        <div class="row"> 
                            <div class="col-md-12">   
                                <?php
                                $jml_prov = count($prov_nama);
                                if ($jml_prov > 10) {
                                    $scrol = "height:500px;";
                                } else {
                                    $scrol = "";
                                }
                                if ($jml_prov) {
                                    ?>		  
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box">

                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Statistik Propinsi</h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">

                                                    <div style="<?php echo$scrol; ?>overflow-y:scroll;">
                                                        <div bgcolor="white" >
                                                            <div class="table-responsive">
                                                                <table class="table no-margin" bgcolor="white">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Nama Daerah</th>
                                                                            <th style="text-align: center">Lihat Data</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $n = 0;
                                                                        $i = 1;

                                                                        while ($jml_prov > $n) {
                                                                            ?>
                                                                            <tr>

                                                                                <td><?= $i; ?>  </td>
                                                                                <td><?= $prov_nama[$n]; ?></td>
                                                                                <td style="text-align: right"><?= $prov_baru[$n]; ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?=
                                                                                    Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $prov_id[$n]], ['class' => 'btn btn-open'])
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                            $i++;
                                                                            $n++;
                                                                        }
                                                                        ?>

                                                                    </tbody>
                                                                </table>
                                                            </div><!-- /.table-responsive -->
                                                        </div><!-- /.box-body -->
                                                    </div>

                                                </div>
                                            </div>	
                                        </div>
                                    </div>		  
                                <?php } ?>
                                <?php
                                $jml_kab = count($kab_nama);
                                if ($jml_kab > 10) {
                                    $scrol = "height:500px;";
                                } else {
                                    $scrol = "";
                                }
                                if ($jml_kab) {
                                    ?>
                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box">

                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Statistik Kabupaten/ Kota</h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">

                                                    <div style="<?php echo$scrol; ?>overflow-y:scroll;">
                                                        <div bgcolor="white" >
                                                            <div class="table-responsive">
                                                                <table class="table no-margin" bgcolor="white">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Nama Daerah</th>
                                                                            <th style="text-align: center">Lihat Data</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $n = 0;
                                                                        $i = 1;
                                                                        while ($jml_kab > $n) {
                                                                            ?>
                                                                            <tr>

                                                                                <td><?= $i; ?>  </td>
                                                                                <td><?= $kab_nama[$n]; ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?=
                                                                                    Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $kab_id[$n]], ['class' => 'btn btn-open'])
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                            $i++;
                                                                            $n++;
                                                                        }
                                                                        ?>

                                                                    </tbody>
                                                                </table>
                                                            </div><!-- /.table-responsive -->
                                                        </div><!-- /.box-body -->
                                                    </div>

                                                </div>
                                            </div>	
                                        </div>
                                    </div>
                                <?php } ?>		  
                                <?php
                                $jml_kec = count($kec_nama);
                                if ($jml_kec > 10) {
                                    $scrol = "height:430px;";
                                } else {
                                    $scrol = "";
                                }
                                if ($jml_kec) {
                                    ?>		
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box">

                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Statistik Kecamatan</h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">

                                                    <div style="<?php echo$scrol; ?>overflow-y:scroll;">
                                                        <div bgcolor="white" >
                                                            <div class="table-responsive">
                                                                <table class="table no-margin" bgcolor="white">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Nama Daerah</th>
																			<th style="text-align: center">Lihat Data</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $n = 0;
                                                                        $i = 1;
                                                                        while ($jml_kec > $n) {
                                                                            ?>
                                                                            <tr>

                                                                                <td><?= $i; ?>  </td>
                                                                                <td><?= $kec_nama[$n]; ?></td>
                                                                                <td style="text-align: center">
                                                                            <?=
                                                                            Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $kec_id[$n]], ['class' => 'btn btn-open'])
                                                                            ?>
                                                                                </td>
                                                                            </tr>
                    <?php
                    $i++;
                    $n++;
                }
                ?>

                                                                    </tbody>
                                                                </table>
                                                            </div><!-- /.table-responsive -->
                                                        </div><!-- /.box-body -->
                                                    </div>

                                                </div>
                                            </div>	
                                        </div>
                                    <!--</div>-->		
                                <?php } ?>		
                                <?php
                                $jml_kel = count($kel_nama);
                                if ($jml_kel > 10) {
                                    $scrol = "height:445px;";
                                } else {
                                    $scrol = "";
                                }
                                if ($jml_kel) {
                                    ?>		
                                    <!--<div class="row">-->
                                        <div class="col-md-6">
                                            <div class="box">

                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Statistik Kelurahan</h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">

                                                    <div style="<?php echo$scrol; ?>overflow-y:scroll;">
                                                        <div bgcolor="white" >
                                                            <div class="table-responsive">
                                                                <table class="table no-margin" bgcolor="white">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Nama Daerah</th>
                                                                            <th style="text-align: center">Lihat Data</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                <?php
                $n = 0;
                $i = 1;

                while ($jml_kel > $n) {
                    ?>
                                                                            <tr>

                                                                                <td><?= $i; ?>  </td>
                                                                                <td><?= $kel_nama[$n]; ?></td>
                                                                                <td style="text-align: center">
                                                                            <?=
                                                                            Html::a(Yii::t('app', '<i class="fa fa-eye"></i> View'), ['statistik', 'lokasi' => $kel_id[$n]], ['class' => 'btn btn-open'])
                                                                            ?>
                                                                                </td>
                                                                            </tr>
                    <?php
                    $i++;
                    $n++;
                }
                ?>

                                                                    </tbody>
                                                                </table>
                                                            </div><!-- /.table-responsive -->
                                                        </div><!-- /.box-body -->
                                                    </div>

                                                </div>
                                            </div>	
                                        </div>
                                    </div>				
                                    <?php } ?>		
                                    </div>
                            </div>
                            
            </div><!-- /.box -->
        </div>

    </div>
</div>
</div>
</div>

</div>


