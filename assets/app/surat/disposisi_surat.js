$(document).ready(function () {
	//Initialize Select2 Elements
	$("#tujuan_disposisi").select2({
		placeholder: "Pilih Tujuan Disposisi",
		theme: "bootstrap4",
		allowClear: true,
	});
	$("#tipe_disposisi").select2({
		placeholder: "Pilih Instruksi Disposisi",
		theme: "bootstrap4",
		allowClear: true,
	});

	// fokus on serach select2
	$(document).on("select2:open", () => {
		document.querySelector(".select2-search__field").focus();
	});
});
