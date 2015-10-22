<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web') ?>/images/user50x50.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->profile->name; ?></p>
                <?php
                    $filter = array('KOTA ADMINISTRASI','KABUPATEN');
                    //$lokasi = str_replace($filter, '', Yii::$app->user->identity->lokasi->nama);
                ?>
                <a href="#"><?= Yii::$app->user->identity->profile->name; ?><br><?php // $lokasi; ?></a>
            </div>
        </div>
        <?php
        if (Yii::$app->user->can('Petugas')) {
            switch (Yii::$app->user->identity->pelaksana_id) {
                case 7: //FO
                    echo dmstr\widgets\Menu::widget(
                            [
                                'options' => ['class' => 'sidebar-menu'],
                                'items' => [
                                    ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => ['/perizinan/dashboard']],
                                    ['label' => 'Permohonan Baru', 'icon' => 'fa fa-search', 'url' => ['/perizinan/index', 'status'=>'registrasi']],
                                    ['label' => 'Verifikasi Berkas', 'icon' => 'fa fa-check', 'url' => ['/perizinan/index', 'status' => 'verifikasi']],
                                    ['label' => 'Konfimasi Pemohon', 'icon' => 'fa fa-user', 'url' => ['/perizinan/confirm-pemohon']],
                                ],
                            ]
                    );
                    break;
                
                case 3: //Tim TU
                    echo dmstr\widgets\Menu::widget(
                            [
                                'options' => ['class' => 'sidebar-menu'],
                                'items' => [
                                    ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => ['/perizinan/dashboard']],
                                    ['label' => 'Cetak Izin', 'icon' => 'fa fa-check', 'url' => ['/perizinan/index', 'status'=>'cetak']],
                                    ['label' => 'Cetak Penolakan', 'icon' => 'fa fa-close', 'url' => ['/perizinan/index', 'status' => 'tolak']],
                                ],
                            ]
                    );
                    break;
                
                case 4: //Tim Teknis
                    echo dmstr\widgets\Menu::widget(
                            [
                                'options' => ['class' => 'sidebar-menu'],
                                'items' => [
                                    ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => ['/perizinan/dashboard']],
                                    ['label' => 'Permohonan Teknis', 'icon' => 'fa fa-envelope', 'url' => ['/perizinan/index']],
                                ],
                            ]
                    );
                    break;
                
                case 17: //Koordinator Tim Teknis
                    echo dmstr\widgets\Menu::widget(
                            [
                                'options' => ['class' => 'sidebar-menu'],
                                'items' => [
                                    ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => ['/perizinan/dashboard']],
                                    ['label' => 'Permohonan Teknis', 'icon' => 'fa fa-envelope', 'url' => ['/perizinan/index']],
                                ],
                            ]
                    );
                    break;
                
                case 5: //Kepala
                    echo dmstr\widgets\Menu::widget(
                            [
                                'options' => ['class' => 'sidebar-menu'],
                                'items' => [
                                    ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => ['/perizinan/dashboard']],
                                    ['label' => 'Permohonan Baru', 'icon' => 'fa fa-envelope', 'url' => ['/perizinan/index']],
                                ],
                            ]
                    );
                    break;
                
                default:
                    break;
            }
        }
        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')) {
            echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu'],
                        'items' => [
                            [
                                'label' => 'Portal',
                                'icon' => 'fa fa-globe',
                                'url' => '#',
                                'items' => [
									['label' => 'Menu Navigasi',
									'icon' => 'fa fa-angle-right',
									'url' => '#',
									'items' => [
										['label' => 'Menu Main', 'icon' => 'fa fa-angle-right', 'url' => ['/menu-nav-main/index'],],
										['label' => 'Menu Sub', 'icon' => 'fa fa-angle-right', 'url' => ['/menu-nav-sub/index'],],
										
									],],
                                    ['label' => 'Page Statis', 'icon' => 'fa fa-angle-right', 'url' => ['/page/index'],],
                                    ['label' => 'Menu Katalog', 'icon' => 'fa fa-angle-right', 'url' => ['/menu-katalog/index'],],
                                    ['label' => 'Fungsi', 'icon' => 'fa fa-angle-right', 'url' => ['/fungsi/index'],],
                                    ['label' => 'Visi/ Misi', 'icon' => 'fa fa-angle-right', 'url' => ['/visi-misi/index'],],
                                    ['label' => 'Berita', 'icon' => 'fa fa-angle-right', 'url' => ['/berita/index'],],
                                    ['label' => 'FAQ', 'icon' => 'fa fa-angle-right', 'url' => ['/faq/index'],],
                                    ['label' => 'Kontak', 'icon' => 'fa fa-angle-right', 'url' => ['/kontak/index'],],
                                    ['label' => 'Manfaat', 'icon' => 'fa fa-angle-right', 'url' => ['/manfaat/index'],],
                                    ['label' => 'Slider', 'icon' => 'fa fa-angle-right', 'url' => ['/slider/index'],],
                                ],
                            ],
                        ],
                    ]
            );
        }
        if (Yii::$app->user->can('Administrator')) {
            echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu'],
                        'items' => [
                            [
                                'label' => 'Data Master',
                                'icon' => 'fa fa-folder-open-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Bidang', 'icon' => 'fa fa-angle-right', 'url' => ['/bidang/index'],],
									['label' => 'Izin', 'icon' => 'fa fa-angle-right', 'url' => ['/izin/index'],],
                                    ['label' => 'Kbli', 'icon' => 'fa fa-angle-right', 'url' => ['/kbli/index'],],
                                    ['label' => 'Lokasi', 'icon' => 'fa fa-angle-right', 'url' => ['/lokasi/index'],],
                                    ['label' => 'Pelaksana', 'icon' => 'fa fa-angle-right', 'url' => ['/pelaksana/index'],],
                                    ['label' => 'Arsip', 'icon' => 'fa fa-angle-right', 'url' => ['/arsip/index'],],
                                    ['label' => 'Wewenang', 'icon' => 'fa fa-angle-right', 'url' => ['/wewenang/index'],],
									['label' => 'Zonasi', 'icon' => 'fa fa-angle-right', 'url' => ['/zonasi/index'],],
									['label' => 'SOP Action', 'icon' => 'fa fa-angle-right', 'url' => ['/sop-action/index'],],
									['label' => 'Hari Libur', 'icon' => 'fa fa-angle-right', 'url' => ['/hari-libur/index'],],
                                ],
                            ],
                            ['label' => 'User Management', 'icon' => 'fa fa-users', 'url' => ['/user/admin/index']],
                            [
                                'label' => 'RBAC',
                                'icon' => 'fa fa-key',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Assignment', 'icon' => 'fa fa-angle-right', 'url' => ['/rbac/assignment/index'],],
                                    ['label' => 'Role', 'icon' => 'fa fa-angle-right', 'url' => ['/rbac/role/index'],],
                                    ['label' => 'Permission', 'icon' => 'fa fa-angle-right', 'url' => ['/rbac/permission/index'],],
                                    ['label' => 'Route', 'icon' => 'fa fa-angle-right', 'url' => ['/rbac/route/index'],],
                                    ['label' => 'Rule', 'icon' => 'fa fa-angle-right', 'url' => ['/rbac/rule/index'],],
                                ],
                            ],
                        ],
                    ]
            );
			
			
			
			
        }

//        <?php
        //  dmstr\widgets\Menu::widget(
//            [
//                'options' => ['class' => 'sidebar-menu'],
//                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'fa fa-angle-right', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'fa fa-share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'fa fa-angle-right', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-angle-right',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-angle-right', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-angle-right',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-angle-right', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-angle-right', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
//                ],
//            ]
//        ) 
//       ?>

    </section>

</aside>
