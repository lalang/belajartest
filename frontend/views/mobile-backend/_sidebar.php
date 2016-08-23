<?php
use yii\helpers\Html;
?>
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
				
						<li class="treeview <?php echo $active['dashboard']; ?>">
							<?php echo Html::a(Yii::t('frontend', '<i class="fa fa-home" aria-hidden="true"></i> Dashboard'), ['/mobile-backend/index/']) ?>
						</li>
						<li class="treeview <?php echo $active['pencabutan']; ?>">
							<?php echo Html::a(Yii::t('frontend', '<i class="fa fa-level-up" aria-hidden="true"></i> Pencabutan'), ['/mobile-backend/pencabutan/']) ?>
						</li>
						<li class="treeview <?php echo $active['perpanjangan']; ?>">
							<?php echo Html::a(Yii::t('frontend', '<i class="fa fa-random" aria-hidden="true"></i> Perpanjangan'), ['/mobile-backend/perpanjangan/']) ?>
						</li>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">			