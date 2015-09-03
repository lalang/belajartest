<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = Yii::t('app', 'Create Perizinan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perizinan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">

    <div class="header-content">
        <h2><i class="fa fa-list-alt"></i> Form <?= Html::encode($this->title); ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/create') ?>"> Create</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Forms</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Perizinan</li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <div class="body-content animated fadeIn">
        <!--/ End page header -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Formulir Input Perizinan</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-sub-heading">
                        <div class="callout callout-info"><p>Formulir input perizinan yang dilakukan oleh petugas</p></div>
                    </div><!-- /.panel-sub-heading -->
                    <div class="panel-body">

                            <?=
                            $this->render('_form', [
                                'model' => $model,
                            ])
                            ?>  

                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
                <!-- End toggle switches -->

            </div>
        </div><!-- /.body-content -->
        <!-- Start footer content -->
        <footer class="footer-content">
            2014 - 2015 &copy; Blankon Admin. Created by <a href="http://djavaui.com/" target="_blank">Djava UI</a>, Yogyakarta ID
            <span class="pull-right">0.01 GB(0%) of 15 GB used</span>
        </footer><!-- /.footer-content -->
        <!--/ End footer content -->

</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->
