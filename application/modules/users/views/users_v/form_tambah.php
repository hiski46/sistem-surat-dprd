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
				<form action="#" id="my-form">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="nama_lengkap">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap">
								<div class="invalid-feedback" id="error-nama_lengkap"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
								<div class="invalid-feedback" id="error-username"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
								<div class="invalid-feedback" id="error-password"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="ulangi_password">Ulangi Password</label>
								<input type="password" class="form-control" id="ulangi_password" name="ulangi_password" placeholder="Ulangi Password">
								<div class="invalid-feedback" id="error-ulangi_password"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="nip">NIP/NRP/Kode</label>
								<input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP/NRP/Kode">
								<div class="invalid-feedback" id="error-nip"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="jabatan">Jabatan</label>
								<?php
								if(!empty($jabatan)){
									$list_fix = array('' => 'Pilih Jabatan');
									foreach ($jabatan as $val) {
										$list_fix[encrypt_url($val->id)] = $val->jabatan;
									}
									echo form_dropdown('jabatan', $list_fix, '', ['class' => 'form-control jabatan', 'id' => 'jabatan']);
								}

								?>
								<div class="invalid-feedback error-jabatan" id="error-jabatan"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="level">Level</label>
								<?php
								$option = ['' => 'Pilih Level', 'admin' => 'Admin', 'pegawai' => 'Pegawai'];
								echo form_dropdown('level', $option, '', ['class' => 'form-control', 'id' => 'level']);

								?>
								<div class="invalid-feedback" id="error-level"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="blokir">Aktif</label>
								<?php
								$option = ['' => 'Pilih', '0' => 'Aktif', '1' => 'Tidak Aktif'];
								echo form_dropdown('blokir', $option, '', ['class' => 'form-control', 'id' => 'blokir']);

								?>
								<div class="invalid-feedback" id="error-blokir"></div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-cencel" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; Close</button>
				<button type="button" class="btn btn-primary btn-simpan" onclick="create()"><i class="fas fa-save"></i>&nbsp; Simpan</button>
			</div>
		</div>

	</div>

</div>
