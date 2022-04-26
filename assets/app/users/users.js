$(document).ready(function () {
	loadData();
});
function form_tambah() {
	$.ajax({
		url: site_url + "users/Users/form_tambah",
		method: "post",
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
		url: site_url + "users/Users/form_edit",
		method: "post",
		data: { id: id },
		dataType: "json",
		success: function (response) {
			$(".view-modal").html(response.message).show();
			$("#modal-form").modal("show");
		},
	});
}

function form_detail(event) {
	var id = $(event).data("id");

	$.ajax({
		url: site_url + "users/Users/form_detail",
		method: "post",
		data: { id: id },
		dataType: "json",
		success: function (response) {
			$(".view-modal").html(response.message).show();
			$("#modal-form").modal("show");
		},
	});
}

function form_ubah_password(event) {
	var id = $(event).data("id");

	$("#modal-form").modal("hide");

	$.ajax({
		url: site_url + "users/Users/form_ubah_password",
		method: "post",
		data: { id: id },
		dataType: "json",
		success: function (response) {
			$(".view-modal").html(response.message).show();
			$("#modal-ubah-password").modal("show");
		},
	});
}

function ubah_password() {
	var data = $("#my-form").serialize();

	$.ajax({
		url: site_url + "users/Users/ubah_password",
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
				if (response.error.password_lama) {
					$("#password_lama").addClass("is-invalid");
					$("#error-password-lama").html(response.error.password_lama);
				} else {
					$("#password_lama").removeClass("is-invalid");
					$("#error-password-lama").html("");
				}
				if (response.error.password) {
					$("#password").addClass("is-invalid");
					$("#error-password").html(response.error.password);
				} else {
					$("#password").removeClass("is-invalid");
					$("#error-password").html("");
				}
				if (response.error.ulangi_password) {
					$("#ulangi_password").addClass("is-invalid");
					$("#error-ulangi_password").html(response.error.ulangi_password);
				} else {
					$("#ulangi_password").removeClass("is-invalid");
					$("#error-ulangi_password").html("");
				}
			} else if (response.status == "success") {
				$("#modal-ubah-password").modal("hide");
				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: response.message,
				});
				loadData();
			} else {
				Swal.fire({
					icon: "error",
					title: "Gagal",
					text: "Kesalahan Server Silahkan Hubungi Admin",
				});
			}
		},
	});
}

function create() {
	var data = $("#my-form").serialize();

	$.ajax({
		url: site_url + "users/Users/create",
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
				if (response.error.nama_lengkap) {
					$("#nama_lengkap").addClass("is-invalid");
					$("#error-nama_lengkap").html(response.error.nama_lengkap);
				} else {
					$("#nama_lengkap").removeClass("is-invalid");
					$("#error-nama_lengkap").html("");
				}
				if (response.error.username) {
					$("#username").addClass("is-invalid");
					$("#error-username").html(response.error.username);
				} else {
					$("#username").removeClass("is-invalid");
					$("#error-username").html("");
				}
				if (response.error.password) {
					$("#password").addClass("is-invalid");
					$("#error-password").html(response.error.password);
				} else {
					$("#password").removeClass("is-invalid");
					$("#error-password").html("");
				}
				if (response.error.ulangi_password) {
					$("#ulangi_password").addClass("is-invalid");
					$("#error-ulangi_password").html(response.error.ulangi_password);
				} else {
					$("#ulangi_password").removeClass("is-invalid");
					$("#error-ulangi_password").html("");
				}
				if (response.error.nip) {
					$("#nip").addClass("is-invalid");
					$("#error-nip").html(response.error.nip);
				} else {
					$("#nip").removeClass("is-invalid");
					$("#error-nip").html("");
				}
				if (response.error.jabatan) {
					$("#jabatan").addClass("is-invalid");
					$("#error-jabatan").html(response.error.jabatan);
				} else {
					$("#jabatan").removeClass("is-invalid");
					$("#error-jabatan").html("");
				}
				if (response.error.level) {
					$("#level").addClass("is-invalid");
					$("#error-level").html(response.error.level);
				} else {
					$("#level").removeClass("is-invalid");
					$("#error-level").html("");
				}
				if (response.error.blokir) {
					$("#blokir").addClass("is-invalid");
					$("#error-blokir").html(response.error.blokir);
				} else {
					$("#blokir").removeClass("is-invalid");
					$("#error-blokir").html("");
				}
			} else if (response.status == "success") {
				$("#modal-form").modal("hide");
				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: response.message,
				});
				loadData();
			} else {
				Swal.fire({
					icon: "error",
					title: "Gagal",
					text: "Kesalahan Server Silahkan Hubungi Admin",
				});
			}
		},
	});
}

