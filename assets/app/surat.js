
$(document).ready(function () {
	loadData();
});

function loadData() {
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
			url: site_url + "surat/Surat/datatables_surat_masuk",
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
				className: "align-middle",
			},
			{
				data: "sifat_surat",
				className: "align-middle",
			},
			{
				data: "asal_surat",
				className: "align-middle",
			},
			{
				data: "tujuan_surat",
				className: "align-middle",
			},
			{
				data: "isi",
				className: "align-middle",
			},
			{
				data: "action",
				orderable: false,
				className: "text-center align-middle",
			},
		],
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

	function convertTanggal(date) {
		var date = new Date(date);
		var tahun = date.getFullYear();
		var bulan = date.getMonth();
		var tanggal = date.getDate();
		var hari = date.getDay();

		switch (hari) {
			case 0:
				hari = "Minggu";
				break;
			case 1:
				hari = "Senin";
				break;
			case 2:
				hari = "Selasa";
				break;
			case 3:
				hari = "Rabu";
				break;
			case 4:
				hari = "Kamis";
				break;
			case 5:
				hari = "Jum'at";
				break;
			case 6:
				hari = "Sabtu";
				break;
		}

		switch (bulan) {
			case 0:
				bulan = "Januari";
				break;
			case 1:
				bulan = "Februari";
				break;
			case 2:
				bulan = "Maret";
				break;
			case 3:
				bulan = "April";
				break;
			case 4:
				bulan = "Mei";
				break;
			case 5:
				bulan = "Juni";
				break;
			case 6:
				bulan = "Juli";
				break;
			case 7:
				bulan = "Agustus";
				break;
			case 8:
				bulan = "September";
				break;
			case 9:
				bulan = "Oktober";
				break;
			case 10:
				bulan = "November";
				break;
			case 11:
				bulan = "Desember";
				break;
		}
		
		return hari + ", " + tanggal + " " + bulan + " " + tahun;
	}
}
