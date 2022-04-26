$(document).ready(function () {
	window.setTimeout("waktu()", 1000);
});

function waktu() {
	var waktu = new Date();
	setTimeout("waktu()", 1000);
	var jam_berjalan =
		set(waktu.getHours()) +
		":" +
		set(waktu.getMinutes()) +
		":" +
		set(waktu.getSeconds());
	document.getElementById("jam_berjalan").innerHTML = jam_berjalan;
}

function set(e) {
	e = e < 10 ? "0" + e : e;
	return e;
}