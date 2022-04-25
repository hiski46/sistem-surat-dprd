				</div>
				<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->


	<footer class="main-footer">
		<strong>Copyright Sistem Manajemen Surat &copy; <?= date('Y'); ?> <a href="<?php echo site_url(); ?>"></a>.</strong>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>

<script>
	var base_url = '<?= base_url(); ?>';
	var site_url = '<?= site_url(); ?>';
</script>

<!-- ./wrapper -->
<?php load_js(get_base_js()); ?>
<?php if(isset($js)) { load_js($js); }; ?>

<script>
	$.widget.bridge('uibutton', $.ui.button);
	bsCustomFileInput.init();
	

	function logout() {
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Anda akan logout dari sistem!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, logout!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: site_url + "Auth/logout",
				method: "post",
				dataType: "json",
				success: function (response) {
					if (response.status == "success") {
						Swal.fire({
							icon: "success",
							title: "Berhasil",
							text: response.message,
						});
						window.setTimeout(() => {
							window.location.href = site_url;
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
		}
	});
}
</script>
</body>

</html>

