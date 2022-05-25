var stepper = new Stepper($(".bs-stepper")[0]);
var next_step = true;
$(document).ready(function () {
	validationJquery();
	//Initialize Select2 Elements
	$("#asal_surat").select2({
		placeholder: "Pilih Asal Surat",
		theme: "bootstrap4",
		allowClear: true,
	});
	$("#tujuan_surat").select2({
		placeholder: "Pilih Tujuan Surat",
		theme: "bootstrap4",
		allowClear: true,
	});

	// fokus on serach select2
	$(document).on("select2:open", () => {
		document.querySelector(".select2-search__field").focus();
	});

	$("#nomor_surat").on("blur", function (e) {
		check_nomor_surat();
	});
});

function check_nomor_surat() {
	// check unique nomor surat
	var nomor_surat = $('#nomor_surat').val();
	if ($("#nomor_surat").val() != "") {
		$.ajax({
			url: site_url + "surat/Surat/check_nomor_surat",
			method: "post",
			data: { nomor_surat: nomor_surat },
			dataType: "json",
			success: function (response) {
				if (response.status == "error") {
					$("#nomor_surat").addClass("is-invalid");
					$("#error_nomor_surat").html(response.message);
					next_step = false;
				} else {
					$("#nomor_surat").removeClass("is-invalid");
					$("#error_nomor_surat").html("Nomor surat harus diisi.");
					next_step = true;
				}
			},
		});
	}
	
}

function validationJquery() {
	$(".btn-next1").on("click", function (e) {
		// validasi form
		check_nomor_surat();

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
		if ($("#tujuan_surat").val() == "") {
			$("#tujuan_surat").addClass("is-invalid");
			next_step = false;
		} else {
			$("#tujuan_surat").removeClass("is-invalid");
		}
		if ($("#nomor_agenda").val() == "") {
			$("#nomor_agenda").addClass("is-invalid");
			next_step = false;
		} else {
			$("#nomor_agenda").removeClass("is-invalid");
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
		var next_step = true;
		if ($("#isi").val() == "") {
			$("#isi").addClass("is-invalid");
			next_step = false;
		} else {
			$("#isi").removeClass("is-invalid");
		}
		if ($("#file")[0].files.length === 0) {
			$("#show-error-file").addClass("is-invalid");
			$("#file").addClass("is-invalid");
			next_step = false;
		} else {
			$("#show-error-file").removeClass("is-invalid");
			$("#file").removeClass("is-invalid");
			
		}

		if (next_step) {
			$("#form-tambah").submit();
		}
	});
}

