<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4><?= $title; ?></h4>
					<a href="<?= site_url('surat/Forum/add/' . $_GET['s']); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah Forum">
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
								<th class="align-middle">Anggota Forum</th>
								<th class="align-middle">Jenis Forum</th>
								<th class="align-middle">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($forums) > 0) : ?>
								<?php $no = 1;
								foreach ($forums as $forum) : ?>
									<?php foreach (json_decode($forum['id_anggota_forum']) as $anggota) : ?>
										<?php if (decrypt_url($this->session->userdata('id_user')) == $anggota) : ?>
											<tr>
												<td class="align-middle"><?= $no++; ?></td>
												<td class="align-middle"><a href="<?= site_url('surat/Forum/diskusi/' . encrypt_url($forum['id_forum'])); ?>"><?= $forum['topik_forum']; ?></a></td>
												<td class="align-middle">
													<?= $forum['pembuat_forum']; ?> <br>
													<?= convertTanggal(date('Y-m-d', strtotime($forum['created_at'])), true); ?>
												</td>
												<td>
													<?php foreach ($forum['anggota_forum'] as $value) : ?>
														<span>- <?= $value; ?></span><br>
													<?php endforeach; ?>
												</td>
												<td class="align-middle"><span class="badge badge-<?= ($forum['jenis_forum'] == 'group') ? 'info' : 'danger' ?>"><?= ucfirst($forum['jenis_forum']); ?></span></td>
												<td class="align-middle"><span class="badge badge-<?= ($forum['status'] == 'open') ? 'success' : 'danger' ?>"><?= ucfirst($forum['status']); ?></span></td>
											</tr>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endforeach; ?>
							<?php else : ?>
								<tr>
									<td colspan="6" class="text-center">Belum ada forum diskusi</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
