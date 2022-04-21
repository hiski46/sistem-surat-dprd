<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Jabatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="add()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body form">
				<form action="#" id="formData">
					<input type="hidden" id="id" name="id" value="">
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan">
						<p class="text-danger jabatan"></p>
					</div>

					<div class="form-group">
						<label for="parent">Parent</label>
						<input type="number" class="form-control" id="parent" name="parent">
						<p class="text-danger parent"></p>
					</div>
				</form>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave" onclick="save() ">Simpan</button>
			</div>
		</div>

	</div>

</div>
