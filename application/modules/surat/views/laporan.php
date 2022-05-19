<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3>LAPORAN SURAT</h3>
			</div>
			<div class="card-body">
				<form method="POST" target="_blank" id="form_filter">
					<div class="row">
						<div class="col-md-3 col-xs-12">
							<div class="form-group">
								<label>Pilih Dari Tanggal</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
									<input type="date" class="form-control form-control-sm float-right filter_date" name="start_date" id="start_date">
								</div>

							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="form-group">
								<label>Sampai Tanggal</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
									<input type="date" class="form-control form-control-sm float-right filter_date" name="end_date" id="end_date">
								</div>

							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="form-group">
								<label>Tipe Surat</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="fas fa-filter"></i>
										</span>
									</div>
									<select name="tipe_surat" id="tipe_surat" class="form-control form-control-sm float-right filter_date">
										<option value="">Tipe Surat</option>
										<option value="masuk">Masuk</option>
										<option value="keluar">Keluar</option>
										<option value="internal">Internal</option>
									</select>
								</div>

							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="form-group">
								<label>Status Surat</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="fas fa-filter"></i>
										</span>
									</div>
									<select name="status_surat" id="status_surat" class="form-control form-control-sm float-right filter_date">
										<option value="">Status Surat</option>
										<option value="diproses">Diproses</option>
										<option value="diterima">Diterima</option>
										<option value="selesai">Selesai</option>
									</select>
								</div>

							</div>
						</div>
					</div>
				</form>
				<table id="table-laporan" class="table table-bordered display responsive" width="100%"></table>
			</div>
		</div>
	</div>
</div>
