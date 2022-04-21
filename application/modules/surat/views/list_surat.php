<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4>DAFTAR SURAT MASUK</h4>
					<button type="button" class="btn btn-sm btn-primary" onclick="add()">
						<i class="fas fa-plus"></i> Tambah Surat
					</button>
				</div>
			</div>
			<div class="card-body" id="container-surat">
				<table id="datatables" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center align-middle">#</th>
							<th class="text-center align-middle">Nomor Surat</th>
							<th class="text-center align-middle">Tanggal Diterima</th>
							<th class="text-center align-middle">Sifat Surat</th>
							<th class="text-center align-middle">Asal Surat</th>
							<th class="text-center align-middle">Tujuan Surat</th>
							<th class="text-center align-middle">Isi Surat</th>
							<th class="text-center align-middle">Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
