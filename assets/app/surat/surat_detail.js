$(document).ready(function () {
	loadSuratDisposisi();

	$('#btn-selesai').click(function (e) {
		e.preventDefault();
		Swal.fire({
			title: "Apakah anda yakin?",
			text: "Proses ini akan menyelesaikan disposisi surat!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, selesai!",
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = $(this).attr('href');
			}
		});
	});
});

function loadSuratDisposisi() {
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
	var id_surat = $("#nomor-surat").data("idsurat");
	$("#surat-disposisi").dataTable({
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
			url: site_url + "surat/Surat/datatables_disposisi",
			type: "POST",
			data: { id_surat: id_surat },
			dataType: "json",
		},
		columns: [
			{
				data: "asal_disposisi",
				orderable: false,
				className: "text-center align-middle",
			},
			{
				data: "asal_disposisi",
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
					} else if(data == 'penting') {
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
				data: "tanggal_disposisi",
				render: function (data) {
					return convertTanggal(data);
				},
				className: "text-center align-middle",
			},
			{
				data: "disposisi",
				className: "align-middle",
			},
		],
		responsive: true,
		searching: false,
		paging: false,
		info: false,
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
