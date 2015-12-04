
<?php

use backend\models\Perizinan;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "DASHBOARD | PTSP DKI";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- fix for small devices only -->
           
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <?php
                if (Yii::$app->user->can('Petugas')) {
                    switch (Yii::$app->user->identity->pelaksana_id) {
                        case 5: //Kepala
                            ?>
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <?php
                                        $lokasi = backend\models\HistoryPlh::findOne($plh_id);
                                        $lokasiName = explode(" ADMINISTRASI ", $lokasi->lokasi->nama);
                                        if($lokasiName[1] == ''){
                                            $lokasiName[1] = $lokasiName[0];
                                        }
                                    ?>
                                  <h3 class="box-title">List yang di kerjakan untuk wilayah <?php echo $lokasiName[1]; ?></h3>
                                </div><!-- /.box-header -->
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <?php
                                        if((Perizinan::getApprovalPLH($lokasi->user_lokasi))>0)
                                        {
                                            echo Html::a(Yii::t(
                                                'app',
                                                '<span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>'),
                                                ['approv-plh', 'action' => 'approval', 'status' => 'Lanjut', 'plh' => $plh_id]
                                            );
                                        } else {
                                    ?>
                                    <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
                                    <?php
                                    }
                                    ?> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Untuk Di Setujui  :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getApprovalPLH($lokasi->user_lokasi); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->

                            <div class="col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <?php
                                        if((Perizinan::getTolakPLH($lokasi->user_lokasi))>0)
                                        {
                                            echo Html::a(Yii::t(
                                                'app',
                                                '<span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>'),
                                                ['approv-plh', 'action' => 'approval', 'status' => 'Tolak', 'plh' => $plh_id]
                                            );
                                        } else {
                                    ?>
                                    <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
                                    <?php
                                    }
                                    ?> 
                                    <div class="info-box-content">
                                        <span class="info-box-text">Untuk Di Tolak  :</span>
                                        <span class="info-box-number"><strong><h1><?= Perizinan::getTolakPLH($lokasi->user_lokasi); ?></h1></strong></span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->
                            <?php
                            break;
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>


