 
<aside id="sidebar-left" class="<?php echo !empty($classLeft)? $classLeft : 'sidebar-circle' ?>">

    <!-- Start left navigation - profile shortcut -->
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="<?= Yii::$app->getUrlManager()->createUrl('user/settings/profile') ?>">
                <img src="<?= Yii::getAlias('@web').'/images/user50x50.png'; ?>"  alt="brand admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <span class="media-heading"><strong><?= Yii::$app->user->identity->profile->name; ?></strong></span>
                <p class="media-heading"><small><strong>Kec. Kampung Melayu</strong></small></p>
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

<!--         Start category apps 
        <li class="sidebar-category">
            <span>Portal</span>
            <span class="pull-right"><i class="fa fa-globe"></i></span>
        </li>
        / End category apps 

         Start navigation - blog 
        <li class="submenu <?= (Yii::$app->controller->id == 'blog') ? 'active' : '' ?>">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-globe"></i></span>
                <span class="text">Blog</span>
                <span class="arrow"></span>
                <?= (Yii::$app->controller->id == 'blog') ? '<span class="selected"></span>' : '' ?>
            </a>
            <ul>
                <li class="<?= (Yii::$app->controller->action->id == 'grid') ? 'active' : '' ?>">
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/blog/grid') ?>">Grid</a>
                </li>
                <li class="<?= (Yii::$app->controller->action->id == 'list') ? 'active' : '' ?>">
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/blog/list') ?>">List</a>
                </li>
                <li class="<?= (Yii::$app->controller->action->id == 'single') ? 'active' : '' ?>">
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/blog/single') ?>">Single</a>
                </li>
            </ul>
        </li>
        / End navigation - blog 

         Start navigation - mail 
        <li class="submenu <?= (Yii::$app->controller->id == 'mail') ? 'active' : '' ?>">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <span class="text">Mail</span>
                <span class="arrow"></span>
                <?= (Yii::$app->controller->id == 'mail') ? '<span class="selected"></span>' : '' ?>
            </a>
            <ul>
                <li class="<?= (Yii::$app->controller->action->id == 'inbox') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/mail/inbox') ?>">Inbox</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'compose') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/mail/compose') ?>">Compose mail</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'view') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/mail/view') ?>">View mail</a></li>
            </ul>
        </li>
        / End navigation - mail 

         Start navigation - pages 
        <li class="submenu <?= (Yii::$app->controller->id == 'page') ? 'active' : '' ?>">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-file-o"></i></span>
                <span class="text">Pages</span>
                <span class="arrow"></span>
                <?= (Yii::$app->controller->id == 'page') ? '<span class="selected"></span>' : '' ?>
            </a>
            <ul>
                <li class="<?= (Yii::$app->controller->action->id == 'gallery') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/gallery') ?>">Gallery</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'faq') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/faq') ?>">FAQ <span class="label label-danger pull-right">New</span></a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'invoice') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/invoice') ?>">Invoice</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'messages') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/messages') ?>">Messages</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'timeline') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/timeline') ?>">Timeline</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'profile') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/profile') ?>">Profile</a></li>
                
                
                <?php $searchSubs = ['searchcourse']?>
                
                <li class="submenu <?= (in_array(Yii::$app->controller->action->id, $searchSubs)) ? 'active' : '' ?>">
                    <a href="javascript:void(0);">Search<span class="arrow"></span></a>
                    <ul>
                        <li class="<?= (Yii::$app->controller->action->id == 'searchcourse') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/searchcourse') ?>">Courses</a></li>
                    </ul>
                </li>
                
                
                <li class="submenu">
                    <a href="javascript:void(0);">Error <span class="arrow"></span></a>
                    <ul>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/error403') ?>">Error 403</a></li>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/error404') ?>">Error 404</a></li>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/error500') ?>">Error 500</a></li>
                    </ul>
                </li>
                
                
                
                <li class="submenu">
                    <a href="javascript:void(0);">Account <span class="arrow"></span></a>
                    <ul>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/signin') ?>">Sign In</a></li>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/signintype2') ?>">Sign In Type 2</a></li>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/signup') ?>">Sign Up</a></li>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/lostpassword') ?>">Lost password</a></li>
                        <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/admin/page/lockscreen') ?>">Lock Screen</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        / End navigation - pages -->

        <!-- Start category widget -->
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
<!--    <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="setting" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Setting"><i class="fa fa-cog"></i></a>
        <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="lock-screen" data-url="index.php?r=admin%2Fpage%2Flockscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
        <a id="logout" data-url="index.php?r=admin%2Fpage%2Fsignin" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
    </div> /.sidebar-footer -->
    <!--/ End left navigation - footer -->

</aside><!-- /#sidebar-left -->
