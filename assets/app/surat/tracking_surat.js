$(document).ready(function () {
	$("#form-track").submit(function(event){
		event.preventDefault();
		var nomor_surat = $("#nomor_surat").val();
		$.ajax({
			url: site_url+"surat/track/ajax_track",
			dataType: "json",
			method: "POST",
			data : { nomor_surat: nomor_surat},
			success: function(response){
				$("#display-tracking").html(response.data);
			}
		});
	});
});


