$(document).ready(function () {
	load_jabatan();
	onclick_btn();
});

function onclick_btn() {
	$(document).on("click", ".btn-tambah", function (e) {
		var tes = $(this).data("id");
		console.log("ini id dari tombol tambah - " + tes);
	});
	$(document).on("click", ".btn-edit", function (e) {
		var tes = $(this).data("id");
		console.log("ini id dari tombol edit - " + tes);
	});
	$(document).on("click", ".btn-hapus", function (e) {
		var tes = $(this).data("id");
		console.log("ini id dari tombol hapus - " + tes);
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
				color: "green",
				icon: "glyphicon glyphicon-stop",
				// onNodeSelected: function(event, node) {
				// 	console.log('tes2 - ' + JSON.stringify(node));
				// }
			});
		},
	});
}
