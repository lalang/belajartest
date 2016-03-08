<?php
// test eko: wsdl

?>
<div style="background-color: whitesmoke">
<ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            Permohonan Masuk (<?= \Yii::$app->formatter->asDate($model->tanggal_mohon, 'php: d M Y'); ?>)
        </span>
    </li>
    <!-- /.timeline-label -->

    <?php
    Yii::$app->formatter->locale = 'id-ID'; 
    foreach ($model->perizinanProses as $proses) {
        ?>

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <?php if ($proses->urutan < $model->current_no || $model->status == 'Selesai' || $model->status == 'Batal' || $model->status == 'Tolak Selesai') { ?>
                <i class="fa fa-check bg-green"></i>
            <?php } else if ($proses->urutan == $model->current_no) { ?>
                <i class="fa fa-arrow-right bg-red"></i>
            <?php } else { ?>
                <i class="fa fa-envelope bg-gray"></i>
            <?php } ?>
            <div class="timeline-item">
                
                <?php 
                    $mulai=$proses->mulai; 
                    $selesai=$proses->selesai;
               
                $selisih = (int)(strtotime ($selesai) - strtotime ($mulai));
                
                if($selesai!=NULL){
                    if(($selisih/60) < 1){
                        echo '<span class="time"> Lama Proses:'.$selisih.' Detik </span>';
                    } elseif(($selisih/60) > 0 && ($selisih/(60*60)) < 1){
                        $lama = (int)($selisih / 60);
                        echo '<span class="time"> Lama Proses:'.$lama.' Menit </span>';
                    } elseif (($selisih/(60*60)) > 0 && ($selisih/(60*60*24)) < 1) {
                        $lama = (int)($selisih / (60*60));
                        echo '<span class="time"> Lama Proses:'.$lama.' Jam </span>';
                    } elseif (($selisih/(60*60*24)) > 0) {
                        $lama = (int)($selisih / (60*60*24));
                        echo '<span class="time"> Lama Proses:'.$lama.' Hari </span>';
                    }
                } else {
                    
                }
                ?>
                
                <span class="time">Target: <?= $proses->sop->durasi.'&nbsp;&nbsp;'.$proses->sop->durasi_satuan ; ?></span>

                <h5 class="timeline-header"><?= $proses->nama_sop; ?> - <?= $proses->pelaksana->nama; ?></h5>
                  <div class="timeline-body">
                      mulai Proses : <i class="fa fa-clock-o"></i> <?= $proses->mulai != NULL? date('d M Y H:i:s',  strtotime($proses->mulai)):''; ?> <br>
                      Selesai Proses : <i class="fa fa-clock-o"></i> <?= $proses->selesai != NULL? date('d M Y H:i:s',  strtotime($proses->selesai)):''; ?> <br>
                     <?php $diff = strtotime($proses->selesai) - strtotime($proses->mulai); ?>
                      Catatan Petugas : <?= $proses->keterangan; ?>   <br> 
                    </div>
            </div>

        </li>
        <!-- END timeline item -->

    <?php } ?>
    <li class="time-label">
        <span class="bg-red">
            Selesai
        </span>
    </li>
</ul>
</div>
