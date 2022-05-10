<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/favicon.ico">
	<title><?php echo "Sistem Manajemen Surat"; ?></title>

	<script type="text/javascript">
		site_url = "<?php echo site_url(); ?>";
		base_url = "<?php echo base_url(); ?>";
	</script>

	<?php load_css(get_base_css()); ?>
	<?php if (isset($css)) {
		load_css($css);
	} ?>

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
						<?= ($this->session->has_userdata('nama_lengkap')) ? $this->session->userdata('nama_lengkap') : ''; ?> <i class="far fa-user"></i>

					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
						<a href="<?= site_url('users/detail/' . $this->session->userdata('id_user')); ?>" class="dropdown-item">
							<i class="fas fa-file mr-2"></i>Profile
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item" onclick="logout()">
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
						<li class="nav-item">
							<a href="<?= site_url('surat/dashboard') ?>" class="nav-link <?= (isset($active) && $active == 'dashboard') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item menu-open">
							<a href="#" class="nav-link <?= (isset($expand) && $expand == 'surat_masuk') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-envelope"></i>
								<p>Surat Masuk<i class="right fas fa-angle-right"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo site_url('surat/view/masuk'); ?>" class="nav-link <?= (isset($active) && $active == 'surat_masuk') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Surat Masuk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('surat/disposisi/view/masuk'); ?>" class="nav-link <?= (isset($active) && $active == 'disposisi_masuk') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Disposisi Masuk</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item menu-open">
							<a href="#" class="nav-link <?= (isset($expand) && $expand == 'surat_keluar') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-envelope"></i>
								<p>Surat Keluar<i class="right fas fa-angle-right"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('surat/view/keluar'); ?>" class="nav-link  <?= (isset($active) && $active == 'surat_keluar') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Surat Keluar</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('surat/disposisi/view/keluar'); ?>" class="nav-link <?= (isset($active) && $active == 'disposisi_keluar') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Disposisi Keluar</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item menu-open">
							<a href="#" class="nav-link <?= (isset($expand) && $expand == 'surat_internal') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-envelope"></i>
								<p>Surat Internal<i class="right fas fa-angle-right"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('surat/view/internal'); ?>" class="nav-link  <?= (isset($active) && $active == 'surat_internal') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Surat Internal</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('surat/disposisi/view/internal'); ?>" class="nav-link <?= (isset($active) && $active == 'disposisi_internal') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Disposisi Internal</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item menu-open">
							<a href="#" class="nav-link <?= (isset($expand) && $expand == 'laporan') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-envelope"></i>
								<p>Laporan<i class="right fas fa-angle-right"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('surat/laporan'); ?>" class="nav-link  <?= (isset($active) && $active == 'laporan') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Laporan</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item menu-open">
							<a href="#" class="nav-link <?= (isset($expand) && $expand == 'master_data') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-envelope"></i>
								<p>Master Data<i class="right fas fa-angle-right"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('surat/jabatan') ?>" class="nav-link <?= (isset($active) && $active == 'jabatan') ? 'active' : ''; ?>">
										<i class="nav-icon fas fa-id-card"></i>
										<p>
											Jabatan
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('surat/instansi') ?>" class="nav-link <?= (isset($active) && $active == 'instansi') ? 'active' : ''; ?>">
										<i class="nav-icon fas fa-university"></i>
										<p>
											Instansi
										</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?= site_url('users/users') ?>" class="nav-link <?= (isset($active) && $active == 'users') ? 'active' : ''; ?>">
										<i class="nav-icon fas fa-users"></i>
										<p>
											Manajemen Users
										</p>
									</a>
								</li>
							</ul>
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

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
