
$(document).ready(function () {
	validationJquery();
});



function validationJquery() {
	
	$("#add-agenda").on("click", function (e) {
		e.preventDefault();
		var next_step = true;
		if ($("#agenda").val() == "") {
			$("#agenda").addClass("is-invalid");
			next_step = false;
		} else {
			$("#agenda").removeClass("is-invalid");
		}
		if ($("#tanggal").val() == "") {
			$("#tanggal").addClass("is-invalid");
			next_step = false;
		} else {
			$("#tanggal").removeClass("is-invalid");
		}
		if ($("#waktu").val() == "") {
			$("#waktu").addClass("is-invalid");
			next_step = false;
		} else {
			$("#waktu").removeClass("is-invalid");
		}
		if (next_step) {
			$('#form-tambah-agenda').submit();
		}
	});
}

