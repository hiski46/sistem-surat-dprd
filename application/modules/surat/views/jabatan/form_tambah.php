<div class="modal" tabindex="-1" id="modal-form">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= $title; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="my-form">
					<input type="hidden" id="parent" name="parent" value="<?= $parent; ?>">
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan">
						<div class="invalid-feedback" id="error-jabatan"></div>
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
