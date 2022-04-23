$(document).ready(function () {
	$("#form-track").submit(function(event){
		event.preventDefault();
		$.ajax({
			dataType: "json",
			url: site_url+"surat/track/tracking",
			success: function(response){
				$("#display-tracking").html(JSON.stringify(response));
			},
			error: function(jqXhr, textStatus, errorMessage){
				alert(JSON.stringify(errorMessage));
				// $("#display-tracking").html(errorMessage);
			}
		});
	});
});


