$(document).ready(function () {
	create_forum();
	update_forum();
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
	$('#form-create').submit(function (e) {
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
					if (response.error.topik_forum) {
						$("#topik_forum").addClass("is-invalid");
						$("#error-topik_forum").html(response.error.topik_forum);
					} else {
						$("#topik_forum").removeClass("is-invalid");
						$("#error-topik_forum").html("");
					}
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
					if (response.error.pembahasan_forum) {
						$("#pembahasan_forum").addClass("is-invalid");
						$("#error-pembahasan_forum").html(response.error.pembahasan_forum);
					} else {
						$("#pembahasan_forum").removeClass("is-invalid");
						$("#error-pembahasan_forum").html("");
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

function update_forum() {
	$('#form-update').submit(function (e) {
		e.preventDefault();
		var data = $(this).serialize();

		$.ajax({
			url: site_url + "surat/Forum/action_update",
			method: "post",
			data: data,
			dataType: "json",
			beforeSend: function () {
				$(".btn-simpan").html('<i class="fa fa-spin fa-spinner"></i> loading');
				$(".btn-simpan").attr("disabled", true);
			},
			complete: function () {
				$(".btn-simpan").removeAttr("disabled");
				$(".btn-simpan").html("<i class=\"fa fa-rss\"></i> Update Forum");
			},
			error: function (xhr, ajaxOptions, thrownerror) {
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
			},
			success: function (response) {
				if (response.error) {
					if (response.error.topik_forum) {
						$("#topik_forum").addClass("is-invalid");
						$("#error-topik_forum").html(response.error.topik_forum);
					} else {
						$("#topik_forum").removeClass("is-invalid");
						$("#error-topik_forum").html("");
					}
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
					if (response.error.pembahasan_forum) {
						$("#pembahasan_forum").addClass("is-invalid");
						$("#error-pembahasan_forum").html(response.error.pembahasan_forum);
					} else {
						$("#pembahasan_forum").removeClass("is-invalid");
						$("#error-pembahasan_forum").html("");
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

function reply(data) {
	event.preventDefault();
	$('.form-diskusi').empty();
	let id_forum = $(data).data('idforum');
	$(data).parents(".reply").find(".form-diskusi").html(`
	<form action="#" method="post" id="post_forum">
		<div class="form-group">
			<label for="form_diskusi">Balas Forum Diskusi</label>
			<input type="hidden" name="id_forum" value="${id_forum}">
			<textarea name="isi_forum" class="form-control" rows="3" placeholder="Balas forum diskusi disini..."></textarea>
		</div>
		<a href="javascript:void(0)" class="btn btn-xs btn-primary btn-simpan" data-toggle="tooltip" title="Kirim" onclick="post_forum()">
			<i class="fa fa-paper-plane m-1"></i> Kirim
		</a>
		<a href="javascript:void(0)" class="btn btn-xs btn-danger btn-cencel" data-toggle="tooltip" title="Batal" onclick="batal(this)">
			<i class="fa fa-times m-1"></i> Batal
		</a>
	</form>
	`);
}

function post_forum() {
	let data = $('#post_forum').serialize();

	$.ajax({
		url: site_url + "surat/Forum/post_forum",
		method: "post",
		data: data,
		dataType: "json",
		beforeSend: function () {
			$(".btn-simpan").html('<i class="fa fa-spin fa-spinner"></i> loading');
			$(".btn-simpan").attr("disabled", true);
			$(".btn-cencel").hide();
		},
		complete: function () {
			$(".btn-simpan").removeAttr("disabled");
			$(".btn-simpan").html('<i class="fa fa-paper-plane m-1"></i> Kirim');
			$(".btn-cencel").show();
		},
		error: function (xhr, ajaxOptions, thrownerror) {
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
		},
		success: function (response) {
			if (response.error) {
				if (response.error.isi_forum) {
					$("#isi_forum").addClass("is-invalid");
					$("#error-isi_forum").html(response.error.isi_forum);
				} else {
					$("#isi_forum").removeClass("is-invalid");
					$("#error-isi_forum").html("");
				}
			} else if (response.status == "success") {
				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: response.message,
				});
				window.setTimeout(() => {
					window.location.href =
						site_url + "surat/Forum/diskusi/" + $("[name='id_forum']").val();
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
}

function close_forum(data) {
	let id_forum = $(data).data("idforum");
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Proses ini menyelesaikan pembahasan forum!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, tutup forum",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: site_url + "surat/Forum/close_forum",
				method: "post",
				data: { id_forum: id_forum },
				dataType: "json",
				success: function (response) {
					if (response.status == "success") {
						Swal.fire({
							icon: "success",
							title: "Berhasil",
							text: response.message,
						});
						window.setTimeout(() => {
					window.location.href =
						site_url + "surat/Forum/diskusi/" + id_forum;
				}, 1500);
					} else {
						Swal.fire({
							icon: "error",
							title: "Gagal",
							text: "Forum gagal di tutup!",
						});
					}
				},
			});
		}
	});
}

function batal(data) {
	$(data).parents('.form-diskusi').empty();
}
