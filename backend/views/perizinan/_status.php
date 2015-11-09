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
    foreach ($model->perizinanProses as $proses) {
        ?>

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <?php if ($proses->urutan < $model->current_no || $model->status == 'Selesai' || $model->status == 'Batal') { ?>
                <i class="fa fa-check bg-green"></i>
            <?php } else if ($proses->urutan == $model->current_no) { ?>
                <i class="fa fa-arrow-right bg-red"></i>
            <?php } else { ?>
                <i class="fa fa-envelope bg-gray"></i>
            <?php } ?>
            <div class="timeline-item">
                <span class="time">Target: <?= $proses->sop->durasi.'&nbsp;&nbsp;'.$proses->sop->durasi_satuan ; ?></span>

                <h5 class="timeline-header"><?= $proses->nama_sop; ?> - <?= $proses->pelaksana->nama; ?></h5>
                  <div class="timeline-body">
                      mulai Proses : <i class="fa fa-clock-o"></i> <?= \Yii::$app->formatter->asDate($proses->mulai, 'php: d M Y H:i:s'); ?> <br>
                      Selesai Proses : <i class="fa fa-clock-o"></i> <?= \Yii::$app->formatter->asDate($proses->selesai, 'php: d M Y H:i:s'); ?> <br>
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