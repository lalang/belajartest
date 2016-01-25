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

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => ['/perizinan/dashboard']],
                    ['label' => 'Daftar Perizinan', 'icon' => 'fa fa-pencil', 'url' => ['/perizinan/search']],
                    ['label' => 'Perizinan Dalam Proses', 'icon' => 'fa fa-envelope', 'url' => ['/perizinan/active']],
                    ['label' => 'Perizinan Selesai', 'icon' => 'fa fa-check', 'url' => ['/perizinan/done']],
                    ['label' => 'Dokumen-dokumen', 'icon' => 'fa fa-folder-open-o', 'url' => ['/doc-user-man/index']],
                    ['label' => 'Brankas Pribadi', 'icon' => 'fa fa-folder', 'url' => ['/user-file/index']],
                ],
            ]
        ) ?>

    </section>
</aside>
