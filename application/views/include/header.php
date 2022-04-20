<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo "Sistem Manajemen Surat"; ?></title>

	<script type="language/javascript">
		var site_url = "<?php echo site_url(); ?>" ;
		var base_url = "<?php echo base_url(); ?>" ;
	</script>

	<?php load_css(get_base_css()); ?>
	<?php if(isset($css)) { load_css($css); } ?>

</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		 <!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
    		<img src="<?php echo base_url("assets/images/logo-dprd-prov.png"); ?>" alt="DPRD PROVINSI LAMPUNG" height="80" width="80">
			<span>SISTEM MANAJEMEN SURAT</span>
		</div>
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="far fa-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i>Profile
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo site_url('auth/logout') ?>" class="dropdown-item">
							<i class="fas fa-sign-out-alt mr-2"></i>Logout
						</a>
					</div>
      			</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?php echo site_url("surat"); ?>" class="brand-link">
				<img src="<?php echo base_url("assets/images/logo-dprd-prov.png"); ?>" alt="DPRD PROVINSI LAMPUNG" class="brand-image img-circle elevation-3" style="opacity: .8">			
				<span class="">MANAJEMEN SURAT</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-envelope"></i>
								<p>SURAT MASUK<i class="right fas fa-angle-right"></i></p>
							</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo site_url('surat/surat'); ?>" class="nav-link active">
									<i class="far fa-circle nav-icon"></i>
									<p>DAFTAR SURAT</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('surat/surat/disposisi'); ?>" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>DISPOSISI </p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-envelope"></i>
								<p>SURAT KELUAR<i class="right fas fa-angle-right"></i></p>
							</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="./index.html" class="nav-link active">
									<i class="far fa-circle nav-icon"></i>
									<p>DAFTAR SURAT</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="./index2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>DISPOSISI SURAT</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
							<a href="<?= site_url('surat/dashboard') ?>" class="nav-link active">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= site_url('surat/jabatan') ?>" class="nav-link">
								<i class="nav-icon fas fa-arrow-right"></i>
								<p>
									Jabatan
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= site_url('surat/disposisi') ?>" class="nav-link">
								<i class="nav-icon fas fa-arrow-right"></i>
								<p>
									Disposisi
								</p>
							</a>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper" style="min-height: 2171px;">
			<!-- Content Header (Page header) -->
			<!-- <div class="content-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb float-sm-left">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard v1</li>
							</ol>
						</div> -->
						<!-- /.col -->
					<!-- </div> -->
					<!-- /.row -->
				<!-- </div> -->
				<!-- /.container-fluid -->
			<!-- </div> -->
			<!-- /.content-header -->

			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1></h1>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>			

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">



