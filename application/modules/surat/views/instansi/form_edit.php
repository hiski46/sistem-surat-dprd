<div class="modal fade" id="modal-form">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?= $title; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="my-form">
					<input type="hidden" name="id" value="<?= encrypt_url($instansi->id); ?>">
					<div class="form-group">
						<label for="instansi">Instansi</label>
						<input type="text" class="form-control" id="instansi" name="instansi" placeholder="Masukan Instansi" value="<?= $instansi->instansi; ?>">
						<div class="invalid-feedback" id="error-instansi"></div>
					</div>

					<div class="form-group">
						<label for="alamat">Alamat Instansi</label>
						<textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Alamat Instansi"><?= $instansi->alamat; ?></textarea>
						<div class="invalid-feedback" id="error-alamat"></div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-cencel" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; Close</button>
				<button type="button" class="btn btn-primary btn-simpan" onclick="update()"><i class="fas fa-save"></i>&nbsp; Simpan</button>
			</div>
		</div>

	</div>

</div>
