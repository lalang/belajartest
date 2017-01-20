<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
		<div class="user-panel">
            <div class="pull-left image">
				<?php if(!empty($user_login_now["photo_user"])){?>
				<img src="<?php echo base_url('images/photo_user/'.$user_login_now["photo_user"]) ?>" class="img-circle" alt="User Image" />		
				<?php }else{ ?>
				<img src='<?php echo base_url('images/general/empty_photo.png');?>' border='0' class="img-circle" alt="User Image"/>
				<?php }?>
            </div>
            <div class="pull-left info">
                <p><?php echo $user_login_now["nm_user"]; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
			<?php
			foreach($hasilMenu as $dataMenu)
			{	
			?>
            <li class="treeview <?php if($active_menu==$dataMenu->nm_adm_menu){echo"active";} ?>">
				<?php 
				$jml = count($this->menu->loadAllMenuSub($dataMenu->id_adm_menu, $user_login_now['nm_user_group']));
				if($jml){
					echo anchor('admin/'.$dataMenu->url_adm_menu,'<i class="'.$dataMenu->icon_adm_menu.'"></i> <span>'.$dataMenu->nm_adm_menu.'</span> <i class="fa fa-angle-left pull-right"></i>');
				}else{
					echo anchor('admin/'.$dataMenu->url_adm_menu,'<i class="'.$dataMenu->icon_adm_menu.'"></i> <span>'.$dataMenu->nm_adm_menu.'</span>');
				}
				
				
				if($jml){
				?>
				<ul class="treeview-menu">
				<?php 
				$hasilMenuSub = $this->menu->loadAllMenuSub($dataMenu->id_adm_menu, $user_login_now['nm_user_group']);
				foreach($hasilMenuSub as $dataMenuSub)
				{?>
					<li <?php if($active_menu_sub==$dataMenuSub->nm_adm_menu){echo"class='active'";} ?>>
						<?php echo anchor('admin/'.$dataMenuSub->url_adm_menu,'<i class="'.$dataMenuSub->icon_adm_menu.'"></i> <span>'.$dataMenuSub->nm_adm_menu.'</span>');?>
					</li>
				<?php } ?>
				</ul>
				<?php } ?>
			</li>	
			<?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">