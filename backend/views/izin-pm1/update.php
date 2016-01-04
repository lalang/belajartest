<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
?>

<div class="col-md-12">
    <div class="panel panel-tab rounded shadow">
        <!-- Start tabs heading -->
        <div class="panel-heading no-padding">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i><span>Identitas Pemilik</span></a></li>
                <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-file-text"></i><span>Data Permohonan</span></a></li>
                <?php
                    if($model->izin_id == 537){
                ?>
                    <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Saksi 1</span></a></li>
                    <li><a href="#tab1-4" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Saksi 2</span></a></li>
                <?php
                    } elseif ($model->izin_id == 525 && $model->pilihan == 2) {
                ?>
                    <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Orang Lain</span></a></li>
                <?php
                    }
                ?>
            </ul>
        </div><!-- /.panel-heading -->
        <!--/ End tabs heading -->
        
        <!-- Start tabs content -->
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1-1">
                    <?= $this->render('_tab-pm1-pemilik', ['model' => $model]) ?>					
                </div>
                <div class="tab-pane fade" id="tab1-2">
                    <?= $this->render('_tab-pm1-datamohon', ['model' => $model]) ?>					
                </div>
                <?php
                    if($model->izin_id == 537){
                ?>
                    <div class="tab-pane fade" id="tab1-3">
                        <?= $this->render('_tab-pm1-saksi1', ['model' => $model]) ?>					
                    </div>
                    <div class="tab-pane fade" id="tab1-4">
                        <?= $this->render('_tab-pm1-saksi2', ['model' => $model]) ?>					
                    </div>
                <?php
                    } elseif ($model->izin_id == 525) {
                ?>
                    <div class="tab-pane fade" id="tab1-3">
                        <?= $this->render('_tab-pm1-org-lain', ['model' => $model]) ?>					
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>