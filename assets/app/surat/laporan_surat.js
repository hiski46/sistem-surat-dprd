$(document).ready(function(){
	// alert(base_url+'assets/app/sample_ajax_surat.txt');

	// alert(JSON.stringify(dataSet));	

	$('#table-laporan').DataTable({
		dom: 'lfrtip',
		responsive 	: true,
		processing	: true,
        serverSide	: true,
        // pageLength 	: 5,
        orders : [],
		ajax : { 
			url : base_url+"surat/laporan/get_datatables",
			dataType: "json",
			type : "POST"
		},
        columns: [
            { 	data: "nomor_surat", 
            	title: "Nomor Surat"
            },
            { 	data: "tanggal_diterima", 
            	title: "Tanggal diterima",
             	render: function(data){
             		return convertTanggal(data);
             	} 
            },
            { 	data: "sifat_surat", 
            	title: "Sifat Surat"
            },
            { 	data: "isi",
             	title: "Isi Surat"
            },
            { 	data: "status_surat",
             	title: "Status",
             	render: function(data){
             		var color = "";
             		if (data == "diterima") {
             			color = "badge-success";
             		} else if (data == "diproses") {
             			color = "badge-warning";
             		} else {
     					color = "badge-primary";
             		}
             		return '<span class="badge ' + color + '">' + data + '</span>';
             	}
            }
        ]
	});
});