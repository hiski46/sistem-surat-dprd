$(document).ready(function () {
	var table = $("#table-laporan").DataTable({
		dom: "PBfrtpB",
		responsive: true,
		processing: true,
		serverSide: true,
		// searchPane  : true,
		orders: [],
		ajax: {
			url: base_url + "surat/laporan/get_datatables",
			dataType: "json",
			type: "POST",
			data: function (data) {
				data.start_date = $("#start_date").val();
				data.end_date = $("#end_date").val();
				data.tipe_surat = $("#tipe_surat").find(":selected").val();
				data.status_surat = $("#status_surat").find(":selected").val();
			},
		},
		columns: [
			{
				data: "nomor_surat",
				title: "Nomor Surat",
				render: function (data, type, row) {
					return (
						"<div>" +
						data +
						"</br>" +
						moment(row.tanggal_surat).locale("id").format("d MMMM YYYY") +
						"</div>"
					);
				},
			},
			{
				data: "tanggal_diterima",
				title: "Tanggal diterima",
				render: function (data) {
					return convertTanggal(data);
				},
			},
			{ data: "sifat_surat", title: "Sifat Surat" },
			{
				data: "isi",
				title: "Isi Surat",
				render: function (data, type, row, meta) {
					return (
						'<a href="' +
						site_url +
						"surat/surat/detail_surat/" +
						row.sec_id +
						'">' +
						data +
						"</a>"
					);
				},
			},
			{
				data: "status_surat",
				title: "Status",
				render: function (data) {
					var color = "";
					if (data == "diterima") {
						color = "badge-success";
					} else if (data == "diproses") {
						color = "badge-warning";
					} else {
						color = "badge-primary";
					}
					return '<span class="badge ' + color + '">' + data + "</span>";
				},
			},
		],
		buttons: [
			// 'excel',
			// 'pdf'
			// {
			//     extend: 'collection',
			//     text: 'Export',
			//     buttons: [
			//     'excel', 'pdf']
			// },
			{
				text: "Excel",
				className: "excel",
				action: function (e, dt, node, config) {
					e.preventDefault();
					$(".excel").html('<i class="fa fa-spin fa-spinner"></i> loading');
					$(".excel").attr("disabled", true);

					$("#form_filter").attr(
						"action",
						site_url + "surat/laporan/generate_excel"
					);
					$("#form_filter").submit();
					$("#form_filter").removeAttr("action");

					$(".excel").removeAttr("disabled");
					$(".excel").html("Excel");

					// $.ajax({
					// 	url: site_url + "surat/laporan/generate_excel",
					// 	dataType: "json",
					// 	type: "POST",
					// 	data: {
					// 		start_date: $("#start_date").val(),
					// 		end_date: $("#end_date").val(),
					// 	},
					// 	success: function (data) {
					// 		var d = new Date();
					// 		var date =
					// 			d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear();
					// 		var $a = $("<a>");
					// 		$a.attr("href", data.file);
					// 		$("body").append($a);
					// 		$a.attr("download", "Cetak Laporan " + date + ".xlsx");
					// 		$a[0].click();
					// 		$a.remove();

					// 		$(".excel").removeAttr("disabled");
					// 		$(".excel").html("Excel");
					// 	},
					// });
				},
			},
			{
				text: "PDF",
				className: "pdf",
				action: function (e, dt, node, config) {
					e.preventDefault();
					$(".pdf").html('<i class="fa fa-spin fa-spinner"></i> loading');
					$(".pdf").attr("disabled", true);

					$("#form_filter").attr(
						"action",
						site_url + "surat/laporan/generate_pdf"
					);
					$("#form_filter").submit();
					$("#form_filter").removeAttr("action");

					$(".pdf").removeAttr("disabled");
					$(".pdf").html("PDF");
					
				},
			},
		],
		searchPanes: {
			layout: `columns-2`,
		},
	});

	// filder di jalankan ketika form filter tanggal di isi
	$(".filter_date").change(function (e) {
		table.ajax.reload();
	});
});
