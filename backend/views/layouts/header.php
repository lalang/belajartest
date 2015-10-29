<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<style>
    .sidebar-menu>li>a>.fa {font-size:122%;width:22px;}
    
</style>

<header class="main-header">

    <img class="main-header logo" src="<?= Yii::getAlias('@web') ?>/images/logo-dki-small.png" style="margin-left: -11px; background-color:#00a65a;border:none; width:auto;height:50px;margin-right:-77px">
    <!--<?= Html::a('<span class="logo-mini">PTSP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>-->
    <?= Html::a('PTSP DKI', Yii::$app->homeUrl, ['class' => 'logo']) ?>


    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


<!--                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                             inner menu: contains the actual data 
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>-->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::getAlias('@web') ?>/images/user50x50.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->profile->name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                        <img src="<?= Yii::getAlias('@web') ?>/images/user50x50.png" align="center" class="user-image" alt="User Image"/>
                        
                            <p align="left">
                                <?= Yii::$app->user->identity->profile->name ?>
                                
                            </p>
                            <p align="left"><?= Yii::$app->user->identity->pelaksana->nama; ?><br><br></p>
                                <?php
                                        if(Yii::$app->user->identity->kdkec != null && Yii::$app->user->identity->kdkel == null){
                                            $lokasi = "KECAMATAN ".Yii::$app->user->identity->lokasi->nama;
                                        }elseif(Yii::$app->user->identity->kdkec != null && Yii::$app->user->identity->kdkel != null){
                                            $lokasi = "KELURAHAN ".Yii::$app->user->identity->lokasi->nama;
                                        }else {
                                            $lokasi = Yii::$app->user->identity->lokasi->nama;
                                        }
                                ?>
                            <p align="left"><font size="2px"><?= $lokasi; ?></font></p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=
                                Html::a(
                                        'Profile <i class="fa fa-user"></i>', ['/user/settings/profile'], ['class' => 'btn btn-primary btn-flat']
                                )
                                ?>
                            </div>
                            <div class="pull-right">
                                <?=
                                Html::a(
                                        'Sign out <i class="fa fa-sign-out"></i>', ['/user/security/logout'], ['data-method' => 'post', 'class' => 'btn btn-primary btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
<!--                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>
