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
        <?php if(!Yii::$app->user->can('webmaster')) { ?>
        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => ['/site/index']],
                        ['label' => 'Data Perizinan', 'icon' => 'fa fa-envelope', 'url' => ['/perizinan/index']],
                    ],
                ]
        )
        ?>
        <?php } ?>
        <?php if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')) { ?>
        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        [
                            'label' => 'Portal',
                            'icon' => 'fa fa-list-ul',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Page Statis', 'icon' => 'fa fa-file-code-o', 'url' => ['/page/index'],],
                                ['label' => 'Fungsi', 'icon' => 'fa fa-file-code-o', 'url' => ['/fungsi/index'],],
                                ['label' => 'Berita', 'icon' => 'fa fa-file-code-o', 'url' => ['/berita/index'],],
                                ['label' => 'FAQ', 'icon' => 'fa fa-file-code-o', 'url' => ['/faq/index'],],
                            ],
                        ],
                    ],
                ]
        )
        ?>
        <?php } ?>
        <?php if(Yii::$app->user->can('Administrator')) { ?>
        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        [
                            'label' => 'Data Master',
                            'icon' => 'fa fa-list-ul',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Bidang', 'icon' => 'fa fa-circle-o', 'url' => ['/bidang/index'],],
                                ['label' => 'Izin', 'icon' => 'fa fa-circle-o', 'url' => ['/izin/index'],],
                                ['label' => 'Dokumen Izin', 'icon' => 'fa fa-circle-o', 'url' => ['/dokumen-izin/index'],],
                                ['label' => 'Dokumen Pendukung', 'icon' => 'fa fa-circle-o', 'url' => ['/dokumen-pendukung/index'],],
                                ['label' => 'Kbli', 'icon' => 'fa fa-circle-o', 'url' => ['/kbli/index'],],
                                ['label' => 'Lokasi', 'icon' => 'fa fa-circle-o', 'url' => ['/izin/index'],],
                                ['label' => 'Mekanisme Pelayanan', 'icon' => 'fa fa-circle-o', 'url' => ['/mekanisme-pelayanan/index'],],
                                ['label' => 'Pelaksana', 'icon' => 'fa fa-circle-o', 'url' => ['/pelaksana/index'],],
                                ['label' => 'Arsip', 'icon' => 'fa fa-circle-o', 'url' => ['/arsip/index'],],
                                ['label' => 'Wewenang', 'icon' => 'fa fa-circle-o', 'url' => ['/wewenang/index'],],
                            ],
                        ],
                        ['label' => 'User Management', 'icon' => 'fa fa-users', 'url' => ['/user/admin/index']],
                        [
                            'label' => 'RBAC',
                            'icon' => 'fa fa-key',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Assignment', 'icon' => 'fa fa-circle-o', 'url' => ['/rbac/assignment/index'],],
                                ['label' => 'Role', 'icon' => 'fa fa-circle-o', 'url' => ['/rbac/role/index'],],
                                ['label' => 'Permission', 'icon' => 'fa fa-circle-o', 'url' => ['/rbac/permission/index'],],
                                ['label' => 'Route', 'icon' => 'fa fa-circle-o', 'url' => ['/rbac/route/index'],],
                                ['label' => 'Rule', 'icon' => 'fa fa-circle-o', 'url' => ['/rbac/rule/index'],],
                            ],
                        ],
                    ],
                ]
        )
        ?>
        <?php } ?>

        <?php
        //  dmstr\widgets\Menu::widget(
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
//        ) 
        ?>

    </section>

</aside>
