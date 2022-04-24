<div class="modal fade" id="modal-form">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?= $title; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">

						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/images/profile.png'); ?>" alt="User profile picture">
								</div>
								<h3 class="profile-username text-center"><?= ucwords($user->nama_lengkap); ?></h3>
								<p class="text-muted text-center"><?= $user->nip; ?></p>
								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item">
										<b>Jabatan</b> <a class="float-right"><?= ucwords($user->jabatan); ?></a>
									</li>
									<li class="list-group-item">
										<b>Level</b> <a class="float-right"><?= ($user->level == 'admin') ? '<span class="badge badge-primary">Admin</span>' : '<span class="badge badge-info">Pegawai</span>' ?></a>
									</li>
									<li class="list-group-item">
										<b>Blokir</b> <a class="float-right"><?= ($user->blokir == 0) ? '<span class="badge badge-success">Tidak di blokir</span>' : '<span class="badge badge-danger">Diblokir</span>'; ?></a>
									</li>
									<li class="list-group-item">
										<b>Password</b> <a class="float-right"><button type="button" class="btn btn-primary btn-sm btn-ubah-password" data-id="<?= encrypt_url($user->user_id); ?>" onclick="form_ubah_password(this)">Ubah Password</button></a>
									</li>
								</ul>

							</div>

						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-cencel" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; Close</button>
			</div>
		</div>

	</div>

</div>

</div>
</div>
