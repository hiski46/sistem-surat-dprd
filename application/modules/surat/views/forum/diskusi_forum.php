<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4><?= $title; ?></h4>
					<a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '#!'; ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Tambah Surat">
						<div class="row px-2">
							<i class="fas fa-arrow-left my-auto"></i> <span class="d-none d-sm-block ml-2"> Kembali</span>
						</div>
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row my-3">
					<div class="col-md-12">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<div class="d-flex justify-content-between align-items-center">
									<div class="user-block">
										<img class="img-circle" src="<?= base_url('assets/images/profile.png'); ?>" alt="User Image">
										<span class="username"><a href="#">Diskusi: <?= $forums[0]['topik_forum']; ?> (<?= $forums[0]['nomor_surat']; ?>)</a></span>
										<span class="description">By <?= $forums[0]['pembuat_forum']; ?> - <?= convertTanggal(date('Y-m-d', strtotime($forums[0]['tgl_forum'])), true) . ' at ' . date('H:i', strtotime($forums[0]['tgl_forum'])); ?></span>
									</div>
									<div>
										<a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Refresh" onclick="window.location.reload()">
											<i class="fa fa-sync m-1"></i>
										</a>
										<?php if ($forums[0]['status'] == 'open') : ?>
											<a href="<?= site_url('surat/Forum/update/' . encrypt_url($forums[0]['id_forum'])); ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit Forum">
												<i class="far fa-edit m-1"></i>
											</a>
											<a href="javascript:void(0)" class="btn btn-xs btn-danger" data-idforum="<?= encrypt_url($forums[0]['id_forum']); ?>" onclick="close_forum(this)" data-toggle="tooltip" title="Tutup Forum">
												<i class="fa fa-times m-1"></i>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Anggota Dalam Forum Diskusi: </h5><br>
										<?php foreach ($forums[0]['anggota_forum'] as $anggota) : ?>
											<span class="badge badge-info"><?= $anggota; ?></span>
										<?php endforeach; ?>
									</div>
								</div>
								<p>
									<?= $forums[0]['pembahasan_forum']; ?>
								</p>
								<?php if ($forums[0]['status'] == 'open') : ?>
									<div class="row reply">
										<div class="col-md-12">
											<a href="javascript:void(0)" class="btn btn-xs btn-info float-right" data-idforum="<?= encrypt_url($forums[0]['id_forum']); ?>" onclick="reply(this)">Reply</a>
										</div>
										<div class="col-md-12">
											<div class="form-diskusi">

											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<?php if (!empty($forums[0]['isi_forum'])) : ?>
							<?php foreach ($forums as $forum) : ?>
								<div class="card ml-3">
									<div class="card-header">
										<div class="user-block">
											<img class="img-circle" src="<?= base_url('assets/images/profile.png'); ?>" alt="User Image">
											<span class="username"><a href="#">Re: <?= $forums[0]['topik_forum']; ?> (<?= $forums[0]['nomor_surat']; ?>)</a></span>
											<span class="description">By <?= $forum['nama_lengkap']; ?> - <?= convertTanggal(date('Y-m-d', strtotime($forum['created_at'])), true) . ' at ' . date('H:i', strtotime($forum['created_at'])); ?></span>
										</div>
									</div>
									<div class="card-body">
										<p><?= $forum['isi_forum']; ?></p>

									</div>
								</div>
							<?php endforeach; ?>
							<?php if ($forums[0]['status'] == 'open') : ?>
								<div class="row reply">
									<div class="col-md-12">
										<a href="javascript:void(0)" class="btn btn-xs btn-info float-right ml-1" data-idforum="<?= encrypt_url($forums[0]['id_forum']); ?>" onclick="reply(this)">Reply</a>
									</div>
									<div class="col-md-12">
										<div class="form-diskusi">

										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
