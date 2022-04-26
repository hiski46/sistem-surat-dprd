<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4>Detail Surat</h4>
				</div>
			</div>
			<div class="card-body" id="container-surat">
				<table id="detail" class="table table-sm table-bordered table-hover">
					<tr>
						<th class="align-middle">Nomor Surat</th>
						<td class="align-middle" id="nomor-surat" data-idsurat="<?= encrypt_url($surat->id_surat); ?>"><?= $surat->nomor_surat; ?></td>
						<th class="align-middle">Tipe Surat</th>
						<td class="align-middle"><?= 'Surat ' . ucwords($surat->tipe_surat); ?></td>
					</tr>
					<tr>
						<th class="align-middle">Tanggal Surat</th>
						<td class="align-middle"><?= convertTanggal(date('Y-m-d', strtotime($surat->tanggal_surat)), true); ?></td>
						<th class="align-middle">Tanggal Terima</th>
						<td class="align-middle"><?= convertTanggal(date('Y-m-d', strtotime($surat->tanggal_diterima)), true); ?></td>
					</tr>
					<tr>
						<th class="align-middle">Pengirim</th>
						<td class="align-middle"><?= $surat->asal_surat; ?></td>
						<th class="align-middle">Tujuan Surat</th>
						<td class="align-middle"><?= $surat->tujuan_surat; ?></td>
					</tr>
					<tr>
						<th class="align-middle">Kecepatan Surat</th>
						<td class="align-middle"><?= ucwords($surat->kecepatan_surat); ?></td>
						<th class="align-middle">Status Surat</th>
						<td class="align-middle"><?= ucwords($surat->status_surat); ?></td>
					</tr>
					<tr>
						<th class="align-middle">Perihal</th>
						<td class="align-middle"><?= ucwords($surat->isi); ?></td>
						<th class="align-middle">Penerima Surat</th>
						<td class="align-middle"><?= $surat->penerima; ?></td>
					</tr>
				</table>


			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between align-items-center">
					<h4>Disposisi Surat</h4>
					<a href="<?= site_url('surat/Disposisi/disposisi_surat/' . encrypt_url($surat->id_surat)); ?>" class="btn btn-sm btn-primary">
						<i class="fas fa-plus"></i> Disposisi Surat
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="surat-disposisi" class="table table-sm table-bordered table-hover display nowrap" width="100%">
						<thead>
							<th class="text-center align-middle">#</th>
							<th class="text-center align-middle">Tujuan Disposisi</th>
							<th class="text-center align-middle">Tipe Disposisi</th>
							<th class="text-center align-middle">Tanggal</th>
							<th class="text-center align-middle">Disposisi</th>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4>Preview Surat</h4>
				</div>
			</div>
			<div class="card-body" id="container-surat">
				<div class="priview-surat border-dark">
					<?php if (!empty($surat->file)) : ?>
						<?php $file_parts = pathinfo($surat->file); ?>
						<?php if (isset($file_parts['extension']) && $file_parts['extension'] == 'pdf') : ?>
							<div class="text-center">

								<iframe src='<?= base_url('writable/upload/surat/' . $surat->file); ?>' width="500" height="678">
									<p class="text-center">This browser does not support PDF!</p>
								</iframe>
							</div>
						<?php else : ?>
							<img width="600px" height="750px" src="<?= base_url('writable/upload/surat/' . $surat->file); ?>" class="rounded mx-auto d-block" alt="Preview surat">
						<?php endif; ?>
					<?php else : ?>
						<p class="text-center">Tidak ada file surat!</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
