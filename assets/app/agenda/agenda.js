$(document).ready(function () {
	loadAgenda();
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

function form_edit(event) {
	var id = $(event).data("id");

	$.ajax({
		url: site_url + "agenda/Agenda/form_edit",
		method: "post",
		data: { id: id ,
		type:1},
		dataType: "json",
		success: function (response) {
			$(".view-modal").html(response.message).show();
			$("#modal-form").modal("show");
		},
	});
}

function update() {
	var data = $("#form-edit-agenda").serialize();

	$.ajax({
		url: site_url + "agenda/Agenda/update",
		method: "post",
		data: {data:data},
		dataType: "json",
		beforeSend: function () {
			$(".btn-submit").html('<i class="fa fa-spin fa-spinner"></i> loading');
			$(".btn-cencel").hide(100);
			$(".btn-submit").attr("disabled", true);
		},
		complete: function () {
			$(".btn-submit").removeAttr("disabled");
			$(".btn-cencel").show(100);
			$(".btn-submit").html("Simpan");
		},
		error: function (xhr, ajaxOptions, thrownerror) {
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
		},
		success: function (response) {
			if (response.error) {
				if (response.error.agenda) {
					$("#agenda").addClass("is-invalid");
					$("#error-agenda").html(response.error.agenda);
				} else {
					$("#agenda").removeClass("is-invalid");
					$("#error-agenda").html("");
				}
				if (response.error.detail) {
					$("#detail").addClass("is-invalid");
					$("#error-detail").html(response.error.detail);
				} else {
					$("#detail").removeClass("is-invalid");
					$("#error-detail").html("");
				}
			} else if (response.status == "success") {
				$("#modal-form").modal("hide");
				loadAgenda();
				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: response.message,
				});
				
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
				url: site_url + "agenda/Agenda/delete",
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
						loadAgenda();
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


function loadAgenda() {
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
			url: site_url + "agenda/agenda/datatables_agenda/1",
			type: "POST",
		},
		columns: [{
				data: "id",
				orderable: false,
				className: "text-center align-middle",
				
			},
			{
				data: "tanggal",
				className: "text-center align-middle",
			},
			{
				data: "agenda",
				className: "align-middle",
			},
			{
				data: "detail",
				className: "align-middle",
			},
			{
				data: "action",
				orderable: false,
				className: "text-center align-middle",
			},
			
			
			// {
			// 	data: "asal_agenda",
			// 	className: "align-middle",
			// },
			// {
			// 	data: "tujuan_agenda",
			// 	className: "align-middle",
			// },
			// {
			// 	data: "action",
			// 	orderable: false,
			// 	className: "text-center align-middle",
			// },
		],
		responsive: true,
		order: [[2, 'desc']],
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

