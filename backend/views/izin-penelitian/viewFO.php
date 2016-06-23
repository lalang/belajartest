<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-tab rounded shadow">
            <!-- Start tabs heading -->
            <div class="panel-heading no-padding">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i><span>Identitas Pemilik/Pengurus</span></a></li>
                    <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Perusahaan</span></a></li>
                    <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-sitemap"></i><span>Legalitas Perusahaan</span></a></li>
                </ul>
            </div><!-- /.panel-heading -->
            <!--/ End tabs heading -->

            <!-- Start tabs content -->
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1-1">
                        <?= $this->render('_tab-penelitian-pemilik', ['model' => $model]) ?>					
                    </div>
                    <div class="tab-pane fade" id="tab1-2">
                        <?= $this->render('_tab-penelitian-instansi', ['model' => $model]) ?>					
                    </div>
                    <div class="tab-pane fade" id="tab1-3">
                        <?=
                        $this->render('_tab-penelitian-praktek', ['model' => $model])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!--</div>
</section> /#page-content -->

