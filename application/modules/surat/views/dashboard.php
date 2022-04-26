  			<div class="row">
  				<div class="col-lg-3 col-6">
  					<!-- small box -->
  					<div class="small-box bg-info">
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