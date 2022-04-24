
$(document).ready(function () {
	loadSuratInternal();
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

function loadSuratInternal() {
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
		processing: true,
		serverSide: true,
		ajax: {
			url: site_url + "surat/Surat/datatables_surat_internal",
			type: "POST",
		},
		columns: [
			{
				data: "nomor_surat",
				orderable: false,
				className: "text-center align-middle",
			},
			{
				data: "nomor_surat",
				className: "align-middle",
			},
			{
				data: "tanggal_diterima",
				render: function (data) {
					return convertTanggal(data);
				},
				className: "text-center align-middle",
			},
			{
				data: "sifat_surat",
				render: function (data) {
					if (data == 'biasa') {
						return '<span class="badge badge-success">'+data.charAt(0).toUpperCase() + data.slice(1)+'</span>';
					} else {
						return '<span class="badge badge-danger">'+data.charAt(0).toUpperCase() + data.slice(1)+'</span>';
					}
				},
				className: "align-middle",
			},
			{
				data: "isi",
				className: "align-middle",
			},
			// {
			// 	data: "asal_surat",
			// 	className: "align-middle",
			// },
			// {
			// 	data: "tujuan_surat",
			// 	className: "align-middle",
			// },
			{
				data: "action",
				orderable: false,
				className: "text-center align-middle",
			},
		],
		responsive: true,
		order: [],
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
