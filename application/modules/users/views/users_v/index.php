<div class="row">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-header">
				<div class="d-flex justify-content-between align-items-center">
					<h4>
						<?= $title; ?>
					</h4>
					<button type="button" class="btn btn-sm btn-primary" data-id="" onclick="form_tambah()" data-toggle="tooltip" title="Tambah Users">
						<div class="row px-2">
							<i class="fas fa-plus my-auto"></i> <span class="d-none d-sm-block ml-2"> Tambah Users</span>
						</div>
					</button>
				</div>
			</div>
			<div class="card-body">
				<table id="datatables" class="table table-bordered table-hover display" width="100%">
					<thead>
						<tr>
							<th class="text-center align-middle" width="3%">#</th>
							<th class="text-center align-middle" width="25%">Nama Lengkap</th>
							<th class="text-center align-middle" width="15%">Username</th>
							<th class="text-center align-middle" width="15%">NIP/NRP/Code</th>
							<th class="text-center align-middle" width="20%">Jabatan</th>
							<th class="text-center align-middle" width="7%">Level</th>
							<th class="text-center align-middle" width="15%"><span class="d-none d-sm-block ml-0">Action</span></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>

	</div>
</div>

<div class="view-modal"></div>
