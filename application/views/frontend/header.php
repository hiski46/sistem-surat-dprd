<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo "Sistem Manajemen Surat"; ?></title>

	<script type="text/javascript">
		site_url = "<?php echo site_url(); ?>" ;
		base_url = "<?php echo base_url(); ?>" ;
	</script>

	<?php load_css(get_base_css()); ?>
	<?php if (isset($css)) {
		load_css($css);
	} ?>

</head>

<body class="" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%,rgba(255,255,255,0.9) 100%), url('<?php echo base_url('assets/images/gedung-dprd.jpg'); ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<div class="wrapper">
		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img src="<?php echo base_url("assets/images/logo-dprd-prov.png"); ?>" alt="DPRD PROVINSI LAMPUNG" height="80" width="80">
			<span>SISTEM MANAJEMEN SURAT</span>
		</div>
		<!-- Content Wrapper. Contains page content -->
		<div class="content" style="min-height: 600px;">
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
				<div class="container">
