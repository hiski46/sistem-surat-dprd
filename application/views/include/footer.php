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


<?php if (($this->uri->segment(2) == 'jabatan')) { ?>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">
		var saveData;
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
					"url": "<?= site_url('surat/jabatan/getData') ?>",
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
			saveData = 'tambah';
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
				url: '<?php echo base_url() . 'surat/jabatan/addData' ?>',
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

		function byid(id, type){
			if(type == 'edit'){
				saveData = 'edit';
				formData[0].reset();
			}
			$.ajax({
				tpye: 'GET',
				url: "<? base_url('surat/jabatan/byid') ?>"
			});
		}
	</script>

<?php } ?>

<!-- <script>
  $(function () {
    $('#table-surat').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	}).buttons().container().appendTo('#container-surat .col-md-6:eq(0)');
  });
</script>
 -->

</body>

</html>
