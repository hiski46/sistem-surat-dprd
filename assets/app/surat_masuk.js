$(document).ready(function () {
	loadSuratMasuk();
	validationJquery();
});

function validationJquery() {
	$(".btn-next1").on("click", function () {
		// validasi form
		

		if (next_step) {
			$('#identitas-surat').fadeOut(400, function () {
				stepper.next();
			});
		}
	});
}

function loadSuratMasuk() {
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
				className: "text-center align-middle",
			},
			{
				data: "sifat_surat",
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

function create() {
	$.ajax({
		url: site_url + "Surat/create",
		dataType: "json",
		success: function (response) {},
		error: function (xhr, ajaxOptions, thrownerror) {
			Swal.fire({
				title: "Maaf gagal load data!",
				html: `Silahkan Cek kembali Kode Error: <strong>${
					xhr.status + "\n"
				}</strong> `,
				icon: "error",
				showConfirmButton: false,
				timer: 3100,
			}).then(function () {});
		},
	});
}
