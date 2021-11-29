<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>MIA MIC | Media Informatika Cendekia</title>


  <link rel="shortcut icon" href="dist/img/logokampus.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 </head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
    <!-- Left navbar links -->
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">MIA MIC | Media Informatika Cendekia</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <?php  if ($session->isUserLoggedIn(true)): ?>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
           <span><?php echo remove_junk(ucfirst($user['name'])); ?></span>
           <i class="fas fa-angle-left right"></i>
          <span class="badge badge-info right">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="uploads/users/<?php echo $user['image'];?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
              <?php echo remove_junk(ucfirst($user['name'])); ?>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="edit_account.php" class="dropdown-item">
            Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            Logout
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
    <?php endif;?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a class="brand-link">
      <span class="brand-text font-weight-light">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success"><i class="nav-icon fas fa-tachometer-alt"></i></button>
			<button class="btn btn-warning"> <i class="nav-icon fa fa-briefcase"></i></button>
			<button class="btn btn-danger"><i class="nav-icon fa fa-desktop"></i></button>
            <button class="btn btn-warning"><i class="nav-icon fa fa-shopping-cart"></i></button>
            <button class="btn btn-primary"><i class="nav-icon fa fa-truck"></i></button>
		</div>
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <?php if($user['user_level'] === '1'): ?>
        <!-- admin menu -->
      <?php include_once('layouts/admin_menu.php');?>

      <?php elseif($user['user_level'] === '2'): ?>
        <!-- Special user -->
      <?php include_once('layouts/special_menu.php');?>

      <?php elseif($user['user_level'] === '3'): ?>
        <!-- User menu -->
      <?php include_once('layouts/user_menu.php');?>

      <?php endif;?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>