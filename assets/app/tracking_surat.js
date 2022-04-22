$(document).ready(function(){
	$("#form-track").submit(function(event){
		
		alert(JSON.stringify($(this)));

		event.preventDefault();
	});
});
