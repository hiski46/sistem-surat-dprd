$(document).ready(function () {
	console.log(site_url);
	load_jabatan();
});

function form_tambah(event) {
	var id = $(event).data("id");

	$.ajax({
		url: site_url + "surat/Jabatan/form_tambah",
		method: "post",
		data: { parent: id },
		dataType: "json",
		success: function (response) {
			$(".view-modal").html(response.message).show();
			$("#modal-form").modal("show");
		},
	});
}

function form_edit(event) {
	var id = $(event).data("id");

	$.ajax({
		url: site_url + "surat/Jabatan/form_edit",
		method: "post",
		data: {id: id },
		dataType: "json",
		success: function (response) {
			$(".view-modal").html(response.message).show();
			$("#modal-form").modal("show");
		},
	});
}


function create() {
	var data = $('#my-form').serialize();

	$.ajax({
		url: site_url + "surat/Jabatan/create",
		method: "post",
		data: data,
		dataType: "json",
		beforeSend: function () {
			$(".btn-simpan").html('<i class="fa fa-spin fa-spinner"></i> loading');
			$(".btn-cencel").hide(100);
			$(".btn-simpan").attr("disabled", true);
		},
		complete: function () {
			$(".btn-simpan").removeAttr("disabled");
			$(".btn-cencel").show(100);
			$(".btn-simpan").html("Simpan");
		},
		error: function (xhr, ajaxOptions, thrownerror) {
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
		},
		success: function (response) {
			if (response.error) {
				if (response.error.jabatan) {
					$('#jabatan').addClass('is-invalid');
					$("#error-jabatan").html(response.error.jabatan);
				} else {
					$("#jabatan").removeClass("is-invalid");
					$("#error-jabatan").html('');
				}
			} else if (response.status == 'success') {
				$("#modal-form").modal("hide");
				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: response.message,
				});
				load_jabatan();
			} else {
				Swal.fire({
					icon: "error",
					title: "Gagal",
					text: 'Kesalahan Server Silahkan Hubungi Admin',
				});
			}
		},
	});
}

function update() {
	var data = $('#my-form').serialize();

	$.ajax({
		url: site_url + "surat/Jabatan/update",
		method: "post",
		data: data,
		dataType: "json",
		beforeSend: function () {
			$(".btn-simpan").html('<i class="fa fa-spin fa-spinner"></i> loading');
			$(".btn-cencel").hide(100);
			$(".btn-simpan").attr("disabled", true);
		},
		complete: function () {
			$(".btn-simpan").removeAttr("disabled");
			$(".btn-cencel").show(100);
			$(".btn-simpan").html("Simpan");
		},
		error: function (xhr, ajaxOptions, thrownerror) {
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
		},
		success: function (response) {
			if (response.error) {
				if (response.error.jabatan) {
					$('#jabatan').addClass('is-invalid');
					$("#error-jabatan").html(response.error.jabatan);
				} else {
					$("#jabatan").removeClass("is-invalid");
					$("#error-jabatan").html('');
				}
			} else if (response.status == 'success') {
				$("#modal-form").modal("hide");
				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: response.message,
				});
				load_jabatan();
			} else {
				Swal.fire({
					icon: "error",
					title: "Gagal",
					text: 'Kesalahan Server Silahkan Hubungi Admin',
				});
			}
		},
	});
}

function hapus(event) {
	var id = $(event).data("id");
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Proses ini akan menghapus jabatan dan jajaranya di bawahnya!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, hapus!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: site_url + "surat/Jabatan/delete",
				method: "post",
				data: { id: id },
				dataType: "json",
				success: function (response) {
					if (response.status == "success") {
						Swal.fire({
							icon: "success",
							title: "Berhasil",
							text: response.message,
						});
						load_jabatan();
					} else {
						Swal.fire({
							icon: "error",
							title: "Gagal",
							text: 'Data gagal di hapus!',
						});
					}
				},
			});
		}
	});
	
}

function load_jabatan() {
	$.ajax({
		url: base_url + "/surat/Jabatan/get_ajax",
		method: "GET",
		dataType: "json",
		success: function (data) {
			$("#myTree").treeview({
				data: data,
				levels: 5,
			});
		},
	});
}
