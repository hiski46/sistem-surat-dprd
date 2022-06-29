<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" class="text-center">
				<div class="d-flex justify-content-between align-items-center">
					<h4><?= $title; ?></h4>
				</div>
			</div>
			<div class="card-body" id="container-surat">
				<form action="<?= site_url('surat/Disposisi/disposisikan_surat'); ?>" method="post" id="form-disposisi">
					<input type="hidden" name="id_surat" value="<?= encrypt_url($surat->id); ?>">
					<div class="form-group">
						<label>Tujuan Disposisi <?= form_error('tujuan_disposisi'); ?> <small class="text-warning">Jika Instansi/Jabatan Tujuan belum ada silahkan tambahkan dengan klik link berikut <a href="<?= site_url('surat/Instansi'); ?>" target="_blank">Instansi</a>/<a href="<?= site_url('surat/Jabatan'); ?>" target="_blank">Jabatan</a></small></label>
						<?php
						if (isset($jabatan) && isset($instansi)) {
							$list_tujuan = array('' => 'Pilih Tujuan Disposisi');
							if ($surat->tipe_surat == 'masuk') {
								foreach ($jabatan as $val) {
									$list_tujuan[$val->id] = $val->jabatan;
								}
							} elseif ($surat->tipe_surat == 'keluar') {
								foreach ($jabatan as $val) {
									$list_tujuan[$val->id] = $val->jabatan;
								}
								// foreach ($instansi as $val) {
								// 	$list_tujuan[$val->id] = $val->instansi;
								// 	// $list_tujuan[$val->id] = $val->jabatan;
								// }
							} else {
								foreach ($jabatan as $val) {
									$list_tujuan[$val->id] = $val->jabatan;
								}
							}
						}
						echo form_dropdown('tujuan_disposisi', $list_tujuan, set_value('tujuan_disposisi'), ['class' => 'form-control', 'id' => 'tujuan_disposisi']);

						?>
						<div class="invalid-feedback">
							Tujuan disposisi harus diisi.
						</div>
					</div>
					<div class="form-group">
						<label>Sifat Disposisi <?= form_error('sifat_disposisi'); ?></label>
						<select name="sifat_disposisi" id="sifat_disposisi" class="form-control">
							<option value="">Pilih Sifat Disposisi</option>
							<option value="rutin" <?= set_select('sifat_disposisi', 'rutin'); ?>>Rutin</option>
							<option value="penting" <?= set_select('sifat_disposisi', 'penting'); ?>>Penting</option>
							<option value="rahasia" <?= set_select('sifat_disposisi', 'rahasia'); ?>>Rahasia</option>
						</select>
						<div class="invalid-feedback">
							Sifat disposisi harus diisi.
						</div>
					</div>
					<div class="form-group">
						<label>Instruksi Disposisi <?= form_error('tipe_disposisi'); ?> </label>
						<?php
						if (isset($tipe_disposisi)) {
							$list_tipe_disposisi = array('' => 'Pilih Instruksi Disposisi');

							foreach ($tipe_disposisi as $val) {
								$list_tipe_disposisi[$val->id] = $val->tipe_disposisi;
							}
						}
						echo form_dropdown('tipe_disposisi', $list_tipe_disposisi, set_value('tipe_disposisi'), ['class' => 'form-control', 'id' => 'tipe_disposisi']);

						?>
						<div class="invalid-feedback">
							Tipe disposisi harus diisi.
						</div>
					</div>
					<!-- <div class="form-group">
						<label>Tanggal Disposisi <? //= form_error('tanggal_disposisi'); 
													?></label> -->
					<?php
					//echo form_input(array(
					// "id" => "tanggal_disposisi",
					// "name" => "tanggal_disposisi",
					// "type" => "date",
					// "value" => set_value('tanggal_disposisi'),
					// "placeholder" => "Tanggal Disposisi",
					// "class" => "form-control",
					// "data-target" => ""
					// ));
					?>
					<!-- <div class="invalid-feedback">
							Tanggal disposisi harus diisi.
						</div>
					</div> -->
					<div class="form-group">
						<label>Isi Disposisi <?= form_error('disposisi'); ?></label>
						<?php
						echo form_textarea(array(
							"id" => "disposisi",
							"name" => "disposisi",
							"type" => "text",
							"value" => set_value('disposisi'),
							"rows" => 4,
							"placeholder" => "Isi Disposisi",
							"class" => "form-control"
						));
						?>
						<div class="invalid-feedback">
							Disposisi surat harus diisi.
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-submit float-right">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
