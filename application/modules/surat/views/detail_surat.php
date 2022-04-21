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
						<td class="align-middle"><?= $surat->nomor_surat; ?></td>
						<th class="align-middle">Tipe Surat</th>
						<td class="align-middle"><?= $surat->tipe_surat; ?></td>
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
						<td class="align-middle"><?= $surat->kecepatan_surat; ?></td>
						<th class="align-middle">Status Surat</th>
						<td class="align-middle"><?= $surat->status_surat; ?></td>
					</tr>
					<tr>
						<th class="align-middle">Perihal</th>
						<td class="align-middle"><?= $surat->isi; ?></td>
						<th class="align-middle">Penerima Surat</th>
						<td class="align-middle"><?= $surat->penerima; ?></td>
					</tr>
				</table>

				<button type="button" class="btn btn-sm btn-primary mt-4 float-right" onclick="add()">
					<i class="fas fa-undo"></i> Disposisi Surat
				</button>
			</div>
		</div>
	</div>
</div>
