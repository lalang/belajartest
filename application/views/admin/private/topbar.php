</head>
<body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
			<?php echo anchor('admin','<b>Admin</b>CP', array('class'=>'logo'));?>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
	
		
						<!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if(!empty($user_login_now["photo_user"])){?>
								<img src="<?php echo base_url('images/photo_user/'.$user_login_now["photo_user"]) ?>" class="user-image" alt="User Image" />		
								<?php }else{ ?>
								<img src='<?php echo base_url('images/general/empty_photo.png');?>' border='0' class="user-image" alt="User Image"/>
								<?php }?>
											
                                <span class="hidden-xs"><?php echo $user_login_now["nm_user"]; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">									
									<?php if(!empty($user_login_now["photo_user"])){?>
									<img src="<?php echo base_url('images/photo_user/'.$user_login_now["photo_user"]) ?>" class="img-circle" alt="User Image" />		
									<?php }else{ ?>
									<img src='<?php echo base_url('images/general/empty_photo.png');?>' border='0' class="img-circle" alt="User Image"/>
									<?php }?>
                                    <p>
                                        <?php echo $user_login_now["nm_user"]; ?><br><?php echo $user_login_now["nm_user_group"]; ?>
                                        <small>Terdaftar: <?php echo tanggal($user_login_now["submit_date_user"]); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
										<?php echo anchor('admin/profile','<i class="fa fa-user"></i> Profile', array('class'=>"btn btn-default btn-flat"));?>
                                    </div>
                                    <div class="pull-right">
										<?php echo anchor('admin/logout','<span class="glyphicon glyphicon-log-out"></span> Sign out', array('class'=>"btn btn-default btn-flat",'onclick' => "return confirm('Anda yakin akan logout?')"));?>
                                    </div>
                                </li>
                            </ul>
                        </li>	
              
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->