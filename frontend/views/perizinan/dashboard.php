<?php

use backend\models\Perizinan;
use yii\helpers\Url;

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

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Baru :</span>
                                <span class="info-box-number"><strong><h1><?= Perizinan::getNewPerUser(Yii::$app->user->id); ?></strong></h1></span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->


                </div>
            </div>
        </div>
    </div>

</div>


