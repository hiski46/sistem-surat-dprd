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
					<input type="hidden" id="id" name="id" value="<?= $this->secure->encrypt_url($jabatan->id); ?>">
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan" value="<?= $jabatan->jabatan; ?>">
						<div class="invalid-feedback" id="error-jabatan"></div>
					</div>
					<div class="form-group">
						<label for="parent">Dibawah Bagian</label>
						<?php
						foreach ($list_jabatan as $key => $val) {
							$list_fix[$this->secure->encrypt_url($val->id)] = $val->jabatan;
						}

						echo form_dropdown('parent', $list_fix, $this->secure->encrypt_url($jabatan->parent), ['class' => 'form-control']);

						?>
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
