<body style="background-color:#black">
<aside id="sidebar-left" style="" class="<?php echo !empty($classLeft)? $classLeft : 'sidebar-circle' ?>">

    <!-- Start left navigation - profile shortcut -->
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="<?= Yii::$app->getUrlManager()->createUrl('user/settings/profile') ?>">
                <img src="<?= Yii::getAlias('@web').'/images/user50x50.png'; ?>"  alt="brand admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <span class="media-heading"><strong><?= Yii::$app->user->identity->profile->name; ?></strong></span>
                <span class="media-heading"><small><strong>asdasd</small></strong></span>
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
             <li>
            <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/index') ?>">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <span class="text">Data Perizinan</span>
            </a>
        </li>
        <!--/ End navigation - forms -->
        
         <!-- Start referensi -->
        <li class="sidebar-category">
            <span>Referensi</span>
            <span class="pull-right"><i class="fa fa-list-alt"></i></span>
        </li>
        <!--/ End referensi widget -->
        
        <li class="submenu <?= (Yii::$app->controller->id == 'chart') ? 'active' : '' ?>">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-list-ul"></i></span>
                <span class="text">Data Master</span>
                <span class="arrow"></span>
                <?= (Yii::$app->controller->id == 'referensi') ? '<span class="selected"></span>' : '' ?>
            </a>
            <ul>
                <li class="<?= (Yii::$app->controller->action->id == 'bidang/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/bidang/index') ?>">Bidang</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'izin/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/izin/index') ?>">Izin</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'dokumen-izin/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/dokumen-izin/index') ?>">Dokumen Izin</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'dokumen-pendukung/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/dokumen-pendukung/index') ?>">Dokumen Pendukung</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'kbli/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/kbli/index') ?>">Kbli</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'lokasi/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/lokasi/index') ?>">Lokasi</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'mekanisme-pelayanan/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/mekanisme-pelayanan/index') ?>">Mekanisme Pelayanan</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'pelaksana/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/pelaksana/index') ?>">Pelaksana</a></li>
		<li class="<?= (Yii::$app->controller->action->id == 'arsip/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/arsip/index') ?>">Arsip</a></li>
		<li class="<?= (Yii::$app->controller->action->id == 'wewenang/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/wewenang/index') ?>">Wewenang</a></li>
            </ul>
        </li>

        <li class="sidebar-category">
            <span>Web Administrator</span>
            <span class="pull-right"><i class="fa fa-cubes"></i></span>
        </li>
        <!--/ End category widget -->

        <!-- Start widget - overview -->
        <li class="<?= (Yii::$app->controller->action->id == 'webadmin') ? 'active' : '' ?>">
            <a href="<?= Yii::$app->getUrlManager()->createUrl('user/admin/index') ?>">
                <span class="icon"><i class="fa fa-users"></i></span>
                <span class="text">User Management</span>
                <?= (Yii::$app->controller->action->id == 'user/admin/index') ? '<span class="selected"></span>' : '' ?>
            </a>
        </li>
        <!--/ End widget - overview -->
        
        <li class="submenu <?= (Yii::$app->controller->id == 'rbac') ? 'active' : '' ?>">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-key"></i></span>
                <span class="text">RBAC</span>
                <span class="plus"></span>
                <?= (Yii::$app->controller->id == 'layout') ? '<span class="selected"></span>' : '' ?>
            </a>
            <ul>
                <li class="<?= (Yii::$app->controller->action->id == 'assignment') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/rbac/assignment/index') ?>">Assignment</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'role') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/rbac/role/index') ?>">Role</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'permission') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/rbac/permission/index') ?>">Permission</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'route') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/rbac/route/index') ?>">Route</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'rule') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/rbac/rule/index') ?>">Rule</a></li>
            </ul>
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
<!-- <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="setting" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Setting"><i class="fa fa-cog"></i></a>
        <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="lock-screen" data-url="index.php?r=admin%2Fpage%2Flockscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
        <a id="logout" data-url="index.php?r=admin%2Fpage%2Fsignin" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
    </div> 
    <!--/ End left navigation - footer -->

</aside><!-- /#sidebar-left -->
</body>