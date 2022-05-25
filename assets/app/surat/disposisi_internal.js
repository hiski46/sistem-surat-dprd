$(document).ready(function () {
	loadDisposisiInternal();
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

function loadDisposisiInternal() {
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
			url: site_url + "surat/Disposisi/datatables",
			type: "POST",
			data: { tipe_surat: "internal" },
			dataType: "json",
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
				data: "tanggal_disposisi",
				render: function (data) {
					return convertTanggal(data, false, true);
				},
				className: "align-middle",
			},
			{
				data: "tujuan_disposisi",
				className: "align-middle",
			},
			{
				data: "sifat_disposisi",
				render: function (data) {
					if (data == "rahasia") {
						return (
							'<span class="badge badge-danger">' +
							data.charAt(0).toUpperCase() +
							data.slice(1) +
							"</span>"
						);
					} else if (data == "penting") {
						return (
							'<span class="badge badge-warning">' +
							data.charAt(0).toUpperCase() +
							data.slice(1) +
							"</span>"
						);
					} else {
						return (
							'<span class="badge badge-info">' +
							data.charAt(0).toUpperCase() +
							data.slice(1) +
							"</span>"
						);
					}
				},
				className: "align-middle",
			},
			{
				data: "tipe_disposisi",
				className: "align-middle",
			},
			{
				data: "disposisi",
				className: "align-middle",
			},
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
