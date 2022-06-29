<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4><?= $title; ?></h4>
					<a href="<?= site_url('surat/Forum/add/'.$_GET['s']); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah Forum">
						<div class="row px-2">
							<i class="fas fa-plus my-auto"></i> <span class="d-none d-sm-block ml-2"> Tambah Forum</span>
						</div>
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th class="align-middle">#</th>
								<th class="align-middle">Forum Diskusi</th>
								<th class="align-middle">Started By</th>
								<th class="align-middle">Last Post Forum</th>
								<th class="align-middle">Jenis Forum</th>
								<th class="align-middle">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="align-middle">1</td>
								<td class="align-middle"><a href="<?= site_url('surat/Forum/diskusi'); ?>">Koordinasi terkait tindak lanjut surat</a></td>
								<td class="align-middle">
									Ade Rahman <br>
									29 Juni 2022
								</td>
								<td class="align-middle">
									Ringgo <br>
									30 Juni 2022
								</td>
								<td class="align-middle"><span class="badge badge-danger">Private</span></td>
								<td class="align-middle"><span class="badge badge-success">Open</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
