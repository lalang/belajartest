
<?php

use backend\models\Perizinan;
use yii\helpers\Url;

$this->title = "DASHBOARD | PTSP DKI";
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
                      <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Total :</span>
                        <span class="info-box-number"><strong><h1><?= Perizinan::getTotal(); ?></h1></strong></span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                  </div><!-- /.col -->
 
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Selesai</span>
                        <span class="info-box-number"><strong><h1><?= Perizinan::getFinish(); ?></strong></h1></span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                  </div><!-- /.col -->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Baru :</span>
                        <span class="info-box-number"><strong><h1><?= Perizinan::getNew(); ?></strong></h1></span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                  </div><!-- /.col -->
                   <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Ditolak :</span>
                        <span class="info-box-number"><strong><h1><?= Perizinan::getRejected(); ?></strong></h1></span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                  </div><!-- /.col -->

            </div>
          </div>
        </div>
    </div>

</div>


