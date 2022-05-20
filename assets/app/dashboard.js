$(document).ready(function () {
	window.setTimeout("waktu()", 1000);
	getChart();
	$("#tahun").change(function (e) {
		getChart();
	});

});

function getChart() {
	$.ajax({
		url: site_url + "surat/Dashboard/getAjax",
		method: "post",
		dataType: "json",
		data: { tahun: $("#tahun").val() },
		success: function (response) {
			$("#knob_surat_masuk").val(
				(response.total_surat * response.jml_surat_masuk) / 100
			);
			$("#knob_surat_keluar").val(
				(response.total_surat * response.jml_surat_keluar) / 100
			);
			$("#knob_surat_internal").val(
				(response.total_surat * response.jml_surat_internal) / 100
			);

			chart(
				response.surat_masuk_perbulan,
				response.surat_keluar_perbulan,
				response.surat_internal_perbulan
			);
		},
	});
}

function chart(surat_masuk, surat_keluar, surat_internal) {
	$(".knob").knob();
	var salesGraphChartCanvas = $("#line-chart").get(0).getContext("2d");
	var salesGraphChartData = {
		labels: [
			"January",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		],
		datasets: [
			{
				label: "Surat Masuk",
				fill: false,
				borderWidth: 2,
				lineTension: 0,
				spanGaps: true,
				borderColor: "#6610f2",
				pointRadius: 3,
				pointHoverRadius: 7,
				pointColor: "#6610f2",
				pointBackgroundColor: "#6610f2",
				data: surat_masuk,
			},
			{
				label: "Surat Keluar",
				fill: false,
				borderWidth: 2,
				lineTension: 0,
				spanGaps: true,
				borderColor: "#39cccc",
				pointRadius: 3,
				pointHoverRadius: 7,
				pointColor: "#39cccc",
				pointBackgroundColor: "#39cccc",
				data: surat_keluar,
			},
			{
				label: "Surat Internal",
				fill: false,
				borderWidth: 2,
				lineTension: 0,
				spanGaps: true,
				borderColor: "#3c8dbc",
				pointRadius: 3,
				pointHoverRadius: 7,
				pointColor: "#3c8dbc",
				pointBackgroundColor: "#3c8dbc",
				data: surat_internal,
			},
		],
	};
	var salesGraphChartOptions = {
		maintainAspectRatio: false,
		responsive: true,
		legend: { display: false },
		scales: {
			xAxes: [
				{
					ticks: { fontColor: "#343a40" },
					gridLines: { display: false, color: "#343a40", drawBorder: false },
				},
			],
			yAxes: [
				{
					ticks: { stepSize: 5000, fontColor: "#343a40" },
					gridLines: { display: true, color: "#343a40", drawBorder: false },
				},
			],
		},
	};
	var salesGraphChart = new Chart(salesGraphChartCanvas, {
		type: "line",
		data: salesGraphChartData,
		options: salesGraphChartOptions,
	});

	salesGraphChart.update();
}

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
