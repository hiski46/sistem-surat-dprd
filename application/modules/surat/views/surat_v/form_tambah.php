<div class="row">
	<div class="col-md-12">
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div>
			<div class="card-body p-0">
				<div class="bs-stepper">
					<div class="bs-stepper-header" role="tablist">

						<div class="step" data-target="#identitas-surat">
							<button type="button" class="step-trigger" role="tab" aria-controls="identitas-surat" id="identitas-surat-trigger">
								<span class="bs-stepper-circle">1</span>
								<span class="bs-stepper-label">Identitas Surat</span>
							</button>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#jenis-surat">
							<button type="button" class="step-trigger" role="tab" aria-controls="jenis-surat" id="jenis-surat-trigger">
								<span class="bs-stepper-circle">2</span>
								<span class="bs-stepper-label">Jenis Surat</span>
							</button>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#isi-surat">
							<button type="button" class="step-trigger" role="tab" aria-controls="isi-surat" id="isi-surat-trigger">
								<span class="bs-stepper-circle">3</span>
								<span class="bs-stepper-label">Isi Surat</span>
							</button>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#file-surat">
							<button type="button" class="step-trigger" role="tab" aria-controls="file-surat" id="file-surat-trigger">
								<span class="bs-stepper-circle">4</span>
								<span class="bs-stepper-label">File Surat</span>
							</button>
						</div>
					</div>
					<div class="bs-stepper-content">
						<form action="<?= site_url('surat/Surat/create'); ?>" method="post" enctype="multipart/form-data" id="form-tambah">
							<div id="identitas-surat" class="content" role="tabpanel" aria-labelledby="identitas-surat-trigger">
								<div class="form-group">
									<label>Nomor Surat <?= form_error('nomor_surat'); ?></label>
									<?php
									echo form_input(array(
										"id" => "nomor_surat",
										"name" => "nomor_surat",
										"type" => "text",
										"value" => set_value('nomor_surat'),
										"placeholder" => "Nomor Surat",
										"class" => "form-control",
										"required" => "required",
									));
									?>
									<div class="invalid-feedback">
										Nomor surat harus diisi.
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Tanggal Surat <?= form_error('tanggal_surat'); ?></label>
											<?php
											echo form_input(array(
												"id" => "tanggal_surat",
												"name" => "tanggal_surat",
												"type" => "date",
												"value" => "",
												"placeholder" => "Tanggal Surat",
												"class" => "form-control",
												"data-target" => ""
											));
											?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Tanggal Diterima <?= form_error('tanggal_diterima'); ?></label>
											<?php
											echo form_input(array(
												"id" => "tanggal_diterima",
												"name" => "tanggal_diterima",
												"type" => "date",
												"value" => "",
												"placeholder" => "Tanggal Diterima",
												"class" => "form-control",
												"data-target" => ""
											));
											?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Asal Surat <?= form_error('asal_surat'); ?></label>
									<?php
									echo form_input(array(
										"id" => "asal_surat",
										"name" => "asal_surat",
										"type" => "text",
										"value" => "",
										"placeholder" => "Asal Surat",
										"class" => "form-control"
									));
									?>
								</div>
								<div class="form-group">
									<label>Penerima Surat <?= form_error('penerima'); ?></label>
									<?php
									echo form_input(array(
										"id" => "penerima",
										"name" => "penerima",
										"type" => "text",
										"value" => "",
										"placeholder" => "Penerima Surat",
										"class" => "form-control"
									));
									?>
								</div>
								<button type="button" class="btn btn-primary btn-next1">Next</button>
							</div>
							<div id="jenis-surat" class="content" role="tabpanel" aria-labelledby="jenis-surat-trigger">
								<div class="form-group">
									<label>Tipe Surat <?= form_error('tipe_surat'); ?></label>
									<select name="tipe_surat" id="tipe_surat" class="form-control">
										<option value="">Pilih Tipe Surat</option>
										<option value="masuk">Surat Masuk</option>
										<option value="keluar">Surat Keluar</option>
										<option value="internal">Surat Internal</option>
									</select>
								</div>
								<div class="form-group">
									<label>Sifat Surat <?= form_error('sifat_surat'); ?></label>
									<select name="sifat_surat" id="sifat_surat" class="form-control">
										<option value="">Pilih Sifat Surat</option>
										<option value="biasa">Surat Biasa</option>
										<option value="rahasia">Surat Rahasia</option>
									</select>
								</div>
								<div class="form-group">
									<label>Kecepatan Surat <?= form_error('kecepatan_surat'); ?></label>
									<select name="kecepatan_surat" id="kecepatan_surat" class="form-control">
										<option value="">Pilih Kecepatan Surat</option>
										<option value="biasa">Surat Biasa</option>
										<option value="segera">Surat Segera</option>
									</select>
								</div>
								<button type="button" class="btn btn-primary btn-prev1">Previous</button>
								<button type="button" class="btn btn-primary btn-next2">Next</button>
							</div>
							<div id="isi-surat" class="content" role="tabpanel" aria-labelledby="isi-surat-trigger">
								<div class="form-group">
									<label>Tujuan Surat <?= form_error('tujuan_surat'); ?></label>
									<?php
									echo form_input(array(
										"id" => "tujuan_surat",
										"type" => "text",
										"name" => "tujuan_surat",
										"value" => "",
										"placeholder" => "Tujuan Surat",
										"class" => "form-control"
									));
									?>
								</div>
								<div class="form-group">
									<label>Isi Surat <?= form_error('isi'); ?></label>
									<?php
									echo form_textarea(array(
										"id" => "isi",
										"name" => "isi",
										"type" => "text",
										"value" => "",
										"rows" => 4,
										"placeholder" => "Isi Surat",
										"class" => "form-control"
									));
									?>
								</div>
								<button type="button" class="btn btn-primary btn-prev2">Previous</button>
								<button type="button" class="btn btn-primary btn-next3">Next</button>
							</div>
							<div id="file-surat" class="content" role="tabpanel" aria-labelledby="file-surat-trigger">
								<div class="form-group">
									<label for="file-surat">File Surat <?= form_error('file'); ?></label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="file-surat" name="file">
											<label class="custom-file-label" for="file-surat">Choose file</label>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-primary btn-prev3">Previous</button>
								<button type="submit" class="btn btn-primary btn-submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
