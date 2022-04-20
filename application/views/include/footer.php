				</div>
				<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->


	<footer class="main-footer">
		<strong>Copyright &copy; 2022 <a href="<?php echo site_url(); ?>"></a>.</strong>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php load_js(get_base_js()); ?>
<?php if(isset($js)) { load_js($js); }; ?>

<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
</body>

</html>
