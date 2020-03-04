<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" href="<?php echo base_url();?>/assets/itdev.ico" type="image/icon">
    <meta charset="UTF-8">
    <title>IT'sMe | IT System Managements</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url('assets/plugins/fontawesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?=base_url('assets/plugins/ionicons/css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url('assets/dist/css/skins/_all-skins.min.css');?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery 2.1.3 -->
    <script src="<?=base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js');?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>    
    <!-- FastClick -->
    <script src='<?=base_url('assets/plugins/fastclick/fastclick.min.js');?>'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/app.min.js');?>" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    
  </head>
  <body class="skin-blue fixed">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">IT'sMe</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
				  <?php if ($t_id == 0) {;?>
				  <?php echo "" ;?> <?php } else {?>
				  <?php echo '<span class="label label-success">'.$t_id.'</span>';?> <?php } ?>
				  
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $t_id?> messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
					  <?php foreach ($kontaks as $k) { ?>
                        <a href="<?php echo site_url('contact/view/'.$k->id_contact);?>">
						<div class="pull-left glyphicon glyphicon-envelope">
						
						</div>						
                          <h4>						
						  <small><i class="fa fa-clock-o"></i><?php echo $k->tanggal;?></small>
                          </h4>
                          <p><?php echo word_limiter($k->pesan,'2');?></p><?php } ?>
                        </a>
                      </li><!-- end message -->
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo site_url('contact');?>">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <?php if ($t_order == 0) {;?>
				  <?php echo "" ;?> <?php } else {?>
				  <?php echo '<span class="label label-warning">'.$t_order.'</span>';?> <?php } ?>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $t_order?> Notification</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
					  <?php foreach ($orders as $o) { ?>
                        <a href="<?php echo site_url('order/read/'.$o->id_order);?>">
						<div class="pull-left glyphicon glyphicon-bell">
						</div>
                          <h4>
                            <?php echo $o->pemesan;?>
                            <small><i class="fa fa-clock-o"></i><?php echo $o->tgl;?></small>
                          </h4>
                          <p><?php echo word_limiter($o->keluhan,'2');?></p><?php } ?>
                        </a>
                      </li><!-- end message -->
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo site_url('order');?>">View All</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <?php if ($t_osof == 0) {;?>
				  <?php echo "" ;?> <?php } else {?>
				  <?php echo '<span class="label label-warning">'.$t_osof.'</span>';?> <?php } ?>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $t_osof?> Notification</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
					  <?php foreach ($xorderpro as $xo) { ?>
                        <a href="<?php echo site_url('ordersof/view/'.$xo->id_orderpro);?>">
                          <div class="pull-left glyphicon glyphicon-lamp">
						</div>
						  <h4>
                           <?php echo word_limiter($xo->pemesan,'2');?>
							<small class="fa fa-clock-o"><?php echo $xo->tgl;?></small>
                          <br>
                         
                            <?php echo word_limiter($xo->request,'3');?>
                         </h4>
                        </a>
						<?php } ?>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="<?php echo site_url('ordersof');?>">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=base_url('assets/admin.jpg');?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $nama;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=base_url('assets/admin.jpg');?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $nama;?> - <?php echo $level;?>
                     
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('users/view/'.$id_user);?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                     <a  href="<?php echo site_url('dashboard/logout/');?>" class="btn btn-default btn-flat"> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url('assets/admin.jpg');?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $nama;?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?=base_url('index.php/dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('index.php/users');?>"><i class="fa fa-circle-o"></i>Pengguna</a></li>
              </ul>
			  <ul class="treeview-menu">
				<li class=""><a href="<?=base_url('index.php/karyawans');?>"><i class="fa fa-circle-o"></i>Karyawan</a>
            </li>
            </ul>
			<ul class="treeview-menu">
				<li class=""><a href="<?=base_url('index.php/agama');?>"><i class="fa fa-circle-o"></i>Agama</a>
            </li>
            </ul>
				<ul class="treeview-menu">
				<li class=""><a href="<?=base_url('index.php/status');?>"><i class="fa fa-circle-o"></i>Status</a>
            </li>
            </ul>
			<ul class="treeview-menu">
				<li class=""><a href="<?=base_url('index.php/software');?>"><i class="fa fa-circle-o"></i>Software</a>
            </li>
            </ul>
			<ul class="treeview-menu">
				<li class=""><a href="<?=base_url('index.php/jeniswo');?>"><i class="fa fa-circle-o"></i>Jenis WO</a>
            </li>
            </ul>
			</li>
			<li>
              <a href="<?=base_url('index.php/contact');?>">
                <i class="fa fa-envelope-o"></i> <span>Pesan</span>
              </a>
            </li>
			<li ><a href="<?=base_url('index.php/order');?>"><i class="glyphicon glyphicon-tasks"></i>Order List Hardware</a>
			</li>
			<li ><a href="<?=base_url('index.php/ordersof');?>"><i class="glyphicon glyphicon-shopping-cart"></i>Order List Software</a>
			</li>
            <li>
              <a href="<?=base_url('index.php/users/blank_page');?>">
                <i class="fa fa-pagelines"></i> <span>Blank Page</span>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Welcome back
            <small class=""><?php echo $nama;?></small>
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->