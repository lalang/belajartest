<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perizinan'), 'url' => ['perizinan/active']];
$this->params['breadcrumbs'][] = ['label' => 'Detail'];

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
?>

<div class="col-md-12">
    <div class="panel panel-tab rounded shadow">
        <!-- Start tabs heading -->
        <div class="panel-heading no-padding">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i><span>Identitas Pemilik</span></a></li>
                <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-file-text"></i><span>Identitas Perusahaan</span></a></li>
                <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-sitemap"></i><span>Legalitas Perusahaan</span></a></li>
                <li><a href="#tab1-4" data-toggle="tab"><i class="fa fa-money"></i><span>Modal Dan Saham</span></a></li>
                <li><a href="#tab1-5" data-toggle="tab"><i class="fa fa-cogs"></i><span>Kegiatan Usaha</span></a></li>
                <li><a href="#tab1-6" data-toggle="tab"><i class="fa fa-bar-chart"></i><span>Neraca Perusahaan</span></a></li>
            </ul>
        </div><!-- /.panel-heading -->
        <!--/ End tabs heading -->

        <!-- Start tabs content -->
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1-1">
                    <?= $this->render('_tab-siup-pemilik', ['model' => $model]) ?>					
                </div>
                <div class="tab-pane fade" id="tab1-2">
                    <?= $this->render('_tab-siup-identitas', ['model' => $model]) ?>					
                </div>
                <div class="tab-pane fade" id="tab1-3">
                    <?=
                    $this->render('_tab-siup-legalitas', ['model' => $model])
                    ?>
                </div>
                <div class="tab-pane fade" id="tab1-4">
                    <?= $this->render('_tab-siup-modshm', ['model' => $model]) ?>
                </div>
                <div class="tab-pane fade" id="tab1-5">
                    <?=
                    $this->render('_tab-siup-kegiatan', ['model' => $model])
                    ?>
                </div>
                <div class="tab-pane fade" id="tab1-6">
                    <?= $this->render('_tab-siup-neraca', ['model' => $model]) ?>
                </div>
            </div>
        </div>
    </div>
</div>




<!--</div>
</section> /#page-content -->

