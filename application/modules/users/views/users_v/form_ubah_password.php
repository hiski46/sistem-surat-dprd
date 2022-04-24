<div class="modal fade" id="modal-ubah-password">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?= $title; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="my-form">
					<input type="hidden" name="id" value="<?= encrypt_url($id); ?>">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<label for="password_lama">Password Lama</label>
							<input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukan Password Lama">
							<div class="invalid-feedback" id="error-password-lama"></div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<label for="password">Password Baru</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
							<div class="invalid-feedback" id="error-password"></div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<label for="ulangi_password">Ulangi Password</label>
							<input type="password" class="form-control" id="ulangi_password" name="ulangi_password" placeholder="Ulangi Password">
							<div class="invalid-feedback" id="error-ulangi_password"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-cencel" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; Close</button>
				<button type="button" class="btn btn-primary btn-simpan" onclick="ubah_password()"><i class="fas fa-save"></i>&nbsp; Simpan</button>
			</div>
		</div>

	</div>

</div>
