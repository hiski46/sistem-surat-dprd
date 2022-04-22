<div class="container-fluid">
	<h2 class="text-center display-4">Pelacakan Surat</h2>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<form action="<?php echo site_url('surat/track/tracking'); ?>" id="form-track" method="POST">
				<div class="input-group">
					<input type="search" name="nomor_surat" class="form-control form-control-lg" placeholder="Masukan Nomor Surat" required>
					<div class="input-group-append">
						<button type="submit" class="btn btn-lg btn-default">
						<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
