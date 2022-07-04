$(document).ready(function () {
	loadAgenda();
	alert();
	
});

function alert() {
	const flashSuccess = $(".flash-success").data("flashdata");
	const flashError = $(".flash-error").data("flashdata");

	if (flashSuccess) {
		Swal.fire({
			icon: "success",
			title: "Berhasil",
			text: flashSuccess,
		});
	}
	if (flashError) {
		Swal.fire({
			icon: "error",
			title: "Gagal",
			text: flashError,
		});
	}
}

function hapus(event) {
	var id = $(event).data("id");
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Proses ini akan menghapus data anda!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, hapus!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: site_url + "surat/surat/delete",
				method: "post",
				data: { id: id },
				dataType: "json",
				success: function (response) {
					if (response.status == "success") {
						Swal.fire({
							icon: "success",
							title: "Berhasil",
							text: response.message,
						});
						loadSuratMasuk();
					} else {
						Swal.fire({
							icon: "error",
							title: "Gagal",
							text: "Data gagal di hapus!",
						});
					}
				},
			});
		}
	});
}


function loadAgenda() {
	$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
		return {
			iStart: oSettings._iDisplayStart,
			iEnd: oSettings.fnDisplayEnd(),
			iLength: oSettings._iDisplayLength,
			iTotal: oSettings.fnRecordsTotal(),
			iFilteredTotal: oSettings.fnRecordsDisplay(),
			iPage: Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
			iTotalPages: Math.ceil(
				oSettings.fnRecordsDisplay() / oSettings._iDisplayLength
			),
		};
	};

	$("#datatables").dataTable({
		initComplete: function () {
			var api = this.api();
			$("#mytable_filter input")
				.off(".DT")
				.on("keyup.DT", function (e) {
					if (e.keyCode == 13) {
						api.search(this.value).draw();
					}
				});
		},
		oLanguage: {
			sProcessing: "loading...",
		},
		bDestroy: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: site_url + "surat/agenda/datatables_agenda/1",
			type: "POST",
		},
		columns: [{
				data: "id",
				orderable: false,
				className: "text-center align-middle",
				
			},
			{
				data: "tanggal",
				className: "text-center align-middle",
			},
			{
				data: "agenda",
				className: "align-middle",
			},
			{
				data: "detail",
				className: "align-middle",
			}
			
			
			// {
			// 	data: "asal_surat",
			// 	className: "align-middle",
			// },
			// {
			// 	data: "tujuan_surat",
			// 	className: "align-middle",
			// },
			// {
			// 	data: "action",
			// 	orderable: false,
			// 	className: "text-center align-middle",
			// },
		],
		responsive: true,
		order: [[2, 'desc']],
		rowCallback: function (row, data, iDisplayIndex) {
			var info = this.fnPagingInfo();
			var page = info.iPage;
			var length = info.iLength;
			var index = page * length + (iDisplayIndex + 1);
			$("td:eq(0)", row).html(index);
		},
		drawCallback: function (settings) {
			$('[data-toggle="tooltip"]').tooltip();
		},
	});
}

