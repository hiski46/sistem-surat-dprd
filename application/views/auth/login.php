<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<title>Login Akun</title>
</head>

<body>

	<div class="container" style="margin-top: 150px">
		<div class="row">
			<div class="col-md-5 offset-md-3">
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

				<div class="text-center" style="margin-top: 15px">
					Belum punya akun? <a href="<?php echo base_url() ?>index.php/register">Silahkan Register</a>
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
