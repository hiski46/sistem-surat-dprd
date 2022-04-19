		<div class="row">
			<div class="col-md-12">
				<h3>MEMBUAT SURAT</h3>
                <form action="" method="post" class="f1">
					<input type="hidden" name="tipe_surat" value="masuk"/>
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-envelope"></i></div>
                            <p>Surat</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                            <p>Alamat</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                            <p>Akun</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                            <p>Sosial</p>
                        </div>
                    </div>
                    <!-- step 1 -->
                    <fieldset>
                        <div class="form-group row">
                            <label class="col-md-2">Nomor Surat</label>
                            <input type="text" name="nomor_surat" placeholder="Nomor Surat" class="form-control col-md-4">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label>Tanggal Surat</label>
                            <input type="text" name="nama_akhir" placeholder="Tanggal Surat" class="form-control">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label>Tentang Kamu</label>
                            <textarea name="tentang_kamu" placeholder="Tentang Kamu" class="form-control"></textarea>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                        </div>
                    </fieldset>
                    <!-- step 2 -->
                    <fieldset>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat Rumah</label>
                            <input type="text" name="alamat_rumah" placeholder="Alamat Rumah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat Kantor</label>
                            <textarea name="alamat_kantor" placeholder="Alamat Kantor" class="form-control"></textarea>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                        </div>
                    </fieldset>
                    <!-- step 3 -->
                    <fieldset>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Ulangi password</label>
                            <input type="password" name="ulangi_password" placeholder="Ulangi password" class="form-control">
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                        </div>
                    </fieldset>
                    <!-- step 4 -->
                    <fieldset>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" placeholder="Facebook" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" name="twitter" placeholder="Twitter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Google plus</label>
                            <input type="text" name="google_plus" placeholder="Google plus" class="form-control">
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                            <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
		</div>