function update() {
	var data = $("#my-form").serialize();

	$.ajax({
		url: site_url + "users/Users/update",
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
				if (response.error.nama_lengkap) {
					$("#nama_lengkap").addClass("is-invalid");
					$("#error-nama_lengkap").html(response.error.nama_lengkap);
				} else {
					$("#nama_lengkap").removeClass("is-invalid");
					$("#error-nama_lengkap").html("");
				}
				if (response.error.username) {
					$("#username").addClass("is-invalid");
					$("#error-username").html(response.error.username);
				} else {
					$("#username").removeClass("is-invalid");
					$("#error-username").html("");
				}
				if (response.error.password) {
					$("#password").addClass("is-invalid");
					$("#error-password").html(response.error.password);
				} else {
					$("#password").removeClass("is-invalid");
					$("#error-password").html("");
				}
				if (response.error.ulangi_password) {
					$("#ulangi_password").addClass("is-invalid");
					$("#error-ulangi_password").html(response.error.ulangi_password);
				} else {
					$("#ulangi_password").removeClass("is-invalid");
					$("#error-ulangi_password").html("");
				}
				if (response.error.nip) {
					$("#nip").addClass("is-invalid");
					$("#error-nip").html(response.error.nip);
				} else {
					$("#nip").removeClass("is-invalid");
					$("#error-nip").html("");
				}
				if (response.error.jabatan) {
					$(".jabatan").addClass("is-invalid");
					$(".error-jabatan").html(response.error.jabatan);
				} else {
					$(".jabatan").removeClass("is-invalid");
					$(".error-jabatan").html("");
				}
				if (response.error.level) {
					$("#level").addClass("is-invalid");
					$("#error-level").html(response.error.level);
				} else {
					$("#level").removeClass("is-invalid");
					$("#error-level").html("");
				}
				if (response.error.blokir) {
					$("#blokir").addClass("is-invalid");
					$("#error-blokir").html(response.error.blokir);
				} else {
					$("#blokir").removeClass("is-invalid");
					$("#error-blokir").html("");
				}
			} else if (response.status == "success") {
				$("#modal-form").modal("hide");
				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: response.message,
				});
				loadData();
			} else {
				Swal.fire({
					icon: "error",
					title: "Gagal",
					text: "Kesalahan Server Silahkan Hubungi Admin",
				});
			}
		},
	});
}

function hapus(event) {
	var id = $(event).data("id");
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Proses ini akan menghapus data anda!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, hapus!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: site_url + "users/Users/delete",
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
						loadData();
					} else {
						Swal.fire({
							icon: "error",
							title: "Gagal",
							text: "Data gagal di hapus!",
						});
					}
				},
			});
		}
	});
}

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
		bDestroy: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: site_url + "users/Users/datatables",
			type: "POST",
		},
		columns: [
			{
				data: "nama_lengkap",
				orderable: false,
				className: "text-center align-middle",
			},
			{
				data: "nama_lengkap",
				className: "align-middle",
			},
			{
				data: "username",
				className: "align-middle",
			},
			{
				data: "jabatan",
				className: "align-middle",
			},
			{
				data: "lasted_login",
				render: function (data) {
					return convertTanggal(data, false, true);	
				},
				className: "align-middle",
			},
			{
				data: "level",
				render: function (data) {
					if (data == 'admin') {
						var tmp = '<span class="badge badge-primary">Admin</span>';
					} else {
						var tmp = '<span class="badge badge-info">Pegawai</span>';
					}
					return tmp;	
				},
				className: "align-middle",
			},
			{
				data: "action",
				orderable: false,
				className: "text-center align-middle",
			},
		],
		order: [],
		responsive: true,
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
