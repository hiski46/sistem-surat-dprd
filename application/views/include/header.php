<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/backend/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/summernote/summernote-bs4.min.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
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
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-user"></i>

					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item text-center">
							Profile
						</a>
						<div class="dropdown-divider"></div>
						<div class="d-flex justify-content-center">
							<form action="<?= site_url('auth/logout') ?>" method="POST">

								<button class="btn btn-sm btn-danger mt-2 mb-2" type="submit">
									Logout	<i class="fas fa-xs fa-sign-out-alt"></i>
								</button>
						</div>
						</form>

					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link text-center">
				<span class="brand-text font-font-weight-normal">SISTEM SURAT</span>
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
								<p>SURAT MASUK<i class="right fas fa-angle-right"></i></p>
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
							<li class="nav-item">
								<a href="./index3.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Dashboard v3</p>
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
							<a href="<?= site_url('disposisi') ?>" class="nav-link">
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
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb float-sm-left">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard v1</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">



