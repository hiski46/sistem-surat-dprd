<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3><?= $jml_surat_masuk; ?></h3>

				<p>Jumlah Surat Masuk</p>
			</div>
			<div class="icon">
				<i class="ion ion-reply"></i>
			</div>
			<a href="<?= site_url('surat/Surat/view/masuk'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3><?= $jml_surat_keluar; ?></h3>

				<p>Jumlah Surat Keluar</p>
			</div>
			<div class="icon">
				<i class="ion ion-forward"></i>
			</div>
			<a href="<?= site_url('surat/Surat/view/keluar'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3><?= $jml_surat_internal; ?></h3>

				<p>Jumlah Surat Internal</p>
			</div>
			<div class="icon">
				<i class="ion ion-loop"></i>
			</div>
			<a href="<?= site_url('surat/Surat/view/internal'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner text-center">
				<h3 id="jam_berjalan"></h3>

				<p><?= convertTanggal(date('Y-m-d'), true); ?></p>
			</div>

			<a href="#" class="small-box-footer disabled"><i class="ion ion-clock"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->

<div class="card card-default">
	<div class="card-header border-0">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="card-title mt-1">
						<!-- <div class="row"> -->
						<i class="fas fa-th mr-1"></i>
						Grafik Surat
						<!-- </div> -->
					</div>
					<div class="col-md-3">
						<?= form_dropdown("tahun", (isset($tahun) && !is_null($tahun)) ? $tahun : '', date('Y'), "class='form-control form-control-sm d-inline' id='tahun'"); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card-tools float-right">
					<button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-10 col-xs-12" id="box-chart">
				<canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 400px; max-width: 100%;"></canvas>
			</div>
			<div class="col-md-2 col-xs-12">
				<div class="text-center">
					<input type="text" class="knob" id="knob_surat_masuk" data-readonly="true" value="" data-width="60" data-height="60" data-fgColor="#39cccc">
					<div class="text-white">Surat Masuk</div>
				</div>

				<div class="text-center">
					<input type="text" class="knob" id="knob_surat_keluar" data-readonly="true" value="" data-width="60" data-height="60" data-fgColor="#28a745">
					<div class="text-white">Surat Keluar</div>
				</div>

				<div class="text-center">
					<input type="text" class="knob" id="knob_surat_internal" data-readonly="true" value="" data-width="60" data-height="60" data-fgColor="#3c8dbc">
					<div class="text-white">Surat Internal</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card-footer bg-transparent">
		<div class="row">


		</div>

	</div>

</div>
