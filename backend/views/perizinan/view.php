<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\admin\page\TimelineAsset;

TimelineAsset::register($this);

//use app\assets\admin\CoreAsset;
//
//CoreAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;
?>
<section id="page-content">

    <?php
    $user = \backend\models\User::findOne($model->pemohon_id);
    ?>
    <!-- Start body content -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4">

                <div class="panel panel-theme rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Detail Permohonan</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body no-padding">

                        <?php
                        $gridColumn = [
//                ['attribute' => 'id', 'hidden' => true],
                            'no_urut',
                            'tanggal_mohon',
//                            'no_izin',
//                            'berkas_noizin',
//                            'tanggal_izin',
                            'tanggal_expired',
                            'status',
//                            'aktif',
//                'registrasi_urutan',
//                'nomor_sp_rt_rw',
//                'tanggal_sp_rt_rw',
//                'peruntukan',
//                'nama_perusahaan',
//                            'tanggal_cek_lapangan',
//                            'petugas_cek',
//                            'status_daftar',
//                [
//                    'attribute' => 'petugasDaftar.id',
//                    'label' => Yii::t('app', 'User'),
//                ],
                            'lokasi_id',
                            'keterangan:ntext',
//                'qr_code',
                            'tanggal_pertemuan',
//                            'pengambilan_tanggal',
//                            'pengambilan_jam',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                        ?>

                    </div><!-- /.panel-body -->

                </div><!-- /.panel -->



                <div class="panel panel-theme rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Data Pemohon</h3>
                        </div>
                        <div class="pull-right">
                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-google-plus"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body no-padding">


                        <ul class="list-unstyled no-margin">

                            <li class="text-center">
                                <h4 class="text-capitalize"><?= $user->profile->name; ?></h4>
                                <h5>NIK: <?= $user->username; ?></h5>
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul class="list-group no-margin br-3">
                                    <li class="list-group-item"><i class="fa fa-envelope mr-5"></i> <?= $user->email; ?></li>
                                    <li class="list-group-item"><i class="fa fa-home mr-5"></i> <?= $user->profile->alamat; ?></li>
                                    <li class="list-group-item"><i class="fa fa-phone mr-5"></i> <?= $user->profile->telepon; ?></li>
                                </ul>

                            </li>

                        </ul><!-- /.list-unstyled -->

                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->

            </div>
            <div class="col-lg-9 col-md-9 col-sm-8">

                <div class="panel panel-theme rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Detail Permohonan</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                </div><!-- /.panel -->

                <div class="profile-cover">

                    <div class="profile-body">
                        <div class="timeline">
                            <?php
                            $odd = true;
                            foreach ($providerPerizinanProses->models as $model) {
                                ?>
                                <!-- Start timeline item -->
                                <div class="timeline-item <?php echo $model->urutan == $model->perizinan->jumlah_tahap ? 'last-timeline' : ''; ?>">
                                    <div class="timeline-badge">
                                        <img class="timeline-badge-userpic" src="<?= Yii::getAlias('@web') . '/images/icon-flow-' . ($model->active ? 'blue' : 'green') . '.png'; ?>">
                                    </div>
                                    <div class="timeline-body">
                                        <div class="timeline-body-arrow">
                                        </div>
                                        <div class="timeline-body-head">
                                            <div class="timeline-body-head-caption">
                                                <a href="javascript:void(0);" class="timeline-body-title font-blue-madison"><?= $model->pelaksana->nama; ?></a>
                                                <span class="timeline-body-time font-grey-cascade"><?= $model->tanggal_proses; ?>  <i class="fa fa-clock-o"></i></span>
                                            </div>
                                            <div class="timeline-body-head-actions">
                                                <div class="btn-group">
                                                    <?php
                                                    if (Yii::$app->user->identity->pelaksana_id == $model->pelaksana_id && $model->active == 1) {
                                                        $url = Url::toRoute(['process', 'id' => $model->id]);
                                                        echo Html::a('Proses SOP', $url, [
                                                            'title' => Yii::t('yii', 'Proses SOP'),
                                                            'class'=>'btn btn-circle red btn-sm'
                                                        ]);
                                                    }
                                                    ?>
<!--                                                    <button class="btn btn-circle green-haze btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        Actions <i class="fa fa-angle-down"></i>
                                                    </button>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-body-content">
                                            <p>
                                                <?= $model->sop->deskripsi_sop; ?>
                                            </p>
                                            <p><i class="fa fa-clock-o"></i> Durasi: <?= $model->sop->durasi . ' ' . $model->sop->durasi_satuan; ?>
                                            </p>
                                        </div>
                                        <div class="timeline-body-content">

                                        </div>
                                    </div>
                                </div>
                                <!-- End timeline item -->
                            <?php } ?>
                        </div>
                    </div><!-- /.profile-body -->

                </div><!-- /.profile-cover -->

            </div>
        </div><!-- /.row -->

    </div><!-- /.body-content -->
    <!--/ End body content -->


</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->