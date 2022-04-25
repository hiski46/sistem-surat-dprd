$(document).ready(function () {
	loadSuratDisposisi();
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
			dataType: 'json',
		},
		columns: [
			{
				data: "nama_instansi",
				orderable: false,
				className: "text-center align-middle",
			},
			{
				data: "nama_instansi",
				className: "align-middle",
			},
			{
				data: "jabatan",
				className: "align-middle",
			},
			{
				data: "disposisi",
				className: "align-middle",
			},
			{
				data: "tanggal_disposisi",
				render: function (data) {
					return convertTanggal(data);
				},
				className: "text-center align-middle",
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
