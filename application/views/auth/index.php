<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/fontawesome-free/css/all.min.css'); ?>">

	<title><?= $title; ?></title>
</head>

<body>

	<div class="container-fluid" style="padding-top: 100px; padding-bottom: 100px; background-image: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%,rgba(255,255,255,0.9) 100%), url('<?php echo base_url('assets/images/gedung-dprd.jpg'); ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
		<div class="row">
			<div class="col-md-5 offset-md-3">
				<div class="card">
					<div class="card-body">
						<label>LOGIN</label>
						<hr>
						<form action="" method="post" id="my-form">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
								<div class="invalid-feedback" id="error-username"></div>
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
								<div class="invalid-feedback" id="error-password"></div>
							</div>
							<button type="submit" class="btn btn-block btn-success btn-login">LOGIN</button>
						</form>
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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		$(document).ready(function() {
			login();
		});

		function login() {
			$('#my-form').submit(function(e) {
				e.preventDefault();
				var data = $(this).serialize();

				$.ajax({
					url: "<?= site_url("Auth/login"); ?>",
					method: "post",
					data: data,
					dataType: "json",
					beforeSend: function() {
						$(".btn-login").html('<i class="fa fa-spin fa-spinner"></i> loading');
						$(".btn-login").attr("disabled", true);
					},
					complete: function() {
						$(".btn-login").removeAttr("disabled");
						$(".btn-login").html("LOGIN");
					},
					error: function(xhr, ajaxOptions, thrownerror) {
						alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
					},
					success: function(response) {
						if (response.error) {
							if (response.error.username) {
								$("#username").addClass("is-invalid");
								$("#error-username").html(response.error.username);
							} else {
								$("#username").removeClass("is-invalid");
								$("#error-username").html("");
							}
							if (response.error.password) {
								$("#password").addClass("is-invalid");
								$("#error-password").html(response.error.password);
							} else {
								$("#password").removeClass("is-invalid");
								$("#error-password").html("");
							}
						} else if (response.status == "success") {
							Swal.fire({
								icon: "success",
								title: "Berhasil",
								text: response.message,
							});
							window.setTimeout(() => {
								window.location.href = '<?= site_url('dashboard'); ?>';
							}, 1500);
						} else {
							Swal.fire({
								icon: "error",
								title: "Gagal",
								text: response.message,
							});
						}
					},
				});
			});
		}
	</script>

</body>

</html>
