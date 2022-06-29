$(document).ready(function () {
	create_forum();
	$("#anggota_forum").select2({
		placeholder: "Pilih Anggota Forum",
		theme: "bootstrap4",
		allowClear: true,
	});

	$("#jenis_forum").change(function (e) {
		let jenis_forum = $(this).val();
		if (jenis_forum != 'group') {
			$("#anggota_forum").removeAttr('multiple');
		} else {
			$("#anggota_forum").attr('multiple', 'multiple');
		}
	});
});

function create_forum() {
	$('#form-forum').submit(function (e) {
		e.preventDefault();
		var data = $(this).serialize();

		$.ajax({
			url: site_url + "surat/Forum/action_add",
			method: "post",
			data: data,
			dataType: "json",
			beforeSend: function () {
				$(".btn-simpan").html('<i class="fa fa-spin fa-spinner"></i> loading');
				$(".btn-simpan").attr("disabled", true);
			},
			complete: function () {
				$(".btn-simpan").removeAttr("disabled");
				$(".btn-simpan").html("<i class=\"fa fa-rss\"></i> Buat Forum");
			},
			error: function (xhr, ajaxOptions, thrownerror) {
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
			},
			success: function (response) {
				if (response.error) {
					if (response.error.jenis_forum) {
						$("#jenis_forum").addClass("is-invalid");
						$("#error-jenis_forum").html(response.error.jenis_forum);
					} else {
						$("#jenis_forum").removeClass("is-invalid");
						$("#error-jenis_forum").html("");
					}
					if (response.error.anggota_forum) {
						$("#anggota_forum").addClass("is-invalid");
						$("#error-anggota_forum").html(response.error.anggota_forum);
					} else {
						$("#anggota_forum").removeClass("is-invalid");
						$("#error-anggota_forum").html("");
					}
				} else if (response.status == "success") {
					Swal.fire({
						icon: "success",
						title: "Berhasil",
						text: response.message,
					});
					window.setTimeout(() => {
						window.location.href =
							site_url + "surat/Forum?s=" + $("#id_surat").val();
					}, 1500);
				} else {
					Swal.fire({
						icon: "error",
						title: "Gagal",
						text: response.message,
					});
				}
			},
		});
	});
}
