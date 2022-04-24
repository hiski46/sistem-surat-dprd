$(document).ready(function () {
	loadData();
});
function form_tambah() {
	$.ajax({
		url: site_url + "surat/Instansi/form_tambah",
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
		url: site_url + "surat/Instansi/form_edit",
		method: "post",
		data: { id: id },
		dataType: "json",
		success: function (response) {
			$(".view-modal").html(response.message).show();
			$("#modal-form").modal("show");
		},
	});
}

function create() {
	var data = $("#my-form").serialize();

	$.ajax({
		url: site_url + "surat/Instansi/create",
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
				if (response.error.instansi) {
					$("#instansi").addClass("is-invalid");
					$("#error-instansi").html(response.error.instansi);
				} else {
					$("#instansi").removeClass("is-invalid");
					$("#error-instansi").html("");
				}
				if (response.error.alamat) {
					$("#alamat").addClass("is-invalid");
					$("#error-alamat").html(response.error.alamat);
				} else {
					$("#alamat").removeClass("is-invalid");
					$("#error-alamat").html("");
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
		url: site_url + "surat/Instansi/update",
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
				if (response.error.instansi) {
					$("#instansi").addClass("is-invalid");
					$("#error-instansi").html(response.error.instansi);
				} else {
					$("#instansi").removeClass("is-invalid");
					$("#error-instansi").html("");
				}
				if (response.error.alamat) {
					$("#alamat").addClass("is-invalid");
					$("#error-alamat").html(response.error.alamat);
				} else {
					$("#alamat").removeClass("is-invalid");
					$("#error-alamat").html("");
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
				url: site_url + "surat/Instansi/delete",
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
			url: site_url + "surat/Instansi/datatables",
			type: "POST",
		},
		columns: [
			{
				data: "instansi",
				orderable: false,
				className: "text-center align-middle",
			},
			{
				data: "instansi",
				className: "align-middle",
			},
			{
				data: "alamat",
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
