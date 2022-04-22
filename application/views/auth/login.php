<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/fontawesome-free/css/all.min.css'); ?>">

	<title>Login</title>
</head>

<body>

	<div class="container-fluid" style="padding-top: 100px; padding-bottom: 100px; background-image: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%,rgba(255,255,255,0.9) 100%), url('<?php echo base_url('assets/images/gedung-dprd.jpg'); ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
		<div class="row">
			<div class="col-md-5 offset-md-3">
			<!-- <img src="<?php // echo base_url('assets/images/logo-dprd-prov.png'); ?>" class="brand-image img-circle elevation-3"/> -->
				<div class="card">
					<div class="card-body">
						<label>LOGIN</label>
						<hr>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="identify" placeholder="Masukkan Username">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
						</div>
						<button class="btn btn-login btn-block btn-success">LOGIN</button>
					</div>
				</div>
				<p></p>
				<div class="card">
					<div class="card-body">
						<a href="<?php echo site_url('surat/track'); ?>" class="btn btn-block btn-primary">
							<i class="fa fa-search"></i> Tracking Surat
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

	<script>
		$(document).ready(function() {

			$(".btn-login").click(function() {

				var identify = $("[name='identify']").val();
				var password = $("[name='password']").val();

				if (identify.length == "") {

					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Idetify Wajib Diisi !'
					});

				} else if (password.length == "") {

					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Password Wajib Diisi !'
					});

				} else {

					$.ajax({

						url: "<?php echo base_url() ?>auth/login",
						type: "POST",
						data: {
							"identify": identify,
							"password": password
						},

						success: function(response, status) {

							if (status == "success") {

								Swal.fire({
										type: 'success',
										title: 'Login Berhasil!',
										text: 'Anda akan di arahkan dalam 3 Detik',
										timer: 3000,
										showCancelButton: false,
										showConfirmButton: false
									})
									.then(function() {
										window.location.href = "<?=site_url('surat/dashboard')?>";
									});

							} else {

								Swal.fire({
									type: 'error',
									title: 'Login Gagal!',
									text: 'silahkan coba lagi!'
								});


							}

							console.log(response);

						},

						error: function(response) {

							Swal.fire({
								type: 'error',
								title: 'Opps!',
								text: 'server error!'
							});

							console.log(response);

						}

					});

				}

			});

		});
	</script>

</body>

</html>
