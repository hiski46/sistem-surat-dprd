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
	var stepper = new Stepper($(".bs-stepper")[0]);
	// var stepper = new Stepper(document.querySelector('.bs-stepper'));
</script>
</body>

</html>

