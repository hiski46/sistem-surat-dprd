<?php if ((count($surat) > 0) && !is_null($surat)) { ?>
<?php
	if($surat["status_surat"] == "diterima") {
		$status_color = "badge-success";
	} else if ($surat["status_surat"] == "diproses"){
		$status_color = "badge-warning";
	} else {
		$status_color = "badge-primary";
	}
?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between align-items-center">
					<h4>Detail Surat</h4>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-sm table-bordered table-hover">
					<tr>
						<th>Nomor Surat</th>
						<td ><?= $surat["nomor_surat"]; ?></td>
						<th>Tipe Surat</th>
						<td><?= 'Surat ' . ucwords($surat["tipe_surat"]); ?></td>
					</tr>
					<tr>
						<th>Tanggal Surat</th>
						<td><?= convertTanggal(date('Y-m-d', strtotime($surat["tanggal_surat"])), true); ?></td>
						<th>Tanggal Terima</th>
						<td><?= convertTanggal(date('Y-m-d', strtotime($surat["tanggal_diterima"])), true); ?></td>
					</tr>
					<tr>
						<th>Pengirim</th>
						<td><?= $surat["asal_surat"]; ?></td>
						<th>Kecepatan Surat</th>
						<td><?= ucwords($surat["kecepatan_surat"]); ?></td>
					</tr>
					<tr>
						<th>Tujuan Surat</th>
						<td><?= $surat["tujuan_surat"]; ?></td>
						<th>Status Surat</th>
						<td><span class="badge <?php echo $status_color; ?>"><?= ucwords($surat["status_surat"]); ?></span></td>
					</tr>
					<tr>
						<th>Perihal</th>
						<td><?= ucwords($surat["isi"]); ?></td>
						<th>Penerima Surat</th>
						<td><?= $surat["penerima"]; ?></td>
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
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="surat-disposisi" class="table table-sm table-bordered table-hover display nowrap" width="100%">
						<thead>
							<th class="text-center align-middle">#</th>
							<th class="text-center align-middle">Tujuan Disposisi</th>
							<th class="text-center align-middle">Tipe Disposisi</th>
							<th class="text-center align-middle">Disposisi</th>
							<th class="text-center align-middle">Tanggal</th>
						</thead>
						<tbody>
							<?php if (count($disposisi) > 0) { $no = 1;?>
							
							<?php foreach ($disposisi as $item) { ?>
								<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $item->tujuan_disposisi; ?> </td>
								<td><?php echo $item->tipe_disposisi; ?></td>
								<td><?php echo $item->disposisi?></td>
								<td><?php echo convertTanggal(date('Y-m-d', strtotime($item->tanggal_disposisi))); ?></td>
								</tr>
							<?php $no++; } ?> 

							<?php } else { ?>
								<tr>
									<td colspan="5" class="text-center">Belum ada disposisi</td>
								</tr>
							<?php } ?>
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
<?php } else { ?>
	<div>
		<div class="col-md-12 text-center">
			<h3>Data tidak ditemukan</h3>
		</div>
	</div>
<?php } ?>
