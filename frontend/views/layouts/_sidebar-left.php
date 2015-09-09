 
<aside id="sidebar-left" class="<?php echo!empty($classLeft) ? $classLeft : 'sidebar-circle' ?>">

    <!-- Start left navigation - profile shortcut -->
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="<?= Yii::$app->getUrlManager()->createUrl('user/settings/profile') ?>">
                <img src="<?= Yii::getAlias('@web').'/images/user50x50.png'; ?>"  alt="brand admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <h4 class="media-heading">Hello,</h4>
                <small> <span><?= Yii::$app->user->identity->profile->name; ?></span></small>
            </div>
        </div>
    </div><!-- /.sidebar-content -->
    <!--/ End left navigation -  profile shortcut -->

    <!-- Start left navigation - menu -->
    <ul class="sidebar-menu">

        <!-- Start navigation - dashboard -->
        <li class="<?= (Yii::$app->controller->id == 'dashboard') ? 'active' : '' ?>">
            <a href="<?= Yii::$app->getUrlManager()->createUrl('/site/index') ?>">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Dashboard</span>
                <?= (Yii::$app->controller->id == 'site') ? '<span class="selected"></span>' : '' ?>
            </a>
        </li>
        <!--/ End navigation - dashboard -->

        <!-- Start category ui kit-->
        <li class="sidebar-category">
            <span>User Area</span>
            <span class="pull-right"><i class="fa fa-user"></i></span>
        </li>
        <!--/ End category ui kit-->

        <!-- Start navigation - forms -->
        <li class="submenu <?= (Yii::$app->controller->id == 'perizinan') ? 'active' : '' ?>">
        <li class="submenu <?= (Yii::$app->controller->id == 'perizinan/active') ? 'active' : '' ?>">
            <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/active') ?>">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <span class="text">Perizinan Dalam Proses</span>
            </a>
        </li>
        <li class="submenu <?= (Yii::$app->controller->id == 'perizinan/done') ? 'active' : '' ?>">
            <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/done') ?>">
                <span class="icon"><i class="fa fa-check"></i></span>
                <span class="text">Perizinan Selesai</span>
            </a>
        </li>
        <li class="submenu <?= (Yii::$app->controller->id == 'izin') ? 'active' : '' ?>">
           <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/search') ?>">
                <span class="icon"><i class="fa fa-pencil"></i></span>
                <span class="text">Daftar Perizinan</span>
            </a>
        </li>

        <!-- Start category documentation -->
        <li class="sidebar-category">
            <span><span class="hidden-sidebar-minimize"></span> MISC</span>
            <span class="pull-right"><i class="fa fa-coffee"></i></span>
        </li>
        <!--/ End category documentation -->

        <!-- Start documentation - api documentation -->
        <li>
            <a href="<?= Yii::$app->getUrlManager()->createUrl('site/about') ?>" target="_blank">
                <span class="icon"><i class="fa fa-book"></i></span>
                <span class="text">Documentation</span>
            </a>
        </li>
        <!--/ End documentation - api documentation -->

    </ul><!-- /.sidebar-menu -->
    <!--/ End left navigation - menu -->

    <!-- Start left navigation - footer -->
    <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="setting" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Setting"><i class="fa fa-cog"></i></a>
        <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="lock-screen" data-url="index.php?r=admin%2Fpage%2Flockscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
        <a id="logout" data-url="index.php?r=admin%2Fpage%2Fsignin" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
    </div><!-- /.sidebar-footer -->
    <!--/ End left navigation - footer -->

</aside><!-- /#sidebar-left -->
