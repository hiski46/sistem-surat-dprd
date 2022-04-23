$(document).ready(function () {
	loadSuratMasuk();
	validationJquery();
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

function validationJquery() {
	$(".btn-next1").on("click", function (e) {
		// validasi form
		var next_step = true;

		if ($("#nomor_surat").val() == "") {
			$("#nomor_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#nomor_surat").removeClass("is-invalid");
		}
		if ($("#tanggal_surat").val() == "") {
			$("#tanggal_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#tanggal_surat").removeClass("is-invalid");
		}
		if ($("#tanggal_diterima").val() == "") {
			$("#tanggal_diterima").addClass("is-invalid");
			next_step = false;
		} else {
			$("#tanggal_diterima").removeClass("is-invalid");
		}
		if ($("#asal_surat").val() == "") {
			$("#asal_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#asal_surat").removeClass("is-invalid");
		}
		if ($("#penerima").val() == "") {
			$("#penerima").addClass("is-invalid");
			next_step = false;
		} else {
			$("#penerima").removeClass("is-invalid");
		}

		if (next_step) {
			$("#identitas-surat").css("display", "none");
			$("#jenis-surat").css("display", "block");
			$("#identitas-surat").fadeOut(400, function () {
				stepper.next();
			});
		}
	});

	$(".btn-prev1").on("click", function (e) {
		$("#identitas-surat").fadeOut(400, function () {
			$("#identitas-surat").css("display", "block");
			$("#jenis-surat").css("display", "none");
			$("#isi-surat").css("display", "none");
			$("#file-surat").css("display", "none");
			stepper.previous();
		});
	});

	$(".btn-next2").on("click", function (e) {
		e.preventDefault();
		// validasi form
		var next_step = true;

		if ($("#tipe_surat option:selected").val() == "") {
			$("#tipe_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#tipe_surat").removeClass("is-invalid");
		}
		if ($("#sifat_surat option:selected").val() == "") {
			$("#sifat_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#sifat_surat").removeClass("is-invalid");
		}
		if ($("#kecepatan_surat option:selected").val() == "") {
			$("#kecepatan_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#kecepatan_surat").removeClass("is-invalid");
		}

		if (next_step) {
			$("#jenis-surat").css("display", "none");
			$("#isi-surat").css("display", "block");
			$("#jenis-surat").fadeOut(400, function () {
				stepper.next();
			});
		}
	});

	$(".btn-prev2").on("click", function (e) {
		$("#jenis-surat").fadeOut(400, function () {
			$("#identitas-surat").css("display", "none");
			$("#jenis-surat").css("display", "block");
			$("#isi-surat").css("display", "none");
			$("#file-surat").css("display", "none");
			stepper.previous();
		});
	});

	$(".btn-next3").on("click", function (e) {
		e.preventDefault();
		// validasi form
		var next_step = true;

		if ($("#tujuan_surat").val() == "") {
			$("#tujuan_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#tujuan_surat").removeClass("is-invalid");
		}
		if ($("#isi").val() == "") {
			$("#isi").addClass("is-invalid");
			next_step = false;
		} else {
			$("#isi").removeClass("is-invalid");
		}

		if (next_step) {
			$("#jenis-surat").css("display", "none");
			$("#file-surat").css("display", "block");
			$("#isi-surat").fadeOut(400, function () {
				stepper.next();
			});
		}
	});

	$(".btn-prev3").on("click", function (e) {
		$("#isi-surat").fadeOut(400, function () {
			$("#identitas-surat").css("display", "none");
			$("#jenis-surat").css("display", "none");
			$("#isi-surat").css("display", "block");
			$("#file-surat").css("display", "none");
			stepper.previous();
		});
	});

	$(".btn-submit").on("click", function (e) {
		e.preventDefault();
		if ($("#file")[0].files.length === 0) {
			$("#show-error-file").addClass("is-invalid");
			$("#file").addClass("is-invalid");
		} else {
			$("#show-error-file").removeClass("is-invalid");
			$("#file").removeClass("is-invalid");
			$("#form-tambah").submit();
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
