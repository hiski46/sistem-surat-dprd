<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4><?= $title; ?></h4>
					<a href="<?= $_SERVER['HTTP_REFERER']; ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Tambah Surat">
						<div class="row px-2">
							<i class="fas fa-arrow-left my-auto"></i> <span class="d-none d-sm-block ml-2"> Kembali</span>
						</div>
					</a>
				</div>
			</div>
			<div class="card-body">
				<form action="<?= site_url('surat/Forum/action_add'); ?>" method="post" id="form-create">
					<div class="form-group">
						<input type="hidden" name="id_surat" id="id_surat" value="<?= $id_surat; ?>">
						<label>Topik Forum</label>
						<input type="text" class="form-control form-control-sm" id="topik_forum" name="topik_forum" placeholder="Topik Forum Diskusi">
						<div class="invalid-feedback" id="error-topik_forum"></div>
					</div>
					<div class="form-group">
						<label for="jenis_forum">Jenis Forum</label>
						<select name="jenis_forum" id="jenis_forum" class="form-control form-control-sm">
							<option value="">Pilih Jenis Forum</option>
							<option value="group">Group</option>
							<option value="private">Private</option>
						</select>
						<div class="invalid-feedback" id="error-jenis_forum"></div>
					</div>
					<div class="form-group">
						<label>Anggota Forum</label>
						<?php
						if (isset($users)) {
							$list_users = array();
							foreach ($users as $user) {
								$list_users[$user->id] = $user->nama_lengkap;
							}
						}
						echo form_dropdown('anggota_forum[]', $list_users, set_value('anggota_forum'), ['class' => 'form-control form-control-sm', 'id' => 'anggota_forum', 'multiple' => 'multiple']);
						?>
						<div class="invalid-feedback" id="error-anggota_forum"></div>
					</div>
					<div class="form-group">
						<label for="pembahasan_forum">Pembahsan Forum</label>
						<textarea name="pembahasan_forum" id="pembahasan_forum" rows="5" class="form-control form-control-sm" placeholder="Pembahasan forum"></textarea>
					</div>

					<button type="submit" class="btn btn-sm btn-primary float-right btn-simpan"><i class="fa fa-rss"></i> Buat Forum</button>
				</form>

			</div>
		</div>
	</div>
</div>
