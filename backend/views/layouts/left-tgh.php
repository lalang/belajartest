<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web') ?>/images/user50x50.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->profile->name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
         <?php if(!Yii::$app->user->can('webmaster')){ ?>
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
        <?php } ?>
        <!--/ End navigation - forms -->
        
        <?php if(Yii::$app->user->can('Administrator')){ ?>
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
        <?php } ?>
        <?php if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')){ ?>
        <li class="sidebar-category">
            <span>CMS</span>
            <span class="pull-right"><i class="fa fa-cubes"></i></span>
        </li>
		
		 <!-- Start widget - overview -->
        <li class="submenu <?= (Yii::$app->controller->id == 'chart') ? 'active' : '' ?>">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-list-ul"></i></span>
                <span class="text">Portal</span>
                <span class="arrow"></span>
                <?= (Yii::$app->controller->id == 'referensi') ? '<span class="selected"></span>' : '' ?>
            </a>
            <ul>
                <li class="<?= (Yii::$app->controller->action->id == 'page/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/page/index') ?>">Page Statis</a></li>
				<li class="<?= (Yii::$app->controller->action->id == 'fungsi/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/fungsi/index') ?>">Fungsi</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'berita/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/berita/index') ?>">Berita</a></li>
                <li class="<?= (Yii::$app->controller->action->id == 'faq/index') ? 'active' : '' ?>"><a href="<?= Yii::$app->getUrlManager()->createUrl('/faq/index') ?>">FAQ</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(Yii::$app->user->can('Administrator')){ ?>
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
        <?php } ?>
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
        
        <?php //  dmstr\widgets\Menu::widget(
//            [
//                'options' => ['class' => 'sidebar-menu'],
//                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'fa fa-share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
//                ],
//            ]
//        ) ?>

    </section>

</aside>
