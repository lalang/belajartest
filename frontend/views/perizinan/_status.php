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
            <?php if ($proses->urutan < $model->current_no || $model->status == 'Selesai' || $model->status == 'Batal' || $model->status == 'Tolak Selesai') { ?>
                <i class="fa fa-check bg-green"></i>
            <?php } else if ($proses->urutan == $model->current_no) { ?>
                <i class="fa fa-arrow-right bg-red"></i>
            <?php } else { ?>
                <i class="fa fa-envelope bg-gray"></i>
            <?php } ?>
            <div class="timeline-item">
               
                <h5 class="timeline-header"><?= $proses->nama_sop; ?> - <?= $proses->pelaksana->nama; ?></h5>

               

        </li>
        <!-- END timeline item -->

    <?php } ?>
    <li class="time-label">
        <span class="bg-red">
            Selesai (<?= $model->status == 'Selesai' ? \Yii::$app->formatter->asDate($model->tanggal_mohon, 'php: d M Y') : ''; ?>)
        </span>
    </li>
</ul>
</div>