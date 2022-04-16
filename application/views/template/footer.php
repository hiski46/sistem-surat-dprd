<footer class="main-footer">
	<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 3.2.0-rc
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/backend/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/backend/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/backend/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/backend/dist/js/pages/dashboard.js"></script>

<script src="<?= base_url() ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>


<?php if (($this->uri->segment(1) == 'jabatan')) { ?>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">
		var modal = $('#modalData');
		var formData = $('#formData');
		var btnSave = $('#btnSave');

		ambilData();

		function ambilData() {
			$('#wwww').DataTable({
				"processsing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?= site_url('jabatan/getData') ?>",
					"type": "POST"
				},
				"columnDefs": [{
					"target": [-1],
					"orderable": false
				}, ],
				"lengthMenu": [
					[10, 25, 50, -1],
					[10, 25, 50, "All"]
				],
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"lengthChange": false,
				"autoWidth": false,
				"bDestroy": true,
			});
		}

		function add() {
			$(".jabatan").html('');
			$(".parent").html('');
			$("[name='jabatan']").val('');
			$("[name='parent']").val('');
			modal.modal('show');
		}

		function save() {
			var jabatan = $("[name='jabatan']").val();
			var parent = $("[name='parent']").val();

			$.ajax({
				type: "POST",
				data: {
					jabatan: jabatan,
					parent: parent
				},
				url: '<?php echo base_url() . 'jabatan/addData' ?>',
				success: function(data) {
					let hasil = JSON.parse(data);
					if (hasil.status == 'error') {
						$(".jabatan").html(hasil.data.jabatan);
						$(".parent").html(hasil.data.parent);
					}
					if (hasil.status == 'success') {
						$("[name='jabatan']").val('');
						$("[name='parent']").val('');;
						Swal.fire({
							icon: 'success',
							title: hasil.message,
							showConfirmButton: false,
							timer: 3000,
						})
						modal.modal('hide');
						ambilData();

					}
				}
			});
		}
	</script>

<?php } ?>


</body>

</html>
