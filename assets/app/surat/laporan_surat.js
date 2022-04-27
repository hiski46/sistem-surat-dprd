$(document).ready(function(){
	$('#table-laporan').DataTable({
        dom: 'BfrtpB',
		responsive 	: true,
		processing	: true,
        serverSide	: true,
        orders : [],
		ajax : { 
			url : base_url+"surat/laporan/get_datatables",
			dataType: "json",
			type : "POST"
		},
        columns: [
            { 	data: "nomor_surat", 
            	title: "Nomor Surat",
                render: function(data,type,row){
                    return '<div>'+data+'</br>'+ moment(row.tanggal_surat).locale("id").format("d MMMM YYYY")+'</div>';
                }
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
             	title: "Isi Surat",
                render: function(data, type, row, meta){
                    return '<a href="'+site_url+'surat/surat/detail_surat/'+row.sec_id+'">' + data + '</a>';
                }
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
        ],
        buttons: [
            'excel',
            'pdf'
            // {
            //     extend: 'collection',
            //     text: 'Export',
            //     buttons: [
            //     'excel', 'pdf']
            // },
            // {
            //     text: 'Excel',
            //     action: function ( e, dt, node, config ) {
            //         alert( 'Export to Excel' );
            //     }
            // },
            // {
            //     text: 'PDF',
            //     action: function ( e, dt, node, config ) {
            //         alert( 'Export to PDF' );
            //     }
            // }
        ]
	});
});