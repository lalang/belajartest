<?php

use backend\models\Perizinan;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerizinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="box-header with-border">
                <h3 class="box-title">Detail permohonan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    
                    <!--Jika Status di Perizinan = Daftar-->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            
<!--                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>-->
                            
                            <?php
                                if((Perizinan::getNewPerUser(Yii::$app->user->id))>0)
                                {
                                    echo Html::a(Yii::t(
                                        'app',
                                        '<span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>'),
                                        ['done']
                                    );
                                } else {
                            ?>
                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>
                            <?php
                            }
                            ?>

                           <div class="info-box-content">
                                <span class="info-box-text">Baru :</span>
                                <span class="info-box-number"><strong><h1><?= Perizinan::getNewPerUser(Yii::$app->user->id); ?></strong></h1></span>
                            </div> <!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    
                    <!--Jika Status di Perizinan = Verifikasi-->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            
<!--                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>-->
                            
                            <?php
                                if((Perizinan::getVerifikasiPerUser(Yii::$app->user->id))>0)
                                {
                                    echo Html::a(Yii::t(
                                        'app',
                                        '<span class="info-box-icon bg-green"><i class="fa fa-refresh"></i></span>'),
                                        ['done']
                                    );
                                } else {
                            ?>
                            <span class="info-box-icon bg-green"><i class="fa fa-refresh"></i></span>
                            <?php
                            }
                            ?>

                           <div class="info-box-content">
                                <span class="info-box-text">Verifikasi :</span>
                                <span class="info-box-number"><strong><h1><?= Perizinan::getVerifikasiPerUser(Yii::$app->user->id); ?></strong></h1></span>
                            </div> <!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    
                    <!--Jika Status di Perizinan = Selesai-->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            
<!--                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>-->
                            <?php
                                if((Perizinan::getSelesaiPerUser(Yii::$app->user->id))>0)
                                {
                                    echo Html::a(Yii::t(
                                        'app',
                                        '<span class="info-box-icon bg-purple"><i class="fa fa-check"></i></span>'),
                                        ['done']
                                    );
                                } else {
                            ?>
                            <span class="info-box-icon bg-purple"><i class="fa fa-check"></i></span>
                            <?php
                            }
                            ?>
                           <div class="info-box-content">
                                <span class="info-box-text">Selesai :</span>
                                <span class="info-box-number"><strong><h1><?= Perizinan::getSelesaiPerUser(Yii::$app->user->id); ?></strong></h1></span>
                            </div> <!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    
                    <!--Jika Status di Perizinan = Tolak-->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            
<!--                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>-->
                            <?php
                                if((Perizinan::getTolakPerUser(Yii::$app->user->id))>0)
                                {
                                    echo Html::a(Yii::t(
                                        'app',
                                        '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'),
                                        ['done']
                                    );
                                } else {
                            ?>
                            <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                            <?php
                            }
                            ?>
                           <div class="info-box-content">
                                <span class="info-box-text">Tolak :</span>
                                <span class="info-box-number"><strong><h1><?= Perizinan::getTolakPerUser(Yii::$app->user->id); ?></strong></h1></span>
                            </div> <!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->


                </div>
            </div>            
        </div>
        <div class="box">
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="box-header with-border">
                <h3 class="box-title">Data Perizinan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    
                    <!--Jika Status di Perizinan = Aktif-->
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="info-box">
                            
<!--                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>-->
                            <?php
                                if((Perizinan::getAktifPerUser(Yii::$app->user->id))>0)
                                {
                                    echo Html::a(Yii::t(
                                        'app',
                                        '<span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>'),
                                        ['aktif']
                                    );
                                } else {
                            ?>
                            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                            <?php
                            }
                            ?>
                            
                           <div class="info-box-content">
                                <span class="info-box-text">Perizinan Yang Masih Berlaku :</span>
                                <span class="info-box-number"><strong><h1><?= Perizinan::getAktifPerUser(Yii::$app->user->id); ?></strong></h1></span>
                            </div> <!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    
                    <!--Jika Status di Perizinan = NonAktif-->
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="info-box">
                            
<!--                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>-->
                            <?php
                                if((Perizinan::getNonAktifPerUser(Yii::$app->user->id))>0)
                                {
                                    echo Html::a(Yii::t(
                                        'app',
                                        '<span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>'),
                                        ['expired']
                                    );
                                } else {
                            ?>
                            <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                            <?php
                            }
                            ?>
                           <div class="info-box-content">
                                <span class="info-box-text">Perizinan Yang Tidak Berlaku :</span>
                                <span class="info-box-number"><strong><h1><?= Perizinan::getNonAktifPerUser(Yii::$app->user->id); ?></strong></h1></span>
                            </div> <!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    
                </div>
            </div>
        </div>
    </div>

</div>


