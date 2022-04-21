				</div>
				<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<footer class="text-center">
		<strong>Copyright Sistem Manajemen Surat &copy; <?= date('Y'); ?> <a href="<?php echo site_url(); ?>"></a>.</strong>
	</footer>

</div>

<script>
	var base_url = '<?= base_url(); ?>';
	var site_url = '<?= site_url(); ?>';
</script>

<!-- ./wrapper -->
<?php load_js(get_base_js()); ?>
<?php if(isset($js)) { load_js($js); }; ?>

<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
</body>

</html>

