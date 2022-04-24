<?php if ($this->session->flashdata('message')): ?>
<div class="flash-success" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
<div class="flash-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
<?php endif; ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4><?= $title; ?></h4>
					<a href="<?= site_url('Surat/add?type='. $this->uri->segment(2)); ?>" class="btn btn-sm btn-primary" onclick="add()" data-toggle="tooltip" title="Tambah Surat">
						<div class="row px-2">
							<i class="fas fa-plus my-auto"></i> <span class="d-none d-sm-block ml-2"> Tambah Surat</span>
						</div>
					</a>
				</div>
			</div>
			<div class="card-body" id="container-surat">
				<!-- <div class="table-responsive"> -->
				<table id="datatables" class="table table-bordered table-hover display" width="100%">
					<thead>
						<tr>
							<th class="text-center align-middle">#</th>
							<th class="text-center align-middle">Nomor Surat</th>
							<th class="text-center align-middle">Tanggal Diterima</th>
							<th class="text-center align-middle">Sifat Surat</th>
							<th class="text-center align-middle">Isi Surat</th>
							<!-- <th class="text-center align-middle">Asal Surat</th>
							<th class="text-center align-middle">Tujuan Surat</th> -->
							<th class="text-center align-middle" width="15%">Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<!-- </div> -->
			</div>
		</div>
	</div>
</div>
