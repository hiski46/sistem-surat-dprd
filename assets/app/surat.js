$(document).ready(function() {
    // alert(site_url);
    // $.ajax({
    // 	type: "GET",
    // 	url: "http://localhost/sim-surat-dprd/surat/surat/list",
    // 	success: function(response){
    // 		alert(response);
    // 	},
    // 	fail: function(){
    // 		alert("error");
    // 	}
    // });

    list_surat();

    function list_surat() {
        $("#table-surat").DataTable({
            "processsing": true,
            "serverSide": true,
            "ajax": {
                "url": "http://localhost/sim-surat-dprd/surat/surat/list",
                "type": "GET"
            },
            "columns": [
                { "data": "no_surat" },
                { "data": "tanggal_surat" },
                { "data": "isi_surat" }
            ],
            "paging": true,
            "searching": true,
            "ordering": false,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#container-surat .col-md-6:eq(0)');;
    }
});
