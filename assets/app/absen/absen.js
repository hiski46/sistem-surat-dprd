$(document).ready(function() {
    
})

function calendar() {
    $.ajax({
        url: site_url + 'absen/Absen/calendar',
        success: function(data) {
            $('#calendar').html(data);
        }
    })
}

